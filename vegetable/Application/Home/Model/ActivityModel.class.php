<?php
namespace Home\Model;
use Think\Model;
class ActivityModel extends Model {
	public function insert($arr){
		return $this->Table('activity')->add($arr);
	}
    public function sel($order,$values,$limit){
        return $this->Table('activity')->order("$order")->where("$values")->limit($limit)->select();
    }
	public function id_sel($values){
       // return $this->Table('activity')->where("$values")->find();
		return $this->Table('activity')->join('shop ON activity.sid = shop.sid' )->where("$values")->find();
    }
    public function sele($arr){
        return $info=$this->Table('activity')->where("uphone='$arr[uphone]' and upwd='$arr[upwd]'")->find();	
    }
    public function look($id){
        return $this->Table('activity')->where("uid!='$id'")->select();
				
    }
	public function two_sel($order,$values,$limit){
		return $this->Table('activity')->join('shop ON activity.sid = shop.sid' )->order("$order")->where("$values")->limit($limit)->select();
	}
}