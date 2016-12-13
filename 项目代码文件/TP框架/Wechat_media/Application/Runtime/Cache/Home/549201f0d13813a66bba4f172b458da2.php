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
            border:1px solid #000000;
        }
        .bit{
            width:100%;
            height:30px;
            margin-left:1%;
            margin-top:5px;
            font-size: 20px;
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
    </style>
</head>
<body>
<div class="weui_tab">
    <!--页面主体-->
    <div class="weui_tab_bd">
        <!--影视金曲-->
        <div class="vm">
            <img src="/Wechat_media/Public/home/images/p2395639631.jpg" />
        </div>
            <!--音乐播放器-->
        <div>
        </div>
        <!--结束影视金曲-->
        <!--影视信息开始-->
        <div id="oval">
                <p>导演：新海诚</p>
                <p>主演：长泽雅美<a href="javascript:void(0);" class="more">//更多</a><input hidden value="/长泽雅美/长泽雅美/长泽雅美"></p>
                <p>类型：剧情/爱情/动画</p>
        </div>
        <!--影视信息结束-->
        <!--简介-->
        <div class="bi">
            <div class="bit">简介：</div>
            <div class="btc">
                <div class="bp">
                    <p>男女主人公两条线索，各自像正常的青春男女生那样生活，一个东京大都市的普通男孩，一个在系守町的乡村邻家女孩，两个人都处于成长的甜蜜与烦恼中，泷喜欢师姐，却没有勇气表达，每天在波澜不惊中暗自发着白日梦，三叶作为长女，生理发育的微妙期，却生活在单调之中，还要为继承家族神社仪式。</p>
                    <p>两个这么平淡无奇的角色，从有津津有味一直讲到情感爆发，在彗星造访地球前的某天早上，三叶和泷这两个相隔甚远的人，竟然灵魂互换，醒来时变成了远方的他/她。在这一段互换各自身体的阶段，影片主要描写两个人对各自身体的好奇从呼吸全新的空气，到开始互相惦记，而后开始用手机记录，交流，泷以三叶的身体醒来后摸着两个尚未全熟的胸部，让人发笑，三叶替泷完成了人生的第一次约会，画面的情绪渐渐的浪漫起来。影片在这个阶段喜感十足又春意盎然。</p>
                    <p>从泷意识到两人不再互相交换开始，影片的节奏变得急促而且紧张，进入到灾难片的阶段手机上的记事本小时，而三叶的老家竟然早就毁于灾难，泷在拼命寻找的过程中，一条条线索最终把故事变得复杂，原来和泷相换身体的竟然是三年前的三叶，这么一天，三年的时间差把两个人的时空改造出了新的可能。因为时间差，两个人互换身体这个事就有了很多值得推敲的细节。泷和三叶能否感兴到时隔三年的对方，能否改变当天的灾难，一段情又将缘归何处，这些悬念和紧张的营救行动一起牵动人心。</p>
                </div>
            </div>
        </div>
        <!--结束简介-->
        <!--评论-->
        <div class="weui_cells">
            <div class="weui_cell">
                <div class="head">
                    <img src="/Wechat_media/Public/home/images/icon_nav_button.png">
                </div>
                <div class="username">
                    <p>风景如墨:</p>
                </div>
                <div class="time">
                    <p>2016-12-12</p>
                </div>
                <div class="zan">
                    <div class="weui_btn weui_btn_mini weui_btn_default"><p>赞235</p><input class="id" hidden value="3"></div>
                </div>
            </div>
            <div class="comment_content">
                <p>个这么平淡无奇的角色从泷意识到两人不再互相交换开始，影片的节奏变得急促而</p>
            </div>
            <div class="weui_cell">
                <div class="head">
                    <img src="/Wechat_media/Public/home/images/icon_nav_button.png">
                </div>
                <div class="username">
                    <p>风景如墨:</p>
                </div>
                <div class="time">
                    <p>2016-12-12</p>
                </div>
                <div class="zan">
                    <div class="weui_btn weui_btn_mini weui_btn_default"><p>赞234</p><input class="id" hidden value="3"></div>
                </div>
            </div>
            <div class="comment_content">
                <p>个这么平淡无奇的角色从泷意识到两人不再互相交换开始，影片的节奏变得急促而</p>
            </div>
            <div class="weui_cell">
                <div class="head">
                    <img src="/Wechat_media/Public/home/images/icon_nav_button.png">
                </div>
                <div class="username">
                    <p>风景如墨:</p>
                </div>
                <div class="time">
                    <p>2016-12-12</p>
                </div>
                <div class="zan">
                    <div class="weui_btn weui_btn_mini weui_btn_default"><p>赞232</p><input class="id" hidden value="3"></div>
                </div>
            </div>
            <div class="comment_content">
                <p>个这么平淡无奇的角色从泷意识到两人不再互相交换开始，影片的节奏变得急促而</p>
            </div>
            <a href="media_comment.html" class="weui_btn weui_btn_default">点击查看更多</a>
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
        $(".id").each(function () {
            var id = $(this).val();
            if(id == 4){
                $(this).parent().addClass("praise");
            }
        });
    });
    $(".weui_tab_bd .weui_cells .weui_btn_mini").unbind('click').on('click',function(){
        var classname = $.trim($(this).attr('class')).substr(-6);
        var id = $(this).children(".id").val();
        var num = parseInt($.trim($(this).text()).substr(1));
        if (classname=='praise'){
            num = num-1;
            $(this).removeClass("praise");
        }else{
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
            $(".comment").hide();
            $(".background").hide();
            $(".weui_tabbar").show();
            $.toast('发表成功');
            $(".weui_textarea").val('');
            $(".weui_search_input").val('');
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