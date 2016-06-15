<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf8");
class ActiveController extends Controller {
	
    public function index(){
		$activity=D('Activity');
		$arr=$activity->two_sel("aid desc","state=1",5);
		//print_r($arr);die;
		$are=$activity->two_sel("aid desc","state=2",1);
		$are2=$activity->two_sel("aid desc","state=3",4);
		$this->assign('are',$are);
		$this->assign('are2',$are2);
		$this->assign('arr',$arr);
        $this->display('Group_buy');
    }
	//进入详情页
	public function product(){
		$id=I('get.id');
		$activity=D('Activity');
		$arr=$activity->id_sel("aid=$id");
		//print_r($arr);die;
		$ar=explode('|',$arr['simg']);
		//print_r($ar);die;

		unset($ar[count($ar)-1]);
		$arr['simg']=implode('|',$ar);
		$this->assign($arr);
		
		$this->display('Product');
	}
	//购物车
	public function flow(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$cart = M("cart");
		//echo $u_id;die;
		$data=I('post.');
        if(empty($u_id)){
            $cookie_cards=json_decode(cookie('cards'),true);
			//print_r($cookie_cards);die;
			
            $k=count($cookie_cards);
			//echo $k;die;
			
			//echo $sumprice;
            //判断购物车是否已存在该商品
            $flag=0;
            if($k>0){
                foreach($cookie_cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $cookie_cards[$kk]['snum']=$v['snum']+$data['snum'];
						$cookie_cards[$kk]['zongjia']=$v['zongjia']+$data['zongjia'];
						$cookie_cards[$kk]['yzongjia']=$v['yzongjia']+$data['yzongjia'];
                        $flag=1;
                    }
                }
            }
            if($flag==0){
                $cookie_cards[$k]=$data;
				//print_r($cookie_cards);die;
            }
            cookie('cards',json_encode($cookie_cards),60*60*24*3);
            //var_dump($cookie_cards);
            echo '1';
        }else{
            if(cookie('cards')==''){
			
			$data['uid']=$u_id;
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
            $flag=0;
            if($k>0){
                foreach($cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $snum=$v['snum']+$data['snum'];
						$zongjia=$v['zongjia']+$data['zongjia'];
						$yzongjia=$v['yzongjia']+$data['yzongjia'];
						$Model->execute("update cart set snum='$snum',zongjia='$zongjia',yzongjia='$yzongjia' where cid='$v[cid]'");
                        $flag=1;
                    }
                }
            }
            if($flag==0){
				//print_r($data);die;
                
				$sql = $cart->fetchSql(true)->add($data); 
				//echo $sql; 
				$Model->execute($sql);
            }
            echo '1';
        }else{
			//echo $u_id;die;
			$cookie_cards=json_decode(cookie('cards'),true);
			
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
			//echo $k;die;
            $flag=0;
            if($k>0){
				$ssid='';
					for($i=0;$i<$k;$i++){
						$ssid.=$cards[$i]['sid'].',';
					}
					//echo $ssid;die;
					$len=strrpos($ssid,',');
					$new_str=substr($ssid,0,$len);
					$Model->execute("delete from cart where sid in($new_str)"); 
					for($i=0;$i<count($cookie_cards);$i++){
					   $cookie_cards[$i]['uid']=$u_id;
					   $sql = $cart->fetchSql(true)->add($cookie_cards[$i]);
					   $Model->execute($sql);
					 
					 }
					   cookie('cards',null);
										
                }

				//cookie('cards',null);
				 $flag=1;
				 
            }
            if($flag==0){
				
				//print_r($data);die;
               for($i=0;$i<count($cookie_cards);$i++){
			   $cookie_cards[$i]['uid']=$u_id;
			   $sql = $cart->fetchSql(true)->add($cookie_cards[$i]);
			   $Model->execute($sql);
			   }
			   cookie('cards',null);
			   
			   //echo 1;die;
            }
			
