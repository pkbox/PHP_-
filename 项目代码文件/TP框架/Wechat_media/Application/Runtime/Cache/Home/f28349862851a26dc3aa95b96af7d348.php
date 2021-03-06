<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>电影推荐首页</title>
	<!-- 解决IE8兼容性 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- 设置编码为utf-8 -->
	<meta charset="utf-8" />
	<!-- 自适应设备 -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/Wechat_media/Public/home/lib/weui.min.css">
	<link rel="stylesheet" type="text/css" href="/Wechat_media/Public/home/css/jquery-weui.min.css">
	<style>
		html,body{
			height: 100%;
		}
		.swiper-container {
        width: 100%;
      } 

      .swiper-container img {
        display: block;
        width: 100%;
    }
	</style>
</head>
<body>
<div class="weui_tab">
  <div class="weui_tab_bd">
 <!--  顶部幻灯片开始 -->
  <div class="swiper-container" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><a href="media_content.html"><img src="/Wechat_media/Public/home/images/封面.jpg" alt=""></a></div>
    <div class="swiper-slide"><a href="media_content.html"><img src="/Wechat_media/Public/home/images/封面1.jpg" alt=""></a></div>
    <div class="swiper-slide"><a href="media_content.html"><img src="/Wechat_media/Public/home/images/封面2.jpg" alt=""></a></div>
    <div class="swiper-slide"><a href="media_content.html"><img src="/Wechat_media/Public/home/images/封面3.jpg" alt=""></a></div>/
  </div>
  
  <!-- 幻灯片导航 -->
  <div class="swiper-pagination"></div>
  
</div>
<!-- 九宫格 -->
<div class="weui_grids">
  <a href="media_lists.html" class="weui_grid js_grid" data-id="button">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/kehuan.png" alt="">
    </div>
    <p class="weui_grid_label">
      科幻
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="cell">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/xuanyi.png" alt="">
    </div>
    <p class="weui_grid_label">
      悬疑
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="toast">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/lizhi.png" alt="">
    </div>
    <p class="weui_grid_label">
      励志
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="button">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/dongzuo.png" alt="">
    </div>
    <p class="weui_grid_label">
      动作
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="cell">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/aiqing.png" alt="">
    </div>
    <p class="weui_grid_label">
      爱情
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="toast">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/kongbu.jpg" alt="">
    </div>
    <p class="weui_grid_label">
      恐怖
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="button">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/lunli.png" alt="">
    </div>
    <p class="weui_grid_label">
      剧情
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="cell">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/xiju.jpg" alt="">
    </div>
    <p class="weui_grid_label">
      喜剧
    </p>
  </a>
  <a href="media_lists.html" class="weui_grid js_grid" data-id="toast">
    <div class="weui_grid_icon">
      <img src="/Wechat_media/Public/home/images/icon_nav_cell.png" alt="">
    </div>
    <p class="weui_grid_label">
      更多
    </p>
  </a>
</div>
  </div>

  <div class="weui_tabbar">
    <a href="media_index.html" class="weui_tabbar_item weui_bar_item_on">
      <div class="weui_tabbar_icon">
        <img src="/Wechat_media/Public/home/images/shouye.png" alt="">
      </div>
      <p class="weui_tabbar_label">主页</p>
    </a>
    <a href="media_music.html" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Wechat_media/Public/home/images/yingshiyinyue.png" alt="">
      </div>
      <p class="weui_tabbar_label">音乐</p>
    </a>
    <a href="my_home.html" class="weui_tabbar_item">
      <div class="weui_tabbar_icon">
        <img src="/Wechat_media/Public/home/images/gerenzhongxin.png" alt="">
      </div>
      <p class="weui_tabbar_label">个人中心</p>
    </a>
  </div>
</div>
</body>
<script type="text/javascript" src="/Wechat_media/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/swiper.js"></script>
<script>
      $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
      });
    </script>
</html>