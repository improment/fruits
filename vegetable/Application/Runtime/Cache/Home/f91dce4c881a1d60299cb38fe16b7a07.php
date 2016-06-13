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
<!--[if IE 7]>
<link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css">
<![endif]-->
<title>产品列表页</title>
</head>

<body>
<!--顶部样式-->
<?php  include('./Application/Home/View/Public/header.html'); ?>
<!---->
<div><a href="/Public/#"><img src="/Public/images/AD_page_img_02.png" width="100%"/></a></div>
<!--位置-->
<div class="Bread_crumbs">
 <div class="Inside_pages clearfix">
   <div class="left">当前位置：<a href="/Public/#">首页</a>&gt;<a href="/Public/#">水果馆</a></div>
   <div class="right Search">
   <form>
    <input name="" type="text"  class="Search_Box"/>
    <input name="" type="button"  name="" class="Search_btn"/>
    </form>
   </div>
 </div>
</div>
<!--产品列表-->
<div class="Inside_pages clearfix">
<div class="margintop">
 <DIV class="left_style">
   <div class="title_img_p"><img src="/Public/images/p_shuiguo_img.png" /></div>
   <div class="ranking">
    <div class="ranking_title"><span>销量</span>排行</div>
    <ul class="ranking_list">
    <?php foreach($res as $v) {?>
     <li class="">
     <em class="ranking_label">1</em>
     <a href="/Public/#" class="img"> <img src="../../../CI/public/uploads/<?php echo $v['simg']['1']?>" width="100px" height="100px" /></a>
     <p class="ranking_name"><?php echo $v['sname']?></p>
     <p class="price"><b>￥</b><?php echo $v['sprice']?></p>
     <p><a href="/index.php/Home/Xiangqing/index">立即查看 </a></p>
     </li>
     <?php }?>
    </ul>
   </div>
 </DIV>
 <DIV class="right_style">
    <ul class="list_style">
       <?php foreach($arr as $v) {?>
      <li class="clearfix">            <!--         ../../index.php/Home/Fruits/CI/public/uploads                      -->
       <div class="product_lists clearfix">
           <?php if($v['status']=="1") {?>
                 <p ><a href="javascript:void(0)" class="Collect"  rel="<?php echo $v['sid']?>"  style="background-image: url(../../../../Public/images/1.png ) "></a></p> 
           <?php }?>
         <p><a href="javascript:void(0)" class="Collect"  rel="<?php echo $v['sid']?>"></a></p>
          <a href="/index.php/Home/Xiangqing/index"><img src="../../../CI/public/uploads/<?php echo $v['simg']['1']?>" width="208px" height="219px" /></a>
        <p class="title_p_name"><?php echo $v['sname']?></p>
        <p class="title_Profile"><?php echo $v['sdesc']?></p>
        <p class="price"><b>￥</b><?php echo $v['sprice']?></p>
        <p class="btn_style"><a href="/index.php/Home/Xiangqing/index?sid=<?php echo $v['sid']?>" class="buy_btn"></a><a href="/index.php/Home/Xiangqing/index" class="Join_btn"></a></p>
        </div>
       </li>
      <?php }?>
    </ul>
 </DIV>
 </div>
</div>
<!--底部样式-->
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>
<script>
           $(function(){
             $(".Collect").click(function(){
                  var love = $(this);
                  var sid = love.attr('rel')
                  love.css("background-image","url('../../../../Public/images/1.png')")
                 //love.css.background:(url('../../Public/images/Complex_img.png'))
                 $.ajax({
                          type:"GET",
                          url:"click",
                          data:"sid="+sid,
                          success:function(data){
                                  if(data=="1")
                                  {
                                       alert("已收藏到特色馆");
                                       love.css("background-image","url('../../../../Public/images/1.png')")
                                  }else
                                  {
                                      alert("你已经收藏过了") ;
                                      love.css("background-image","url('../../../../Public/images/1.png')")
                                  }

                          }
                 })
             })
           })   
</script>