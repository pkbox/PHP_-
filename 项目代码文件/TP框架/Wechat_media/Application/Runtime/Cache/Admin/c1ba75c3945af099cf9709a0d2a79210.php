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
                <th width="100" style="text-align:left; padding-left:20px;">ID</th>
                <th>推荐人</th>
                <th>电影名称</th>
                <th>封面图</th>
                <th>推荐理由</th>
                <th>推荐时间</th>
                <th>获赞数量</th>
                <th width="20%">操作</th>
            </tr>
        <?php if($results["length"] == 1 ): ?><td style="text-align:left; "><input type="checkbox" name="id[]" value="<?php echo ($results["ur_id"]); ?>"/>1</td>
                <td><?php echo ($results[0]["name"]); ?></td>
                <td><?php echo ($results["title"]); ?></td>
                <td ><img src="<?php echo ($results["thumb"]); ?>" alt="" width="70" height="50" /></td>
                <td style="text-align:left; "><?php echo ($results["reason"]); ?></td>
                <td><?php echo ($results["createtime"]); ?></td>
                <td><?php echo ($results["parisecount"]); ?></td>
                <td>
                    <div class="button-group">
                        <a class="button button2 border-main" href="<?php echo U('admin/movie/user_detail/id');?>/<?php echo ($results["ur_id"]); ?>"><span class="icon-edit"></span> 详情</a>
                        <a class="button button3 border-red" href="javascript:void(0)" ><span class="icon-trash-o"></span> 删除</a>
                    </div>
                </td>
            </tr>
        <?php else: ?>
            <?php if(is_array($results)): $i = 0; $__LIST__ = $results;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td style="text-align:left; "><input type="checkbox" name="id[]" value="<?php echo ($vo["ur_id"]); ?>"/><?php echo ($i); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["title"]); ?></td>
                    <td ><img src="<?php echo ($vo["thumb"]); ?>" alt="" width="70" height="50" /></td>
                    <td style="text-align:left; "><?php echo ($vo["reason"]); ?></td>
                    <td><?php echo ($vo["createtime"]); ?></td>
                    <td><?php echo ($vo["parisecount"]); ?></td>
                    <td>
                        <div class="button-group">
                            <a class="button button2 border-main" href="<?php echo U('admin/movie/user_detail/id');?>/<?php echo ($vo["ur_id"]); ?>"><span class="icon-edit"></span> 详情</a>
                            <a class="button button3 border-red" href="javascript:void(0)" ><span class="icon-trash-o"></span> 删除</a>
                        </div>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

        </table>
    </div>
</form>
<script type="text/javascript">

    //单个删除
    function delet(){
        $(".button3").click(function(){
            if(confirm("您确定要删除吗?")){
                var tr=$(this).parent().parent().parent();
                var id = $.trim(tr.children("td").eq(0).children("input").val());
                console.log(id);
                del(id);
                tr.remove();
            }
        })
    }
    delet();
    /*
     单个删除
     */
    function del(id) {
        var url="<?php echo U('admin/movie/user_delete');?>";
        $.post(url,{"id":id},function (data){
            if(data=='1'){
                return true;
            }else {
                return false;
            }
        })
    }
    /*
     搜索
     */
    $(".icon-search").unbind().click(function () {
        $("#listform").submit();
    });
</script>
</body>
</html>