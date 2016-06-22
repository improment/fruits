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
    public function look($values){
       // return $this->Table('activity')->where("$values")->find();
		return $this->Table('activity')->join('shop ON activity.sid = shop.sid' )->where("$values")->select();
    }
	public function two_sel($order,$values,$limit){
		return $this->Table('activity')->join('shop ON activity.sid = shop.sid' )->order("$order")->where("$values")->limit($limit)->select();
	}
	public function three_sel($order,$values,$limit){
		return $this->Table('activity')->join('shop ON activity.sid = shop.sid' )->order("$order")->where("$values")->limit($limit)->select();
	}
}