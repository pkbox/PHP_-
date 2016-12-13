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
			position: ;
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
		.color{
			background: #ee8a87;
		}
	</style>
</head>

<body>
	<div class="weui_tab">
	  <div class="weui_navbar">
	    <a href='#tab1' class="weui_navbar_item weui_bar_item_on">
	      按热度
	    </a>
	    <a href='#tab2' class="weui_navbar_item">
	      按时间
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
			   <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="weui_panel weui_panel_access">
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
								<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default collection"><p>收藏</p><input hidden class="id" value="<?php echo ($list["ur_id"]); ?>"></div>
								&nbsp;&nbsp;
								<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default praise"><p>喜欢<?php echo ($list["parisecount"]); ?></p><input hidden class="id" value="<?php echo ($list["ur_id"]); ?>"></div>
							</div>
						  </div>
					    </div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="weui-infinite-scroll">
	            <div class="infinite-preloader"></div>
	            正在加载
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
								<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default collection"><p>收藏</p><input hidden class="id" value="<?php echo ($list["ur_id"]); ?>"></div>
								&nbsp;&nbsp;
								<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default praise"><p>喜欢<?php echo ($list["parisecount"]); ?></p><input hidden class="id" value="<?php echo ($list["ur_id"]); ?>"></div>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="weui-infinite-scroll">
	            <div class="infinite-preloader"></div>
	            正在加载
        	</div>
	    </div>
	    
  </div>

		  <!-- 底部导航栏 -->
		   <div class="weui_tabbar">
	    <a href="user_recommend_index.html" class="weui_tabbar_item weui_bar_item_on">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/home.png" alt="">
	      </div>
	      <p class="weui_tabbar_label">主页</p>
	    </a>
	    <a href=" user_recommend_search.html" class="weui_tabbar_item">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/sousuo.png" alt="">
	      </div>
	      <p class="weui_tabbar_label">搜索</p>
	    </a>
	    <a href="user_recommend.html" class="weui_tabbar_item">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/woyaotuijian.png" alt="">
	      </div>
	      <p class="weui_tabbar_label">我要推荐</p>
	    </a>
	    <a href="<?php echo U('home/usershome/my_home');?>" class="weui_tabbar_item">
	      <div class="weui_tabbar_icon">
	        <img src="/Wechat_media/Public/home/images/gerenzhongxin10.png" alt="">
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
	var hotP = 0;
	var timeP = 0;
<!--加载数据函数-->
function append(data,cla) {
	for(i=0;i<data.length;i++) {
		$(cla).append(
				'<div class="weui_panel weui_panel_access">' +
				'<div class="weui_panel_bd">' +
				'<div class="media_hd">' +
				'<img class="weui_media_appmsg_thumb" src=" ' + data[i].thumb + '" alt="无图">' +
				'</div>' +
				'<div  class="conment_hd">' +
				'<h3 class="title"> &nbsp;&nbsp;&nbsp;&nbsp;' + data[i].title + '</h3>' +
				'<p class="tuijianren">推荐人：' + data[i].name + '</p>' +
				'<p class="weui_media_desc">' +
				'推荐理由：' + data[i].reason +
				'</p>' +
				'</div>' +
				'<div class="weui_panel_hd">' +
				'<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default collection"><p>收藏</p><input hidden class="id" value="'+data[i].ur_id+'"></div>' +
				'&nbsp;&nbsp;' +
				'<div href="javascript:;" class="weui_btn weui_btn_mini weui_btn_default praise"><p>喜欢' + data[i].parisecount + '</p><input hidden class="id" value="'+data[0].ur_id+'" /></div>' +							'</div>' +
				'</div>' +
				'</div>');
	}
}
	//            判定用户是否收藏
	function collectioncheck() {
		$.post("<?php echo U('home/usersrcmd/getcollection');?>",function (data) {
			var collection = jQuery.parseJSON(data)
			$.each(collection,function (n,value) {
				$(".collection .id").each(function () {
					var id = $(this).val();
					if (id == value.mediaid){
						$(this).parent().addClass("color");
					}
				});
			})
		});
	}
	//            判断用户是否点赞
	function praisecheck() {
		$.post("<?php echo U('home/usersrcmd/getsession');?>",function (data) {
			var session = jQuery.parseJSON(data)
			$.each(session,function (n,value) {
				$(".praise .id").each(function () {
					var id = $(this).val();
					if (id == value){
						$(this).parent().addClass("color");
					}
				});
			})
		});
	}
	//    收藏功能函数
	function collection() {
		$(".collection").unbind('').click(function(){
			var classname = $.trim($(this).attr('class')).substr(-5);
			var id = $(this).children(".id").val();
			if (classname=='color'){

			}else{
				var url="<?php echo U('home/usersrcmd/collection');?>";
				$.post(url,{"mediaid":id});
				$(this).addClass("color");
			}
		});
	}
	//    点赞功能函数
	function praise() {
		$(".praise").unbind('click').on('click',function(){
			var classname = $.trim($(this).attr('class')).substr(-5);
			var id = $(this).children(".id").val();
			var num = parseInt($.trim($(this).text()).substr(2));
			if (classname=='color'){
				var url="<?php echo U('home/usersrcmd/praise_c');?>";
				$.post(url,{"ur_id":id});
				num = num-1;
				$(this).removeClass("color");
			}else{
				var url="<?php echo U('home/usersrcmd/praise');?>";
				$.post(url,{"ur_id":id});
				num = num+1;
				$(this).addClass("color");
			}
			$(this).children('p').text('喜欢'+num);
		});
	}

	collection();
	praise();
	collectioncheck();
	praisecheck();

	 <!-- 下拉刷新 -->

	 var url = "<?php echo U('home/usersrcmd/renovate');?>";

	<!--按热度刷新-->
	$(".weui_tab_bd #tab1").pullToRefresh().on("pull-to-refresh", function() {
	  	$.post(url,{'p':'A'},function(data) {
			data=eval(data);
		  $("#tab1 .content").html('');
			append(data,"#tab1 .content");
			$(".weui_tab_bd #tab1").pullToRefreshDone();
			hotP = 0;
			collection();
			praise();
			collectioncheck();
			praisecheck();

		})
	});

<!--按时间刷新-->
	$(".weui_tab_bd #tab2").pullToRefresh().on("pull-to-refresh", function() {
		$.post(url,{'p':'B'},function(data) {
			data=eval(data);
			$("#tab2 .content").html('');
			append(data,"#tab2 .content");
			$(".weui_tab_bd #tab2").pullToRefreshDone();
			timeP = 0;
			collection();
			praise();
			collectioncheck();
			praisecheck();

		})
	});

<!--滚动加载-->

  	<!--滚动加载按热度列表-->

$(".weui_tab_bd #tab1").infinite();
    var loading = false;
    $(".weui_tab_bd #tab1 ").infinite().on("infinite", function() {

        if(loading) return;
        loading = true;
        $.post(url,{'type':'A','l':hotP},function(data) {
			data=eval(data);
			append(data,".weui_tab_bd #tab1 .content");
		   	hotP = hotP+1;
			loading = false;
			collection();
			praise();
			collectioncheck();
			praisecheck();
        });
    });

  	<!--滚动加载按时间列表-->
$(".weui_tab_bd #tab2").infinite();
    var loading = false;
    $(".weui_tab_bd #tab2 ").infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
		$.post(url,{'type':'B','l':timeP},function(data) {
			data=eval(data);
			append(data,".weui_tab_bd #tab2 .content");
			timeP = timeP+1;
			loading = false;
			collectioncheck();
			praisecheck();
			collection();
			praise();
		});
    });
</script>
</html>