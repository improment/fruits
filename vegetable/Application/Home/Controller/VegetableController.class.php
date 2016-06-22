<?php
namespace Home\Controller;
use Think\Controller;
class VegetableController extends Controller {
    public function index(){
		$activity=D('Activity');
		$arr=$activity->two_sel("aid desc","type=2",99);
		//print_r($arr);die;
		$are=$activity->three_sel("sbuy desc","type=2",5);
		$this->assign('are',$are);
		$this->assign('arr',$arr);
        $this->display('Product-List');
    }
}