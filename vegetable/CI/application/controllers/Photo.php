<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Modular 	轮播图
* Class 	Photo
* Author 	宁铭杰
* Time 		2016/06/17
**/

class Photo extends CI_Controller {


	/*主面*/
	public function index()
	{
		$this->load->model('User');	//引入model
		$data['row']=$this->User->Goodslists();
		$this->load->view('photoadd.html',$data);
	}

	/*增加轮播*/
	public function Photoadd()
	{
		$sid=$this->input->post('sid');
		$ljs=$this->input->post('ljs');
		$this->load->model('User');	//引入model
		$bool=$this->User->Photoadd($sid,$ljs);
		if ($bool==true) {
			redirect('Photo/Photolist');
		}
	}

	/*商品列表*/
	public function Photolist()
	{
		$this->load->model('User');	//引入model
		$data['row']=$this->User->Photolist();	
		$this->load->view('photo.html',$data);
	}

	/*删除商品*/
	public function Photodel()
	{
		$id=$this->input->post('id');
		$this->load->model('User');	//引入model
		$bool=$this->User->Photodel($id);
		if ($bool==1) {
			echo 1;
		}else{
			echo 0;
		}
	}



}