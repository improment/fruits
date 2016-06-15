<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Modular 	活动管理
* Class 	Activity
* Author 	宁铭杰
* Time 		2016/06/15
**/

class Activity extends CI_Controller {


	/*活动表单页面*/
	public function index()
	{
		$this->load->model('User');	//引入model
		$data['row']=$this->User->Goodslist();
		$this->load->view('Activity_form.html',$data);
	}

	/*发布商品*/
	public function Activityadd()
	{
		$data=$this->input->post();	//接收数据
		$data['start_time']=strtotime($data['start_time']);
		$data['end_time']=strtotime($data['end_time']);
		$this->load->model('User');	//引入model
		$bool=$this->User->Activityadd($data);
		echo $bool;
		
	}

	/*商品列表*/
	public function Activitylist()
	{
		$this->load->model('User');	//引入model
		$data['row']=$this->User->Activitylist();
		$this->load->view('activity_list.html',$data);
	}

	/*删除商品*/
	public function Goodsdel()
	{
		$id=$this->input->post('id');
		$this->load->model('User');	//引入model
		$bool=$this->User->Goodsdel($id);
		if ($bool==1) {
			echo 1;
		}else{
			echo 0;
		}
	}



}