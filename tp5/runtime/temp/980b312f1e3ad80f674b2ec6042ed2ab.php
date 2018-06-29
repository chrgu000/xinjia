<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\personal\common_info.html";i:1529718403;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1529718403;}*/ ?>
<!-- 常用信息 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/index/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/index/css/font.css">
    <link rel="stylesheet" href="/static/index/css/index.css">
    <link rel="stylesheet" href="/static/index/css/top.css">
    <link rel="stylesheet" href="/static/index/css/foot.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/static/index/js/jquery-1.9.0.min.js"></script>
    <script src="/static/index/layui/layui.js"></script>
</head>
  <body>
      <link rel="stylesheet" href="/static/index/css/all_order.css">
      <link rel="stylesheet" type="text/css" href="/static/index/css/iziModal.css">
    <div class="all_order">
      <form class="" action="index.html" method="post">
        <div class="layui-row">
            <!-- 收货人 -->
          <div class="layui-col-xs6">
            <div class="grid-demo">
              <div class="layui-form-item">
                <label class="layui-form-label">姓名：</label>
                <div class="layui-input-inline">
                  <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                </div>

                <div class="layui-input-inline" style="float:right;">
                  <button class="layui-btn btn_sou" lay-submit="" lay-filter="demo1">搜索</button>
                  <a href="#" class="layui-btn trigger-default">新建</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- 表格 -->
      <div class="biao">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
          <ul class="layui-tab-title">
            <li class="layui-this">收货人</li>
            <li>发货人</li>
          </ul>
          <div class="layui-tab-content" style="height: 100px;">
            <div class="layui-tab-item layui-show">
              <table class="layui-table" id="te">
                <colgroup>
                  <col width="150">
                  <col width="200">
                  <col>
                </colgroup>
                <thead>
                  <tr>
                    <th>姓名</th>
                    <th>手机号</th>
                    <th>公司名</th>
                    <th>收货地址</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>刘某</td>
                    <td>13545678945</td>
                    <td>广州三乐有限公司</td>
                    <td>贤心三岁看房间阿里咳嗽地方撒娇发了撒娇浪费</td>
                  </tr>
                </tbody>
              </table>

              <div id="demo7" style="text-align: center;"></div>
            </div>

            <div class="layui-tab-item">
              <table class="layui-table" id="te">
                <colgroup>
                  <col width="150">
                  <col width="200">
                  <col>
                </colgroup>
                <thead>
                  <tr>
                    <th>姓名</th>
                    <th>手机号</th>
                    <th>公司名</th>
                    <th>装货地址</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>刘某</td>
                    <td>13545678945</td>
                    <td>广州三乐有限公司</td>
                    <td>贤心三岁看房间阿里咳嗽地方撒娇发了撒娇浪费</td>
                  </tr>
                </tbody>
              </table>

              <div id="demo7" style="text-align: center;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 模态窗口 -->
    <div id="modal-default" class="iziModal">
        <div class="layui-row">
          <form class="layui-form" action="">
            <div class="layui-form-item">
              <label class="layui-form-label">姓名：</label>
              <div class="layui-input-block">
                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入姓名" class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">手机号码：</label>
              <div class="layui-input-block">
                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入手机号码" class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">公司名：</label>
              <div class="layui-input-block">
                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入公司名" class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">收货地址：</label>
              <div class="layui-input-block">
                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入收货地址" class="layui-input">
              </div>
            </div>

            <div class="layui-form-item">
              <label class="layui-form-label">选择人物：</label>
              <div class="layui-input-block">
                <input type="radio" name="sex" value="" title="发货人" checked="">
                <input type="radio" name="sex" value="" title="收货人">
              </div>
            </div>

            <div class="layui-form-item">
              <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
              </div>
            </div>
          </from>
        </div>
    </div>
    <script type="text/javascript" src="/static/index/js/personal/all_order.js"></script>
    <script src="/static/index/js/iziModal.min.js"></script>
    <script type="text/javascript">
    //模态窗口基本设置
    $("#modal-default").iziModal({
        title: "录入信息",
        iconClass: 'icon-announcement',
        width: 700,
        padding: 20
    });
    //启动模态窗
    $(document).on('click', '.trigger-default', function (event) {
        event.preventDefault();
        $('#modal-default').iziModal('open');
    });
    </script>
  </body>
</html>