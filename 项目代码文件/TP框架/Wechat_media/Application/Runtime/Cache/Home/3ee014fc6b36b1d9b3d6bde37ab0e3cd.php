<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>电影推荐列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Wechat_media/Public/home/lib/weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/jquery-weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/demos.css" type="text/css"/>
    <style>
        .media_hd{
            width: 25%;
            height: auto;
        }
        .media_appmsg_thumb{
            width: 100%;
        }
        .media_desc{
            float: right;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">
        <div class="weui-pull-to-refresh-layer">
            <div class='pull-to-refresh-arrow'></div>
            <div class='pull-to-refresh-preloader'></div>
            <div class="down">下拉刷新</div>
            <div class="up">释放刷新</div>
            <div class="refresh">正在刷新</div>
        </div>
        <!--页面主体-->
        <div class="content">

            <?php if(is_array($admin_recommend_lists)): $i = 0; $__LIST__ = $admin_recommend_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lists): $mod = ($i % 2 );++$i;?><div class="weui_panel weui_panel_access">
                    <div class="weui_panel_bd">
                        <a href="<?php echo U('home/adminrcmd/media_content/ar_id');?>/<?php echo ($lists["ar_id"]); ?>" class="weui_media_box weui_media_appmsg">
                            <div class="media_hd">
                                <img class="media_appmsg_thumb" src="<?php echo ($lists["thumb"]); ?>" alt="">
                            </div>
                            <div class="weui_media_bd">
                                <h4 class="weui_media_title"><?php echo ($lists["title"]); ?></h4>
                                <p class="weui_media_desc">主演:<?php echo ($lists["actor"]); ?></p>
                                <p class="weui_media_desc">导演:<?php echo ($lists["director"]); ?></p>
                                <p class="weui_media_desc">上映时间:<?php echo ($lists["time"]); ?></p>
                                <p class="weui_media_desc"><?php echo ($lists["reason"]); ?></p>
                                <p class="media_desc">评分:<?php echo ($lists["score"]); ?></p>
                            </div>
                        </a>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>

        </div>

    <div class="weui-infinite-scroll">
        <div class="infinite-preloader"></div>
        正在加载
    </div>
        <!--页面主体结束-->
    </div>

    <div class="weui_tabbar">
        <a href="<?php echo U('home/adminrcmd/media_index');?>" class="weui_tabbar_item weui_bar_item_on">
            <div class="weui_tabbar_icon">
                <img src="/Wechat_media/Public/home/images/shouye.png" alt="">
            </div>
            <p class="weui_tabbar_label">主页</p>
        </a>
        <a href="<?php echo U('home/adminrcmd/media_music');?>" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="/Wechat_media/Public/home/images/yingshiyinyue.png" alt="">
            </div>
            <p class="weui_tabbar_label">音乐</p>
        </a>
        <a href="<?php echo U('home/usershome/my_home');?>" class="weui_tabbar_item">
            <div class="weui_tabbar_icon">
                <img src="/Wechat_media/Public/home/images/gerenzhongxin.png" alt="">
            </div>
            <p class="weui_tabbar_label">个人中心</p>
        </a>
    </div>
</div>
<script src="/Wechat_media/Public/home/lib/jquery-2.1.4.js"></script>
<script src="/Wechat_media/Public/home/lib/fastclick.js"></script>
<script src="/Wechat_media/Public/home/js/jquery-weui.js"></script>
<script>
    $(function() {
        FastClick.attach(document.body);
    });
