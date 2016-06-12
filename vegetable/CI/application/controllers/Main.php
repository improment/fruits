<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
* Modular 	主页
* Class 	Main
* Author 	宁铭杰
* Time 		2016/06/07
**/

class Main extends CI_Controller {

	/*主面*/
	public function index()
	{
		$this->load->view('index.html');
	}

	/*账号管理*/
	public function number()
	{
		$this->load->view('tables.html');
	}

	/*积分管理*/
	public function integral()
	{
		$this->load->view('main_integral.html');
	}

	/*相册*/
	public function gallery()
	{
		$this->load->view('gallery.html');
	}



}