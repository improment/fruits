<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$activity=D('Activity');
		$time=time();
		$arr=$activity->two_sel("aid desc","state=4 and astatus=1  and end_time>'$time' and type=0 ",4);
		$are=$activity->two_sel("aid desc","state=5 and astatus=1  and end_time>'$time' and type=0 ",6);
		
		$this->assign('are',$are);

		$this->assign('arr',$arr);
        $this->display('index');
    }
}