<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    public function sel($arr){
        return $this->Table('user')->where("uname='$arr[uname]'")->select();
    }
    public function sele($arr){
        return $this->Table('user')->where("uname='$arr[uname]' and pwd='$arr[pwd]'")->find();
    }
    public function look($id){
        return $this->Table('user')->where("uid!='$id'")->select();
		
		
    }
}