<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人中心</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Public/home/lib/weui.min.css" type="text/css">
    <link rel="stylesheet" href="/Public/home/css/jquery-weui.min.css" type="text/css">
    <style>
        .weui_media_appmsg_thumb{
            height:10%;
            width:50%;
        }

        .weui_media_hd img{ border-radius:50%}
        .weui_tab_bd{
            width:100%;
            height:100%;
            back

        }
        html,body{
            height: 100%;
            width:100%;
        }
        .weui_tab{
            height:100%;
            width:100%;
        }
        .weui_cell_bd{
            height:100%;
            line-height:100%;
            overflow:hidden;
            text-align:left;
            width:20%;
        }
        .weui_cells{
            position:absolute;
            height:60%;
            width:100%;
            text-align: left;
        }
        .weui_cell{
            filter:alpha(opacity=50);
            -moz-opacity:0.5;
            -khtml-opacity: 0.5;
            opacity: 1;
        }
        .weui_cell:active{
        background:black;
        }
        .weui_tab_bd{
            height: 100%;
        }
        .weui_cell_bd img{
            width:80%;
            height:50%;
         text-align: left;
        }
        .conment_hd{
            width: 86%;
        }
        .title{
            width:40%;
            padding-left: 5%;
            color:black;
            font-weight:lighter ;

        }
        .weui_panal_la{
            position:absolute;
            height:20%;
            width:100%;
            overflow:hidden;
            text-align:center;
            padding-top: 10%;
            padding-bottom: 6%;
        }
        .weui_panal_la img{
            border-radius:50%;
            height:120%;
            width:40%;
        }
        .weui_word{
            text-align:center;
             height:10%;
            color:black;
            font-family:新宋体;
            font-weight: lighter;
        }
        .weui_panal{
            width:100%;
            height:45%;
        }
        .bg {
            background: url('<?php echo (session('userimg')); ?>');
            background-size: 120% 120%;
            height:90%;
            text-align: center;
            line-height: 50%;
        }
        .bgblur {
            float: left;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size:cover;
            -webkit-filter: blur(10px);
            -moz-filter: blur(4px);
            -o-filter: blur(4px);
            -ms-filter: blur(4px);
            filter: blur(4px);
        }

          .weui_you{
            height:2%;
            padding-top: 0%;
        }
        .weui_word{
            height:10%;
        }
        .weui_btn img{
            height:50%;
        }
        .weui_cell_primary{
            width:20px;
        }
        .hx{
            height:10px;
            width:100%;
            background-color: #DCDCDC;
        }
        .hx1{
            height:300px;
            width:100%;
            background-color: #DCDCDC;
        }
        .weui_cells_access{
            border-top:10px solid #DCDCDC;
        }
    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">
        <!--个人头像和昵称-->
        <div class="weui_panal">
            <p>
            <div class="bg  bgblur"></div>
            <div class="weui_panal_la">
                <img class="weui_media_appmsg_thumb" src="<?php echo (session('userimg')); ?>">
            </div>
            <div class="weui_you"><h2><p class="weui_word"><?php echo (session('name')); ?></p></h2></div>
            </p>
        </div>
        <!--第一个选项卡-->
        <div class="weui_cells weui_cells_access" >
            <a class="weui_cell" href="<?php echo U('home/adminrcmd/media_index');?>">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Public/home/images/movie_home.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h4 class="title">影视推荐</h4>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
           
            <!--第二个选项卡-->
            <a class="weui_cell" href="<?php echo U('home/usersrcmd/user_recommend_index');?>">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Public/home/images/recommend_home.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h4 class="title">用户推荐</h4>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
            <div class="hx"></div>
            <!--第三个选项卡-->
                  <a class="weui_cell" href="my_recommend.html">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Public/home/images/my_recommend.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h4 class="title">我的推荐</h4>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
          
            <!--第四个选项卡-->
            <a class="weui_cell" href="my_collection.html">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Public/home/images/collection_home.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h4 class="title">我的收藏</h4>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
            <div class="hx"></div>
            <!--第五个选项卡-->
            <a class="weui_cell" href="about_us.html">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Public/home/images/about_home.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h4 class="title">关于我们</h4>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
            <div class="hx1"></div>
        </div>
    </div>
</div>
</div>
</body>
<script type="text/javascript" src="/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/Public/home/js/swiper.js" charset='utf-8'></script>
</html>