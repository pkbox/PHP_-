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
<style>
  .t1{
      width: 15%;
      margin-left: 20px;
      font-size : 15px;
    }
  td{
    font-size : 14px;
  }
</style>
<body>
<div class="panel admin-panel">
    <table class="table table-hover">
      <tr>
        <td class="t1">ID:</td>
        <td><?php echo ($results["ar_id"]); ?></td>
      </tr>
      <tr>
        <td class="t1">电影名称:</td>
        <td><?php echo ($results["title"]); ?></td>
      </tr>
      <tr>
        <td class="t1">导演:</td>
        <td><?php echo ($results["director"]); ?></td>
      </tr>
      <tr>
        <td class="t1">主演:</td>
        <td><?php echo ($results["actor"]); ?></td>
      </tr>
      <tr>
        <td class="t1">电影类型:</td>
        <td><?php echo ($results["type_id"]); ?></td>
      </tr>
      <tr>
        <td class="t1">上映时间:</td>
        <td><?php echo ($results["time"]); ?></td>
      </tr>
      <tr>
        <td class="t1">评分:</td>
        <td><?php echo ($results["score"]); ?></td>
      </tr>
      <tr>
        <td class="t1">点赞数:</td>
        <td><?php echo ($results["parisecount"]); ?></td>
      </tr>
      <tr>
        <td  class="t1">电影封面图:</td>
        <td><img src="<?php echo ($results["thumb"]); ?>" style="width: 30%; height:auto; "></td>
      </tr>
      <tr>
        <td class="t1">推荐理由</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($results["reason"]); ?></td>
      </tr>
      <tr>
        <td class="t1">电影简介:</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($results["introduce"]); ?></td>
      </tr>
    </table>
</div>
</body>
</html>