</script>
<script>
var p = 0;
var type_id = "<?php echo ($type_id); ?>";
    $(".weui_tab_bd").infinite();
    var loading = false;
    $(".weui_tab_bd").infinite().on("infinite", function() {

        if(loading) return;
        loading = true;
        <!-- 滚动加载数据库数据-->
        var url = "<?php echo U('home/Adminrcmd/page');?>";

        $.post(url,{'p':p,'type_id':type_id},function(data){
            <!-- 1.将josn字符串转为对象-->
            data=eval(data);
//            console.log(data);
            <!-- 2.显示加载数据-->
            for (i=0;i<data.length;i++){
                $(".content").append(
                        '<div class="weui_panel weui_panel_access">'+
                        '<div class="weui_panel_bd">'+
                        '<a href="'+"<?php echo U('home/adminrcmd/media_content/ar_id');?>/"+ data[i].ar_id+ '" class="weui_media_box weui_media_appmsg">'+
                        '<div class="media_hd">'+
                        '<img class="media_appmsg_thumb" src="'+data[i].thumb+'" alt="">'+
                        '</div>'+
                        '<div class="weui_media_bd">'+
                        '<h4 class="weui_media_title">'+data[i].title+'</h4>'+
                        '<p class="weui_media_desc">主演:'+data[i].actor+'</p>'+
                        '<p class="weui_media_desc">导演:'+data[i].director+'</p>'+
                        '<p class="weui_media_desc">上映时间:'+data[i].time+'</p>'+
                        '<p class="weui_media_desc">'+data[i].reason+'</p>'+
                        '<p class="media_desc">评分:'+data[i].score+'</p>'+
                        '</div>'+
                        '</a>'+
                        '</div>'+
                        '</div>');
            }
            p = p+1;
            <!--3.重置滚动事件-->
            loading = false;
            });
    });

<!-- 刷新-->
    $(".weui_tab_bd").pullToRefresh().on("pull-to-refresh", function() {

        var url = "<?php echo U('home/Adminrcmd/renovate');?>";
        $.post(url,{'type_id':type_id},function(data) {
            <!-- 1.将josn字符串转为对象-->
            data=eval(data);
//            console.log(data);
            <!-- 2.显示加载数据-->

                $(".content").html(
                        '<div class="weui_panel weui_panel_access">'+
                        '<div class="weui_panel_bd">'+
                        '<a href="'+"<?php echo U('home/adminrcmd/media_content/ar_id');?>/"+ data[0].ar_id+ '" class="weui_media_box weui_media_appmsg">'+
                        '<div class="media_hd">'+
                        '<img class="media_appmsg_thumb" src="'+data[0].thumb+'" alt="">'+
                        '</div>'+
                        '<div class="weui_media_bd">'+
                        '<h4 class="weui_media_title">'+data[0].title+'</h4>'+
                        '<p class="weui_media_desc">主演:'+data[0].actor+'</p>'+
                        '<p class="weui_media_desc">导演:'+data[0].director+'</p>'+
                        '<p class="weui_media_desc">上映时间:'+data[0].time+'</p>'+
                        '<p class="weui_media_desc">'+data[0].reason+'</p>'+
                        '<p class="media_desc">评分:'+data[0].score+'</p>'+
                        '</div>'+
                        '</a>'+
                        '</div>'+
                        '</div>');
            for (i=1;i<data.length;i++){
                $(".content").append(
                        '<div class="weui_panel weui_panel_access">'+
                        '<div class="weui_panel_bd">'+
                        '<a href="'+"<?php echo U('home/adminrcmd/media_content/ar_id');?>/"+ data[i].ar_id+ '" class="weui_media_box weui_media_appmsg">'+
                        '<div class="media_hd">'+
                        '<img class="media_appmsg_thumb" src="'+data[i].thumb+'" alt="">'+
                        '</div>'+
                        '<div class="weui_media_bd">'+
                        '<h4 class="weui_media_title">'+data[i].title+'</h4>'+
                        '<p class="weui_media_desc">主演:'+data[i].actor+'</p>'+
                        '<p class="weui_media_desc">导演:'+data[i].director+'</p>'+
                        '<p class="weui_media_desc">上映时间:'+data[i].time+'</p>'+
                        '<p class="weui_media_desc">'+data[i].reason+'</p>'+
                        '<p class="media_desc">评分:'+data[i].score+'</p>'+
                        '</div>'+
                        '</a>'+
                        '</div>'+
                        '</div>');
            }
            $(".weui_tab_bd").pullToRefreshDone();
        });
    });

</script>
</body>
</html>