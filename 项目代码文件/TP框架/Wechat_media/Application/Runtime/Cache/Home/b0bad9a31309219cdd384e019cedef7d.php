<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人收藏</title>
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
		.media_hd{
			width: 25%;
			float: left;
			height: auto;
			position:absolute;
		}
		.media_hd img{
			width: 100%;
		}
		.conment_hd{
			width: 73%;	
			float: right;
		}
		.tuijianren{
			font-size: 12px;
		}
     	.weui_panel_hd{
     		float: right;
     	}
    	.weui_media_desc{
    		font-family: 'STXinwei'; 
    		font-size: 14px;
    	}
	</style>
</head>

<body>
	<div class="weui_tab">

	  <!-- 主题内容 -->
	<div class="weui_tab_bd">
	       <div class="content" >
			   <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="weui_panel weui_panel_access">
					   <div class="weui_panel_bd">

						   <div class="media_hd">
							   <img class="weui_media_appmsg_thumb" src="<?php echo ($list["thumb"]); ?>" alt="无图">
						   </div>
						   <div  class="conment_hd">
							   <h3 class="title"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($list["title"]); ?></h3>
							   <p class="tuijianren">推荐人： <?php echo ($list["name"]); ?></p>
							   <p class="weui_media_desc">
								   推荐理由：<?php echo ($list["reason"]); ?>
							   </p>
						   </div>
						   <div class="weui_panel_hd">
							   <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"></a>
							   &nbsp;&nbsp;
							   <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default">喜欢<?php echo ($list["parisecount"]); ?></a>
						   </div>
					   </div>
				   </div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	    </div>
  </div>

		  <!-- 底部导航栏 -->
		   <div class="weui_tabbar">
	    <a href="<?php echo U('home/adminrcmd/media_index');?>" class="weui_tabbar_item weui_bar_item_on">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/home.jpg" alt="">
	      </div>
	      <p class="weui_tabbar_label">影视推荐</p>
	    </a>
	    <a href="<?php echo U('home/usersrcmd/user_recommend_index');?>" class="weui_tabbar_item">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/yonghutuijian.png" alt="">
	      </div>
	      <p class="weui_tabbar_label">用户推荐</p>
	    </a>
	    
	    <a href="my_home.html" class="weui_tabbar_item">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/gerenzhongxin1.png" alt="">
	      </div>
	      <p class="weui_tabbar_label">个人中心</p>
	    </a>
	  </div>
	</div>

</body>
<script type="text/javascript" src="/Wechat_media/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/swiper.js"></script>
</html>