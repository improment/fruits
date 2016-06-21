<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model {
	public function insert($arr){
		return $this->Table('address')->add($arr);
	}
    public function id_sel($order,$where,$limit){
        return $this->Table('address')->order($order)->where("$where")->limit($limit)->select();
    }
	public function id_sele($where){
        return $this->Table('address')->where("$where")->find();
    }
	public function in_save($where,$value,$values){
		return $this->Table('address')-> where("$where")->setField($value,$values);
	}
}