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

    /*发布商品操作*/
    public function Goodsbox()
    {
        return $this->db->get('shop_box')->result_array(); 
    }

    /*查询商品*/
    public function Goodslist($per_page,$page)
    {
        $query = $this->db
        ->limit($per_page,$page)
        ->get('shop')
        ->result_array();
        return $query; 
    }
    
    /*查询商品*/
    public function Goodslists()
    {
        $query = $this->db
        ->get('shop')
        ->result_array();
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
    public function Orderlist($per_page,$page)
    {
        $data=$this->db->from('orders')
        ->limit($per_page,$page)
        ->join('user','user.uid=orders.uid')
        ->join('order_mess','order_mess.oid=orders.oid')
        //->join('shop','shop.sid=orders.sid')
        ->get()
        ->result_array();
        return $data;
    }

    /*添加物流单号*/
    public function Orderwl($id,$wl)
    {
        $this->db->where('oid',$id);
        $bool=$this->db->update('orders',array('kuaidinum'=>$wl)); 
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
    public function Activitylist($per_page,$page)
    {
        $query = $this->db->from('activity')
        ->join('shop','shop.sid=activity.sid')
        ->limit($per_page,$page)
        ->get()
        ->result_array();
        return $query;
    }

    /*发布活动*/
    public function Activityadd($data)
    {
        return $this->db->insert('activity', $data);    
    }

    /*轮播管理*/
    public function Photolist()
    {
        return $this->db->get('lunbo')->result_array();    
    }

    /*增加轮播*/
    public function Photoadd($sid,$ljs)
    {
        $row=$this->db->get_where('shop', array('sid' => $sid))->row();
        $img=explode('|',$row->simg);
        $limg=$img[0];
        $bool=$this->db->insert('lunbo',array('limg'=>$limg,'lstatus'=>1,'sid'=>$sid,'ljs'=>$ljs));
        return $bool;
    }

    /*轮播图删除*/
    public function Photodel($id)
    {
        $this->db->where_in('lid',$id);
        $bool=$this->db->delete('lunbo'); //执行删除
        return $bool;
    }
}