<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\index\lrdd.html";i:1529651522;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1529651522;}*/ ?>
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
      <link rel="stylesheet" type="text/css" href="/static/index/css/iziModal.css">
      <link rel="stylesheet" href="/static/index/css/lrdd.css">
      <link rel="stylesheet" href="/static/index/css/xiala.css">
      <link rel="stylesheet" href="/static/index/css/all_order.css">
    <div class="banner"></div>
    <div class="xxtx">
      <div class="xxtx_dd">
        <div class="xx">
          <strong>订单信息</strong>
        </div>

        <div class="dd layui-row layui-col-space10">
          <div class="layui-col-xs4 tu">
            <div class="grid-demo grid-demo-bg1">图片</div>
          </div>

          <!-- 航线 -->
          <div class="layui-col-xs8 dd_nei">
            <div class="grid-demo">
              <div class="dd_yu layui-col-xs6">
                <div class="dd_lu">
                  <div class="layui-col-xs4 a">
                    <strong>广州市</strong>
                    <i class="fa fa-long-arrow-right fa-lg"></i>
                  </div>
                  <div class="layui-col-xs4 c">
                    <i class="fa fa-ship fa-2x"></i>
                  </div>

                  <div class="layui-col-xs4 b">
                    <i class="fa fa-long-arrow-right fa-lg"></i>
                    <strong>阿木特但</strong>
                  </div>
                </div>
                <!-- 预计日期 -->
                <div class="yj">
                  <div class="yj_start">
                    <span>截单时间</span><span>2018-03-10&nbsp;8：00</span></div>
                  <div class="yj_end">
                    <span>船期</span><span>2018-03-10&nbsp;8：00</span>
                  </div>
                </div>

              </div>

              <div class="dd_yu bian layui-col-xs6">
                <div class="dd_lu">
                  <span>下单日期</span><span>2018-03-10</span>
                </div>
                <!-- 预计日期 -->
                <div class="yj">
                  <div class="yj_start">
                    <span>海上时效</span><span>2018-03-10&nbsp;8：00</span>
                  </div>
                  <div class="yj_end">
                    <span>装货时间</span><span>2018-03-10&nbsp;8：00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="layui-col-xs8 dd_ming">
            <div class="layui-col-xs4">船名：<span>长通</span></div>
            <div class="layui-col-xs4">航次：<span>IC10</span></div>
            <div class="layui-col-xs4">运输条款：<span>门到们</span></div>
            </div>
          </div>
      </div>

        <!-- 委托信息 -->

          <div class="xxtx_dd er">
            <div class="xx">
              <strong>委托信息</strong>
              <div class="er_anniu">
                <button class="se wt1">选择</button>
                <button class="se wt2">添加</button>
                <button class="se wt3" onclick="xiu()">修改</button>
                <button class="se wt4">设置为默认</button>
              </div>
            </div>
            <div class="layui-row">
              <div class="layui-col-xs6 er_le">
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>装货公司名全称：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>装货联系人：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>装货联系人电话：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3">装货门店：</div>
                  <div class="layui-col-xs9"><d>广东省</d><d>广州市</d><d>天河区</d><d>长福路</d></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>装货详情地址：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
              </div>


              <div class="layui-col-xs6 er_rig">
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>收货公司名全称：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>收货联系人：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>收货联系人电话：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3">收货门店：</div>
                  <div class="layui-col-xs9"><d>广东省</d><d>广州市</d><d>天河区</d><d>长福路</d></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs3"><span>*&nbsp;</span>收货详情地址：</div>
                  <div class="layui-col-xs9"><input type="text" name="" value="" readonly='readonly' class="in"></div>
                </div>
              </div>
            </div>
        </div>

        <!-- 货物信息 -->

        <div class="xxtx_dd er">
            <div class="xx">
              <strong>货物信息</strong>
            </div>

            <div class="layui-row">
              <div class="layui-col-xs4">
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>集装箱规格：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="20GP" placeholder=""></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>货名：</div>
                  <div class="layui-col-xs8">
                    <div class="select">
                      <select name='make'>
                        <option value='0' selected>请选择</option>
                        <option value='1'>柜子</option>
                        <option value='2'>箱子</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>等通知送货：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="" placeholder="是"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4">保险：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="10000万元" placeholder=""></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>付款人：</div>
                  <div class="layui-col-xs8">
                    <div class="select">
                      <select name='make'>
                        <option value='0' selected>请选择</option>
                        <option value='1'>已方付款</option>
                        <option value='2'>对方付款</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>


              <div class="layui-col-xs4">
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>集装箱柜量：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="1" placeholder="请输入装货人姓名"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>重量：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="200kg" placeholder=""></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>箱内会单：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="" placeholder="否"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4">发票：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="无发票" placeholder=""></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>付款方式：</div>
                  <div class="layui-col-xs8">
                    <div class="select">
                      <select name='make'>
                        <option value='0' selected>请选择</option>
                        <option value='1'>货到付款</option>
                        <option value='2'>在先付款</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="layui-col-xs4">
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>纯运费：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="" placeholder="运输金额"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>包装：</div>
                  <div class="layui-col-xs8">
                    <div class="select">
                      <select name='make'>
                        <option value='0' selected>请选择</option>
                        <option value='1'>铁桶</option>
                        <option value='2'>铁箱</option>
                        <option value='3'>纸箱</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"></div>
                  <div class="layui-col-xs8"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"></div>
                  <div class="layui-col-xs8"></div>
                </div>
                <div class="grid-demo">
                  <div class="layui-col-xs4"><span>*&nbsp;</span>总费用：</div>
                  <div class="layui-col-xs8"><input type="text" name="" value="￥25000" placeholder=""></div>
                </div>
              </div>
            </div>
        </div>

        <!-- 条款声明 -->
        <div class="xxtx_dd er">
          <div class="xx">
            <strong>条款声明</strong>
          </div>
          <!-- 条款内容 -->
          <div class="hx">
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
            <p>sdfsdf</p>
          </div>
        </div>

        <div class="tjiao">
          <a class="trigger-default">提交</a>
          <a>取消</a>
        </div>
    </div>

    <!-- 提交模态窗口 -->
    <div id="modal-default">
      <div class="qr">确认提交订单？</div>
      <div class="en"><a href="#">确认订单</a></div>
    </div>

    <!-- 选择模态框 -->
    <div id="wt1">
      <div class="all_order">
        <form class="" action="index.html" method="post">
          <div class="layui-row">
              <!-- 收货人 -->
            <div class="layui-col-xs8">
              <div class="grid-demo">
                <div class="layui-form-item">
                  <label class="layui-form-label">姓名：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                  </div>

                  <div class="layui-input-inline" style="float:right;">
                    <button class="layui-btn btn_sou" lay-submit="" lay-filter="demo1">搜索</button>
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
                <ul class="xin">
                  <li class='layui-col-xs6'>
                    <div class="nei">
                      <div class="le">
                        <div class="tiao">姓名：</div>
                        <div class="tiao">手机号：</div>
                        <div class="tiao">公司名：</div>
                        <div class="tiao">装货地址：</div>
                      </div>
                      <div class="rig">
                        <div class="tiao">刘某</div>
                        <div class="tiao">21346498797</div>
                        <div class="tiao">广州三乐可以有限公司</div>
                        <div class="tiao wu">啊撒娇发拉萨解撒旦发装货地址</div>
                      </div>
                    </div>
                  </li>

                  <li class='layui-col-xs6'>
                    <div class="nei">
                      <div class="le">
                        <div class="tiao">姓名：</div>
                        <div class="tiao">手机号：</div>
                        <div class="tiao">公司名：</div>
                        <div class="tiao">装货地址：</div>
                      </div>
                      <div class="rig">
                        <div class="tiao">刘某</div>
                        <div class="tiao">21346498797</div>
                        <div class="tiao">广州三乐可以有限公司</div>
                        <div class="tiao wu">啊撒娇发拉萨解撒旦发装货地址</div>
                      </div>
                    </div>
                  </li>
                </ul>

              </div>

              <div class="layui-tab-item">
                <ul class="xin">
                  <li class='layui-col-xs6'>
                    <div class="nei">
                      <div class="le">
                        <div class="tiao">姓名：</div>
                        <div class="tiao">手机号：</div>
                        <div class="tiao">公司名：</div>
                        <div class="tiao">装货地址：</div>
                      </div>
                      <div class="rig">
                        <div class="tiao">刘某</div>
                        <div class="tiao">21346498797</div>
                        <div class="tiao">广州三乐可以有限公司</div>
                        <div class="tiao wu">啊撒娇发拉萨解撒旦发装货地址</div>
                      </div>
                    </div>
                  </li>
                </ul>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 添加模态框 -->
    <div id="wt2">
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
              <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入手机" class="layui-input">
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
              <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入地址" class="layui-input">
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

    <script src="/static/index/js/iziModal.min.js"></script>
    <script src="/static/index/js/lrdd.js"></script>
</body>
</html>