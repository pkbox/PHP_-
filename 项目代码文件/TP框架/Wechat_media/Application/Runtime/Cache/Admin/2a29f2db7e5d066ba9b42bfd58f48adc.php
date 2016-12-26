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
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <table class="table table-hover text-center">
      <tr>
        <th width="50" style="text-align:left; padding-left:20px;">排序</th>
          <th width="50%">用户名</th>
        <th width="10%">创建时间</th>
        <th width="310">操作</th>
      </tr>
      <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
          <td style="text-align:left; padding-left:20px;"><?php echo ($i); ?>
          </td>
          <td><?php echo ($list["name"]); ?></td>
          <td><?php echo ($list["time"]); ?></td>
          <td> <div hidden><?php echo ($list["id"]); ?></div><div class="button-group">  <a class="button border-red" href="javascript:void(0)" ><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
  </div>
</form>
<script type="text/javascript">
//单个删除
var url = "<?php echo U('admin/user/delete');?>";
$('.button-group').click(function(){
  var user  =  $(this).parent().prev().prev().text();
	if(confirm("您确定要删除用户"+user+"吗?")){
	  var id =$(this).prev().text();
		$.post(url,{'id':id},function(data){
            alert(eval(data));
        });
      $(this).parent().parent().remove();
	}
}
);
</script>
</body>
</html>