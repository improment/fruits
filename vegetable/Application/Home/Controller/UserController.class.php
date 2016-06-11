<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display('user');
    }
	public function address(){
		$this->display('user_address');
	}
	
}