<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\public\middle.html";i:1528339083;s:87:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\carshipman\shipman_add.html";i:1528774022;s:68:"E:\xampp\htdocs\xinjia\tp5\application\admin\view\public\header.html";i:1524122628;}*/ ?>
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
    <div class="x-body">
        <form class="layui-form" id="shipaddform" >
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>姓名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="car_name" name="name" class="layui-input" value="">
                </div>
                 <label class="layui-form-label">
                    <span class="x-red">*</span>职务
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="car_name" name="position" class="layui-input" value="">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>负责路线
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="address" name="duty_line" class="layui-input" value="">
                </div>
            </div> 
             <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>电话
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="address" name="sn_tel" class="layui-input" value="">
                </div>
                <label class="layui-form-label">
                    <span class="x-red">*</span>手机
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="address" name="sn_mobile" class="layui-input" value="">
                </div>
            </div>
             <div class="layui-form-item">
                <label class="layui-form-label">
                    <span class="x-red">*</span>QQ
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="address" name="sn_qq" class="layui-input" value="">
                </div>
                <label class="layui-form-label">
                    <span class="x-red">*</span>传真
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="address" name="sn_fax" class="layui-input" value="">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">
                <span class="x-red">*</span>船公司港口
                </label>
                <div class="layui-input-inline">
                    <select name="ship" lay-filter="ship" lay-search >
                        <option value="">请选择船公司</option>
                    </select>
                </div>
                 <div class="layui-input-inline"  style="display: none;">
                    <select name="city" lay-filter="city" lay-search>
                        <option value="">请选择城市</option>
                    </select>
                </div>
                <div class="layui-input-inline"  style="display: none;">
                    <select name="port" lay-filter="port" lay-search>
                        <option value="">请选择港口</option>
                    </select>
                </div>
            </div>
        <!--  <button id="btn_tag" class="layui-btn layui-btn-normal"  style="display: none;"  onclick="del(this) ;return false">
               <input id ="input_tag" type="hidden"  name="name" value="id"><i id ="i_tag" class="layui-icon">&#xe640;</i> </button>-->
            <div class="layui-form-item" id ="search_port">
            </div>
            
            <div class="layui-form-item">
                <label  class="layui-form-label">
                </label>
                <input type="button" value="确 认" class="layui-btn" id="editbtn"  onclick="toajax()"> 
            </div>
        </form>
    </div>
    <script type="text/javascript" src="/static/admin/js/ship_port.js"></script>       
    <script>
       var port_list= SHIP_PORT; 
     // console.log(port_list);
         //  port_list=JSON.parse(port_list); 
        //ajax url生成
        
       var url="<?php echo url('admin/ShipMan/to_add'); ?>";
       //初始数据
        var areaData = port_list;
        var $form;
        var form;
        var $;
        layui.use(['jquery', 'form'], function() {
            $ = layui.jquery;
            form = layui.form;
            $form = $('form');
            loadShip();  //选择港口
        }); 
        
    
    //加载省数据
        function loadShip() {
            var shipHtml = '';
            for (var i = 0; i < areaData.length; i++) {
                shipHtml += '<option value="' + areaData[i].ship_id + '_'+ areaData[i].citylist.length + '_' + i + '">' + areaData[i].ship_name + '</option>';
            }
            //初始化船公司的数据
            $form.find('select[name=ship]').append(shipHtml).parent();
            form.render();
            form.on('select(ship)', function(data) {
                $form.find('select[name=port]').html('<option value="">请选择港口</option>').parent().hide();
                var value = data.value;
                var d = value.split('_');
                var ship_id = d[0];
                var count = d[1];
                var index = d[2];
                if (count > 0) {
                    loadcity(areaData[index].citylist);
                } else {
                    $form.find('select[name=ship]').parent().hide();
                }
            });
        }
   
        
    //加载市数据
        function loadcity(citys) {
           
            var cityHtml = '';
            for (var i = 0; i < citys.length; i++) {                              
                cityHtml += '<option value="' + citys[i].city_id + '_' + citys[i].portlist.length + '_' + i + '">' + citys[i].city + '</option>';
            }
           
            $form.find('select[name=city]').html(cityHtml).parent().show();
            form.render();
            form.on('select(city)', function(data) {
                var value = data.value;
                var d = value.split('_');
                var city_id = d[0];
                var count = d[1];
                var index = d[2];
                if (count > 0) {
                    loadport(citys[index].portlist);
                } else {
                    $form.find('select[name=city]').parent().hide();
                }
            });
        }    
        
        function loadport(ports) {
            var portHtml = '';
            for (var i = 0; i < ports.length; i++) {
                portHtml += '<option value="' + ports[i].port_id + '_' + ports.length + '_' + i + '">' + ports[i].port_name + '</option>';
            }
           
            $form.find('select[name=port]').html(portHtml).parent().show();
            form.render();
            form.on('select(port)', function(data) {
                //数据
            });
        }
        
        
        function toajax (){
            var loading = layer.load(1);
            post_adduser = true;    
                $.ajax({
                    type:'POST',
                    url:url,    
                    data: $("#shipaddform").serialize(),
                    dataType:"json",
                    success:function(status){
                        if(status>0){
                            post_adduser = false;
                            layer.close(loading);
                            layer.msg("添加成功", { icon: 6, time: 1000 }, function () {
                            // 获得frame索引
                            parent.location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            //关闭当前frame
                            parent.layer.close(index);
                        });
                        }else{
                            post_adduser = false;
                            layer.close(loading);
                            layer.msg("添加失败", { icon: 5 });
                            }
                            },
                        error: function () {
                                post_adduser = false; //AJAX失败也需要将标志标记为可提交状态
                                layer.close(loading);
                                layer.msg("添加失败", { icon: 5 });
                            }
                });
                return false;//只此一句
            }               
        
     
 </script>
</body>
</html>

