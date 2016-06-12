<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Modular 	订单
* Class 	Orders
* Author 	宁铭杰
* Time 		2016/06/11
**/

class Orders extends CI_Controller {


	/*主面*/
	public function Orderlist()
	{
		$this->load->model('User');	//引入model
		$data['row']=$this->User->Orderlist();
		//var_dump($data);
		$this->load->view('order_list.html',$data);
	}

	/*添加物流单号*/
	public function Orderwl()
	{
		$id=$this->input->post('id');	//接收数据
		$wl=$this->input->post('wl');
		$this->load->model('User');	//引入model
		$bool=$this->User->Orderwl($id,$wl);
		if ($bool==1) {
			echo 1;
		}else{
			echo 0;
		}
		
	}

	/*查看物流*/
	public function Orderckwl()
	{
		$id=$this->input->post('id');	//接收数据
		$this->load->model('User');	//引入model
		$wl=$this->User->Orderckwl($id);
		echo $wl;
	}






}