<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display('login');
    }
	Public function registered(){
		$this->display('registered');
	}
	 //验证码配置
	 function verify(){
		$Verify = new \Think\Verify();
		//$Verify->fontttf = 'msyh.ttf'; 
		$Verify->length =3;
		$Verify->imageW =100;
		$Verify->imageH =36;
		$Verify->fontSize =15;
		$Verify->useZh = true;
		$Verify->entry();
	}
	//用户在注册
	function user_add(){
    	$message=D('User');
    	$arr=I('post.');
		$upwd=md5(I('post.upwd'));
		//echo $upwd;die;
		$arr['upwd']=$upwd;
    	$arr['add_time']=time();
		$verify = new \Think\Verify();
		if(!$verify->check($_POST['yzm'],'')){
			$this->error('验证码错误');
		}
		$info=$message->insert($arr);
		//echo $info;die;
		if($info){
			$info=$message->sel("uid=$info");
			session('name',$info);
			//print_r(session('name'));
			$this->success("恭喜".$info['unickname']."注册成功",__APP__.'/Home/index/index');
		}else{
			$this->error('注册失败');
		}
    }
	//用户登录
	function login(){
		$message=D('User');
		$arr=I('post.');
		//print_r($arr);die;
		$arr['upwd']=md5($arr['upwd']);
		$info=$message->sele($arr);
		//print_r($info);die;
		if($info){
			session('name',$info);
			$this->success("登录成功",__APP__.'/Home/index/index');
		}else{
			$this->error('账号密码错误');
		}
		
	}
	//用户退出
	function out(){
		session('name',null); 
		$this->success("退出成功",__APP__.'/Home/index/index');
	}
}