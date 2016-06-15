<?php

/**
* Modular 	后台登录
* Class 	User
* Author 	宁铭杰
* Time 		2016/06/07
**/


class User extends CI_Model {

	/*登录查询*/
    public function Loginquery($username,$pwd)
    {
        $query = $this->db->get_where('admin',array('au_name' =>$username,'au_pwd'=>$pwd))->result_array();
        return $query;
    }

    /*发布商品操作*/
    public function Addgoods($data)
    {
    	return $this->db->insert('shop', $data); 
    }

    /*查询商品*/
    public function Goodslist()
    {
        $query = $this->db->get('shop')->result_array();
        return $query; 
    }

    /*用户查询*/
    public function Userlist()
    {
        $query = $this->db->get('user')->result_array();
        return $query;
    }

    /*用户审核*/
    public function Userexa($id)
    {
        $this->db->where('uid',$id);
        $bool=$this->db->update('user',array('usate'=>1)); 
        return $bool;
    }

    /*商品删除*/
    public function Goodsdel($id)
    {
        $this->db->where_in('sid',$id);
        $bool=$this->db->delete('shop'); //执行删除
        return $bool;
    }

    /*订单查询*/
    public function Orderlist()
    {
        $data=$this->db->from('orders')
        ->join('user','user.uid=orders.uid')
        ->join('shop','shop.sid=orders.sid')
        ->get()
        ->result_array();
        return $data;
    }

    /*添加物流单号*/
    public function Orderwl($id,$wl)
    {
        $this->db->where('oid',$id);
        $bool=$this->db->update('orders',array('logistics'=>$wl)); 
        return $bool;
    }

    /*查看物流*/
    public function Orderckwl($id)
    {
        $row=$this->db->get_where('orders',array('oid'=>$id))->row_array(); 
        return $row['logistics'];
    }

    /*评论查询*/
    public function Commentlist()
    {
        $data=$this->db->from('comment')
        ->join('user','user.uid=comment.uid')
        ->join('shop','shop.sid=comment.sid')
        ->get()
        ->result_array();
        return  $data;
    }

    /*评论审核*/
    public function Commentexa($id)
    {
        $this->db->where('cid',$id);
        $bool=$this->db->update('comment',array('cstae'=>1)); 
        return $bool;
    }

    /*活动列表*/
    public function Activitylist()
    {
        $query = $this->db->from('activity')
        ->join('shop','shop.sid=activity.sid')
        ->get()
        ->result_array();
        return $query;
    }

    /*发布活动*/
    public function Activityadd($data)
    {
        return $this->db->insert('activity', $data);    
    }
}