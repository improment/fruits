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
<script src="/Public/http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=402727"></script> 
<title>登陆</title>
</head>

<body>
<?php  include('./Application/Home/View/Public/header.html'); ?>
<div><a href="#"><img src="/Public/images/AD_page_img_02.png" width="100%"/></a></div>
<div class="Inside_pages clearfix">
<!--登录样式-->
  <div class="login">
       <div class="style_login clearfix">
       <form action="/index.php/Home/Login/login" method="post">
          <div class="layout">
          
            <div class="login_title">登录</div>
            <div class="item item-fore1"><label for="loginname" class="login-label name-label"></label><input name="uphone" type="text" class="text" placeholder="请输入用户"></div>
            <div class="item item-fore2"><label for="nloginpwd" class="login-label pwd-label"></label><input name="upwd" type="password" class="text" placeholder="用户密码"> </div>
            <div class="auto-login"><label class="auto-label"><input type="checkbox" id="rememberMe"><span>记住账号和密码</span></label></div>
            <div class="login-btn"><input type="submit" value="登&nbsp;&nbsp;&nbsp;&nbsp;录" class="btn_login"></div>
            <div class="login_link"><a href="/index.php/Home/Login/registered">免费注册</a> | <a href="#">忘记密码</a></div>
          </div>
          </form>
       </div>
       <div class="login_img"><img src="/Public/images/login_img_03.png" /></div>
  </div>
</div>
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>