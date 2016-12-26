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
  <div class="panel-head"><strong><span class="icon-key"></span> 添加管理员密码</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('admin/user/add');?>" onsubmit="return check()">
      <div class="form-group">
        <div class="label">
          <label for="sitename">帐号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="username" size="50"   />
          <span></span>
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" id="mpass" name="password" size="50"  data-validate="length#>=6:密码不能小于6位" />
          <span></span>
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="Qpassword" size="50"   />
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
  var username = $("input:text[name='username']");
  var password = $("input:password[name='password']");
  var Qpassword = $("input:password[name='Qpassword']");

  //给账号信息添加点击事件判断是否为空，并且添加样式
  click(username);
  blur(username,"用户名不能为空",1);

  //给密码信息添加事件判断是否为空，并且添加样式
  click(password);
  blur(password,"密码不能为空");

  //给确认密码添加事件判断是否与密码一致，并添加样式
             //鼠标点击
    Qpassword.click(function () {
      Qpassword.parent().children('span').css("color","green").text("");
    });

            //鼠标离开
      Qpassword.blur(function () {
        if(password.val()!=Qpassword.val() ) {
          Qpassword.parent().children('span').css("color", "red").text("密码不一致");

        }
        else {
          Qpassword.parent().children('span').css("color", "green").text("");
        }
    });




  //添加点击事件样式函数
  function click(name) {
    name.click(function () {
        name.parent().children('span').css("color","red").text("");
    });
  }
  //添加鼠标离开样式函数
  function blur(name,text,type) {
    name.blur(function () {
      if(name.val()==''){
        name.parent().children("span").css("color","red").text(text);
      }else {
          if(type ==1){
            $.post("<?php echo U('admin/user/match');?>",{'uName':name.val()},function (data) {
              data = eval(data);
              //判断返回值，如果为1则显示可用样式
              if(data==1){
                name.parent().children("span").css("color","green").text("账号可用");
            }
              //否则显示不可用样式
              else {
                name.parent().children("span").css("color","red").text("账号不可用");
              }
          });
        }
        else{
          name.parent().children("span").css("color","red").text("");
        }
      }
    });
  }

//检查信息列表是否为空函数
    function check() {
      //1.获取输入的账号信息
      var username = $("input:text[name='username']");
      var password = $("input:password[name='password']");
      var Qpassword = $("input:password[name='Qpassword']");
      //2.账号密码不为空并且显示样式
        if(username.val()==''){
          username.parent().children("span").css("color","red").text("用户名不能为空！");
        }else{
          username.parent().children("span").css("color","green").text("");
        }
        //密码不能为空
      if(password.val()==''){
        password.parent().children("span").css("color","red").text("密码不能为空！");
      }else{
        password.parent().children("span").css("color","green").text("");
      }
      //如果填写的信息有一项为空，则阻止提交
      if(username.val()==''||password.val()==''|| Qpassword.val()==''||Qpassword.parent().children('span').text()=="密码不一致"){
        return false;
      }else {
        return true;
      }
    }

</script>
</html>