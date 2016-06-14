<?php
namespace Home\Controller;
use Think\Controller;
class XiangqingController extends Controller {
    public function index(){
        header("content-type:text/html;charset=utf8");
        $sid = $_GET['sid'];
        $shop = M('Shop');
        $arr = $shop->where("sid= $sid")->find();
        $arr['simg']=explode("|",$arr['simg']);
        $res = $shop->limit(5)->select();
         foreach ($res as $k => $v) {
            $res[$k]['simg']=explode('|',$v['simg']);
            unset($res[$k]['simg'][3]);
        }
        
        $this->assign('arr',$arr);
        $this->assign('res',$res);
        $this->display('Product-detailed');
    }
}