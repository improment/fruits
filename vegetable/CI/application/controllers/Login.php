<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Modular 	后台登录
* Class 	Login
* Author 	宁铭杰
* Time 		2016/06/07
**/

class Login extends CI_Controller {

	/*登录页面*/
	public function index()
	{
		$data = new  stdClass();	//防csrf攻击
		$data ->token_name = $this ->security->get_csrf_token_name();
		$data ->token_hash = $this ->security->get_csrf_hash();
		$sess=$this->session->all_userdata();	//获取session值
		if (!empty($sess['jz'])) {
			$dt['username']=$sess['jz']['username'];
			$dt['pwd']=$sess['jz']['pwd'];
		}else{
			$dt['username']='';
			$dt['pwd']='';
		}
		$dt['data']=$data;
		$this->load->view('login.html',$dt);
	}

	/*登录*/
	public function sign()
	{
		//$scrf=$this->security->csrf_verify(); //csrf检查
		$username=$this->input->post('username');
		$pwd=md5($this->input->post('pwd'));
		$jz=$this->input->post('jz');
		$this->load->model('User');	//引入model
		$bool=$this->User->Loginquery($username,$pwd);	
		if (empty($bool)) {
			echo "<script>alert('用户名和密码错误');location.href='".site_url('Login/index')."'</script>";
		}else{
				$this->load->library('session'); //初始化session
				$data['username']=$username;
				$data['pwd']=$this->input->post('pwd');
				$this->session->set_userdata('jz',$data);
				if ($jz==1) {	//验证是否记住密码
					session_set_cookie_params(60*60*24);
				}				
			redirect('Main/index');
		}	 
	}

	/*退出*/
	public function logindel()
	{
		$this->session->unset_userdata('jz');	//清除session
		redirect('Login/index');
	}
}