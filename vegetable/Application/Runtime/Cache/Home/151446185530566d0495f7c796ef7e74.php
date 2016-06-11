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
<title>用户注册</title>
</head>

<body>
<?php  include('./Application/Home/View/Public/header.html'); ?>
<div><a href="/Public/#"><img src="/Public/images/AD_page_img_02.png" width="100%"/></a></div>
<!--注册样式-->
<div class="Inside_pages clearfix">
 <div class="register">
     <div class="register_style">
      <div class="u_register">
        <ul>
         <li><label class="name">手机号码：</label><input name="" type="text"  class="text_Add" id="uphone"/></li>
         <li><label class="name">用户名称：</label><input name="" type="text"  class="text_Add" id="unickname"/></li>
         <li><label class="name">设置密码：</label><input name="" type="password"  class="text_Add" placeholder="6-20个字符，由字母、数字和符号的两种以上组合" id="upwd"/></li>
         <li><label class="name">确认密码：</label><input name="" type="password"  class="text_Add" id="npwd"/></li>
         <li><label class="name">验 证 码：</label><img src="/index.php/Home/Login/verify" id='yzm' width='200' />
			<font size="-1" color="gray"></font><font size="-1"><a href="javascript:void(0)" onclick="kbq()">看不清？换一张</a></font></li>
        </ul>
         <div class="auto-register"><label class="auto-label"><input type="checkbox" id="rememberMe"><span><a href="/Public/#">《国际商贸城网站注册协议》</a></span></label></div>
         <div class="register-btn"><a href="/Public/javascript:;" class="btn_register">注&nbsp;&nbsp;&nbsp;&nbsp;册</a></div>
      </div>
     </div>
     <div class="register_img"><img src="/Public/images/Register_img.png" /></div>
 </div>
</div>
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>
<script>
function kbq(){
		document.getElementById('yzm').src="/index.php/Home/Login/verify/"+Math.random();
	}

//新增的表单提交
	function ji(id){
		//alert(id)
		var user=$("#"+id).val();
		//alert(user);
		var sex=$("#sex_"+id).val();
		//alert(position);
		var sheng=$("#sheng_"+id).children("option:selected").text();
		var city=$("#city_"+id).children("option:selected").text();
		var xian=$("#xian_"+id).children("option:selected").text();
		var hobby1=$("#hobby1_"+id).val();
		var hobby2=$("#hobby2_"+id).val();
		//alert(d4312)
		$.ajax({
			url:"index.php?r=one/add",
			data:"user="+user+"&sex="+sex+"&sheng="+sheng+"&city="+city+"&xian="+xian+"&hobby1="+hobby1+"&hobby2="+hobby2,
			type:"post",
			success:function(msg){
					if(msg=='1'){
						$("#list_"+id).hide();
					}else{
						$("#show_"+id).html("用户名已存在");
					}
			}
		})
	}
</script>