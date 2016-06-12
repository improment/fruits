<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Modular 	用户管理
* Class 	User
* Author 	宁铭杰
* Time 		2016/06/10
**/

class Users extends CI_Controller {



	/*账号管理*/
	public function Usernumber()
	{
		$this->load->model('User');	//引入model
		$data['user']=$this->User->Userlist();
		$this->load->view('user_number.html',$data);
	}

	/*用户审核*/
	public function Userexa()
	{
		$id=$this->input->get('id');
		$this->load->model('User');	//引入model
		$bool=$this->User->Userexa($id);
		echo $bool;
	}


	/*积分管理*/
	public function integral()
	{
		$this->load->view('main_integral.html');
	}





}