<<<<<<< HEAD
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\index\cargo_track.html";i:1531712018;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1531300153;}*/ ?>
=======
<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\index\cargo_track.html";i:1531404673;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1530532388;}*/ ?>
>>>>>>> bdeb31dd35e95415df0914d7df28f6b470ebb94c
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
    <link rel="stylesheet" href="/static/index/css/check.css">
    <div class="select layui-row">
      <!-- 查询类型 -->
      <div class="le layui-col-xs3">
        <h2><strong>公共查询</strong></h2>
        <p>Public query</p>
        <ul class="select_ul">
          <li>集装箱查询</li>
          <li>船舶GPS定位</li>
        </ul>
      </div>
      <!-- 查询输入框 -->
      <div class="rig layui-col-xs8 layui-col-md-offset1">
        <div class="head">
          <div class="head_le layui-col-xs7">
            <ul class="head_ul">
              <li>查询信息</li>
              <li>历史查询记录</li>
            </ul>
            <!-- 查询表单 -->
            <form class="layui-form" id ='track_form'>
              <div class="layui-form-item">
                  <input type="text" name="waybillNum"  value="<?php echo !empty($waybillNum)?$waybillNum :''; ?>" required  lay-verify="required" placeholder="运单号" autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-item">
                  <input type="text" name="boxNum" value="<?php echo !empty($boxNum)?$boxNum :''; ?>" required  lay-verify="required" placeholder="集装箱号" autocomplete="off" class="layui-input">
              </div>
                      
              <div class="layui-form-item ti">
                <button type ='button'class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo" onclick="toajax ()"> 立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
              </div>
            </form>
          </div>


          <!-- 关注公众号 -->
          <div class="head_rig layui-col-xs4 layui-col-md-offset1">
            <div class="gong">
              <div class="er"></div>
              关注微信公众号
            </div>
            <div class="guan">
              <div class="er"></div>
              关注月结管家
            </div>
          </div>
        </div>
        <!-- 查询内容 -->
        <div class="foot">
          <ul class="foot_ul">
            <li>时间</li>
            <li>地址跟踪</li>
          </ul>

          <ul class="layui-timeline">
            <li class="layui-timeline-item  layui-col-xs11">
              <div class="sjz layui-col-xs2">2018-03-06<br />20:25&nbsp;星期二</div>
              <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
              <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
              </h3>
              </div>
            </li>
            <li class="layui-timeline-item layui-col-xs11">
              <div class="sjz layui-col-xs2">2018-03-06<br />20:25&nbsp;星期二</div>
              <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
              <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">杜甫的思想核心是儒家的仁政思想，他有“<em>致君尧舜上，再使风俗淳</em>”的宏伟抱负。个人最爱的名篇有</h3>
              </div>
            </li>
            <li class="layui-timeline-item layui-col-xs11">
              <div class="sjz layui-col-xs2">2018-03-06<br />20:25&nbsp;星期二</div>
              <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
              <div class="layui-timeline-content layui-text">
                <h3 class="layui-timeline-title">中国人民抗日战争胜利72周年
                </h3>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="rig layui-col-xs8 layui-col-md-offset1">
        <div class="head">
          <!-- 订单号 -->
        <div class="layui-col-xs12">
          <div class="grid-demo">
            <div class="layui-form-item">
              <label class="layui-form-label">订单号：</label>
              <div class="layui-input-inline">
                <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
              </div>
              <div class="layui-input-inline" style="float:right;">
                  <button class="layui-btn btn_sou" lay-submit=""  lay-filter="demo1">搜索</button>
              </div>
            </div>
          </div>
        </div>
        <div class="ditu">
          地图
        </div>
        </div>
      </div>
    </div>

    
    <script type="text/javascript">
    //公共查询的切换
      $('.select_ul li').eq(0).addClass('select_li');
      $('.rig').eq(0).show();
      $('.select_ul li').click(function(event) {
        $(this).addClass('select_li').siblings('li').removeClass('select_li');
        $('.rig').eq($(this).index()).show().siblings('.rig').hide();
      });

      //查询信息的切换
      $('.head_ul li').eq(0).addClass('head_li');
      $('.head_ul li').click(function(event) {
        $(this).addClass('head_li').siblings('li').removeClass('head_li');
      });
    function toajax (){
      $.ajax({
          type:'POST',
          url:"<?php echo url('index/Cargotrack/tracking'); ?>",    
          data:$("#track_form").serialize(),
          dataType:"json",
          success:function(status){
                      console.log(status)
                      }
      })
    }
    
      
    </script>
  </body>
</html>
