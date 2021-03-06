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
    <div class="panel-head"><strong class="icon-reorder">用户推荐列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <form method="post" action="<?php echo U('admin/movie/user_search');?>" id="listform">
                <li style="float:right">
                    <input type="text" placeholder="请输入推荐人姓名" name="name" class="input" style="width:250px; line-height:17px;display:inline-block" />
                    <button class="button border-main icon-search" type="submit"> 搜索</button>
                </li>
            </form>
        </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <td style="width: auto; height: 200px; font-size: 20px;"> 你搜索的推荐没不存在</td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    /*
     搜索
     */
    $(".icon-search").unbind().click(function () {
        $("#listform").submit();
    })
</script>
</body>
</html>