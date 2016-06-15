<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/css/css.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="/Public/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/slider.js"></script>
<script src="/Public/js/common_js.js" type="text/javascript"></script>
<script src="/Public/js/jquery.foucs.js" type="text/javascript"></script>
<title>购物车</title>
</head>

<body>
<!--顶部样式-->
<?php  include("./APPlication/Home/View/Public/header.html"); ?>
<!---->
<div><a href="#"><img src="/Public/images/AD_page_img_02.png" width="100%"/></a></div>
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
<!--购物车样式-->
<div class="Narrow">
  <div class="shop_cart">
     <div class="schedule"></div>
     <div class="cart_style">
       <div class="title_name">
        <ul>
         <li class="title_width"><label class="auto-label"><input type="checkbox" id="rememberMe"><span>全选</span></label></li>
         <li class="title_width1">商品信息</li>
         <li class="title_width2">单价</li>
         <li class="title_width3">数量</li>
         <li class="title_width4">小计</li>
         <li class="title_width5">操作</li>
        </ul>
       </div>
       <div class="list_style">
        <div class="class_title">水果馆</div>
         <ul class="product_cart">
         <li class="title_width"><input type="checkbox" id="rememberMe"></li>
         <li class="title_width1">
         <a href="#" class="product_img left"><img src="/Public/images/product_img_17.png" /></a>
         <p class="cart_content">
         <a href="#" class="title_name">浦江特产绿豌豆天然无污染</a>
         <span> 礼盒装：20个装</span>
         </p>
         </li>
         <li class="title_width2">￥23</li>
         <li class="title_width3">
           <div class="Numbers">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jian">-</a>
		  <input id="number" name="number" type="text" value="1" class="number_text">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jia">+</a>
		 </div>        
         </li>
         <li class="title_width4">￥545</li>
         <li class="title_width5"><a href="#">删除</a></li>
         </ul>
         <ul class="product_cart">
         <li class="title_width"><input type="checkbox" id="rememberMe"></li>
         <li class="title_width1">
         <a href="#" class="product_img left"><img src="/Public/images/product_img_17.png" /></a>
         <p class="cart_content">
         <a href="#" class="title_name">浦江特产绿豌豆天然无污染</a>
         <span> 礼盒装：20个装</span>
         </p>
         </li>
         <li class="title_width2">￥23</li>
         <li class="title_width3">
           <div class="Numbers">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jian">-</a>
		  <input id="number" name="number" type="text" value="1" class="number_text">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jia">+</a>
		 </div>        
         </li>
         <li class="title_width4">￥545</li>
         <li class="title_width5"><a href="#">删除</a></li>
         </ul>
       </div>
              <div class="list_style">
        <div class="class_title">水果馆</div>
         <ul class="product_cart">
         <li class="title_width"><input type="checkbox" id="rememberMe"></li>
         <li class="title_width1">
         <a href="#" class="product_img left"><img src="/Public/images/product_img_17.png" /></a>
         <p class="cart_content">
         <a href="#" class="title_name">浦江特产绿豌豆天然无污染</a>
         <span> 礼盒装：20个装</span>
         </p>
         </li>
         <li class="title_width2">￥23</li>
         <li class="title_width3">
           <div class="Numbers">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jian">-</a>
		  <input id="number" name="number" type="text" value="1" class="number_text">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jia">+</a>
		 </div>        
         </li>
         <li class="title_width4">￥545</li>
         <li class="title_width5"><a href="#">删除</a></li>
         </ul>
         <ul class="product_cart">
         <li class="title_width"><input type="checkbox" id="rememberMe"></li>
         <li class="title_width1">
         <a href="#" class="product_img left"><img src="/Public/images/product_img_17.png" /></a>
         <p class="cart_content">
         <a href="#" class="title_name">浦江特产绿豌豆天然无污染</a>
         <span> 礼盒装：20个装</span>
         </p>
         </li>
         <li class="title_width2">￥23</li>
         <li class="title_width3">
           <div class="Numbers">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jian">-</a>
		  <input id="number" name="number" type="text" value="1" class="number_text">
		  <a href="javascript:void(0);" onclick="updatenum('del');" class="jia">+</a>
		 </div>        
         </li>
         <li class="title_width4">￥545</li>
         <li class="title_width5"><a href="#">删除</a></li>
         </ul>
       </div>
     </div>
     <!--操作-->
     <div class="cart_operating clearfix">
        <div class="cart_operating_style">
           <div class="cart_price">商品总价：（不含运费）<b>￥545</b></div>
           <div class="cart_btn"><a href="#" class="payment_btn"></a><a href="#" class="continue_btn"></a></div>
        </div>
     </div>
  </div>
</div>
<!--底部样式-->
<?php
 include("./Application/Home/View/Public/footer.html"); ?>
</body>
</html>
footer_info