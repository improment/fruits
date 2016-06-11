<?php
namespace Home\Controller;
use Think\Controller;
class VegetableController extends Controller {
    public function index(){
        $this->display('Product-List');
    }
}