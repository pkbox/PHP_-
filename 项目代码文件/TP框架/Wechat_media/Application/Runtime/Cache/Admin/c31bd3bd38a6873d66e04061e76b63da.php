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
    <div class="panel-head"><strong class="icon-reorder">电影歌曲</strong>
        <a class="button border-main icon-plus-square-o"  href="<?php echo U('admin/movie/music_add');?>" style="margin-left:10px;"> 添加歌曲</a></div>
    <div class="padding border-bottom">
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">ID</th>
                <th>歌曲名称</th>
                <th>歌手</th>
                <th>来自电影</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td style="text-align:left; "><input type="checkbox" name="id[]" value="<?php echo ($vo["music_id"]); ?>"/><?php echo ($i); ?></td>
                    <td><?php echo ($vo["musicname"]); ?></td>
                    <td><?php echo ($vo["singer"]); ?></td>
                    <td><?php echo ($vo["frommedia"]); ?></td>
                    <td>
                        <div class="button-group">
                            <a class="button button2 border-main" href="<?php echo U('admin/movie/music_alter/id');?>/<?php echo ($vo["music_id"]); ?>"><span class="icon-edit"></span> 修改</a>
                            <a class="button button2 border-main" href="<?php echo U('admin/movie/music_detail/id');?>/<?php echo ($vo["music_id"]); ?>"><span class="icon-edit"></span> 详情</a>
                            <a class="button button3 border-red" href="javascript:void(0)" ><span class="icon-trash-o"></span> 删除</a>
                        </div>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
                    全选
                </td>
                <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a>
                    <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;display:none;" class="button border-blue icon-edit" onclick="sorts()">样式</a>
                </td>
            </tr>
            <tr>
                <td colspan="8"><div class="pagelist"><?php echo ($pagelist); ?></div></td>
            </tr>
        </table>
    </div>
</div>

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
        var url="<?php echo U('admin/movie/music_delete');?>";
        $.post(url,{"id":id},function (data){
            if(data=='1'){
                return true;
            }else {
                return false;
            }
        })
    }

    //全选
    function checkall() {
        $("#checkall").click(function(){
            if (this.checked){
                $("input[name='id[]']").each(function(){
                    this.checked = true;
                });
            }else{
                $("input[name='id[]']").each(function(){
                    this.checked = false;
                });
            }
        })
    }
    checkall();
    //单个选择
    function check () {
        $("input[name='id[]']").click(function(){
            $("#checkall").attr('checked',false);
        });
    }
    check();
    //批量删除
    function DelSelect(){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){
            var t=confirm("您确认要删除选中的内容吗？");
            if (t==false) return false;
            $("input[name='id[]']").each(function(key){
                if (this.checked) {
                    del($(this).val());
                    $(this).parent().parent().remove();
                }
            });
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }
</script>
</body>
</html>