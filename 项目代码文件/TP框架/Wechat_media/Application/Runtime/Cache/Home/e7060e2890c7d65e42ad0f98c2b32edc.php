<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <title>关于我们</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/home/lib/weui.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/home/css/jquery-weui.min.css">
    <style>
         html,body{
        height: 100%;
        font-size:20px;
        line-height:30px;
        }
        .weui_media_hd img{
          height: 200px;
          top: 100px;
        }
        .weui_ini{
        	word-break:break-all;
          font-size: 19px;
          text-align: center;
        }
        .images{
          text-align:center;
        }
        .weui_bbt{
          text-align: center;
          font-family: 幼圆;
        }
        .weui_navbar_item{
          padding: 7px 0;
        }
        .weui_tab_bd{
        background-image: url(/Public/home/images/beijing4.jpg);
        }
        .kk{
             color: #666666;
             font-size: 0.8em;
        }
    </style>
</head>
<body> 
   <div class="weui_tab">
    <!--<div class="weui_navbar">-->
      <!---->
      <!--<a href="#" class="weui_navbar_item weui_bar_item_on">-->
        <!--关于我们-->
      <!--</a>-->
  <!--</div>-->
  <div class="weui_tab_bd">

	<div class="weui_ini">
      <p> &nbsp; &nbsp; 欢迎来到影音微评！这里是电影的海洋,唯美的世界。旨为大家提供最新，最好看的电影。</p>
  </div>

    <div class="images">
    <img src="/Public/home/images/erweima.png" height="200px"><p class="kk">点关注，不迷路.  </p>
    <p class="kk">  随时随地获取最新电影信息。 </p>
    </div>

    <div class="weui_bbt">
       <table>
       <tr>
        <td><h6> </h6></td>
      </tr>
      </table>
    </div>
        
    <div class="weui_tabbar">
      <a href="<?php echo U('home/adminrcmd/media_index');?>" class="weui_tabbar_item ">
        <div class="weui_tabbar_icon">
          <img src="/Public/home/images/home.jpg" alt="">
        </div>
        <p class="weui_tabbar_label">影视推荐</p>
      </a>
      <a href="<?php echo U('home/usersrcmd/user_recommend_index');?>" class="weui_tabbar_item">
        <div class="weui_tabbar_icon">
          <img src="/Public/home/images/yonghutuijian.png" alt="">
        </div>
        <p class="weui_tabbar_label">用户推荐</p>
      </a>
      
      <a href="my_home.html" class="weui_tabbar_item">
        <div class="weui_tabbar_icon">
          <img src="/Public/home/images/gerenzhongxin1.png" alt="">
        </div>
        <p class="weui_tabbar_label">个人中心</p>
      </a>
    </div>
  </div>
</body>
<script type="text/javascript" src="/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/Public/home/js/swiper.js"></script>
</html>