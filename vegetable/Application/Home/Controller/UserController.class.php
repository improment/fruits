<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$orders=$Model->query("select * from orders as o inner join order_mess as m on o.oid=m.oid where uid='$u_id' limit 3");
		//print_r($orders);die;
		for($i=0;$i<count($orders);$i++){
			$arr[date('Y-m-d H:i:s',$orders[$i]['otime'])."订单号:".$orders[$i]['onumber']][]=$orders[$i];
		}
		$users=$Model->query("select * from user where uid='$u_id'");
		$this->assign($users[0]);
		$this->display('user_info');
		//print_r($arr);die;
		$this->assign('list',$arr);
        $this->display('user');
    }
	//收货地址
	public function address(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$address=$Model->query("select * from address where uid='$u_id'");
		$Model = new \Think\Model();
		$u_id=$_SESSION['name']['uid'];
		$users=$Model->query("select * from user where uid='$u_id'");
		$this->assign($users[0]);
		$this->assign('list',$address);
		$this->display('user_address');
	}
	//查看物流
	public function wuliu(){
		$kuaidi=I('get.k');
		$num=I('get.n');
		//echo $kuaidi;
		//echo $num;die;
		$url="http://v.juhe.cn/exp/index?key=90fc73678435c72cf9be6f6cfbbfc6d7&com=".$kuaidi."&no=".$num;
		$str=file_get_contents($url);
		//echo $ar;
		$arr=json_decode($str,true);
		//print_r($arr);die;
		$new_arr=$arr['result'];
		//print_r($new_arr);

		$this->assign($new_arr);
        $this->display('wuliu');
	}
	//支付
	public function zhifu(){
		$Model = new \Think\Model();
		$u_id=$_SESSION['name']['uid'];
		$id=I('post.zhi_id');
		//echo $id;
		$pwd=I('post.pwd');
		$pwd=md5($pwd);
		$users=$Model->query("select * from user where uid='$u_id'");
		//print_r($users);
		if($pwd==$users[0]['upwd']){
			$Model->execute("update orders set ostatus=3 where oid='$id'");
			$this->success("收货成功",__APP__.'/home/user/index');
		}else{
			$this->error('密码错误');
		}
	}
	//新增收货地址
	public function add_address(){
		$u_id=$_SESSION['name']['uid'];
		$data=I('post.');
		$data['uid']=$u_id;
		$data['status']=1;
		$data['defaults']=0;
		$address = D("address");
		$address->in_save("defaults=0 and uid=$u_id",'status','0');
		$address->insert($data); 
		$this->success("新增成功",__APP__.'/home/user/address');
	}
	//我的订单
	public function my_dingdan(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$orders=$Model->query("select * from orders as o inner join order_mess as m on o.oid=m.oid where uid='$u_id'");
		//print_r($orders);die;
		for($i=0;$i<count($orders);$i++){
			$arr[date('Y-m-d H:i:s',$orders[$i]['otime'])."订单号:".$orders[$i]['onumber']][]=$orders[$i];
		}
		//print_r($arr);die;
		$Model = new \Think\Model();
		$u_id=$_SESSION['name']['uid'];
		$users=$Model->query("select * from user where uid='$u_id'");
		$this->assign($users[0]);
		$this->assign('list',$arr);
        $this->display('my_dingdan');
    }
	//个人信息
	public function user_info(){
		$Model = new \Think\Model();
		$u_id=$_SESSION['name']['uid'];
		$users=$Model->query("select * from user where uid='$u_id'");
		$this->assign($users[0]);
		$this->display('user_info');
	}
	//修改个人信息
	public function user_ziliao(){
		$Model = new \Think\Model();
		$u_id=$_SESSION['name']['uid'];
		$arr=I('post.');
		$uname=I('post.uname');
		$unickname=I('post.unickname');
		$usex=I('post.usex');
		$uphone=I('post.uphone');
		$uemail=I('post.uemail');
		if(empty($arr)){
			$this->error("不能修改资料");
		}else{
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =      './'; // 设置附件上传目录    // 			
			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传单个文件     
			$info   =   $upload->uploadOne($_FILES['file']); 
					//print_r($info);die;
			if(!$info) {// 上传错误提示错误信息        
			$this->error($upload->getError());    
			}else{// 上传成功 获取上传文件信息         
			$uhead=$info['savepath'].$info['savename'];
			$info=$Model->execute("update user set uname='$uname',unickname='$unickname',usex='$usex',uphone='$uphone',uemail='$uemail',uhead='$uhead' where uid='$u_id'");
			if($info){
				$this->success("更新成功",__APP__.'/home/user/user_info');
			}else{
				$this->error("更新失败");
			}
			}
		}
	}
	//收货地址默认
	public function address_default(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$id=I('post.id');
		$info=$Model->execute("update address set defaults='0' where defaults='1' and uid='$u_id'");
		if($info){
			$Model->execute("update address set defaults='1' where aid='$id' and uid='$u_id'");
			echo '1';
		}else{
			echo '0';
		}
	}
	//删除收货地址
	public function address_del(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$id=I('post.id');
		$info=$Model->execute("delete from address where  aid='$id' and uid='$u_id'");
		if($info){
			echo '1';
		}else{
			echo '0';
		}
	}
}