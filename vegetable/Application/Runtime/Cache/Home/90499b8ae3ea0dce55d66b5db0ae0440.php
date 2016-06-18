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
<script src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=402727"></script>
<script type="text/javascript" src="/Public/js/jquery.spinner.js"></script>
<link rel="stylesheet" href="/Public/css/jquery.spinner.css" />
<link rel="stylesheet" href="/Public/css/ShopShow.css" type="text/css" />
<link rel="stylesheet" href="/Public/css/MagicZoom.css" type="text/css" />
<script src="/Public/js/MagicZoom.js" type="text/javascript"></script>
<!--[if IE 7]>
<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css">
<![endif]-->
<title>商品详细介绍</title>
<style type="text/css">
body{margin:20px;}
.spinnerExample{margin:10px 0;}
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
   <div class="left">当前位置：<a href="#">首页</a>&gt;<a href="#">素菜馆</a></div>
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
     <li class="">
     <em class="ranking_label">1</em>
     <a href="#" class="img"> <img src="/Public/images/product_img_17.png" width="100px" height="100px" /></a>
     <p class="ranking_name">浦江特产绿豌豆天然无污染</p>
     <p class="price"><b>￥</b>12.54</p>
     <p><a href="#">立即查看< </a></p>
     </li>
     <li class="">
     <em class="ranking_label">2</em>
     <a href="#" class="img"> <img src="/Public/images/product_img_17.png" width="100px" height="100px" /></a>
     <p class="ranking_name">浦江特产绿豌豆天然无污染</p>
     <p class="price"><b>￥</b>12.54</p>
     <p><a href="#">立即查看< </a></p>
     </li><li class="">
     <em class="ranking_label">3</em>
     <a href="#" class="img"> <img src="/Public/images/product_img_17.png" width="100px" height="100px" /></a>
     <p class="ranking_name">浦江特产绿豌豆天然无污染</p>
     <p class="price"><b>￥</b>12.54</p>
     <p><a href="#">立即查看< </a></p>
     </li><li class="">
     <em class="ranking_label">4</em>
     <a href="#" class="img"> <img src="/Public/images/product_img_17.png" width="100px" height="100px" /></a>
     <p class="ranking_name">浦江特产绿豌豆天然无污染</p>
     <p class="price"><b>￥</b>12.54</p>
     <p><a href="#">立即查看< </a></p>
     </li><li class="">
     <em class="ranking_label">5</em>
     <a href="#" class="img"> <img src="/Public/images/product_img_17.png" width="100px" height="100px" /></a>
     <p class="ranking_name">浦江特产绿豌豆天然无污染</p>
     <p class="price"><b>￥</b>12.54</p>
     <p><a href="#">立即查看< </a></p>
     </li>
    </ul>
   </div>
 </div>
 <!--详细介绍样式-->
 <div class="right_style">
  <div class="pro_detailed">
   <div class="Details_style clearfix" id="goodsInfo">
     <div class="mod_picfold clearfix">
    <div class="clearfix" id="detail_main_img">
	<div id="tsShopContainer">
	<div id="tsImgS"><a href="../../../../../CI/public/uploads/<?php $info=explode('|',$simg); echo $info[0]?>" title="Images" class="MagicZoom" id="MagicZoom">
	<img width="300" height="300" src="../../../../../CI/public/uploads/<?php $info=explode('|',$simg); echo $info[0]?>" class="simg"/>
	</a></div>
	<div id="tsPicContainer">
		<div id="tsImgSArrL" onclick="tsScrollArrLeft()"></div>
		<div id="tsImgSCon">
			<ul>
			<?php  $info=explode('|',$simg); foreach($info as $k=>$v){ ?>
				<li onclick="showPic(<?php echo ($k); ?>)" rel="MagicZoom"><img height="42" width="42" src="../../../../../CI/public/uploads/<?php echo ($v); ?>" tsImgS="../../../../../CI/public/uploads/<?php echo ($v); ?>" /></li>
				<?php
 } ?>

			</ul>
		</div>
		<div id="tsImgSArrR" onclick="tsScrollArrRight()"></div>
	</div>
	<img class="MagicZoomLoading" width="16" height="16" src="images/loading.gif" alt="Loading..." />
