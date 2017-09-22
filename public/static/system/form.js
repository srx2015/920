/**
 * Created by suruixiang on 16/10/22.
 */
function form_add()
{
    var status = true;
    var gotourl= $('#form1').attr('gotourl');
    $.each( $("[validata*='required']"), function(i, n)
    {
        if($(this).val() == false)
        {
            layer.msg($(this).attr('errmsg'));
            $(this).focus();
            status = false;
            return false;
        }
    });
    if(!status)
    {
        return false;
    }
    layer.load();
    $('#form1').ajaxSubmit(function(data){
        layer.closeAll('loading');
        if(data.code == 0){
            layer.msg(data.msg, {icon: 5});
        }else{
            layer.msg(data.msg, {icon: 6});
            /*if (gotourl)
                setTimeout("parent.location.href='"+gotourl+"'", 1000);
            else
                setTimeout("parent.location.href=parent.location.href", 1000);*/
        }
    });
}
//状态变更
$("[ajax-id*='status_up']").click(function(){
    layer.load();
    $.post($(this).attr('data-url'), {
        status  :   $(this).attr('data-status'),
        id      :   $(this).attr('data-id')
    },function(data){
        layer.closeAll('loading');
        if(data.code == 0){
            layer.msg(data.msg, {icon: 5});
        }else{
            layer.msg(data.msg, {icon: 6});
            setTimeout("window.location.reload();", 1000)
        }
    });
});
//数据删除
$("[ajax-id*='data-delete']").click(function(){
    var obj = this;
    layer.confirm('是否进行删除？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        layer.load();
        $.post($(obj).attr('data-url'), {
            id      :   $(obj).attr('data-id')
        },function(data){
            layer.closeAll('loading');
            if(data.code == 0){
                layer.msg(data.msg, {icon: 5});
            }else{
                layer.msg(data.msg, {icon: 6});
                setTimeout("window.location.reload();", 1000)
            }
        });
    }, function(){

    });

});
//弹窗
$('.layer_show').click(function(){
    var url = $(this).attr('layer-url');
    var title = $(this).attr('layer-title');
    var width = $(this).attr('layer-width');
    var height = $(this).attr('layer-height');
    if (url) {
        layer.open({
            title: title,
            type: 2,
            area: [width+'px', height+'px'],
            fix: false, //不固定
            maxmin: true,
            scrollbar: false,
            content: url
        });

    }
});
//获取链接
$('.get-link').click(function(){
    var lik = $(this).attr('data-link');
    var order_lik = $(this).attr('data-orderlink');
    layer.open({
        title: '链接',
        type: 1,
        skin: 'link', //样式类名
        closeBtn: 0, //不显示关闭按钮
        anim: 2,
        shadeClose: true, //开启遮罩关闭
        content: '代理推广链接:'+lik+'<br>'+'查看推广记录链接:'+order_lik
    });
});
//审核
$("[ajax-id*='aduit']").click(function(){
    var url = $(this).attr('data-url');
    var status = $(this).attr('data-status');
    var id = $(this).attr('data-id');
    var residue = $(this).attr('data-money');
    if (status == 1) {
        layer.load();
        $.post(url, {
            income : id,
            residue : residue
        }, function(data){
            layer.closeAll('loading');
            if(data.code == 0){
                layer.msg(data.msg, {icon: 5});
            }else{
                layer.msg(data.msg, {icon: 6});
                setTimeout("window.location.reload();", 1000)
            }
        });
    } else {
        layer.prompt({title: '填写拒绝原因', formType: 3}, function(pass, index){
            layer.load();
            $.post(url, {
                income : id,
                deny : pass
            }, function(data){
                layer.closeAll('loading');
                if(data.code == 0){
                    layer.msg(data.msg, {icon: 5});
                }else{
                    layer.msg(data.msg, {icon: 6});
                    //setTimeout("window.location.reload();", 1000)
                }
            });
        });
    }
});
//普通不带参数请求
$("[ajax-id*='common']").click(function(){
    layer.load();
    var gotourl= $(this).attr('gotourl');
    $.post($(this).attr('data-url'), function(data){
        layer.closeAll('loading');
        if(data.code == 0){
            layer.msg(data.msg, {icon: 5});
        }else{
            layer.msg(data.msg, {icon: 6});
            if (gotourl)
                setTimeout("parent.location.href='"+gotourl+"'", 1000);
            else
                setTimeout("window.location.reload();", 1000);
        }
    });
});