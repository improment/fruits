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
	public function Orderlist($page=0)
	{
		$this->load->model('User');	//引入model
		$per_page=6;
		$row=$this->User->Orderlist($per_page,$page);
		$total_rows=$this->db->count_all_results('orders');
		//获取当前数据
		$this->load->library('pagination');
	    $config['base_url'] = site_url().'/Orders/Orderlist';
	    $config['total_rows'] = $total_rows;
	    $config['per_page'] = $per_page;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上页';
		$config['next_link'] = '下页';
		$this->pagination->initialize($config);
		$pagestr = $this->pagination->create_links();
		//var_dump($pagestr);die;
		$data['row']=$row;
		//为模板定义变量
		$data['pagestr']=$pagestr;
		//调用模板显示条件
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