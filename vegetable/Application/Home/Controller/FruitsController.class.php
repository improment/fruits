<?php
namespace Home\Controller;
use Think\Controller;
class FruitsController extends Controller {
     //展示水果馆
    public function index()
    {

        $this->display('Friuts-List');
    }

    
}