</div>
	 <script src="/Public/js/ShopShow.js"></script>
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
</script>
  <!--收藏-->
 
	  <div class="coding">商品编码：<?php echo ($snumber); ?></div>
	 </div>
   </div>
   <!--购买信息-->
    <div class="Buying_info">
		
      <div class="product_name"><h2 id="sname" data-id="<?php echo ($sid); ?>"><?php echo ($sname); ?></h2><span><?php echo ($sdesc); ?></span></div>
      <div class="product_price">
       <div class="price"><label>优惠价：</label>￥<span id="price"><?php echo ($a_price); ?></span> <b class="unit"><?php echo ($unit); ?></b></br><label>原&nbsp;&nbsp;&nbsp;价：</label><s>￥</s><s class="yuanjia"><?php echo ($sprice); ?></s></div>
	   
       <!-- <div class="jyScore-fra"><span><em style="width:60px;"></em></span><b>4.5</b><a href="#">共有16条评论</a></div> -->
      </div>
      <div class="productDL">
        <!-- <dl><dt>品种：</dt><dd class="left"><div class="item  selected"><b></b><a href="#none" title="金晕">芹川</a></div> <div class="item"><b></b><a href="#none" title="芹川">芹川</a></div></dd></dl> -->
        <dl><dt>包装：</dt><dd class="left">
        <div class="item  selected"><b></b><a href="#none" title="小礼盒">小礼盒</a></div> 
        <!-- <div class="item"><b></b><a href="#none" title="普通包装">普通包装</a></div>
        <div class="item"><b></b><a href="#none" title="大礼盒">大礼盒</a></div> --></dd></dl>
        <dl><dt>数量：</dt><dd class="left">
        <div class="Numbers">
		  <input type="text" class="spinnerExample" onkeyup="keyup()"/>
		 </div>
        </dd><dd class="left Quantity">(库存：<?php echo ($snum); ?>)</dd></dl>
		<dl><dt>总价：</dt><dd class="left">
        <div class="Numbers">
		  <font color="red"><h2 >￥<span id="zongjia"><?php echo ($a_price); ?></span></h2></font>
		 </div>
        </dd></dl>
      </div>
      <div class="product_Quantity">销量：<?php echo ($sbuy); ?></div>
	  
      <div class="operating">
       <a href="#" class="buy_btn"></a>
       <a href="#" class="Join_btn" onclick="join_che()"></a>
       <a href="#" class="Collect_btn"></a>
      </div>
	  
	  <script type="text/javascript">
$('.spinnerExample').spinner({});
	$(document).on('click','.increase',function(){
		var num=$('.spinnerExample').val();
		//alert(num);
		var zongjia=num*<?php echo ($a_price); ?>;
		//alert(zongjia)
		$("#zongjia").html(zongjia)
	})
	$(document).on('click','.decrease',function(){
		var num=$('.spinnerExample').val();
		//alert(num);
		var zongjia=num*<?php echo ($a_price); ?>;
		//alert(zongjia)
		$("#zongjia").html(zongjia)
	})
	function keyup(){
		var num=$('.spinnerExample').val();
		//alert(num);
		var zongjia=num*<?php echo ($a_price); ?>;
		//alert(zongjia)
		$("#zongjia").html(zongjia)
	}
</script>
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
function join_che(){
            var g_name=$("#sname").text();
			//alert(g_name)
            var nums=$(".spinnerExample").val();
			//alert(nums)
            var goods_id=$("#sname").attr('data-id');
			//alert(goods_id)
            var price=$("#price").text();
			//alert(price)
            var goods_price=$("#zongjia").text();
			//alert(goods_price)
            //console.log(g_id)
			var simg=$(".simg").attr('src');
			//alert(simg);
			var unit=$(".unit").text();
			//alert(unit);
			var yuanjia=$(".yuanjia").text();
			var yzongjia=yuanjia*nums;
			//alert(yzongjia)
            $.post(
                    "/index.php/Home/Active/flow",
                    {sid:goods_id,zongjia:goods_price,sname:g_name,snum:nums,a_price:price,simg:simg,unit:unit,sprice:yuanjia,yzongjia:yzongjia},
                    function (data) {
                        alert(data);
						}
                        //location.href=""
                    
            )
        }
</script>