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
	 function verify(){
		$Verify = new \Think\Verify();
		//$Verify->fontttf = 'msyh.ttf'; 
		$Verify->useZh = true;
		$Verify->entry();
	}
	function user_add(){
    	$message=D('User');
    	$arr=I('post.');
    	$arr['add_time']=date('Y-m-d H:i:s');
    	$arr['uid']=$id;
    	$info=$message->insert($arr);
		$verify = new \Think\Verify();
		if(!$verify->check($_POST['yzm'],'')){
			$this->error('验证码错误');
		}
		$data=$_POST;
		unset($data['yzm']);
		unset($data['repwd']);
		$data['decide']='s';
		$data['cid']='';
		$obj=M('user');
		$re=$obj->add($data);
		if($re){
			$this->success("恭喜".$data['username']."注册成功",__CONTROLLER__.'/jlogin');
		}else{
			$this->error('注册失败');
		}
    }
}