<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Controller;
use Think\Controller;

class CartController extends Controller
{
    //展示购物车页面
    public function  index()
    {
        $id = $_GET['sid'];
        $this->display('shopping_cart');
    }
    //加入收藏
    public function collection()
    {
      $uname = session('name');
      if(empty($uname['unickname']))
      {
          $data = $_GET;
          $shop = M('Shop');
          $arr=$shop->where("sid=".$data['sid']."")->find();
          $data['sname']=$arr['sname'];
          $data['sprice']= $arr['sprice'];
          $data['simg']=$arr['simg'];
          $simg=explode("|",substr($data['simg'],0,strripos($data['simg'],"|"))); 
          $data['simg'] =$simg[0];
          cookie('data',$data,60*60);
          
      }else
      {
            $data= cookie("data");
            if(data)
            {
                $trade = M('Trade');
                $result = $trade->where("sname='".$data['sname']."'")->find();
                if(empty($result))
                {
                    $trade->add($data);
                    cookie('data',null);
                }else
                {
                    $trade->where("sname='".$data['sname']."'")->save($data);
                    cookie('data',null);
                }
            }else
            {
                $trade = M('Trade');
                $result = $trade->where("sname='".$data['sname']."'")->find();
                if(empty($result))
                {
                    $trade->add($data);
                }else
                {
                    $trade->where("sname='".$data['sname']."'")->save($data);
                }
            }
      }
       
    }
    
}
