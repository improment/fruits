<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);
/**
* Modular 	主页
* Class 	Goods
* Author 	宁铭杰
* Time 		2016/06/07
**/

class Goods extends CI_Controller {


	/*主面*/
	public function index()
	{
		$this->load->model('User');	//引入model
		$data['box']=$this->User->Goodsbox();
		$this->load->view('goods_form.html',$data);
	}

	/*发布商品*/
	public function do_upload()
	{
		$data=$this->input->post();	//接收数据
		$simg='';
        $info=$_FILES['simg'];
     	foreach ($info['name'] as $k=> $v) {
     		 move_uploaded_file($info['tmp_name'][$k],'public/uploads/'.$v);
     		 $simg.=$v.'|';
     		 $data['simg']=$simg;
     	}
     	$this->load->model('User');	//引入model
		$bool=$this->User->Addgoods($data);
      	if ($bool==true) {
      		echo "<script>alert('发布成功');location.href='".site_url('Goods/Goodslist')."'</script>";
      	}else{
      		echo "<script>alert('发布失败');location.href='".site_url('Goods/index')."'</script>";
      	}

		
	}

	/*商品列表*/
	public function Goodslist($page=0)
	{
		$this->load->model('User');	//引入model
		$per_page=6;
		$row=$this->User->Goodslist($per_page,$page);
		$total_rows=$this->db->count_all_results('shop');
		//获取当前数据
		$this->load->library('pagination');
	    $config['base_url'] = site_url().'/Goods/Goodslist';
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
		$this->load->view('goods_list.html',$data);
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