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
  <div class="panel-head"><strong><span class="icon-key"></span> 修改管理员密码</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('admin/user/passOne');?>" >
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员帐号：</label>
        </div>
        <div class="field">
          <input type="text" readonly  value="<?php echo (session('name')); ?>" class="input w50" id="username" name="username" size="50"   />
          <span></span>
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">原始密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" id="mpass" name="mpass" size="50" placeholder="请输入原始密码" data-validate="required:请输入原始密码" />
          <span></span>
        </div>
      </div>      

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 下一步</button>
        </div>
      </div>      
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
    //获取元素
    var username = $("input:text[name='username']");
    var mpass = $("input:password[name='mpass']");
    var newpass = $("input:password[name='newpass']");
    var renewpass = $("input:password[name='renewpass']");


    var url = "<?php echo U('admin/user/passOne');?>";
    //判断原先密码是否正确是否正确
      $.post(url,function (data) {
        data = eval(data);
        console.log(data);
        if(data == '1'){
          mpass.parent().children('span').css("color", "red").text("请输入正确的密码！");
//          alert("请输入正确密码！");
        }
      });

</script>
</html>