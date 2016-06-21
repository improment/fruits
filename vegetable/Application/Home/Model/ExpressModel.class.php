<?php
namespace Home\Model;
use Think\Model;
class ExpressModel extends Model {
    public function sel($where){
        return $this->Table('express')->select();
    }

}