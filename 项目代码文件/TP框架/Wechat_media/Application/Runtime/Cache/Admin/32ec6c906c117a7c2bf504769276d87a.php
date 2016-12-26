<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" href="/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/admin/css/admin.css">
    <link rel="stylesheet" href="/Public/home/lib/weui.min.css" type="text/css"/>
    <link rel="stylesheet" href="/Public/home/css/jquery-weui.min.css" type="text/css"/>
    <script src="/Public/admin/js/jquery.js"></script>
    <script src="/Public/admin/js/pintuer.js"></script>
    <style type="text/css">
        body{
            background-image: url(/Public/admin/images/images1.jpg);
            background-position:center;
            background-repeat:no-repeat;
            width: 100%;
            height: 600px;
            overflow: hidden;

        }
    </style>
</head>
<body>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
            <form action="<?php echo U('admin/login/dologin');?>" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="name" placeholder="登录账号" data-validate="required:请填写账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="passwd" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>          
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="/Public/home/lib/jquery-2.1.4.js"></script>
<script type="text/javascript" src="/Public/home/js/jquery-weui.js"></script>
<script src="/Public/home/lib/fastclick.js"></script>
<script type = "text/javascript">
    $(function(){
       var bg = Math.floor(Math.random()*6+1);
      $('body').css('background-image','url(/Public/admin/images/images'+bg+'.jpg)');
    });
    var error = "<?php echo ($error); ?>";
    if (error=="登录失败"){
        $.alert('登录失败','提示');
    }
</script>
</html>