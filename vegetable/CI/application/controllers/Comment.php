<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Modular 	评论管理
* Class 	Comment
* Author 	宁铭杰
* Time 		2016/06/12
**/

class Comment extends CI_Controller {



	/*评论管理*/
	public function Commentlist()
	{
		$this->load->model('User');	//引入model
		$data['com']=$this->User->Commentlist();
		$this->load->view('comment_list.html',$data);
	}

	/*评论审核*/
	public function Commentexa()
	{
		$id=$this->input->get('id');
		$this->load->model('User');	//引入model
		$bool=$this->User->Commentexa($id);
		echo $bool;
	}



}