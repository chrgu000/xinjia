<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\public\middle.html";i:1526551238;}*/ ?>
<body>
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6b8;</i>
                        <cite>会员管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('Member/mList'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>会员列表</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>会员权限</cite>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="iconfont">&#xe70b;</i>
                                <cite>会员管理</cite>
                                <i class="iconfont nav_right">&#xe697;</i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a _href="xxx.html">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>会员列表</cite>

                                    </a>
                                </li>
                                <li>
                                    <a _href="xx.html">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>会员删除</cite>

                                    </a>
                                </li>
                                <li>
                                    <a _href="xx.html">
                                        <i class="iconfont">&#xe6a7;</i>
                                        <cite>等级管理</cite>

                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe723;</i>
                        <cite>订单管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('Order/order_audit'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>审核订单</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('Order/order_list'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>处理订单</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('Order/order_waste'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>查看订单</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('Order/order_edit'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>废弃订单</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe723;</i>
                        <cite>运价设置</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('Price/price_route'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>航线运价</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('Price/price_trailer'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>拖车运价</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe726;</i>
                        <cite>管理员管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="admin-list.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>管理员列表</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="admin-role.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>角色管理</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="admin-cate.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>权限分类</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="admin-rule.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>权限管理</cite>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe725;</i>
                        <cite>通讯录</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="<?php echo url('Car/car_list'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>车队通讯录</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('Ship/ship_List'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>船公司通讯录</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('ShipMan/man_list'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>船公司人员资料</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="<?php echo url('Car_Man/man_List'); ?>">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>车队人员资料</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="admin-rule.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>权限管理</cite>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6ce;</i>
                        <cite>系统统计</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="echarts1.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>拆线图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts2.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>柱状图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts3.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>地图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts4.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>饼图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts5.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>雷达图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts6.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>k线图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts7.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>热力图</cite>
                            </a>
                        </li>
                        <li>
                            <a _href="echarts8.html">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>仪表图</cite>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <script>
        window.onload = function func() {
            $(document).click(function () { return true; });
        }
    </script>>
</body>

</html>