<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户推荐首页</title>
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
			position: absolute;
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
    	.conment_hd{
    		color: #000000;
    	}
	</style>
</head>

<body>
	<div class="weui_tab">
	  <div class="weui_navbar">
	    <a href='#tab1' class="weui_navbar_item weui_bar_item_on">
	      官方推荐
	    </a>
	    <a href='#tab2' class="weui_navbar_item">
	      用户推荐
	    </a>
	   
	  </div>
	  <!-- 主题内容 -->
	<div class="weui_tab_bd">
	    <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
	      <div class="weui-pull-to-refresh-layer">
	        <div class="pull-to-refresh-arrow"></div>
	        <div class="pull-to-refresh-preloader"></div>
	        <div class="down">下拉刷新</div>
	        <div class="up">释放刷新</div>
	        <div class="refresh">正在刷新...</div>
	      </div>
	       <div class="content" >

			   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lists): $mod = ($i % 2 );++$i;?><div class="weui_panel weui_panel_access">
					   <div class="weui_panel_bd">
						   <a href="<?php echo U('home/adminrcmd/media_content/ar_id');?>/<?php echo ($lists["ar_id"]); ?>">
							   <div class="media_hd">
								   <img class="weui_media_appmsg_thumb" src="<?php echo ($lists["thumb"]); ?>" alt="无图">
							   </div>
							   <div  class="conment_hd">
								   <h3 class="title"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($lists["title"]); ?></h3>
								   <p class="weui_media_desc">导演： <?php echo ($lists["director"]); ?></p>
								   <p class="weui_media_desc">主演： <?php echo ($lists["actor"]); ?></p>
								   <p class="weui_media_desc">
									   <?php echo ($lists["reason"]); ?>
								   </p>
							   </div>
							   </a>
							   <div class="weui_panel_hd">
								   <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"></a>
								   &nbsp;&nbsp;
								   <div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default delete"><p>删除</p><input hidden class="ar_id" value="<?php echo ($lists["ar_id"]); ?>"></div>
							   </div>
					   </div>
				   </div><?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
	   </div>


	    <div id="tab2" class="weui_tab_bd_item">
	      <div class="weui-pull-to-refresh-layer">
	        <div class="pull-to-refresh-arrow"></div>
	        <div class="pull-to-refresh-preloader"></div>
	        <div class="down">下拉刷新</div>
	        <div class="up">释放刷新</div>
	        <div class="refresh">正在刷新...</div>
	      </div>
	        <div class="content" >
                  <?php if(is_array($lt)): $i = 0; $__LIST__ = $lt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><div class="weui_panel weui_panel_access">
						  <div class="weui_panel_bd">
								  <div class="media_hd">
									  <img class="weui_media_appmsg_thumb" src="<?php echo ($l["thumb"]); ?>" alt="无图">
								  </div>
								  <div  class="conment_hd">
									  <h3 class="title"> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($l["title"]); ?></h3>
									  <p class="weui_media_desc">推荐人：<?php echo ($l["name"]); ?></p>
									  <p class="weui_media_desc">
										  推荐理由：<?php echo ($l["reason"]); ?>
									  </p>
								  </div>
								  <div class="weui_panel_hd">
									  <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"></a>
									  &nbsp;&nbsp;
									  <div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default delete"><p>删除</p><input hidden class="ur_id" value="<?php echo ($l["ur_id"]); ?>"></div>
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
	      <p class="weui_tabbar_label">官方推荐</p>
	    </a>
	    <a href="<?php echo U('home/usersrcmd/user_recommend_index');?>" class="weui_tabbar_item">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/yonghutuijian.png" alt="">
	      </div>
	      <p class="weui_tabbar_label">用户推荐</p>
	    </a>
	     
	    <a href="<?php echo U('home/usershome/my_home');?>" class="weui_tabbar_item">
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

<script type="text/javascript">
	// <!-- 下拉刷新 -->
	var url = "<?php echo U('home/usershome/renovate');?>";
	var url1 = "<?php echo U('home/adminrcmd/media_content/ar_id');?>/";


	$(".weui_tab_bd #tab1").pullToRefresh().on("pull-to-refresh", function() {
	  	$.post(url,{'tab':1},function(data) {
	  		data = eval(data);
			console.log(data);
	      $("#tab1 .content").html('');
					for(var i=0;i<data.length;i++){
						$("#tab1 .content").append(
					'<div class="weui_panel weui_panel_access">'+
								'<div class="weui_panel_bd">'+
								'<a href="'+url1+data[i].ar_id+'">'+
								'<div class="media_hd">'+
								'<img class="weui_media_appmsg_thumb" src="'+data[i].thumb+'" alt="无图">'+
								'</div>'+
								'<div  class="conment_hd">'+
								'<h3 class="title"> &nbsp;&nbsp;&nbsp;&nbsp;'+data[i].title+'</h3>'+
						'<p class="weui_media_desc">导演：'+ data[i].director+'</p>'+
						'<p class="weui_media_desc">主演：'+ data[i].actor + '</p>'+
						'<p class="weui_media_desc">'+
								data[i].reason +
					'</p>'+
						'</div>'+
						'</a>'+
						'<div class="weui_panel_hd">'+
								'<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"></a>'+
								'&nbsp;&nbsp;'+
					'<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"><p>删除</p><input hidden class="ar_id" value="'+data[i].ar_id+'"></div>'+
								'</div>'+
								'</div>'+
								'</div>'
					);
					}

	      $(".weui_tab_bd #tab1").pullToRefreshDone();
			collection_c();
	    })
	    });



	$(".weui_tab_bd #tab2").pullToRefresh().on("pull-to-refresh", function() {
	  	$.post(url,{'tab':2},function(data) {
	  		data = eval(data);
	      $("#tab2 .content").html('');
			for(var i=0;i<data.length;i++){
				$("#tab2 .content").append(
						'<div class="weui_panel weui_panel_access">'+
						'<div class="weui_panel_bd">'+
						'<a href="'+url1+data[i].ar_id+'">'+
						'<div class="media_hd">'+
						'<img class="weui_media_appmsg_thumb" src="'+data[i].thumb+'" alt="无图">'+
						'</div>'+
						'<div  class="conment_hd">'+
						'<h3 class="title"> &nbsp;&nbsp;&nbsp;&nbsp;'+data[i].title+'</h3>'+
						'<p class="weui_media_desc">推荐人：'+ data[i].name+'</p>'+
						'<p class="weui_media_desc">'+
						data[i].reason +
						'</p>'+
						'</div>'+
						'</a>'+
						'<div class="weui_panel_hd">'+
						'<a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"></a>'+
						'&nbsp;&nbsp;'+
						'<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default"><p>删除</p><input hidden class="ur_id" value="'+data[i].ur_id+'"></div>'+
						'</div>'+
						'</div>'+
						'</div>'
				);
			}
	      $(".weui_tab_bd #tab2").pullToRefreshDone();
			collection_c();
	    })
	    });
	function collection_c(){
		$(".delete").unbind().click(function () {
			var div = $(this).parent().parent().parent();
			var key = $(this).children("input").attr('class');
			var val = $(this).children("input").val();
			var url = "<?php echo U('home//usershome/collection_c');?>";
			$.post(url,{'val':val,'key':key},function (data) {
				if (data == '1'){
					div.remove();
				}
			});
		});
	}
	collection_c();
</script>
</html>