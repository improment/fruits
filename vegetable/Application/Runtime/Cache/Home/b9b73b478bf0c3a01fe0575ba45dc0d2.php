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
<script src="/Public/js/jquery.1.4.2-min.js"></script>
<script src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=402727"></script>
<!--[if IE 7]>
<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
<![endif]-->
<title>商品详细介绍</title>
<style>
       body{font:12px/18px "宋体",arial,sans-serif;color:#585858;}
      h1,h2,h3,h4,h5,h6{font-size:100%; }
      ul,ol,li,dl{list-style-type:none;}
      em,i,dfn,cite,strong,small{font-style:normal;} 
      img{border:0;}
      fieldset,button,input,select,option{vertical-align:middle;font:12px/18px "宋体",arial,sans-serif;}
      table{border-collapse:collapse;border-spacing:0}
      textarea{resize:none}
      /* color */
      a:link,a:visited{color:#575757;text-decoration:none;}
      a:hover{color:#ef4165;text-decoration:none;}
      a:active{color:#1d7400;}
      /* clearfix */
      .clearfix:after{ visibility:hidden; display:block; font-size:0; content:" "; clear:both; height:0;}
      *html .clearfix{ zoom:1;}

      .preview{width:400px; height:465px; margin:50px 0px 10px 10px;}
      /* smallImg */
      .smallImg{position:relative; height:52px; margin-top:1px; background-color:#F1F0F0; padding:0px 0px; width:390px; overflow:hidden;float:left;}
      .scrollbutton{width:14px; height:50px; overflow:hidden; position:relative; float:left; cursor:pointer; }
      .scrollbutton.smallImgUp , .scrollbutton.smallImgUp.disabled{background:url(../../../Public/images/d_08.png) no-repeat;}
      .scrollbutton.smallImgDown , .scrollbutton.smallImgDown.disabled{background:url(../../../Public/images/d_09.png) no-repeat; margin-left:375px; margin-top:-50px;}

      #imageMenu {height:50px; width:360px; overflow:hidden; margin-left:0; float:left;}
      #imageMenu li {height:50px; width:60px; overflow:hidden; float:left; text-align:center;}
      #imageMenu li img{width:50px; height:50px;cursor:pointer;}
      #imageMenu li#onlickImg img, #imageMenu li:hover img{ width:44px; height:44px; border:3px solid #959595;}
      /* bigImg */
      .bigImg{position:relative; float:left; width:400px; height:400px; overflow:hidden;}
      .bigImg #midimg{width:400px; height:400px;}
      .bigImg #winSelector{width:235px; height:210px;}
      #winSelector{position:absolute; cursor:crosshair; filter:alpha(opacity=15); -moz-opacity:0.15; opacity:0.15; background-color:#000; border:1px solid #fff;}
      /* bigView */
      #bigView{position:absolute;border: 1px solid #959595; overflow: hidden; z-index:999;}
      #bigView img{position:absolute;}
</style>
</head>

<body>
<!--顶部样式-->
<?php  include('./Application/Home/View/Public/header.html'); ?>
<!---->
<div><a href="#"><img src="/Public/images/AD_page_img_02.png" width="100%"/></a></div>
<!--位置-->
<div class="Bread_crumbs">
 <div class="Inside_pages clearfix">
   <div class="left">当前位置：<a href="#">首页</a>&gt;<a href="#">水果馆</a></div>
   <div class="right Search">
   <form>
    <input name="" type="text"  class="Search_Box"/>
    <input name="" type="button"  name="" class="Search_btn"/>
    </form>
   </div>
 </div>
</div>
<!--商品详细介绍-->
<div class="Inside_pages clearfix">
 <div class="left_style">
    <div class="title_img_p"><img src="/Public/images/p_vegetables_img.png" /></div>
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
 </div>
 <!--详细介绍样式-->
 <div class="right_style">
  <div class="pro_detailed">
   <div class="Details_style clearfix" id="goodsInfo">
     <div class="mod_picfold clearfix">
      <div class="clearfix" id="detail_main_img">
	               <div class="preview">
                                <div id="vertical" class="bigImg">
                                  <img src="../../../CI/public/uploads/<?php echo $arr['simg'][0]?>" width="400" height="500" alt="" id="midimg" />
                                  <div style="display:none;" id="winSelector"></div>
                                </div><!--bigImg end--> 
                                <div class="smallImg">
                                  <div class="scrollbutton smallImgUp disabled"></div>
                                  <div id="imageMenu">
                                    <ul>
                                      <li><img src="../../../CI/public/uploads/<?php echo $arr['simg'][0]?>" width="68" height="68" alt="<?php echo $arr['sname']?>"/></li>
                                      <li><img src="../../../CI/public/uploads/<?php echo $arr['simg'][1]?>" width="68" height="68" alt="<?php echo $arr['sname']?>"/></li>
                                      <li><img src="../../../CI/public/uploads/<?php echo $arr['simg'][2]?>" width="68" height="68" alt="<?php echo $arr['sname']?>"/></li>
                                    </ul>
                                  </div>
                                  <div class="scrollbutton smallImgDown"></div>
                                </div><!--smallImg end--> 
                                <div id="bigView" style="display:none;"><img width="600" height="600" alt="" src="" /></div>
                              </div>
	</div>
    <div class="Sharing">
     <div class="bdsharebuttonbox right">
         <a href="#" class="bds_more" data-cmd="more"></a>
         <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
         <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
         <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
         <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
         <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
         </div>
<script>
window._bd_share_config = {
    "common": {
        "bdSnsKey": {},
        "bdText": "",
        "bdMini": "2",
        "bdMiniList": false,
        "bdPic": "",
        "bdStyle": "1",
        "bdSize": "16"
    },
    "share": {},
    "image": {
        "viewList": ["qzone", "weixin", "tsina", "tqq", "renren"],
        "viewText": "分享到：",
        "viewSize": "16"
    },
    "selectShare": {
        "bdContainerClass": null,
        "bdSelectMiniList": ["qzone", "weixin", "tsina", "tqq", "renren"]
    }
};
with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];



   //放大镜

      $(document).ready(function(){
  // 图片上下滚动
  var count = $("#imageMenu li").length - 5; /* 显示 6 个 li标签内容 */
  var interval = $("#imageMenu li:first").width();
  var curIndex = 0;
  
  $('.scrollbutton').click(function(){
    if( $(this).hasClass('disabled') ) return false;
    
    if ($(this).hasClass('smallImgUp')) --curIndex;
    else ++curIndex;
    
    $('.scrollbutton').removeClass('disabled');
    if (curIndex == 0) $('.smallImgUp').addClass('disabled');
    if (curIndex == count-1) $('.smallImgDown').addClass('disabled');
    
    $("#imageMenu ul").stop(false, true).animate({"marginLeft" : -curIndex*interval + "px"}, 600);
  }); 
  // 解决 ie6 select框 问题
  $.fn.decorateIframe = function(options) {
        if ($.browser.msie && $.browser.version < 7) {
            var opts = $.extend({}, $.fn.decorateIframe.defaults, options);
            $(this).each(function() {
                var $myThis = $(this);
                //创建一个IFRAME
                var divIframe = $("<iframe />");
                divIframe.attr("id", opts.iframeId);
                divIframe.css("position", "absolute");
                divIframe.css("display", "none");
                divIframe.css("display", "block");
                divIframe.css("z-index", opts.iframeZIndex);
                divIframe.css("border");
                divIframe.css("top", "0");
                divIframe.css("left", "0");
                if (opts.width == 0) {
                    divIframe.css("width", $myThis.width() + parseInt($myThis.css("padding")) * 2 + "px");
                }
                if (opts.height == 0) {
                    divIframe.css("height", $myThis.height() + parseInt($myThis.css("padding")) * 2 + "px");
                }
                divIframe.css("filter", "mask(color=#fff)");
                $myThis.append(divIframe);
            });
        }
    }
    $.fn.decorateIframe.defaults = {
        iframeId: "decorateIframe1",
        iframeZIndex: -1,
        width: 0,
        height: 0
    }
    //放大镜视窗
    $("#bigView").decorateIframe();
    //点击到中图
    var midChangeHandler = null;
  
    $("#imageMenu li img").bind("click", function(){
    if ($(this).attr("id") != "onlickImg") {
      midChange($(this).attr("src").replace("small", "mid"));
      $("#imageMenu li").removeAttr("id");
      $(this).parent().attr("id", "onlickImg");
    }
  }).bind("mouseover", function(){
    if ($(this).attr("id") != "onlickImg") {
      window.clearTimeout(midChangeHandler);
      midChange($(this).attr("src").replace("small", "mid"));
      $(this).css({ "border": "3px solid #959595" });
    }
  }).bind("mouseout", function(){
    if($(this).attr("id") != "onlickImg"){
      $(this).removeAttr("style");
      midChangeHandler = window.setTimeout(function(){
        midChange($("#onlickImg img").attr("src").replace("small", "mid"));
      }, 1000);
    }
  });
    function midChange(src) {
        $("#midimg").attr("src", src).load(function() {
            changeViewImg();
        });
    }
    //大视窗看图
    function mouseover(e) {
        if ($("#winSelector").css("display") == "none") {
            $("#winSelector,#bigView").show();
        }
        $("#winSelector").css(fixedPosition(e));
        e.stopPropagation();
    }
    function mouseOut(e) {
        if ($("#winSelector").css("display") != "none") {
            $("#winSelector,#bigView").hide();
        }
        e.stopPropagation();
    }
    $("#midimg").mouseover(mouseover); //中图事件
    $("#midimg,#winSelector").mousemove(mouseover).mouseout(mouseOut); //选择器事件

    var $divWidth = $("#winSelector").width(); //选择器宽度
    var $divHeight = $("#winSelector").height(); //选择器高度
    var $imgWidth = $("#midimg").width(); //中图宽度
    var $imgHeight = $("#midimg").height(); //中图高度
    var $viewImgWidth = $viewImgHeight = $height = null; //IE加载后才能得到 大图宽度 大图高度 大图视窗高度

    function changeViewImg() {
        $("#bigView img").attr("src", $("#midimg").attr("src").replace("mid", "big"));
    }
    changeViewImg();
    $("#bigView").scrollLeft(0).scrollTop(0);
    function fixedPosition(e) {
        if (e == null) {
            return;
        }
        var $imgLeft = $("#midimg").offset().left; //中图左边距
        var $imgTop = $("#midimg").offset().top; //中图上边距
        X = e.pageX - $imgLeft - $divWidth / 2; //selector顶点坐标 X
        Y = e.pageY - $imgTop - $divHeight / 2; //selector顶点坐标 Y
        X = X < 0 ? 0 : X;
        Y = Y < 0 ? 0 : Y;
        X = X + $divWidth > $imgWidth ? $imgWidth - $divWidth : X;
        Y = Y + $divHeight > $imgHeight ? $imgHeight - $divHeight : Y;

        if ($viewImgWidth == null) {
            $viewImgWidth = $("#bigView img").outerWidth();
            $viewImgHeight = $("#bigView img").height();
            if ($viewImgWidth < 200 || $viewImgHeight < 200) {
                $viewImgWidth = $viewImgHeight = 800;
            }
            $height = $divHeight * $viewImgHeight / $imgHeight;
            $("#bigView").width($divWidth * $viewImgWidth / $imgWidth);
            $("#bigView").height($height);
        }
        var scrollX = X * $viewImgWidth / $imgWidth;
        var scrollY = Y * $viewImgHeight / $imgHeight;
        $("#bigView img").css({ "left": scrollX * -1, "top": scrollY * -1 });
        $("#bigView").css({ "top": 75, "left": $(".preview").offset().left + $(".preview").width() + 15 });

        return { left: X, top: Y };
    }
});
</script>



</script>
  <!--收藏-->
	  <div class="coding">商品编码:<?php echo ($arr["snumber"]); ?></div>
	 </div>
   </div>
   <!--购买信息-->
    <div class="Buying_info">
      <div class="product_name"><h2><?php echo ($arr["sname"]); ?></h2><span><?php echo ($arr["sdesc"]); ?></span></div>
      <div class="product_price">
       <div class="price"><label>商城价：</label>￥<span id="price"><?php echo ($arr["sprice"]); ?></span> <b>元/箱</b></div>
       <div class="jyScore-fra"><a href="#">共有16条评论</a></div>
      </div>
      <div class="productDL">
        <dl><dt>包装：</dt><dd class="left">
        <div class="item  selected"><b></b><a href="#none" title="小礼盒" class="box">小礼盒</a></div> 
        <div class="item"><b></b><a href="#none" title="普通包装" class="box">普通包装</a></div>
        <div class="item"><b></b><a href="#none" title="大礼盒" class="box">大礼盒</a></div></dd></dl>
        <dl><dt>数量：</dt><dd class="left">
        <div class="Numbers">
		  <a href="javascript:void(0);" class="jian">-</a>
		  <input id="number" name="number" type="text" value="1" class="number_text">
		  <a href="javascript:void(0);" class="jia  ">+</a>
		 </div>
        </dd><dd class="left Quantity">(库存:<?php echo ($arr["snum"]); ?>)</dd></dl>
        <dl><dt>总价 ： </dt><dd class="left"></dd>
               <div class="Allnum" >
                      <div id="zhi"><h2><?php echo ($arr["sprice"]); ?>元</h2></div>

               </div>
        </dl>
      </div>
      <div class="product_Quantity">销量：<?php echo ($arr["sbuy"]); ?></div>
      <div class="operating">
       <a href="/index.php/Home/Cart/index/sid/<?php echo ($arr["sid"]); ?>" class="buy_btn"></a>
       <a href="javascript:void(0)" class="Join_btn" id="join" value="<?php echo ($arr["sid"]); ?>"></a>
       <a href="#" class="Collect_btn"></a>
      </div>
    </div>
   </div>
   <!--信息展示-->
   <div class="mainListRight" id="status1">
   <ul class="fixed_bar" style="">
      <li class="status_on active"><a href="#status1">产品介绍</a></li>
      <li class="status_on"><a href="#status2">商品评价<span>(0)</span></a></li>
      <li class="status_on"><a href="#shbz">售后服务</a></li>
      <div class="statusBtn" style="display: none;"><a href="javascript:addToCart_bak(77)" class="statusBtn1" title="加入购物车"></a></div>
    </ul>
   
   </div>
  </div>
 </div>
</div>
<!--底部样式-->
<?php include('./Application/Home/View/Public/footer.html'); ?>
</body>
</html>
<script>
       //加
   $(".jia").click(function(){
    var number = $("#number").val();
   // alert(parseInt(number));
    
        if(number>=100)
       {
             alert("库存不足");
             $("#number").val(number);
       }else{
          number = parseInt(number)+1;
        $("#number").val(number);
         var price = $("#price").html();
         var zong = number*(price)
       $("#zhi").children().html(zong+"元")
        //alert(number)
       }
   
   
   })
//减
    $(".jian").click(function(){
    var number = $("#number").val();
   
    if(number =='1')
    {
       $("#number").val(number);
    }else
    {
        number = parseInt(number)-1;
        $("#number").val(number);
        var price = $("#price").html();
        var zong = number*(price)
        $("#zhi").children().html(zong+"元")
    }
   })
   
  //加入购物车
  $('.Join_btn').click(function(){
     sid=$('.Join_btn').attr('value');
     unit = $('.box').attr('title');
     number = $("#number").val();
     zongjia = $("#zhi").children().html();
     price = $("#price").html();
     //alert(price);
     $.ajax({
         type:'GET',
         url:'../Cart/collection',
         data:"sid="+sid+"&unit="+unit+"&number="+number+"&zongjia="+zongjia+"&price="+price,
         success:function(msg){
             alert(msg)
         }
     })
  })
</script>