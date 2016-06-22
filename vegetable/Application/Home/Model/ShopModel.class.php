<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Model;
use Think\Model;

class ShopModel extends Model
{ 
    //根据id查询商品信息
    public function shop_sel($sid)
    { 
       return $this->where("sid=".$sid."")->find();
       
    }
    
}

