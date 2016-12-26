<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/admin/css/admin.css">
    <script src="/Public/admin/js/jquery.js"></script>
    <script src="/Public/admin/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>歌曲修改</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="<?php echo U('admin/movie/music_addcontent');?>"  enctype="multipart/form-data">
            <div class="form-group">
                <div class="label">
                    <label>歌曲名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($results["musicname"]); ?>" name="MusicName" data-validate="required:请输入歌曲名称" />
                    <input hidden value="<?php echo ($results["music_id"]); ?>" name="music_Id">
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>歌手：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="Singer" value="<?php echo ($results["singer"]); ?>" data-validate="required:请输入歌手" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>来自电影：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="FromMedia" value="<?php echo ($results["frommedia"]); ?>" data-validate="required:电影不能为空" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>歌曲地址：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="MusicAddress" value="<?php echo ($results["musicaddress"]); ?>"  />
                    <input type="button" class="button bg-blue margin-left" id="image1" value="+ 上传歌曲"  >
                    <input type="file" id="file" name="file" hidden accept="audio/mpeg" />
                    <div class="tipss"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $("#image1").unbind().click(function () {
        $("#file").click();
    })
    $(".icon-check-square-o").unbind().click(function () {
        $(".form-x").submit();
    });
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }

    $("#file").change(function () {
        var url = getObjectURL(this.files[0]);
        $(this).parent().children('input').eq(0).attr("value",url);
    });
</script>
</body>
</html>