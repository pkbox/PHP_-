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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('admin/movie/addcontent');?>"  enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label>电影标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo ($results["title"]); ?>" name="title" data-validate="required:请输入标题" />
          <input hidden value="<?php echo ($results["ar_id"]); ?>" name="AR_ID">
            <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电影图片：</label>
        </div>
        <div class="field">
          <img src="<?php echo ($results["thumb"]); ?>" style="width: 150px; height:auto;">
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  >
          <input type="file" id="file" name="file" hidden accept="image/jpg,image/jpeg,image/gif,image/png" />
          <div class="tipss"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>导演：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="Director" value="<?php echo ($results["director"]); ?>" data-validate="required:导演不能为空" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>主演：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="Actor" value="<?php echo ($results["actor"]); ?>" data-validate="required:演员不能为空" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>上映时间：</label>
        </div>
        <div class="field">
          <input type="text" class="laydate-icon input w50" name="time"  value="<?php echo ($results["time"]); ?>"  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>评分：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="Score" value="<?php echo ($results["score"]); ?>" data-validate="member:只能为数字"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>推荐理由：</label>
        </div>
        <div class="field">
          <textarea class="input" name="reason" style=" height:90px;"><?php echo ($results["reason"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电影简介：</label>
        </div>
        <div class="field">
          <textarea name="introduce" class="input" style="height:300px; border:1px solid #ddd;"><?php echo ($results["introduce"]); ?></textarea>
          <div class="tips"></div>
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

$("#image1").click(function () {
  $("#file").click();
})
//获取预览图url
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
    $(this).parent().children('img').attr("src",url);
  });
  $(".icon-check-square-o").unbind().click(function () {
    $(".form-x").submit();
  });
</script>
</body>
</html>