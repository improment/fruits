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
          //print_R($uname);die;
      if($uname['uid']=="")
      {
             //用户没有登录商品存储在cookie中
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
              //用户登录之后取出cookie数据入库
                  $res[$id]= I("get.");
              if(cookie('data')==""){
                 //cookie 不存在
                       $res[$id]['uid']=$uname['uid'];
                       //print_R($res);die;
                       $flag=0;
                       $model = M('Trade');
                       $len=count($res);
                       if($len>0){
                         $ids=$model->where("uid='".$uname['uid']."'")->select();
                         foreach ($res as $k => $v) {
                                  foreach($ids as $kk=>$vv)
                                  {
                                           if($vv['sid']==$v['sid']){
                                               $data['num']=$vv['num']+$v['num'];
                                                $data['zongjia']=$vv['zongjia']+$v['zongjia'];
                                                $model->where("sid =".$v['sid']."")->setField($data);
                                           }
                                  }
                         }
                       }
                       if($flag==0){
                              $models = M('Shop');
                              $shop = $models->where("sid=".$res[$id]['sid']."")->find();
                              //print_R($shop);die;
                              $img = explode("|",substr($shop['simg'],0,strrpos($shop['simg'],"|")));
                             // print_R($res);die;
                              foreach($res as $k=>$v)
                              {
                                 $res[$k]['simg']=$img[0];                              
                                 $res[$k]['sname']=$shop['sname'];
                                 $res[$k]['sprice']=$shop['sprice'];
                                 $model->add($res[$k]);
                                 echo chenggong2;
                              }
                              
                       }
              }else
              {
                      //cookie存在
                       $result=json_decode(cookie('data'),true); 
                       $flag=0;
                       $model = M('Trade');
                       $arr = $model->where("uid=".$uname['uid']."")->select();
                       $k=count($arr);
                        if($k>0)
                        {
                                for($i=1;$i<=$k;$i++){
                                       $newid.=$arr[$i]['sid']."," ;
                                }
                                $newid = explode(",",substr($newid,0,strrpos($newid,",")));
                                foreach($newid as $k=>$v){
                                      $data['number']=$result[$k]['number']+$arr[$k]['number'];
                                      $data['zongjia']=$result[$k]['zongjia']+$arr[$k]['zongjia'];
                                      $model->where("sid =".$v."")->setField($data);
                                }
                                   cookie(null);       
                        }
                        $flag=1;


                  }
                         if($flag==0)
                        {
                                 for($i=0;$i<count($result);$i++){
                                         $result[$i]['uid']=$uname['uid'];
                                         $model = M('Trade');
                                         $model->add($result);
                                 }
                                 cookie(null);
                        }
      }
    } 
    
    //立即购买
     public function show()
     {

         header("content-type:text/html;charset=utf8");
          $data = I("get.");
          $uname= session('name');
          $uid = $uname['uid'];
         if(empty($uname))
         {
             echo '<script>alert("请先登录")</script>';
             $this->redirect('Login/index',5, '页面跳转中...');
         }else
         {
               //查询库中该商品是否存在
              $model = M('Trade');
              $arr = $model->where("uid=".$uid." AND sid =".$data['sid']."")->select();
              $flag=0;
              if(!empty($arr)){
                  foreach($arr as $k=>$v){
                          if($v['sid']==$data['sid']){
                                     $last['number']=$v['number']+$data['number'];
                                     $last['zongjia']=$v['zongjia']+$data['zongjia'];
                                   //print_R($last);die;
                                     $model->where("sid =".$v['sid']." AND uid=".$uid."")->setField($last);
                          }
                             $flag=1;
                             $bear = $model->where("uid=".$uid."")->select();
                             session('cart',$bear);
                             echo 1;
                }
              }
              if($flag==0){
                   $models = M('Shop');
                    $list = $models->where("sid =".$data['sid']."")->find();
                   $data['uid']=$uid;
                   $data['sname']=$list['sname'];
                   $img = explode("|",substr($list['simg'],0,strrpos($list['simg'],"|")));
                   $data['simg']=$img[0];
                   $data['sprice']=$list['sprice'];
                   $model->add($data);
                   $bear = $model->where("uid=".$uid."")->select();
                    session('cart',$bear);
                   echo 1;
              }

         }
        
     }


           public function carts()
           {
                  header("content-type:text/html;charset=utf8");
                  $cart = session('cart');
                  $this->assign('cart',$cart);
                  $this->display('shopping_cart');
           }
}
