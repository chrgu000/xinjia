<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\personal\invalid.html";i:1529718403;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1529718403;}*/ ?>
<!-- 废弃订单 -->
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
      <link rel="stylesheet" href="/static/index/css/invalid.css">
      <link rel="stylesheet" href="/static/index/css/xiala.css">
    <div class="invalid">
      <form class="" action="index.html" method="post">
        <div class="layui-row">
          <!-- 日期 -->
          <!-- <div class="layui-col-xs6">
            <div class="grid-demo grid-demo-bg1">
              <div class="layui-form-item">
                <div class="layui-inline layui-col-xs6">
                  <label class="layui-form-label">处理类型:</label>
                  <div class="layui-input-inline select">
                    <select name="quiz">
                      <option value="">请选择</option>
                      <option value="1">layer</option>
                      <option value="2">form</option>
                      <option value="3">layim</option>
                      <option value="4">element</option>
                      <option value="5">laytpl</option>
                      <option value="6">upload</option>
                    </select>
                  </div>
                </div>
                <div class="layui-inline layui-col-xs6">
                  <label class="layui-form-label">问题分类:</label>
                  <div class="layui-input-inline select">
                    <select name="modules" lay-verify="required" lay-search="">
                      <option value="">直接选择</option>
                      <option value="1">layer</option>
                      <option value="2">form</option>
                      <option value="3">layim</option>
                      <option value="4">element</option>
                      <option value="5">laytpl</option>
                      <option value="6">upload</option>
                      <option value="7">laydate</option>
                      <option value="8">laypage</option>
                      <option value="9">flow</option>
                      <option value="10">util</option>
                      <option value="11">code</option>
                      <option value="12">tree</option>
                      <option value="13">layedit</option>
                      <option value="14">nav</option>
                      <option value="15">tab</option>
                      <option value="16">table</option>
                      <option value="17">select</option>
                      <option value="18">checkbox</option>
                      <option value="19">switch</option>
                      <option value="20">radio</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
            <!-- 收货人 -->
          <div class="layui-col-xs6">
            <div class="grid-demo">
              <div class="layui-form-item">
                <label class="layui-form-label">订单号：</label>
                <div class="layui-input-inline">
                  <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                </div>

                <div class="layui-input-inline" style="float:right;">
                  <button class="layui-btn btn_select" lay-submit="" lay-filter="demo1">查询</button>
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
            <li class="layui-this">所有问题件</li>
            <li></li>
            <li></li>
            <li></li>
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
                    <th>运单号</th>
                    <th>问题描述</th>
                    <th>创建时间</th>
                    <th>处理类型</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>

                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                  <tr>
                    <td>TB23565864563</td>
                    <td>物流潮湿</td>
                    <td>2018-3-2</td>
                    <td>未处理</td>
                    <td>
                      <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>

                      <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div id="demo7" style="text-align: center;"></div>


            </div>
            <div class="layui-tab-item">123</div>
            <div class="layui-tab-item">内容3123</div>
            <div class="layui-tab-item">内容4</div>
          </div>
        </div>
      </div>
    </div>
<script src="/static/index/js/personal/page.js"></script>
  </body>
</html>
