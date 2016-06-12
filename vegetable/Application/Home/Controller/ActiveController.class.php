<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf8");
class ActiveController extends Controller {
	
    public function index(){
		$activity=D('Activity');
		$arr=$activity->sel("aid desc","state=1",5);
		//print_r($arr);die;
		$are=$activity->sel("aid desc","state=2",1);
		$are2=$activity->sel("aid desc","state=3",4);
		$this->assign('are',$are);
		$this->assign('are2',$are2);
		$this->assign('arr',$arr);
        $this->display('Group_buy');
    }
	//进入详情页
	public function product(){
		$this->display('Product');
	}
}