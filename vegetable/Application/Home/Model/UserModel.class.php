<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	public function insert($arr){
		return $this->Table('user')->add($arr);
	}
    public function sel($where){
        return $this->Table('user')->where("$where")->find();
    }
    public function sele($arr){
        return $info=$this->Table('user')->where("uphone='$arr[uphone]' and upwd='$arr[upwd]'")->find();
		
    }
    public function look($id){
        return $this->Table('user')->where("uid!='$id'")->select();
		
		
    }
}