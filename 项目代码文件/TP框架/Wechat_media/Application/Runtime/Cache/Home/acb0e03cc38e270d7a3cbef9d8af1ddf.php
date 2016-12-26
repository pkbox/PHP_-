<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>评论页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/home/lib/weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Public/home/css/jquery-weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Public/home/css/demos.css" type="text/css"/>
    <style>
        h1{
            text-align: center;
            font-size: inherit;
        }
        .username{
            width: auto;
            height: auto;
            float: left;
            font-size: 12px;
            color: #5a5a5a;
        }
        .time{
            width: auto;
            height: auto;
            float: left;
            font-size: 12px;
            color: #cccccc;
            position:relative;left:5%;
        }
        .zan{
            position: absolute;
            left: 85%;
            top: 15px;
        }
        .comment_content{
            padding: 10px 15px 10px 30px;
        }
        .weui_search_bar{
            width: 100%;
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
        .comment{
            display: none;
            position: absolute;
            top: 0%;
            width: 100%;
            height: auto;
        }
        .praise{
            background: #3CC51F;
        }
        .weui_cell .weui_cell_primary{
            border-radius: 4px;
            border:1px solid gray;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">
        <div class="weui-pull-to-refresh-layer">

        </div>
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
                        <p><img src="/Public/home/images/zanqian.png"/><?php echo ($comment["parisecount"]); ?></p><input class="id" hidden value="<?php echo ($comment["c_id"]); ?>">
                    </div>
                </div>
                <div class="comment_content">
                    <p><?php echo ($comment["content"]); ?></p>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="weui-infinite-scroll">
            
        </div>
    </div>
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
<script src="/Public/home/lib/jquery-2.1.4.js"></script>
<script src="/Public/home/lib/fastclick.js"></script>
<script src="/Public/home/js/jquery-weui.js"></script>
<script>
    var MAX_LENGTH=200; //最大输入字数
    var img = "/Public/home/images/zanqian.png";
    var src = "/Public/home/images/zanhou.png";
//    检查是否点过赞
    function praisecheck() {
        $.post("<?php echo U('home/adminrcmd/getsession');?>",function (data) {
            var session = jQuery.parseJSON(data)
            $.each(session,function (n,value) {
                $(".id").each(function () {
                    var id = $(this).val();
                    if (id == value){
                        $(this).prev().children('img').attr("src",src);
                    }
                });
            })
        });
    }
    function append(data,cla) {
        for (i = 0; i < data.length; i++) {
            $(cla).append('<div class="weui_cell">'+
                    '<div class="head">'+
                    '<img src="'+data[i].userimg+'">'+
                    '</div>'+
                    '<div class="username">'+
                    '<p>'+data[i].username+'</p>'+
                    '</div>'+
                    '<div class="time">'+
                    '<p>'+data[i].time+'</p>'+
                    '</div>'+
                    '<div class="zan">'+
                    '<p><img src="/Public/home/images/zanqian.png"/>'+data[i].parisecount+'</p><input class="id" hidden value="'+data[i].c_id+'">'+
                    '</div>'+
                    '</div>'+
                    '<div class="comment_content">'+
                    '<p>'+data[i].content+'</p>'+
                    '</div>')
        }
    }
    $(document).ready(function(){
        praisecheck();
    });
    $(".weui_tab_bd").pullToRefresh().on("pull-to-refresh", function() {
        var url = "<?php echo U('home/adminrcmd/newcomment');?>";
        var ar_id = "<?php echo ($ar_id); ?>";
        $.post(url,{'ar_id':ar_id},function (data) {
            var comments = jQuery.parseJSON(data);
            $(".weui_tab_bd .weui_cells").html('')
            append(comments,".weui_tab_bd .weui_cells");
            $(".weui_tab_bd").pullToRefreshDone();
            praise();
            praisecheck();
        });
    });
//点赞功能函数
    function praise() {
        $(".zan").unbind('click').on('click',function(){
            var id = $(this).children('.id').val();//获取评论id
            var num = $(this).children('p').text();//获取点赞数量
            var cimg = $(this).children('p').children('img').attr("src");
            if (cimg==src){
                var url="<?php echo U('home/adminrcmd/praise_c');?>";
                $.post(url,{"c_id":id});
                num = num*1-1;
                $(this).children('p').html('<img src="'+img+'" />'+num);
            }else if(cimg==img){
                var url="<?php echo U('home/adminrcmd/praise');?>";
                $.post(url,{"c_id":id});
                num = num*1+1;
                $(this).children('p').html('<img src="'+ src+'" />'+num);
            }
        });
    }
praise();
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
    //发表评论
    $(".weui_btn_primary").click(function () {
        var content=$(".weui_textarea").val();
        if(content==''){
            $.toast("请输入评论内容",'text');
        }else {
            var url="<?php echo U('home/adminrcmd/comment_publish');?>";
            var mediaid="<?php echo ($ar_id); ?>";
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
    $(".weui_tab_bd").infinite();
    var loading = false;
    var p=1;
    $(".weui_tab_bd").infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
        var url = "<?php echo U('home/adminrcmd/commentpage');?>";
        var ar_id = "<?php echo ($ar_id); ?>";
        $.post(url,{'ar_id':ar_id,'p':p},function (data) {
            if (data=='0'){
                $.toast('没有更多评论了!','text');
                $(".weui-infinite-scroll").hide();
            }else{
                var comments = jQuery.parseJSON(data);
                append(comments,".weui_tab_bd .weui_cells");
                p++;
                praise();
                praisecheck();
                loading = false;
            }
        });
    });
</script>
</html>