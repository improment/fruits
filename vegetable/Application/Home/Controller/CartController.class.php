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
    //添加商品 （购物车）
    public function collection()
    { 
      $id = I('get.sid');
      $unit = I('get.unit');
      $number = I('get.number');
      $price = I('get.price'); 
      $zongjia = I('get.zongjia'); 
      $uname = session('name');
     // print_R($uname);die;
      if($uname['uid']=="")
      {
         $result=json_decode(cookie('data'),true);  //改参数为true是 返回是数组不是对象
         $flag=0;
         if(is_array($result))
         {
            //判断商品是否存在
             if(array_key_exists($id, $result)){
                        $uu = $result[$id];
                        $uu['number']=$uu['number']+$number;
                        $uu['zongjia']=$uu['zongjia']+$zongjia;
                        $result[$id]=$uu;
                        $flag=1;
              }else
              {
                    $result[$id]=array('sid'=>$id,'unit'=>$unit,'number'=>$number,'zongjia'=>$zongjia,'price'=>$price);
              }
          }
          if($flag==0)
          {    
              $result[$id]=array('sid'=>$id,'unit'=>$unit,'number'=>$number,'zongjia'=>$zongjia,'price'=>$price); 
          }
          cookie('data',json_encode($result),60*60*24*30);
          echo "chenggong";
      }else
      {
          $finally = cookie('data');
          $uname = session('name');
          if(!empty($finally))    //cookie存在
          {
              $result=json_decode($finally,true);
              $trade = M('Trade');
              $data = $trade->where("uid='".$uname['uid']."'")->find();
              if(empty($data))   //cookie存在但数据库不存在数据
              {
                   $k = count($result);
                   if($k>1)
                   {
                         for($i=1;$i<=$k;$i++)
                         {
                             $shop = M('Shop');
                             $arr = $shop->where("sid=".$result[$k]['sid']."")->find();
                             $result[$k]['sname']=$arr['sname'];
                             $simg=explode("|",substr($arr['simg'],0,strripos($arr['simg'],"|")));
                             $result[$k]['simg']=$simg['0'];
                             $result[$k]['uid']=$uname['uid'];
                             $trade->add($result[$k]);
                         }
                   }else if($k==1)
                   {  
                             $shop = M('Shop');
                             $arr = $shop->where("sid=".$result[$k]['sid']."")->find();
                             $result[$k]['sname']=$arr['sname'];
                             $simg=explode("|",substr($arr['simg'],0,strripos($arr['simg'],"|")));
                             $result[$k]['simg']=$simg['0'];
                             $result[$k]['uid']=$uname['uid'];
                             //print_R($result[$k]);die;
                             $trade->add($result[$k]);
                   }
              }else
              {
                  $k = count($result);
                  $uid = $uname['uid'];
                  //echo $uid;die;
                  //cookie存在且数据库有数据
                  if($k>1)
                  {
                            foreach($result as $k=>$v)
                        {
                             $sid.=$result[$k]['sid'].",";
                        }
                        $sid = explode(",",substr($sid,0,strripos($sid,",")));
                        //print_R($sid);
                        $oldid= $trade->where("uid='".$uid."'")->getField('sid',true);  //如果希望返回多个结果则加true
                        foreach($sid as $k=>$v)
                        {
                              if($sid[$k]==$oldid[$k])
                              {
                                 $trade->where("sid=".$v['sid']." AND uid=".$uid."")->delete();
                              }else
                              {
                                   for($i=1;$i<=count($k);$i++){
                                       $trade->add($result[$k]);
                                   }
                              }
                        }
                  }else
                  {
                         foreach($result as $k=>$v)
                        {
                             $sid.=$result[$k]['sid'].",";
                        }
                        $sid = substr($sid,0,strripos($sid,","));
                        $oldid= $trade->where("uid='".$uid."'")->getField('sid',true);
                        foreach($oldid as $k=>$v)
                        {
                             if(in_array($sid,$oldid))
                             {
                                $trade->where("sid=".$v['sid']." AND uid=".$uid."")->delete(); 
                             }else
                             {
                                 $trade->add($result[$k]);
                             }
                        }  
                  }    
              }
          }else
          {
              $block = I('get.');
              print_R($block);
              $sid = $block['sid'];
              $shop = M('Shop');
              $arr = $shop->where("sid=".$sid."")->find();
              $block['sname']=$arr['sname'];
              $block['unit']=$arr['unit'];
              $block['price']=$arr['price'];
              $block['number']=$arr['number'];
              $block['uid']=$arr['uid'];
              $simg=explode("|",substr($arr['simg'],0,strripos($arr['simg'],"|")));
              $block['simg']=$simg['0'];
              $trade= M('Trade');
              $trade->add($block);
          }
      }
    } 
    
    //立即购买
     public function show()
     {
         
     }
}
