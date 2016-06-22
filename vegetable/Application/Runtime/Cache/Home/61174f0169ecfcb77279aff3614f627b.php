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
<title>用户地址管理</title>
</head>

<body>
<!--顶部样式-->
<?php  include('./Application/Home/View/Public/header.html'); ?>
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
<!--用户中心(地址管理界面)-->
<div class="Inside_pages clearfix">
 <div class="clearfix user" >
   <!--左侧菜单栏样式-->
     <div class="user_left">
      <div class="user_info">
       <div class="Head_portrait"><img src="/Public/images/product_img_17.png"  width="80px" height="80px"/><!--头像区域--></div>
       <div class="user_name">用户蜜甘草<a href="#">[个人资料]</a></div>
      </div>
      <ul class="Section">
       <li><a href="#"><em></em><span>我的特色馆</span></a></li>
       <li><a href="#"><em></em><span>个人信息</span></a></li>
       <li><a href="#"><em></em><span>修改密码</span></a></li>
       <li><a href="#"><em></em><span>我的订单</span></a></li>
       <li><a href="#"><em></em><span>我的评论</span></a></li>
       <li><a href="#"><em></em><span>我的积分</span></a></li>
       <li><a href="#"><em></em><span>我的收藏</span></a></li>
       <li><a href="#"><em></em><span>收货地址管理</span></a></li>
      </ul>
    </div>
    <!--右侧内容样式-->
    <div class="user_right">
      <div class="user_Borders">
       <div class="title_name">
        <span class="name">地址管理</span>
       </div>
       <div class="about_user_info">
         <form id="form1" name="form1" method="post" action="">   
       <div class="user_layout">
         <ul>
          <li><label class="user_title_name">收件人姓名：</label><input name="" type="text" class="add_text"><em>*</em></li>
          <li><label class="user_title_name">省&nbsp;市&nbsp;区：</label><em>*</em></li>
          <li><label class="user_title_name">收货地址：</label><input name="" type="text" class="add_text"><em>*</em></li>
          <li><label class="user_title_name">邮&nbsp;&nbsp;&nbsp;&nbsp;编：</label><input name="" type="text" class="add_text"><em>*</em></li>
          <li><label class="user_title_name">手&nbsp;机&nbsp;号：</label><input name="" type="text" class="add_text"><em>*</em></li>
          <li><label class="user_title_name">固定电话：</label><input name="" type="text" class="add_text"></li>         
         </ul>
         <div class="operating_btn"><input name="name" type="submit" value="确认" class="submit—btn"></div>
         </div>
          </form>       
       </div>
       <!--地址列表-->
       <div class="Address_List">
        <div class="title_name"><span class="name">用户地址列表</span></div>
        <div class="list">
         <table>
         <thead>
          <td class="list_name_title0">收件人姓名</td>
          <td class="list_name_title1">地区</td>
          <td class="list_name_title2">邮编</td>
          <td class="list_name_title3">电话</td>
          <td class="list_name_title4">收货地址</td>
          <td class="list_name_title5">操作</td>
         </thead>        
        
          <tr><td>小组</td><td>四川成都五华区</td><td>601022</td><td>12345678909</td><td>产业业务宝贵机会</td><td><a href="#">修改</a><a href="#">删除</a></td></tr>
            <tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
         </table>
        </div>
       </div>
      </div>
   </div>
 </div>
</div>
<!--底部样式-->
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>