<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CH">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/home/lib/weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Public/home/css/jquery-weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Public/home/css/demos.css" type="text/css"/>
    <title><?php echo ($content["type"]); ?>:<?php echo ($content["title"]); ?></title>
    <style>
        body{
            width: 100%;
        }
        .weui_search_bar{
            width: 100%;
        }
        .vm {
            margin: 0;
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
            padding: 25px 0px;
        }
        .showmore{
            text-indent: 2.5em;
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
            line-height: 30px;
            margin-top:5px;
            font-size: 20px;
            color: white;
            background-color: #83829e;
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
            left: 85%;
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
        .editorialize{
            font-size: 20px;
            line-height: 30px;
            margin:0 2% 0 2%;
            color: white;
            text-indent: 4px;
            background-color: #83829e;
            position: relative;
            top: 20px;
        }

         .weui_cell .weui_cell_primary{
            border-radius: 4px;
            border:1px solid gray;
        }
        .shoucang{
            position: relative;
            left:80%;
            font-size: 18px;
            color: #888888;
            width: 20%;
        }
        .shoucang img{
            position: relative;
            left:50%;
            position:absolute;
            top: 0px;
            height: 26px;
        }
        .shoucang p{
            position: relative;
            right:30%;
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
                <p class="showmore"></p>
                <p>类型：<?php echo ($content['type']); ?></p>
        </div>
        <!--影视信息结束-->
        <!--简介-->
       <div class="bi">
            <div class="bit">简介：</div>
            <div class="btc">
                <div id="box">
            <p><?php echo ($content['introduce']); ?></p>
                </div>
            </div>
           <div class="shoucang" >
               <p>收藏</p><img src="/Public/home/images/shoucangqian.png">
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
                        <p><img  src="/Public/home/images/zanqian.png"/><?php echo ($comment["parisecount"]); ?></p><input class="id" hidden value="<?php echo ($comment["c_id"]); ?>">
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
                    <textarea class="weui_textarea" placeholder="说点什么吧" rows="4"></textarea>
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
<script src="/Public/home/lib/jquery-2.1.4.js"></script>
<script src="/Public/home/lib/fastclick.js"></script>
<script src="/Public/home/js/jquery-weui.js"></script>
<script>
    var MAX_LENGTH=200; //最大输入字数
    var img = "/Public/home/images/zanqian.png";
    var src = "/Public/home/images/zanhou.png";
    var prev ="/Public/home/images/shoucangqian.png";
    var next = "/Public/home/images/shoucang.png";
    var mediaId = "<?php echo ($content["ar_id"]); ?>";
        $(document).ready(function(){
            //保持点赞样式
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
            //保持收藏样式
            $.post("<?php echo U('home/adminrcmd/keep');?>",{"mediaId":mediaId},function (data) {
                data=eval(data);
                console.log(data);
                if(data==1){
                    $('.shoucang').children('img').attr('src',next);
                    $('.shoucang').children('p').text('已收藏');
                }
            })
        });
    //点赞
    $('.zan').unbind('click').on('click',function () {
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
    //评论动态显示字数
    $(".weui_textarea").keyup(function () {
        var len = $(".weui_textarea").val().length;
        if (len>MAX_LENGTH){
            $.toast("您的字数达到最大限制了",'text');
            $(this).val($(this).val().substring(0,MAX_LENGTH));
        }
        var length = $(".weui_textarea").val().length;
        $(".OK").text(length );
    });
    //点击更多加载
    $(".more").on('click',function () {
        $(".showmore").text($(this).parent().children('input').val());
        $(this).hide();
    })
</script>

<script>
    function show(){
        var box = document.getElementById("box");
        var text = box.innerHTML;
        var newBox = document.createElement("div");
        var btn = document.createElement("a");
        newBox.innerHTML = text.substring(0,148);
        btn.innerHTML = text.length > 148 ? "更多" : "";
        btn.href = "###";
        btn.onclick = function(){
            if (btn.innerHTML == "更多"){
                btn.innerHTML = "收起";
                newBox.innerHTML = text;
            }else{
                btn.innerHTML = "更多";
                newBox.innerHTML = text.substring(0,148);
            }
        }
        box.innerHTML = "";
        box.appendChild(newBox);
        box.appendChild(btn);
    }
    show();
    /*
       刷新页面保持收藏样式
   */
    /*
    收藏事件
     */
    var url="<?php echo U('home/adminrcmd/admin_collection');?>";
    $('.shoucang').unbind('click').on('click',function () {

        var mediaId = "<?php echo ($content["ar_id"]); ?>";
        var img = $(this).children('img').attr('src');
        if(img==prev){
            $.post(url,{"mediaId":mediaId});
            $(this).children('img').attr('src',next);
            $(this).children('p').text('已收藏');
        }
        else if(img==next){
            $.post("<?php echo U('home/adminrcmd/admin_collection_c');?>",{"mediaId":mediaId});
            $(this).children('img').attr('src',prev);
            $(this).children('p').text('收藏');
        }
    });
</script>

</html>