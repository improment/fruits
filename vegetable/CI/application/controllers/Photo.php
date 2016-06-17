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
	public function Photolist()
	{
		$this->load->model('User');	//引入model
		$data['row']=$this->User->Photolist();	
		$this->load->view('photo.html',$data);
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