            echo '1';
			
		}
	  }
	
	public function shopping_cart(){
		$u_id=$_SESSION['name']['uid'];
		if($u_id==''){
			$cookie_cards=json_decode(cookie('cards'),true);
		//print_r($cookie_cards);die;
		for($a=0;$a<count($cookie_cards);$a++){
				//echo $cookie_cards[$a]['zongjia'];
				$sumprice=$sumprice+$cookie_cards[$a]['zongjia'];
			}
		//echo $sumprice;die;
		$data['zongjia']=$sumprice;
		$this->assign($data);
		$this->assign('cookie',$cookie_cards);
		
		$this->display('shopping_cart');
		}else{
		$Model = new \Think\Model();
		$cards=$Model->query("select * from cart where uid='$u_id'");
		//print_r($cards);die;
		for($a=0;$a<count($cards);$a++){
				//echo $cookie_cards[$a]['zongjia'];
				$sump=$sump+$cards[$a]['zongjia'];
			}
		//echo $sump;die;
		$data['zongjia']=$sump;
		$this->assign($data);
		$this->assign('cookie',$cards);
		$this->display('shopping_cart');
		}
	}
	//更新购物车
	public function floww(){
		$u_id=$_SESSION['name']['uid'];
		$Model = new \Think\Model();
		$cart = M("cart");
		//echo $u_id;die;
		$data=I('post.');
        if(empty($u_id)){
            $cookie_cards=json_decode(cookie('cards'),true);
			//print_r($cookie_cards);die;
			
            $k=count($cookie_cards);
			//echo $k;die;
			
			//echo $sumprice;
            //判断购物车是否已存在该商品
            $flag=0;
            if($k>0){
                foreach($cookie_cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $cookie_cards[$kk]['snum']=$data['snum'];
						$cookie_cards[$kk]['zongjia']=$data['zongjia'];
						$cookie_cards[$kk]['yzongjia']=$data['yzongjia'];
                        $flag=1;
                    }
                }
            }
            if($flag==0){
                $cookie_cards[$k]=$data;
				//print_r($cookie_cards);die;
            }
            cookie('cards',json_encode($cookie_cards),60*60*24*3);
            //var_dump($cookie_cards);
            echo '1';
        }else{
            if(cookie('cards')==''){
			
			$data['uid']=$u_id;
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
            $flag=0;
            if($k>0){
                foreach($cards as $kk=>$v){
                    if($data['sid']==$v['sid']){
                        $snum=$v['snum']+$data['snum'];
						$zongjia=$v['zongjia']+$data['zongjia'];
						$yzongjia=$v['yzongjia']+$data['yzongjia'];
						$Model->execute("update cart set snum='$snum',zongjia='$zongjia',yzongjia='$yzongjia' where cid='$v[cid]'");
                        $flag=1;
                    }
                }
            }
            if($flag==0){
				//print_r($data);die;
                
				$sql = $cart->fetchSql(true)->add($data); 
				//echo $sql; 
				$Model->execute($sql);
            }
            echo '1';
        }else{
			//echo $u_id;die;
			$cookie_cards=json_decode(cookie('cards'),true);
			
            $k=0;
            $cards=$Model->query("select * from cart where uid='$u_id'");
			//print_r($cards);die;
            $k=count($cards);
			//echo $k;die;
            $flag=0;
            if($k>0){
					for($j=0;$j<count($cookie_cards);$j++){
					$cookie_cards[$j]['uid']=$u_id;
					if(in_array($cookie_cards[$j]['sid'],$cards[$j])){
					$snum=$cards[$j]['snum']+$cookie_cards[$j]['snum'];
					$zongjia=$cards[$j]['zongjia']+$cookie_cards[$j]['zongjia'];
					$yzongjia=$cards[$j]['yzongjia']+$cookie_cards[$j]['yzongjia'];
					$Model->execute("update cart set snum='$snum',zongjia='$zongjia',yzongjia='$yzongjia' where cid='$cards[$j][cid]'"); 
					}else{
					$sql = $cart->fetchSql(true)->add($cookie_cards[$j]);
					$Model->execute($sql);
						
					} 
										
                }
				cookie('cards',null);
				 $flag=1;
				 
            }
            if($flag==0){
				
				//print_r($data);die;
               for($i=0;$i<count($cookie_cards);$i++){
			   $cookie_cards[$i]['uid']=$u_id;
			   $sql = $cart->fetchSql(true)->add($cookie_cards[$i]);
			   $Model->execute($sql);
			   }
			   cookie('cards',null);
			   
			   //echo 1;die;
            }
			
            echo '1';
			
		}
	  }
	}
	
}