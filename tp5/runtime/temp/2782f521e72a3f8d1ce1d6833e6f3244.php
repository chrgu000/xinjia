<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\personal\a_order.html";i:1529718403;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1529718403;}*/ ?>
<!-- 生成账单 -->
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
    <div class="all_order">
      <form class="" action="index.html" method="post">
        <div class="layui-row">
          <!-- 日期 -->
          <div class="layui-col-xs6">
            <div class="grid-demo grid-demo-bg1">
              <div class="layui-form-item">
                <label class="layui-form-label">验证日期：</label>
                <div class="layui-input-inline">
                  <input type="text" name="date" id="date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">至</div>
                <div class="layui-input-inline">
                  <input type="text" name="date" id="date1" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                </div>
              </div>
            </div>
          </div>
            <!-- 收货人 -->
          <div class="layui-col-xs6">
            <div class="grid-demo">
              <div class="layui-form-item">
                <label class="layui-form-label">收货人：</label>
                <div class="layui-input-inline">
                  <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                </div>

                <div class="layui-input-inline" style="float:right;">
                  <button class="layui-btn btn_sou1" lay-submit="" lay-filter="demo1">搜索</button>
                  <button class="layui-btn">生成账单</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <!-- 表格 -->
      <div class="biao">
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief" style="width:1600px;">
          <ul class="layui-tab-title">
            <li class="layui-this">完成订单</li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <div class="layui-tab-content" style="height: 100px;">
            <div class="layui-tab-item layui-show">

              <table class="layui-table layui-table-item" id="te">
                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="" value="">
                    </th>
                    <th>客户</th>
                    <th>订单号</th>
                    <th>发货方</th>
                    <th>装货时间</th>
                    <th>装货地址</th>
                    <th>送货地址</th>
                    <th>集装箱号</th>
                    <th>封条号</th>
                    <th>箱量</th>
                    <th>规格</th>
                    <th>应收款</th>
                    <td>发票</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>
                      <input type="checkbox" name="" value="">
                    </th>
                    <td>刘某</td>
                    <td>xjhy00000001</td>
                    <td>开平市美富达调味品食品有限公司</td>
                    <td>2018-3-1</td>
                    <td>5646498479879</td>
                    <td>开平塘口镇水边村委会</td>
                    <td>河北省衡水市武强县食品城</td>
                    <td>TEMU3046802</td>
                    <td>1</td>
                    <td>20Gp</td>
                    <td>3600</td>
                    <td>6%</td>
                  </tr>
                </tbody>
              </table>


              <div id="demo7" style="text-align: center;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/static/index/js/personal/page.js"></script>
  </body>
</html>
