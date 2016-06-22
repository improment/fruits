<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf8");
class ActiveController extends Controller {
	
    public function index(){
		$activity=D('Activity');
		$arr=$activity->two_sel("aid desc","state=1 and astatus=1 and type=0",5);
		//print_r($arr);die;
		$are=$activity->two_sel("aid desc","state=2 and astatus=1 and type=0",1);
		$are2=$activity->two_sel("aid desc","state=3 and astatus=1 and type=0",4);
		$this->assign('are',$are);
		$this->assign('are2',$are2);
		$this->assign('arr',$arr);
        $this->display('Group_buy');
    }
	//进入详情页
	public function product(){
		$id=I('get.id');
		$activity=D('Activity');
		$arr=$activity->id_sel("aid=$id");
		//print_r($arr);die;
		//echo date('Y-m-d H:i:s',1465972815);die;

		$ar=explode('|',$arr['simg']);
		//print_r($ar);die;
		unset($ar[count($ar)-1]);
		$arr['simg']=implode('|',$ar);
		$are=$activity->two_sel("sbuy desc","status=1 and type!=0",6);
		//print_r($are);die;
		$this->assign('are',$are);
		//print_r($are);die;
		$this->assign($arr);
		$this->display('Product');
		
	}
	//购物车
	public function flow2(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$cart = M("cart");
		//echo $u_id;die;
		$data=I('post.');
        if(empty($u_id)){
            $cookie_cards=json_decode(cookie('cards'),true);
			//print_r($cookie_cards);die;
			
            $k=count($cookie_cards);
			//echo $k;die;
			
			//echo $sumprice;
            //判断购物车是否已存在该商品
            $flag=0;
            if($k>0){
                foreach($cookie_cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $cookie_cards[$kk]['snum']=$v['snum']+$data['snum'];
						$cookie_cards[$kk]['zongjia']=$v['zongjia']+$data['zongjia'];
						$cookie_cards[$kk]['yzongjia']=$v['yzongjia']+$data['yzongjia'];
                        $flag=1;
                    }
                }
            }
            if($flag==0){
                $cookie_cards[$k]=$data;
				//print_r($cookie_cards);die;
            }
            cookie('cards',json_encode($cookie_cards),60*60*24*3);
            //var_dump($cookie_cards);
            echo '1';
        }else{
			$data['uid']=$u_id;
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
            $flag=0;
            if($k>0){
                foreach($cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $snum=$v['snum']+$data['snum'];
						$zongjia=$v['zongjia']+$data['zongjia'];
						$yzongjia=$v['yzongjia']+$data['yzongjia'];
						$Model->execute("update cart set snum='$snum',zongjia='$zongjia',yzongjia='$yzongjia' where cid='$v[cid]'");
                        
						$flag=1;
                    }
                }
            }
            if($flag==0){
				//print_r($data);die;
                
				$sql = $cart->fetchSql(true)->add($data); 
				//echo $sql; 
				$Model->execute($sql);
            }
			
