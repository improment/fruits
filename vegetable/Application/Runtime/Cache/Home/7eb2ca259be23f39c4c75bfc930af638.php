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
<!--[if IE 7]>
<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
<![endif]-->
<title>商品团购</title>
</head>

<body>
<!--顶部样式-->
<?php  include('./Application/Home/View/Public/header.html'); ?>
<!---->
<div style="background:url(/Public/images/group_img.jpg) no-repeat; height:472px; width:100%; background-position:center"></div>
<!--位置-->
<div class="Bread_crumbs">
 <div class="Inside_pages clearfix">
   <div class="left">当前位置：<a href="#">首页</a>&gt;<a href="#">素菜馆</a></div>
   <div class="right Search">
   <form>
    <input name="" type="text"  class="Search_Box"/>
    <input name="" type="button"  name="" class="Search_btn"/>
    </form>
   </div>
 </div>
</div>

<!--团购样式-->
<div class="Inside_pages clearfix">
 <div class="Group_buy">
    <div class="Group_title"><em></em>今日团购<span>GROUP-BUYING</span></div>
    <div class="Group_list clearfix">
     <div class="left_Group">
	 <?php if(is_array($arr)): foreach($arr as $key=>$v): ?><div class="Group_prodcut">
      <div class="clearfix">
       <div class="Group_info">
         <a href="#" class="Collect"></a>
         <ul>
          <li class="Group_p_name"><a href="#"><?php echo ($v["a_name"]); ?></a></li>
          <li class="Group_p_about"><?php echo ($v["a_desc"]); ?></li>
          <Li><?php echo ($v["unit"]); ?></Li>
          <li class="Group_price"><span class="Current_price"><i>￥</i><?php echo ($v["a_price"]); ?>.00</span> <span class="Group_List">原价：<?php echo ($v["sprice"]); ?></span></li>
          <li class="Group_p_buy">
           <span class="Group_Number"><em></em><?php echo ($v["people"]); ?>人购买</span>
           <span class="Group_button right"><a href="/index.php/Home/Active/" class="buy_button"></a></span>
          </li>
         </ul>
       </div>
       <div class="Group_img"><a href=""><img src="/Public/images/pic5.jpg"  height="195" width="365"/></a></div>
       </div>
       <div class="Group_time">
         <em ></em><div class="timerbg">
		<div id="daoend_<?php echo ($v["aid"]); ?>" style="display:none;">本次活动已结束。</div>
		<div id="dao_<?php echo ($v["aid"]); ?>">距离结束还有<strong id="RemainD_<?php echo ($v["aid"]); ?>"></strong>天<strong id="RemainH_<?php echo ($v["aid"]); ?>"></strong>时<strong id="RemainM_<?php echo ($v["aid"]); ?>"></strong>分<strong id="RemainS_<?php echo ($v["aid"]); ?>"></strong>秒</div>

	</div>
       </div>
      </div>
	  <script type="text/javascript">
	var startTime = new Date();
	startTime.setFullYear(<?php echo date('Y,m,d',$v['end_time'])?>);
	startTime.setHours(23);
	startTime.setMinutes(59);
	startTime.setSeconds(59);
	startTime.setMilliseconds(999);
	var EndTime_<?php echo ($v["aid"]); ?>=startTime.getTime();
	function GetRTime_<?php echo ($v["aid"]); ?>(){
		var NowTime_<?php echo ($v["aid"]); ?> = new Date();
		
		var nMS_<?php echo ($v["aid"]); ?> = EndTime_<?php echo ($v["aid"]); ?> - NowTime_<?php echo ($v["aid"]); ?>.getTime();
		var nD = Math.floor(nMS_<?php echo ($v["aid"]); ?>/(1000 * 60 * 60 * 24));
		var nH = Math.floor(nMS_<?php echo ($v["aid"]); ?>/(1000*60*60)) % 24;
		var nM = Math.floor(nMS_<?php echo ($v["aid"]); ?>/(1000*60)) % 60;
		var nS = Math.floor(nMS_<?php echo ($v["aid"]); ?>/1000) % 60;
		if (nMS_<?php echo ($v["aid"]); ?> < 0){
			$("#dao_<?php echo ($v["aid"]); ?>").hide();
			$("#daoend_<?php echo ($v["aid"]); ?>").show();
		}else{
		   $("#dao_<?php echo ($v["aid"]); ?>").show();
		   $("#daoend_<?php echo ($v["aid"]); ?>").hide();
		   $("#RemainD_<?php echo ($v["aid"]); ?>").text(nD);
		   $("#RemainH_<?php echo ($v["aid"]); ?>").text(nH);
		   $("#RemainM_<?php echo ($v["aid"]); ?>").text(nM);
		   $("#RemainS_<?php echo ($v["aid"]); ?>").text(nS); 
		}
	}
	window.setInterval("GetRTime_<?php echo ($v["aid"]); ?>()", 1000);
	
	</script><?php endforeach; endif; ?>
     </div>
     <!--右侧团购样式-->
     <div class="right_Group">
	  <?php if(is_array($are)): foreach($are as $key=>$v): ?><div class="right_Group_p_style">
       <div class="clearfix">
        <div class="left_Group_name">
        <a href="#" class="Collect"></a>
         <ul>
          <li class="Group_p_name"><a href="#"><?php echo ($v["a_name"]); ?></a></li>
          <li class="Group_p_about"><?php echo ($v["a_desc"]); ?></li>
          <Li class="spacing"><?php echo ($v["unit"]); ?></Li>
          <li class="Group_price"><span class="Current_price"><i>￥</i><?php echo ($v["a_price"]); ?>.00</span> <span class="Group_List">原价：<?php echo ($v["sprice"]); ?></span></li>
          <li class="Group_p_buy">
           <span class="Group_Number"><em></em><?php echo ($v["people"]); ?>人购买</span>
           <span class="Group_button right"><a href="#" class="buy_button"></a></span>
          </li>
         </ul>
        </div>
        <div class="right_Group_img"><a href=""><img src="/Public/images/pic1.jpg"  height="370" width="365"/></a></div>
       </div>
        <div class="Group_time">
         <em></em><div class="timerbg">
		<div id="daoend_<?php echo ($v["aid"]); ?>" style="display:none;">本次活动已结束。</div>
		<div id="dao_<?php echo ($v["aid"]); ?>">距离结束还有<strong id="RemainD_<?php echo ($v["aid"]); ?>"></strong>天<strong id="RemainH_<?php echo ($v["aid"]); ?>"></strong>时<strong id="RemainM_<?php echo ($v["aid"]); ?>"></strong>分<strong id="RemainS_<?php echo ($v["aid"]); ?>"></strong>秒</div>

	</div>
       </div>
     </div>
	 <script type="text/javascript">
	var startTime = new Date();
	startTime.setFullYear(<?php echo date('Y,m,d',$v['end_time'])?>);
	startTime.setHours(23);
	startTime.setMinutes(59);
	startTime.setSeconds(59);
	startTime.setMilliseconds(999);
	var EndTime_<?php echo ($v["aid"]); ?>=startTime.getTime();
	function GetRTime_<?php echo ($v["aid"]); ?>(){
		var NowTime_<?php echo ($v["aid"]); ?> = new Date();
		
		var nMS_<?php echo ($v["aid"]); ?> = EndTime_<?php echo ($v["aid"]); ?> - NowTime_<?php echo ($v["aid"]); ?>.getTime();
		var nD = Math.floor(nMS_<?php echo ($v["aid"]); ?>/(1000 * 60 * 60 * 24));
		var nH = Math.floor(nMS_<?php echo ($v["aid"]); ?>/(1000*60*60)) % 24;
		var nM = Math.floor(nMS_<?php echo ($v["aid"]); ?>/(1000*60)) % 60;
		var nS = Math.floor(nMS_<?php echo ($v["aid"]); ?>/1000) % 60;
		if (nMS_<?php echo ($v["aid"]); ?> < 0){
			$("#dao_<?php echo ($v["aid"]); ?>").hide();
			$("#daoend_<?php echo ($v["aid"]); ?>").show();
		}else{
		   $("#dao_<?php echo ($v["aid"]); ?>").show();
		   $("#daoend_<?php echo ($v["aid"]); ?>").hide();
		   $("#RemainD_<?php echo ($v["aid"]); ?>").text(nD);
		   $("#RemainH_<?php echo ($v["aid"]); ?>").text(nH);
		   $("#RemainM_<?php echo ($v["aid"]); ?>").text(nM);
		   $("#RemainS_<?php echo ($v["aid"]); ?>").text(nS); 
		}
	}
	window.setInterval("GetRTime_<?php echo ($v["aid"]); ?>()", 1000);
	
	</script><?php endforeach; endif; ?>
     <!--团购列表-->
     <div class="other_Group clearfix">
	 <?php if(is_array($are2)): foreach($are2 as $key=>$v): ?><div class="g_p_list">
        <div class="g_p_style"> 
         <div class="g_p_img"><a href="#"><img src="/Public/images/product_img_17.png"  height="220" width="274"/></a></div>
        <ul>
         <a href="#" class="Collect"></a>     
        <li><a href="" class="name"><?php echo ($v["a_name"]); ?></a></li>
        <li><?php echo ($v["a_desc"]); ?>}</li>
        <li class="Group_price"><span class="Current_price"><i>￥</i><?php echo ($v["a_price"]); ?>.00</span> <span class="Group_List">原价：<?php echo ($v["sprice"]); ?></span></li>
        <li class="Group_p_buy">
           <span class="Group_Number"><?php echo ($v["people"]); ?>人购买</span>
           <span class="Group_button right"><a href="#" class="buy_button"></a></span>
          </li>
        </ul>
        </div>
       </div><?php endforeach; endif; ?>
       <!---->
     </div>
     </div>
    </div>
 </div>
</div>
<!--底部样式-->
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>