<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\Order\order_list.html";i:1531581737;s:68:"E:\xampp\htdocs\xinjia\tp5\application\admin\view\public\header.html";i:1527898250;}*/ ?>
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
    <link rel="stylesheet" href="/static/admin/css/order_list.css">
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">订单展示</a>
        <a>
          <cite>导航元素</cite>
        </a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
        title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i>
      </a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form id="searchform" class="layui-form layui-col-md12 x-so">
          <div>
            <input type="text" name="username" placeholder="收货联系人" autocomplete="off" class="layui-input">
            <input type="text" name="username" placeholder="装货公司名全称" autocomplete="off" class="layui-input">
            <button class="layui-btn" lay-submit="" lay-filter="sreach" onclick="search()">
              <i class="layui-icon">&#xe615;</i>
            </button>
          </div>

        </form>
      </div>
    </div>

    <div class="biao">
      <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
          <li class="layui-this">待订舱</li>
          <li>待派车</li>
          <li>待装货</li>
          <li>待报柜号</li>
          <li>待配船</li>
          <li>待到港</li>
          <li>待卸船</li>
          <li>待收款</li>
          <li>待送货</li>
        </ul>
        <div class="layui-tab-content">

          <!-- 待订舱 -->
          <div class="layui-tab-item layui-show">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <?php echo $count_book; ?>条记录</span>
            </xblock>
            <!-- 内容 -->
            <div class="order_list layui-row">
                <?php if(is_array($list_book) || $list_book instanceof \think\Collection || $list_book instanceof \think\Paginator): $i = 0; $__LIST__ = $list_book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>  
                <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间: <?php echo date("y-m-d",$vo['mtime']); ?></span>
                  </div>
                  <span class="top_ma">
                    <span>业务员: <?php echo $vo['salesname']; ?></span>
                    <span>船期: <?php echo date("y-m-d",$vo['shipping_date']); ?></span>
                    <span>海上时效: <?php echo $vo['sea_limitation']; ?></span>
                    <span>截单时间: <?php echo date("y-m-d",$vo['cutoff_date']); ?></span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>订单号:<?php echo $vo['order_num']; ?></p>
                      <p>船公司/船名/航次: <?php echo $vo['ship_short_name']; ?> <?php echo $vo['boat_name']; ?>/<?php echo $vo['boat_code']; ?></p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人: <?php echo $vo['company']; ?></p>
                      <p>货名: <?php echo $vo['cargo']; ?></p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线: <?php echo $vo['s_port_name']; ?>-<?php echo $vo['e_port_name']; ?></p>
                      <p>箱型*箱量: <?php echo $vo['type']; ?>*<?php echo $vo['container_num']; ?></p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待订舱</p>
                      <p class="se">天数: <?php $timediff =time()-$vo['mtime']; $days = intval($timediff/86400); echo $days;?>天</p>
                                                   
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('确认','<?php echo url('admin/Order/list_booking'); ?>?container_num=<?php echo $vo['container_num']; ?>&order_num=<?php echo $vo['order_num']; ?>',600,250)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
            <div class="page">
                <div>
                   <?php echo $page_book; ?>
                </div>
            </div>
          </div>
          
          <!-- 待派车 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待派车</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('查看','<?php echo url('Order/list_paiche'); ?>',700,500)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待装货 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待装货</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a href="">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待报柜号 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待报柜号</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a href="">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待配船 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待配船</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('信息','<?php echo url('Order/list_peiship'); ?>',1100,380)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待到港 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上实效：4天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待到港</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('信息','<?php echo url('Order/list_dship'); ?>',700,380)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待卸船 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待卸船</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('信息','<?php echo url('Order/list_zship'); ?>',700,380)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待收款 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待收款</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('信息','<?php echo url('Order/list_shouqian'); ?>',700,300)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>
          <!-- 待送货 -->
          <div class="layui-tab-item">
            <xblock>
              <button class="layui-btn layui-btn-danger" onclick="delAll()">
                <i class="layui-icon"></i>批量删除</button>
              <button class="layui-btn" onclick="x_admin_show('添加用户','<?php echo url(" "); ?>',600,400)">
                <i class="layui-icon"></i>添加</button>
              <span class="x-right" style="line-height:40px">总共有
                <{}>条记录</span>
            </xblock>
            <div class="order_list layui-row">
              <div class="nei layui-col-md12">
                <div class="top">
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='1'>
                    <i class="layui-icon">&#xe605;</i>
                    <span>创建时间：2018-03-08</span>
                  </div>
                  <span class="top_ma">
                    <span>业务员：小明</span>
                    <span>船期：2018-03-05</span>
                    <span>海上时效：3天</span>
                    <span>离港时间：2018-05-10</span>
                  </span>
                </div>
                <div class="cen">
                  <div class="cen_le layui-col-md12">
                    <div class="layui-col-md3">
                      <p>运单号：178NJIYD045</p>
                      <p>船名/航次：场景18/1782N</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>收货人：广州三乐科技有限公司</p>
                      <p>货名：钢筋</p>
                    </div>
                    <div class="layui-col-md3">
                      <p>航线：揭阳-青岛</p>
                      <p>箱型*箱量：20GP*1</p>
                    </div>
                    <div class="layui-col-md2">
                      <p class="se">状态：待送货</p>
                      <p class="se">天数：7天</p>
                    </div>
                    <div class="layui-col-md1">
                      <p class="a_niu">
                        <a title="确认" onclick="x_admin_show('查看','<?php echo url('Order/list_songhuo'); ?>',700,500)" href="javascript:;">确认</a>
                      </p>
                      <p class="a_niu">
                        <a class="qu" href="">取消</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="fo">
                  <a title="查看" onclick="x_admin_show('查看','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">查看订单</a>
                  <a title="修改" onclick="x_admin_show('修改','<?php echo url('Price/route_edit'); ?>',700,500)" href="javascript:;">修改订单</a>
                  <a title="删除" onclick="" href="javascript:;">删除订单</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <script>
      $('.order_a').css('margin-right', '3px');
      /*执行搜索车队或者港口*/
      function search() {
        $.ajax({
          type: 'post',
          url: "<?php echo url('admin/Contact/search'); ?>",
          data: $("#searchform").serialize(),
          dataType: "json",
          success: function (data) {
            alert("1111");
            if (data.status == 1) {
              return 1;
            } else {
              return 0;
            }
          }
        })
      }


      layui.use('laydate', function () {
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });


      /*用户-删除*/
      function member_del(obj, did) {
        layer.confirm('确认要删除吗？', function (index) {
          //转成数组形式
          var dataA = new Array()
          dataA[0] = did;
          var dataArray = { id: dataA }
          toajax(dataArray);
          $(obj).parents("tr").remove();
          layer.msg('已删除!', { icon: 1, time: 1000 });
        });
      }

      function delAll(argument) {
        var data = tableCheck.getData();
        layer.confirm('确认要删除吗？' + data, function (index) {
          //捉到所有被选中的，发异步进行删除
          var dataArray = { id: data };
          toajax(dataArray);
          layer.msg('删除成功', { icon: 1 });
          $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }


      function toajax(dataArray) {
        $.ajax({
          type: 'POST',
          url: "<?php echo url('admin/member/toDel'); ?>",
          data: dataArray,
          dataType: "json",
          success: function (data) {
            if (data.status == 1) {
              return 1;
            } else {
              return 0;
            }
          }
        })
      }
    </script>

  </body>

  </html>