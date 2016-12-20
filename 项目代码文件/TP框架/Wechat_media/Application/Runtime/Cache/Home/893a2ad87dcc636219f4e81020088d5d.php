<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CH">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Wechat_media/Public/home/lib/weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/jquery-weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/demos.css" type="text/css"/>
    <title>电影内容页</title>
    <style>
        .weui_search_bar{
            width: 100%;
        }
        .vm{
            margin:0;
        }
        .vm img{
            width: 100%;
            height:auto;
        }
        #oval{
            width:80%;
            position: relative;
            left: 10%;
            right: 10%;
            top: 10px;
            background-color:#FFFFFF ;
            border-radius: 50%/100%;
            border:1px solid #000000;
            text-align: center;
            padding: 25px 0px;
        }
        .bi{
            position: relative;
            top: 10px;
            width:auto;
            height:auto;
            margin:10px 2%;

        }
        .bit{
            width:100%;
            height:30px;
            margin-top:5px;
            font-size: 20px;
            background-color:#c13e3e;
            text-indent: 4px;
        }
        .btc{
            margin:5px 10px;
        }
        .bp{
            font-size: 15px;
            margin:5px 0.5%;
            text-indent:2em;
        }
        .username{
            width: auto;
            height: auto;
            float: left;
            font-size: 12px;
            color: #5a5a5a;
        }
        .zan{
            position: absolute;
            right: 5%;
            top: 15px;
        }
        .time{
            width: auto;
            height: auto;
            float: left;
            font-size: 12px;
            color: #cccccc;
            position:relative;left:5%;
        }
        .head{
            float: left;
            width: 35px;
            height: 35px;
        }
        .head img{
            width: 100%;
            height: 100%;
        }
        .background{
            display: none;
            position: absolute;
            top: 0%;
            width: 100%;
            height: 100%;
            background: #111;
            opacity: 0.6;
        }
        .comment_content{
            text-indent:2em;
        }
        .praise{
            background: #3CC51F;
        }
        .comment{
            display: none;
            position: absolute;
            top: 0%;
            width: 100%;
            height: auto;
        }
        .more{
            color: #a1a1a1;
        }
        .black{
            color: #000;
        }
        .editorialize{
            font-size: 20px;
            margin:0 2% 0 2%;
            background-color:#c13e3e;
            position: relative;
            top: 20px;
            text-indent:4px;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <!--页面主体-->
    <div class="weui_tab_bd">
        <!--影视金曲-->
        <div class="vm">
            <img src="<?php echo ($content['contentimg']); ?>" />
        </div>
            <!--音乐播放器-->
        <div>
        </div>
        <!--结束影视金曲-->
        <!--影视信息开始-->
        <div id="oval">
                <p>导演：<?php echo ($content['director']); ?></p>
                <p>主演：<?php echo ($content['actor']['0']); ?><a href="javascript:void(0);" class="more">//更多</a><input hidden value="<?php echo ($content['actor']['1']); ?>"></p>
                <p>类型：<?php echo ($content['type']); ?></p>
        </div>
        <!--影视信息结束-->
        <!--简介-->
        <div class="bi">
            <div class="bit">简介：</div>
            <div class="btc">
                <div class="bp">
                    <p><?php echo ($content['introduce']); ?></p>
                </div>
            </div>
        </div>
        <!--结束简介-->
        <!--评论-->
        <div class="editorialize">快评:</div>
        <div class="weui_cells">
            <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="weui_cell">
                    <div class="head">
                        <img src="<?php echo ($comment["userimg"]); ?>">
                    </div>
                    <div class="username">
                        <p><?php echo ($comment["username"]); ?></p>
                    </div>
                    <div class="time">
                        <p><?php echo (date("Y-m-d H:i",$comment["time"])); ?></p>
                    </div>
                    <div class="zan">
                        <div class="weui_btn weui_btn_mini weui_btn_default"><p>赞<?php echo ($comment["parisecount"]); ?></p><input class="id" hidden value="<?php echo ($comment["c_id"]); ?>"></div>
                    </div>
                </div>
                <div class="comment_content">
                    <p><?php echo ($comment["content"]); ?></p>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <a href="<?php echo U('home/adminrcmd/media_comment/id');?>/<?php echo ($content["ar_id"]); ?>" class="weui_btn weui_btn_default">点击查看更多</a>
        </div>
        <!--结束评论-->
    </div>
    <!--主体结束-->
    <!--评论弹出框-->
    <div class="background"></div>
    <div class="comment">
        <div class="weui_cells weui_cells_form">
            <div class="weui_cell">
                <div class="weui_cell_bd weui_cell_primary">
                    <textarea class="weui_textarea" placeholder="请输入评论" rows="4"></textarea>
                    <div class="weui_textarea_counter"><span class="OK">0</span>/200</div>
                </div>
            </div>
        </div>
        <a href="javascript:;" class="weui_btn weui_btn_primary">发表</a>
    </div>

    <!--结束评论弹出框-->
    <div class="weui_tabbar">
        <div class="weui_search_bar" id="search_bar">
            <form class="weui_search_outer">
                <div class="weui_search_inner">
                    <input type="text" class="weui_search_input" placeholder="我来说两句" required="" value="">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="/Wechat_media/Public/home/lib/jquery-2.1.4.js"></script>
<script src="/Wechat_media/Public/home/lib/fastclick.js"></script>
<script src="/Wechat_media/Public/home/js/jquery-weui.js"></script>
<script>
    var MAX_LENGTH=200; //最大输入字数
    $(document).ready(function(){
        $.post("<?php echo U('home/adminrcmd/getsession');?>",function (data) {
            var session = jQuery.parseJSON(data)
            $.each(session,function (n,value) {
                $(".id").each(function () {
                    var id = $(this).val();
                    if (id == value){
                        $(this).parent().addClass("praise");
                    }
                });
            })
        });
    });
    $(".weui_tab_bd .weui_cells .weui_btn_mini").unbind('click').on('click',function(){
        var classname = $.trim($(this).attr('class')).substr(-6);
        var id = $(this).children(".id").val();
        var num = parseInt($.trim($(this).text()).substr(1));
        if (classname=='praise'){
            var url="<?php echo U('home/adminrcmd/praise_c');?>";
            $.post(url,{"c_id":id});
            num = num-1;
            $(this).removeClass("praise");
        }else{
            var url="<?php echo U('home/adminrcmd/praise');?>";
            $.post(url,{"c_id":id});
            num = num+1;
            $(this).addClass("praise");
        }
        $(this).children('p').text('赞'+num);
    });
    $(".weui_tabbar").click(function () {
        $(".comment").show();
        $(".background").show();
        $(".weui_tabbar").hide();
    });
    $(".background").click(function () {
        $(".weui_search_input").val($(".weui_textarea").val());
        $(".comment").hide();
        $(".background").hide();
        $(".weui_tabbar").show();
    });
    $(".weui_btn_primary").click(function () {
        var content=$(".weui_textarea").val();
        if(content==''){
            $.toast("请输入评论内容",'text');
        }else {
            var url="<?php echo U('home/adminrcmd/comment_publish');?>";
            var mediaid="<?php echo ($content["ar_id"]); ?>";
            $.post(url, {'content':content,'mediaid':mediaid},function (data) {
                if (data=='1'){
                    $(".comment").hide();
                    $(".background").hide();
                    $(".weui_tabbar").show();
                    $.toast('发表成功');
                    $(".weui_textarea").val('');
                    $(".weui_search_input").val('');
                }
            });
        }
    });
    $(".weui_textarea").keyup(function () {
        var len = $(".weui_textarea").val().length;
        if (len>MAX_LENGTH){
            $.toast("您的字数达到最大限制了",'text');
            $(this).val($(this).val().substring(0,MAX_LENGTH));
        }
        var length = $(".weui_textarea").val().length;
        $(".OK").text(length );
    });
    $(".more").on('click',function () {
        $(this).text($(this).parent().children('input').val());
        $(this).removeClass('more');
        $(this).addClass('black');
    })
</script>
</html>