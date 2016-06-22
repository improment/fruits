<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Home\Model;
use Think\Model;

class TradeModel extends Model
{
      //查询用户已下订单
      public function sel_model($sid,$uid)
      {
           return $this->where("uid=".$uid." AND sid=".$sid."")->select();
      }
      //修改购物车信息
      public function update_model($res,$sid,$uid)
      {
            $number = $res['number'];
            $zongjia = $res['zongjia'];
            $data = array('number'=>$number,'zongjia'=>$zongjia);
            return $this->where("uid=".$uid." AND sid=".$sid."")->setField($data);
      }
}


