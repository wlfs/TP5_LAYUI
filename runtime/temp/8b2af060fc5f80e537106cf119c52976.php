<?php /*a:2:{s:69:"D:\Work\Products\tp5.1\application/admin/view\system\admin\index.html";i:1519462134;s:63:"D:\Work\Products\tp5.1\application/admin/view\_layout\base.html";i:1519461275;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="/static/layui/css/layui.css">
    <style type="text/css">
        .layui-table a{
            color:#009688;
            font-weight: bold;
        }
        .layui-table a.red{
            color:#ff0000;
        }
        .layui-body{
            background-color: #eff3f5;
        }

    </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">所有商品</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">解决方案</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="">云市场</a></li>
                <li class="layui-nav-item"><a href="">发布商品</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
<table class="layui-table" lay-size="sm">

    <thead>
    <tr>
        <th>管理员名称</th>
        <th>账号</th>
        <th>手机</th>
        <th width="160">注册时间</th>
        <th width="160">最后登录时间</th>
        <th>描述</th>
        <th>是否启用</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($item->name); ?></td>
        <td><?php echo htmlentities($item->login_name); ?></td>
        <td><?php echo htmlentities($item->mobile); ?></td>
        <td><?php echo htmlentities($item->created); ?></td>
        <td><?php echo htmlentities($item->last_login_time); ?></td>
        <td><?php echo htmlentities($item->memo); ?></td>
        <th><?php echo htmlentities($item->status_text); ?></th>
        <th>
            <?php if(\app\common\facade\Auth::check('admin/system.admin/edit')){?>
            <a class="layui-btn-xs" title="修改" href="/admin/system/admin/edit/<?php echo htmlentities($item->id); ?>">
                <i class="layui-icon">&#xe642;</i>
            </a>
            <?php } if(\app\common\facade\Auth::check('admin/system.admin/del')){?>
            <a _href="/admin/system/admin/del/<?php echo htmlentities($item->id); ?>" class="layui-btn-xs red delete_action" title="删除" href="javascript:void(0);">
                <i class="layui-icon">&#xe640;</i>
            </a>
            <?php } ?>
        </th>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>

</div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="/static/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
    layui.use('layer', function(){
        var layer = layui.layer;
        var $=layui.jquery;
        $('.delete_action').click(function(){
            var url=$(this).attr('_href');
            layer.msg('确定要删除当前数据吗？', {
                time: 20000, //20s后自动关闭
                btn: ['确定', '取消'],
                yes:function () {
                    $.post(url,function(data){
                        if(data.code==0){
                            //成功
                            location.reload();
                        }else{
                            layer.msg(data.msg,{
                                time:2000
                            });
                        }
                    });
                }
            });
        });
    });

</script>

</body>
</html>