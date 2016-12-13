<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人中心</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/Wechat_media/Public/home/lib/weui.min.css" type="text/css">
    <link rel="stylesheet" href="/Wechat_media/Public/home/css/jquery-weui.min.css" type="text/css">
    <style>
        .weui_media_appmsg_thumb{
            height:90%;
            width:50%;
        }

        .weui_media_hd img{ border-radius:50%}
        .weui_tab_bd{
            width:100%;
            height:100%;
            background-image:url("/Wechat_media/Public/home/images/beijing1.jpg");
            background-repeat:repeat-y;
            background-size: 120% 50%;


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
            text-align:center;
        }
        .weui_cells{
            height:50%;
            background-image:linear-gradient(75deg,#DCDCDC,#DCDCDC);
        }
        .weui_tab_bd{
            height: 100%;
        }
        .weui_cell{
            height:25%;
        }
        .weui_cell_bd{
            width: 25%;
            float: left;
            height: auto;
        }
        .weui_cell_bd img{
            width:50%;
            height:50%;
            padding-right: 0;
        }
        .conment_hd{
            width: 75%;
            float: right;
        }
        .title{
            padding-left: 24%;
            font-family:新宋体;
            color: #C13E3E;

        }
        .weui_panal_la{

            height:100%;
            width:100%;
            overflow:hidden;
            text-align:center;
            padding-top: 10%;
            padding-bottom: 6%;
        }
        .weui_panal_la img{
            border-radius:50%;
            height:100%;
            width:25%;
        }
        .weui_word{
            text-align:center;
            color:lightgreen;
            font-family: 新宋体;
        }
        .weui_panal{
            width:100%;
        }
        .weui_you{
            height:100%;
        }

    </style>
</head>
<body>
<div class="weui_tab">
    <div class="weui_tab_bd">
        <!--个人头像和昵称-->
        <div class="weui_panal">
            <p>
            <div class="weui_panal_la">
                <img class="weui_media_appmsg_thumb" src="/Wechat_media/Public/home/images/touxiang.jpg">
            </div>
            <div class="weui_you"><h2><p class="weui_word">你的昵称</p></h2></div>
            </p>
        </div>
        <!--第一个选项卡-->
        <div class="weui_cells weui_cells_access" >
            <a class="weui_cell" href="my_recommend.html">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Wechat_media/Public/home/images/tuijian1.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h3 class="title">我的推荐</h3>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
            <hr>
            <!--第二个选项卡-->
            <a class="weui_cell" href="my_collection.html">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Wechat_media/Public/home/images/book.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h3 class="title">我的收藏</h3>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
            <hr>
            <!--第三个选项卡-->
            <a class="weui_cell" href="about_us.html">
                <div class="weui_cell_bd weui_cell_primary">
                    <img class="weui_media_appmsg_thumb" src="/Wechat_media/Public/home/images/women1.png" alt="无图">
                </div>
                <div  class="conment_hd">
                    <h3 class="title">关于微信</h3>
                </div>
                <div class="weui_cell_ft">
                </div>
            </a>
        </div>
    </div>
</div>
</div>
</body>
<script type="text/javascript" src="/Wechat_media/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="/Wechat_media/Public/home/js/swiper.js" charset='utf-8'></script>
</html>