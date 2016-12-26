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
        <div class="panel-head"><strong class="icon-reorder">官方推荐列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li>分类：</li>
                <li style="width:200px; height:40px;">
                    <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
                        <option value="">请选择分类</option>
                        <?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>,<?php echo ($type["dbid"]); ?>"><?php echo ($type["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </li>
                <li> <a class="button border-main icon-plus-square-o" href="##"> 获取内容</a> </li>
                    <div class="pagelist">
                        <div>
                            <a class="prev" href="#">上一页</a>
                            <a class="next" href="#">下一页</a>
                            <input type="text"><a class="page">跳转</a>
                        </div>
                    </div>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">排序</th>
                <th>电影名称</th>
                <th>封面图</th>
                <th>导演</th>
                <th>主演</th>
                <th>上映时间</th>
                <th>电影类别</th>
                <th>操作</th>
            </tr>

            <tr class="">
                <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
                    全选
                </td>
                <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-main icon-edit" onclick="addall()" style="padding:5px 15px;" >添加</a>
                </td>
            </tr>
        </table>
    </div>
</form>
<script type="text/javascript">
var recommend = new Object();
var typeid = '';
    //搜索
    function changesearch(){
        page = 0;
    }
    //全选
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
    //单个选择
    $("input[name='id[]']").click(function(){
        $("#checkall").attr('checked',false);
    });
    var page = 0;//起始行数
    $(".icon-plus-square-o").click(function () {
        $("input[name='id[]']").parent().parent().remove();
        var select = $(this).parent().parent().children("li").eq(1).children("select");
        sel(page,select);
    });
    function sel(page,select) {
        var allid = select.children("option:selected").val().split(",");
        var id = allid[0];
        typeid = id;
        var type = select.children("option:selected").text();
        var doubanid = allid[1];
        var url = "<?php echo U('admin/movie/getdata');?>";
        $.post(url,{'doubanid':doubanid,'page':page},function (data) {
            data = jQuery.parseJSON(data);
            var limit = data.length;
            $.each(data,function (n,val) {
                var num = page*limit+n*1;
                recommend[num] = val;
                var actor='';
                $.each(val.actors,function (l,v) {
                    if(l<4) {
                        actor = actor + '/' + v;
                    }
                })
                $(".table-hover").children("tbody").children("tr:last").before(
                    '<tr>'+
                        '<td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]"  />'+num+'</td>'+
                        '<td>'+val.title+'</td>'+
                        '<td ><img src="'+val.cover_url+'" alt="无图" width="70" height="50" /></td>'+
                        '<td>'+''+'</td>'+
                        '<td>'+actor+'</td>'+
                        '<td>'+val.release_date+'</td>'+
                        '<td>'+type+'</td>'+
                        '<td>'+
                            '<div class="button-group">'+
                                '<a class="button button1 border-main" href="javascript:void(0)" ><span class="icon-edit"></span>添加</a>'+
                            '</div>'+
                        '</td>'+
                    '</tr>'
                );
            })
            buttonclick();
        })
    }
    $(".prev").click(function () {
        if (page>0){
            page = page-1;
            $("input[name='id[]']").parent().parent().remove();
            var select = $(this).parent().parent().parent().children("li").eq(1).children("select");
            sel(page,select);
        }else{
            alert('已经是第一页');
        }
    });
    $(".next").click(function () {
        page=page+1;
        $("input[name='id[]']").parent().parent().remove();
        var select = $(this).parent().parent().parent().children("li").eq(1).children("select");
        sel(page,select);
    });
    $(".page").click(function () {
        page = $(this).parent().children("input").val()*1;
        $("input[name='id[]']").parent().parent().remove();
        var select = $(this).parent().parent().parent().children("li").eq(1).children("select");
        sel(page,select);
    });
function buttonclick() {
    $(".button1").unbind().click(function () {
        var a = $(this);
        var num = $(this).parent().parent().parent().children().eq(0).text();
        add(num,a);
    });
}

function add(num,a) {
    var url = "<?php echo U('admin/movie/adddata');?>";
    $.ajax({
        type:"post",
        url:url,
        data:{'data':recommend[num],'typeid':typeid},
        dataType:"json",
        success: function(data){
            var otherurl = "<?php echo U('admin/movie/addother');?>";
            a.html('<span class="icon-edit"></span>已添加');
            window.open(otherurl+'/urlid/'+data.curlid+'/AR_ID/'+data.id,'Derek','height=1,width=1,status=no,toolbar=no,menubar=no,location=no')
        },
        error:function () {
            alert('序号为'+num+'的数据已被添加过');
        }
    });
}
function addall(){
    var Checkbox=false;
    $("input[name='id[]']").each(function(){
        if (this.checked==true) {
            Checkbox=true;
        }
    });
    if (Checkbox){
        var t=confirm("您确认要添加选中的内容吗？");
        if (t==false) return false;
        var trnum = $(".table-hover").children("tbody").children('tr').length;
        $("input[name='id[]']").each(function(key){
            if (this.checked) {
                var num = $(this).parent().text();
                var a = $(this).parent().parent().children("td:last").children().children();
                add(num,a);
            }
        });
    }
    else{
        alert("请选择您要添加的内容!");
        return false;
    }
}
</script>
</body>
</html>