            echo '1';
        
	  }
	}
	//购物车
	public function flow(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$cart = M("cart");
		//echo $u_id;die;
		$data=I('post.');
        if(empty($u_id)){
            $cookie_cards=json_decode(cookie('cards'),true);
			//print_r($cookie_cards);die;
			
            $k=count($cookie_cards);
			//echo $k;die;
			
			//echo $sumprice;
            //判断购物车是否已存在该商品
            $flag=0;
            if($k>0){
                foreach($cookie_cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $cookie_cards[$kk]['snum']=$v['snum']+$data['snum'];
						$cookie_cards[$kk]['zongjia']=$v['zongjia']+$data['zongjia'];
						$cookie_cards[$kk]['yzongjia']=$v['yzongjia']+$data['yzongjia'];
                        $flag=1;
                    }
                }
            }
            if($flag==0){
                $cookie_cards[$k]=$data;
				//print_r($cookie_cards);die;
            }
            cookie('cards',json_encode($cookie_cards),60*60*24*3);
            //var_dump($cookie_cards);
            //echo '1';
        }else{
			$data['uid']=$u_id;
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
            $flag=0;
            if($k>0){
                foreach($cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $snum=$v['snum']+$data['snum'];
						$zongjia=$v['zongjia']+$data['zongjia'];
						$yzongjia=$v['yzongjia']+$data['yzongjia'];
						$Model->execute("update cart set snum='$snum',zongjia='$zongjia',yzongjia='$yzongjia' where cid='$v[cid]'");
                        
						$flag=1;
                    }
                }
            }
            if($flag==0){
				//print_r($data);die;
                
				$sql = $cart->fetchSql(true)->add($data); 
				//echo $sql; 
				$Model->execute($sql);
            }
			
           // echo '1';
        
	  }
	}
	public function shopping_cart(){
		$u_id=$_SESSION['name']['uid'];
		if($u_id==''){
			$cookie_cards=json_decode(cookie('cards'),true);
		//print_r($cookie_cards);die;
		for($a=0;$a<count($cookie_cards);$a++){
				//echo $cookie_cards[$a]['zongjia'];
				$sumprice=$sumprice+$cookie_cards[$a]['zongjia'];
			}
		//echo $sumprice;die;
		$data['zongjia']=$sumprice;
		$this->assign($data);
		$this->assign('cookie',$cookie_cards);
		
		$this->display('shopping_cart');
		}else{
		$Model = new \Think\Model();
		$cards=$Model->query("select * from cart where uid='$u_id'");
		//print_r($cards);die;
		for($a=0;$a<count($cards);$a++){
				//echo $cookie_cards[$a]['zongjia'];
				$sump=$sump+$cards[$a]['zongjia'];
			}
		//echo $sump;die;
		$data['zongjia']=$sump;
		$this->assign($data);
		$this->assign('cookie',$cards);
		$this->display('shopping_cart');
		}
	}
	//更新购物车
	public function floww(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$cart = M("cart");
		//echo $u_id;die;
		$data=I('post.');
        if(empty($u_id)){
            $cookie_cards=json_decode(cookie('cards'),true);
			//print_r($cookie_cards);die;
			
            $k=count($cookie_cards);
			//echo $k;die;
			
			//echo $sumprice;
            //判断购物车是否已存在该商品
            $flag=0;
            if($k>0){
                foreach($cookie_cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $cookie_cards[$kk]['snum']=$data['snum'];
						$cookie_cards[$kk]['zongjia']=$data['zongjia'];
						$cookie_cards[$kk]['yzongjia']=$data['yzongjia'];
                        $flag=1;
                    }
                }
            }
            if($flag==0){
                $cookie_cards[$k]=$data;
				//print_r($cookie_cards);die;
            }
            cookie('cards',json_encode($cookie_cards),60*60*24*3);
            //var_dump($cookie_cards);
            echo '1';
        }else{
			$data['uid']=$u_id;
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
            $flag=0;
            if($k>0){
                foreach($cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $snum=$data['snum'];
						$zongjia=$data['zongjia'];
						$yzongjia=$data['yzongjia'];
						$Model->execute("update cart set snum='$snum',zongjia='$zongjia',yzongjia='$yzongjia' where cid='$v[cid]'");
                        $flag=1;
                    }
                }
            }
            if($flag==0){
				//print_r($data);die;
                
				$sql = $cart->fetchSql(true)->add($data); 
				//echo $sql; 
				$Model->execute($sql);
            }
            echo '1';

	  }
	}
	//付款
	public function fukuan(){
		$u_id=$_SESSION['name']['uid'];
		if(empty($u_id)){
			$this->error("请先登录");
		}else{
		$address = D("address");
		$express = D("express");
		$Model = new \Think\Model();
		$cards=$Model->query("select * from cart where uid='$u_id'");
		$exp=$express->sel();
		$adss=$address->id_sele("uid=$u_id and defaults=1");
		$ads=$address->id_sel("aid desc","uid=$u_id",1); 
		//print_r($arr);die;
		for($a=0;$a<count($cards);$a++){
				//echo $cookie_cards[$a]['zongjia'];
				$sump=$sump+$cards[$a]['zongjia'];
				$yuanjia=$yuanjia+$cards[$a]['yzongjia'];
			}
		//echo $yuanjia;die;
		$data['zongjia']=$sump;
		$date['yuanjia']=$yuanjia;
		$this->assign($data);
		$this->assign($date);
		$this->assign('cards',$cards);
		$this->assign('exp',$exp);
		$this->assign($adss);
		$this->assign('ads',$ads);
		$this->display('Orders');
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
		$this->success("新增成功",__APP__.'/Home/active/fukuan');
	}
	public function add_dingdan(){
		$u_id=$_SESSION['name']['uid'];
		$address=I('post.address');
		//echo $address;die;
		$onumber='HGS'.date('YmdHis');
		$oprice=I('post.zongjia');
		$otime=time();
		$kd=I('post.kuaidi');
		$zhifu=I('post.zhifu');
		$content=I('post.content');
		$data['onumber']=$onumber;
		$data['address']=$address;
		$data['oprice']=$oprice;
		$data['otime']=$otime;
		$data['uid']=$u_id;
		$data['ostatus']=0;
		$data['kuaidi']=$kd;
		$cont['content']=$content;
		$cont['c_time']=$otime;
		$cont['uid']=$u_id;
		$Model = new \Think\Model();
		$orders=M('orders');
		$order_mess=M('order_mess');
		$content_id=$orders->add($data);
		$conta=M('order_content');
		//echo $content_id;die;
		$cont['o_id']=$content_id;
		$conta->add($cont);
		$uname=$Model->query("select uname from user where uid='$u_id'");
		//print_r($uname);die;
		$uname=$uname[0]['uname'];
		//$Model->execute("insert into order_content (content,o_id,c_time) values('$content','$content_id','$otime')");
		$cards=$Model->query("select * from cart where uid='$u_id'");
		$shop=$Model->query("select * from shop");
		$ssid='';
		for($i=0;$i<count($cards);$i++){
			$cards[$i]['uid']=$u_id;
			$cards[$i]['oid']=$content_id;
			$cards[$i]['uname']=$uname;
			$sid=$cards[$i]['sid'];
			$ssid.=$cards[$i]['sid'].',';
			$snum=$cards[$i]['snum'];
			$Model->execute("update shop set snum=snum-$snum,sbuy=sbuy+1 where sid='$sid'");
			$Model->execute("update user set ucourse=ucourse+$oprice where uid='$u_id'");
			$sql = $order_mess->fetchSql(true)->add($cards[$i]);
			//echo $sql;die;
		    $Model->execute($sql);			
		}
		
		$len=strrpos($ssid,',');
		$new_str=substr($ssid,0,$len);
		$Model->execute("delete from cart where sid in($new_str) and uid=$u_id");
		$order_num=$Model->query("select * from orders where oid=$content_id and uid=$u_id");
		$order_list=$Model->query("select * from order_mess where oid=$content_id");
		$this->assign($order_num[0]);
		$this->assign('order_list',$order_list);
		$this->display('order_list');
	}
	 function zhifubao(){
		 $price=I('get.p');
		 $order_sn=I('get.d');
		 $name=I('get.n');
        // ******************************************************配置 start*************************************************************************************************************************
//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//合作身份者id，以2088开头的16位纯数字
        $alipay_config['partner']		= '2088002075883504';
//收款支付宝账号
        $alipay_config['seller_email']	= 'li1209@126.com';
//安全检验码，以数字和字母组成的32位字符
        $alipay_config['key']			= 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
//签名方式 不需修改
        $alipay_config['sign_type']    = strtoupper('MD5');
//字符编码格式 目前支持 gbk 或 utf-8
//$alipay_config['input_charset']= strtolower('utf-8');
//ca证书路径地址，用于curl中ssl校验
//请保证cacert.pem文件在当前文件夹目录中
        $alipay_config['cacert']    = getcwd().'\\cacert.pem';
//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        $alipay_config['transport']    = 'http';
// ******************************************************配置 end*************************************************************************************************************************

// ******************************************************请求参数拼接 start*************************************************************************************************************************
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => $alipay_config['partner'], // 合作身份者id
            "seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
            "payment_type"	=> '1', // 支付类型
            "notify_url"	=> "http://bw.com133.com/notify_url.php", // 服务器异步通知页面路径
            "return_url"	=> "__URL__/get_return", // 页面跳转同步通知页面路径
            "out_trade_no"	=> $order_sn, // 商户网站订单系统中唯一订单号
            "subject"	=> "$name", // 订单名称
            "total_fee"	=> "$price", // 付款金额
            "body"	=> "", // 订单描述 可选
            "show_url"	=> "", // 商品展示地址 可选
            "anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip"	=> "", // 客户端的IP地址
            "_input_charset"	=> 'utf-8', // 字符编码格式
        );
// 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
// 参数排序
        ksort($parameter);
        reset($parameter);

// 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . $alipay_config['key']);
        $parameter['sign_type'] = $alipay_config['sign_type'];
// ******************************************************请求参数拼接 end*************************************************************************************************************************


// ******************************************************模拟请求 start*************************************************************************************************************************
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
        foreach ($parameter as $k => $v) {
            $sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
        }

        $sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

// ******************************************************模拟请求 end*************************************************************************************************************************
        echo $sHtml;
    }
	public function get_return(){
		
	}
	
}