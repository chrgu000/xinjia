<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\public\middle.html";i:1526987309;s:81:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\Keeper\admin_add.html";i:1526984519;s:68:"E:\xampp\htdocs\xinjia\tp5\application\admin\view\public\header.html";i:1525660218;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录-X-admin2.0</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/static/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
                   
        
    <script type="text/javascript" src="/static/admin/js/jquery-3.2.1.min.js"></script>
    <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/static/admin/js/area.js"></script>

</head>

    <body>
        <link rel="stylesheet" href="/static/admin/css/route_add.css">
        <form class="layui-form" action="">
            <div class="route layui-row">
                <!-- 账号 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">账号</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入账号" class="layui-input" value="">
                    </div>
                </div>
                <!-- 密码 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input" value="">
                    </div>
                </div>
                <!-- 联系电话 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入姓名" class="layui-input" value="">
                    </div>
                </div>
                <!-- 20GP -->
                <div class="layui-form-item">
                    <label class="layui-form-label">联系电话</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入联系电话" class="layui-input" value="">
                    </div>
                </div>
                <!-- 海上时效 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">用户角色</label>
                    <div class="layui-input-block">
                        <select name="modules" lay-verify="required" id="day" lay-search="">
                            <option value="0">选择角色</option>
                            <option value="1">业务员</option>
                            <option value="2">操作员</option>
                            <option value="3">管理员</option>
                        </select>
                    </div>
                </div>

                <!-- 按钮 -->
                <div class="layui-form-item">
                    <div class="layui-input-block an">
                        <button class="layui-btn" lay-submit="" lay-filter="demo1">添加</button>
                        <button class="layui-btn cancel">取消</button>
                    </div>
                </div>
            </div>

        </form>

        <script type="text/javascript">
            //取消关闭模态框
            $('.cancel').click(function () {
                var index = parent.layer.getFrameIndex(window.name);
                parent.layer.close(index);
            });


            layui.use(['form', 'layedit', 'laydate'], function () {
                var form = layui.form
                    , layer = layui.layer
                    , layedit = layui.layedit
                    , laydate = layui.laydate;

                //日期
                laydate.render({
                    elem: '#date'
                });
                laydate.render({
                    elem: '#date1'
                });

            });
        </script>

    </body>

    </html>