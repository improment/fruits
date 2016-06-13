<?php
namespace Home\Controller;
use Think\Controller;
class FruitsController extends Controller {
     //展示水果馆
     public function index()
    {
        header("content-type:text/html;charset=utf8");
        $shop = M("Shop");
        $arr = $shop->select();
        //print_r($arr);die;
        foreach ($arr as $k => $v) {
            $arr[$k]['simg']=explode('|',$v['simg']);
            unset($arr[$k]['simg'][3]);
        }
        $res = $shop->limit(5)->select();
         foreach ($res as $k => $v) {
            $res[$k]['simg']=explode('|',$v['simg']);
            unset($res[$k]['simg'][3]);
        }
        $this->assign('arr',$arr);
        $this->assign('res',$res);
        $this->display('Friuts-List');
    }
 
    //桃心点赞
    public function  click()
    {
    	 $sid = $_GET['sid'];
    	 $shop = M("Shop");
    	 $array = $shop->where("sid='$sid'")->find();
    	 $name = session('name');
    	 $love = M("Love");
    	 $data= array();
    	 $data['lname'] = $array['sname'];
    	 $data['uname'] = $name['unickname'];
    	 $arr1 = $love->where("lname='".$data['lname']."' AND uname='".$data['uname']."'")->find();
    	 if(empty($arr1))
    	 {           
    	 	 $result = $love->add($data);
	    	 if($result)
	    	 {
	    	 	echo 1;
	    	 }
    	 }else
    	 {           
    	 	 $shop->where("sname='".$data['lname']."'")->setField('status',1);
    	 	 echo 2;die;
    	 }
    	

    }

    
}