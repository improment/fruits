<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="/Public/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/slide.js"></script>
<script src="/Public/js/common_js.js" type="text/javascript"></script>
<script src="/Public/js/jquery.foucs.js" type="text/javascript"></script>
<title>用户中心</title>
</head>
<script type="text/javascript">
  $(document).ready(function(){

		  setInterval(showTime, 1000);                                
		  function timer(obj,txt){
						  obj.text(txt);
		  }        
		  function showTime(){                                
				  var today = new Date();
				  var weekday=new Array(7)
				  weekday[0]="星期日"
				  weekday[1]="星期一"
				  weekday[2]="星期二"
				  weekday[3]="星期三"
				  weekday[4]="星期四"
				  weekday[5]="星期五"
				  weekday[6]="星期六"                                        
				  var y=today.getFullYear()+"年";
				  var month=today.getMonth()+1+"月";
				  var td=today.getDate();
				  var d=weekday[today.getDay()];
				  var h=today.getHours();
				  var m=today.getMinutes();
				  var s=today.getSeconds();        
				  timer($("#y"),y+month);
				  //timer($("#MH"),month);        
				  timer($("h1"),td);        
				  timer($("#D"),d);
				  timer($("#H"),h);
				  timer($("#M"),m);
				  timer($("#S"),s);
		  }        
  })
</script>
<body>
<?php  include('./Application/Home/View/Public/header.html'); ?>
<div><a href="/Public/#"><img src="/Public/images/AD_page_img_02.png" width="100%"/></a></div>
<!--位置-->
<div class="Bread_crumbs">
 <div class="Inside_pages clearfix">
   <div class="right Search">
   <form>
    <input name="" type="text"  class="Search_Box"/>
    <input name="" type="button"  name="" class="Search_btn"/>
    </form>
   </div>
 </div>
</div>
<!--用户中心-->
<div class="Inside_pages clearfix">
  <div class="clearfix user" >
    <div class="user_left">
      <div class="user_info">
       <div class="Head_portrait"><img src="/Public/images/product_img_17.png"  width="80px" height="80px"/><!--头像区域--></div>
       <div class="user_name">用户蜜甘草<a href="/Public/#">[个人资料]</a></div>
      </div>
      <ul class="Section">
       <li><a href="/Public/#"><em></em><span>我的特色馆</span></a></li>
       <li><a href="/Public/#"><em></em><span>个人信息</span></a></li>
       <li><a href="/Public/#"><em></em><span>修改密码</span></a></li>
       <li><a href="/Public/#"><em></em><span>我的订单</span></a></li>
       <li><a href="/Public/#"><em></em><span>我的评论</span></a></li>
       <li><a href="/Public/#"><em></em><span>我的积分</span></a></li>
       <li><a href="/Public/#"><em></em><span>我的收藏</span></a></li>
       <li><a href="/index.php/Home/User/address"><em></em><span>收货地址管理</span></a></li>
      </ul>
    </div>
    <div class="user_right">
     <div class="user_center_style">
     <div class="user_time">
      <h1></h1>
      <h4 id="D"></h4>
      <h4 id="y"></h4>
     </div>
      <ul class="user_center_info">
       <li>
        <img src="/Public/images/user_img_05.png" />
        <h4 class="Money">余额￥34</h4>
       </li>
       <li><img src="/Public/images/user_img_04.png" />
        <a href="/Public/#">代收货（3）</a>
       </li>
       <li><img src="/Public/images/user_img_06.png" />
        <a href="/Public/#">积分234分</a>
       </li>
       <li><img src="/Public/images/user_img_03.png" />
        <a href="/Public/#">订单评价（5）</a>
       </li>
      </ul>     
     </div>
     <div class="Order_form">
       <div class="user_Borders">
        <div class="title_name">
        <span class="name">我的订单</span>
        <a href="/Public/#">更多订单&gt;&gt;</a>
       </div>
       <div class="Order_form_list">
         <table>
         <thead>
          <td class="list_name_title0">商品</td>
          <td class="list_name_title1">单价(元)</td>
          <td class="list_name_title2">数量</td>
          <td class="list_name_title4">实付款(元)</td>
          <td class="list_name_title5">订单状态</td>
          <td class="list_name_title6">操作</td>
         </thead> 
         <tbody>       
           <tr><td colspan="6" class="Order_form_time">2015-12-3 订单号：445454654654654</td></tr>
           <tr>
           <td colspan="3">
           <table class="Order_product_style">
           <tr>
           <td>
            <div class="product_name clearfix">
            <a href="/Public/#"><img src="/Public/images/product_img_17.png"  width="80px" height="80px"/></a>
            <a href="/Public/3">天然绿色多汁香甜无污染水蜜桃</a>
            <p class="specification">礼盒装20个/盒</p>
            </div>
            </td>
            <td>5</td>
           <td>2</td>
            </tr>
            </table>
           </td>   
           <td class="split_line">100</td>
           <td class="split_line">已发货，待收货</td>
           <td></td>
           </tr>
           </tbody>
            <tbody>       
           <tr><td colspan="6" class="Order_form_time">2015-12-3 订单号：445454654654654</td></tr>
           <tr>
           <td colspan="3">
             <table class="Order_product_style">
           <tr>
           <td>
            <div class="product_name clearfix">
            <a href="/Public/#"><img src="/Public/images/product_img_17.png"  width="80px" height="80px"/></a>
            <a href="/Public/3">天然绿色多汁香甜无污染水蜜桃</a>
            <p class="specification">礼盒装20个/盒</p>
            </div>
            </td>
             <td>5</td>
           <td>2</td>
            </tr>
               <tr>
           <td>
            <div class="product_name clearfix">
            <a href="/Public/#"><img src="/Public/images/product_img_17.png"  width="80px" height="80px"/></a>
            <a href="/Public/3">天然绿色多汁香甜无污染水蜜桃</a>
            <p class="specification">礼盒装20个/盒</p>
            </div>
            </td>
             <td>5</td>
           <td>2</td>
            </tr>
            </table>          
           </td>
          
           <td class="split_line">100</td>
           <td class="split_line">已发货，待收货</td>
           <td></td>
           </tr>
           </tbody>
         </table>
       </div>
       </div>
     </div>
    </div>
  </div>
</div>
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>