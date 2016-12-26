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
    <div class="panel-head"><strong class="icon-reorder">官方推荐列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li>分类：</li>
            <li style="width:100px; height:40px;">
                <select name="cid" class="input" style="width:200px; line-height:17px;">
                    <option value="">请选择分类</option>
                    <?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>"><?php echo ($type["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </li>
            <li> <a class="button border-main icon-plus-square-o" style="margin-left:100px;" href="javascript:void(0)"> 获取内容</a> </li>
            <form method="post" action="<?php echo U('admin/movie/search');?>" id="listform">
                <li style="float:right">
                    <input type="text" placeholder="请输入搜索电影名称" name="title" class="input" style="width:250px; line-height:17px;display:inline-block" />
                    <button class="button border-main icon-search" type="submit"> 搜索</button>
                </li>
            </form>
        </ul>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <td style="width: auto; height: 200px; font-size: 20px;"> 你搜索的电影不存在</td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    //单个删除
    function delet(){
        $(".button3").click(function(){
            if(confirm("您确定要删除吗?")){
                var tr=$(this).parent().parent().parent();
                var id = $.trim(tr.children("td").eq(0).children("input").val());
                //console.log(id);
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
        var url="<?php echo U('admin/movie/movie_delete');?>";
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
            var trnum = $(".table-hover").children("tbody").children('tr').length;
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
    /*
     搜索
     */
    $(".icon-search").unbind().click(function () {
        $("#listform").submit();
    })

    /*
     分类选择
     */
    $(".icon-plus-square-o").unbind().click(function(){
        var select =$(".search").children('li').eq(1).children("select");
        var option=select.children('option:selected').val();
        var type = select.children("option:selected").text();
        var url="<?php echo U('admin/movie/obtain');?>";
        $.post(url,{"option":option},function (data) {
            if(data=='1'){
                window.location.href="<?php echo U('admin/movie/error');?>";
            }else{
                data=jQuery.parseJSON(data);
                //console.log(data);
                /*
                 标题
                 */
                $(".table").html(
                        '<tr>'+
                        '<th width="100" style="text-align:left; padding-left:20px;">ID</th>'+
                        '<th>电影名称</th>'+
                        '<th>封面图</th>'+
                        '<th>导演</th>'+
                        '<th>主演</th>'+
                        '<th>上映时间</th>'+
                        '<th>电影类别</th>'+
                        '<th width="310">操作</th>'+
                        '</tr>'
                );
                var y=0;
                /*
                 获取的内容
                 */
                for (i=0;i<data.length;i++){
                    y=y+1;
                    $(".table").append(
                            '<tr>'+
                            '<td style="text-align:left; "><input type="checkbox" name="id[]" value="'+data[i].ar_id+'"/>'+y+'</td>'+
                            '<td>'+data[i].title+'</td>'+
                            '<td ><img src="'+data[i].thumb+'" alt="" width="70" height="50" /></td>'+
                            '<td>'+data[i].director+'</td>'+
                            '<td>'+data[i].actor+'</td>'+
                            '<td>'+data[i].time+'</td>'+
                            '<td>'+type+'</td>'+
                            '<td>'+
                            '<div class="button-group">'+
                            '<a class="button button1 border-main" href="'+"<?php echo U('admin/movie/add/id');?>/"+data[i].ar_id+'">'+'<span class="icon-edit"></span> 修改</a>'+
                            '<a class="button button2 border-main" href="'+"<?php echo U('admin/movie/detail/id');?>/"+data[i].ar_id+'">'+'<span class="icon-edit"></span> 详情</a>'+
                            '<a class="button button3 border-red" href="javascript:void(0)" ><span class="icon-trash-o"></span> 删除</a>'+
                            '</div>'+
                            '</td>'+
                            '</tr>'
                    );
                }
                $(".table").append(
                        '<tr>'+
                        '<td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>全选 </td>'+
                        '<td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a>'+
                        '<a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;display:none;" class="button border-blue icon-edit" onclick="sorts()">样式</a>'+
                        '</td>'+
                        '</tr>'
                )
                delet();
                check();
                checkall();
            }

        });
    })
</script>
</body>
</html>