<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CH">
<head>
    <meta charset="UTF-8">
    <title>电影金曲</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Wechat_media/Public/home/lib/weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/jquery-weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/demos.css" type="text/css"/>
    <link rel="stylesheet" href="/Wechat_media/Public/home/dist/css/bootstrap-icon.css">
    <style>
        .left{
            width: 30%;
            height: 120px;
            background: #76dba3;
            color: white;
        }
        .left div{
            width: 33%;
            float: left;
            text-align: center;
            position: relative;
            display: inline-block;
            top: 38%;
        }
        .left .icon {
            font-size: 22px;
        }
        .right{
            width: 70%;
            height: inherit;
            background: #fdfef6;
            border: 1px solid #76dba3;
        }
        .icon {
            font-family: "Glyphicons Halflings";
        }

        .SongTime {
            width: 120px;
            height: 18px;
            margin-top: -20px;
            font-family: cursive, microsoft Yahei;
            font-size: 15px;
            text-align: left;
            color: #ee8a87;
            position: absolute;
            bottom: 14px;
            right: -5px;
        }
        .progress{
            width: inherit;
            height: 5px;
            position: absolute;
            bottom: 0px;
        }
        .SongName{
            width: 100%;
            font-family: cursive, microsoft Yahei;
            color: #ee8a87;
            font-size: 18px;
            margin-top: 5%;
            text-align: center;
            display: block;
        }
        .SongAuthor{
            font-family: cursive, microsoft Yahei;
            color: #ee8a87;
            font-size: 16px;
            position: absolute;
            bottom: 41%;
            left: 33%;
        }
        .moveby {
            font-family: cursive, microsoft Yahei;
            color: #ee8a87;
            font-size: 16px;
            text-align: left;
            display: block;
            position: absolute;
            left: 33%;
            bottom: 21%;
        }
        .color {
            color: #ee8a87;
        }
        .null{
            padding: 5px;
        }
        .title {
            width: auto;
            height: 50px;
            font-size: 20px;
            color: #000000;
            line-height: 50px;
        }

        .weui_cells .weui_cell {
            width: auto;
            height: 40px;
            border: 1px solid white;
            margin-left: 4px;
            color: #979797;
        }

        .weui_cells .weui_cell .weui_cells_bd {
            width: auto;
            height: 40px;
            line-height: 40px;
            font-size: 18px;
            text-align: left;
            padding-left: 20px;

        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_navbar">
        <audio id='audio'></audio>
        <div class="weui_navbar">
            <div class="left">
                <div class='Prev'><span class='icon glyphicon-step-backward'></span></div>
                <div class='Play'><span class='icon glyphicon-play'></span></div>
                <div class='Next'><span class='icon glyphicon-step-forward'></span></div>
            </div>
            <div class="right">
                <div class="SongName">Nothing's Gonna Change My Love for You</div>
                <div class="SongAuthor">歌手：Chris Doran</div>
                <div class="moveby">出自：《廊桥遗梦》</div>
                <div class="SongTime">00:00&nbsp;|&nbsp;00:00</div> <!-- 时间进度 -->
                <div class="progress">
                    <div class="weui_progress">
                        <div class="weui_progress_bar">
                            <div class="weui_progress_inner_bar js_progress" style="width: 0%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weui_tab_bd">
        <div class="weui_cells">
            <div class="weui_cell null">
            </div>
            <div class="title">
                <div>
                    <p>播放列表 </p>
                </div>
            </div>
            <?php if(is_array($musicrcmd)): $i = 0; $__LIST__ = $musicrcmd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="weui_cell">
                    <div class="weui_cells_bd ">
                        <!--<?php  var_dump($vo); ?>-->
                        <?php echo ($vo["musicname"]); ?> - <?php echo ($vo["singer"]); ?><input type="hidden" class="<?php echo ($vo["frommedia"]); ?>" value="<?php echo ($vo["musicaddress"]); ?>"  name="<?php echo ($vo["music_id"]); ?>"/>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="/Wechat_media/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/jquery-weui.min.js"></script>
<script>
    var now=$(".weui_cells_bd").children('input[name=1]');
    var songsrc= now.val();
    var moveby = now.attr('class');
    var SongName = $.trim(now.parent().text()).split(" - ");
    $(".SongName").text(SongName[0]);
    $(".moveby").text("出自："+moveby+" ");
    $(".SongAuthor").text("歌手："+SongName[1]);
    now.parent().addClass("color");
    var audio = document.getElementById("audio");
    audio.src =songsrc;
    $(".Play").on('click',function () {
        if(audio.paused){
            if( $(this).children().hasClass('glyphicon-play') ) {
                $(".Play").children("span").removeClass("glyphicon-play").addClass("glyphicon-pause");
                Play();
            }
        }else{
            $(".Play").children("span").removeClass("glyphicon-pause").addClass("glyphicon-play");
            Pause();
        }
    });
    var divs = $(".weui_cell");
    /*
    列表点击
    */
    divs.unbind().click(function () {
        divs.children().removeClass("color");
        $(this).children().addClass("color");
        var songsrc=$(this).children().children("input").val();
        var moveby = $(this).children().children().attr('class');
        var SongName = $.trim($(this).children().text()).split(" - ");
        $(".SongName").text(SongName[0]);
        $(".moveby").text("出自："+moveby+" ");
        $(".SongAuthor").text("歌手："+SongName[1]);
        // 获取播放的歌曲
        var audio = document.getElementById("audio");
        audio.src = songsrc;
        if(audio.paused){
            $(".Play").children("span").removeClass("glyphicon-play").removeClass("glyphicon-pause").addClass("glyphicon-pause");
            Play();
        }
    });
    /*
     下一首按钮
     */
    $(".Next").on('click',function () {
        var name = parseInt($(".color").children('input').attr('name'));
        if(name<10){
            name =name +1;
            divs.children().removeClass("color");
            var next=$(".weui_cells_bd").children('input[name='+name+']');
            next.parent(".weui_cells_bd").addClass("color");
            var songsrc= next.val();
            var moveby = next.attr('class');
            var SongName = $.trim(next.parent().text()).split(" - ");
            $(".SongName").text(SongName[0]);
            $(".moveby").text("出自："+moveby+" ");
            $(".SongAuthor").text("歌手："+SongName[1]);
            // 获取播放的歌曲
            var audio = document.getElementById("audio");
            audio.src = songsrc;
            if(audio.paused){
                $(".Play").children("span").removeClass("glyphicon-play").removeClass("glyphicon-pause").addClass("glyphicon-pause");
                Play();
            }
        }else{
            $.toast("已经是最后一首");
        }
    });
    /*
     上一首按钮
     */
    $(".Prev").on('click',function () {
        var name = parseInt($(".color").children('input').attr('name'));
        if(name>1){
            name =name -1;
            divs.children().removeClass("color");
            var prev=$(".weui_cells_bd").children('input[name='+name+']');
            prev.parent(".weui_cells_bd").addClass("color");
            var songsrc= prev.val();
            var moveby = prev.attr('class');
            var SongName = $.trim(prev.parent().text()).split(" - ");
            $(".SongName").text(SongName[0]);
            $(".moveby").text("出自： "+moveby+" ");
            $(".SongAuthor").text("歌手："+SongName[1]);
            // 获取播放的歌曲
            var audio = document.getElementById("audio");
            audio.src = songsrc ;
            if(audio.paused){
                $(".Play").children("span").removeClass("glyphicon-play").removeClass("glyphicon-pause").addClass("glyphicon-pause");
                Play();
            }
        } else{
            $.toast("已经是第一首");
        }
    });
    function Play() {
        audio.play();
        TimeSpan();
    } //Play()
    function Pause() {
        audio.pause();
    } //Pause()
    function TimeSpan() {
        var ProcessNow = 0;
        setInterval(function () {
            var ProcessNow = (audio.currentTime / audio.duration) * 100 + '%';
            $(".js_progress").css("width", ProcessNow);
            var currentTime = timeFormat(audio.currentTime);
            var timeAll = timeFormat(TimeAll());
            //alert(timeAll );
            if(timeAll=='0NaN:0NaN')
            {
                $(".SongTime").html(currentTime + " | " + "00:00");
            }else{
                $(".SongTime").html(currentTime + " | " + timeAll);
            }
        }, 1000);
    }
    function timeFormat(number) {
        var minute = parseInt(number / 60);
        var second = parseInt(number % 60);
        minute = minute >= 10 ? minute : "0" + minute;
        second = second >= 10 ? second : "0" + second;
        return minute + ":" + second;
    }
    function TimeAll() {
        return audio.duration;
    }
</script>
</html>