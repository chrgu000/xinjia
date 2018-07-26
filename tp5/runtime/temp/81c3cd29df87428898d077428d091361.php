<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"E:\xampp\htdocs\xinjia\tp5\public/../application/admin\view\port\shiproute_add.html";i:1531300152;s:68:"E:\xampp\htdocs\xinjia\tp5\application\admin\view\public\header.html";i:1531300152;}*/ ?>
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
<!--    <style>
        .layui-btn+.layui-btn {
            margin: 2px;
        }
    </style>-->
    <body>
        <div class="x-body">
<!--        <link rel="stylesheet" href="/static/admin/css/route_add.css">-->
        <form class="layui-form" id="routeaddform">
            <div class="route layui-row">
                <!-- 港口航线 -->
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">港口航线选择</label>
                         <div class="layui-input-inline">
                            <select name="province" lay-filter="province" >
                                <option value="">请选择省</option>
                            </select>
                        </div>
                    <div class="layui-input-inline" id ='citydiv' style="display: none;">
                        <select name="city" lay-filter="city" >
                            <option value="">请选择市</option>
                        </select>
                    </div>
                    <div class="layui-input-inline" style="display: none;">
                        <select name="area"  lay-filter="area">
                            <option value="">请选择港口</option>
                        </select>
                    </div>
<!--                        <div class="layui-input-inline" style="width: 100px;">
                            <select name="price_start" lay-filter="aihao">
                                <option value="">起点</option>
                                <option value="1">黄埔港</option>
                                <option value="2">天津港</option>
                                <option value="3">南沙港</option>
                                <option value="4">佛山港</option>
                            </select>
                        </div>
                        <div class="layui-form-mid">-</div>
                        <div class="layui-input-inline" style="width: 100px;">
                            <select name="price_end">
                                <option value="">终点</option>
                                <option value="1">黄埔港</option>
                                <option value="2">天津港</option>
                                <option value="3">南沙港</option>
                                <option value="4">佛山港</option>
                            </select>
                        </div>-->
                    </div>
<!--                    <input type="button" class="layui-btn price" value="确定">-->
                </div>
                <!-- 航线详情 -->
<!--                <div class="layui-form-item">
                    <label class="layui-form-label">航线详情</label>
                    <div class="layui-col-xs7">
                        <select name="port" lay-filter="port" lay-search>
                            <option value="">请选择港口</option>
                        </select>
                    </div>
                </div>
                <div class="layui-col-xs12 bu">
                    <button class="layui-btn layui-btn-normal" style="display: inline;"><span>起点</span><input type="hidden" name="port_name[]" value=""></button>
                    <span id="search_port"></span>
                    <button class="layui-btn layui-btn-normal" style="display: inline;"><span>终点</span><input type="hidden" name="port_name[]" value=""></button>
                </div>-->
                <!-- 按钮 -->
                 </div>
                    <label class="layui-form-label">港口航线</label>
                    <div class="layui-input-inline">
                            <div class="layui-form-item" id ="search_port">
                            </div> 
                    </div>
                </div>
                    <div class="layui-input-block an">
                        <button type="button" class="layui-btn" onclick="toajax()">添加</button>
                        <button class="layui-btn cancel">取消</button>
                    </div>
                </div>

        </form> </div>
<!--    <script type="text/javascript">
            //给航线详情添加样式
            $('.bu>input,.bu>span>button').css('margin', '5px');

            //当确认起点和终点时
            $('.price').click(function () {
                var qi = $('select[name=price_start] option:selected');
                var zhong = $('select[name=price_end] option:selected');
                $('.bu>button').eq(0).attr('id',qi.val()+'_'+qi.text()).find('span').html(qi.text()).siblings('input').val(qi.val());
                $('.bu>button').eq(1).attr('id',zhong.val()+'_'+zhong.text()).find('span').html(zhong.text()).siblings('input').val(zhong.val());
            });

            function jj() {
                $('.bu input').each(function () {
                    console.log($(this).val());
                });
            }
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

    </script>-->
    <script type="text/javascript" src="/static/admin/js/area.js"></script>
<script type="text/javascript" src="/static/admin/js/port.js"></script>
 <script>
      
        //加载 所有的港口名字和相应的code
        var js_port = JS_PORT;
        var url='<?php echo url('admin/Port/shiproute_toadd'); ?>';
       
        //初始数据
        var areaData = Area;
        var $form;
        var form;
        var $;
        layui.use(['jquery', 'form'], function() {
            $ = layui.jquery;
            form = layui.form;
            $form = $('form');
            loadProvince();  //选择港口
            oldshipPort();//原有船公司的港口和城市
        });   
        
  
    //加载省数据
        function loadProvince() {
            var proHtml = '';
            for (var i = 0; i < areaData.length; i++) {
                proHtml += '<option value="' + areaData[i].provinceCode + '_' + areaData[i].mallCityList.length + '_' + i + '">' + areaData[i].provinceName + '</option>';
            }
            //初始化省数据
            $form.find('select[name=province]').append(proHtml);
            form.render();
            form.on('select(province)', function(data) {
                $form.find('select[name=area]').html('<option value="">请选择县/区</option>').parent().hide();
                var value = data.value;
                var d = value.split('_');
                var code = d[0];
                var count = d[1];
                var index = d[2];
                if (count > 0) {
                    loadCity(areaData[index].mallCityList);
                } else {
                    $form.find('select[name=city]').parent().hide();
                }
            });
        }
        
    //加载市数据
        function loadCity(citys) {
            var cityHtml = '';
            for (var i = 0; i < citys.length; i++) {
                cityHtml += '<option value="' + citys[i].cityCode + '_' + citys[i].mallAreaList.length + '_' + i + '">' + citys[i].cityName + '</option>';
            }
            $form.find('select[name=city]').html(cityHtml).parent().show();
            form.render();
            form.on('select(city)', function(data) {
                var value = data.value;
                var d = value.split('_');
                var code = d[0];
                var count = d[1];
                var index = d[2];
                if (count > 0) {
                    //将城市Id 传给港口loadPort()
                    loadPort(citys[index].cityCode);
                } else {
                    $form.find('select[name=area]').parent().hide();
                }
            });
        }
     
        //加载对应城市的港口，
        function loadPort(CityCode){
            var port_arr =  js_port[CityCode];
            var areaHtml = '';
            if(typeof(port_arr) !== 'undefined' && port_arr!=0){
                var port_length =port_arr.length;
                for(var i=0;i<port_length;i++){
                    areaHtml += '<option  value="' + port_arr[i].id +'_'+ port_arr[i].port_name + '">' + port_arr[i].port_name + '</option>';  
                }
            }else{
                    areaHtml = '<option  value="">此城市无港口</option>'; 
            }
            $form.find('select[name=area]').html(areaHtml).parent().show();
            form.render();
            
            form.on('select(area)', function(data) {
                 var port =data.value.split('_');
                 var port_id =port['0'];
                 var port_name=port['1'];
                var mark = document.getElementById('search_port');
                 //已经存的港口就不执行
                if(! document.getElementById(port_id+'_'+port_name)  ){
                        selectPortShip(port_id,port_name,mark);
                } 
            } ) 
        
        }
        
        function  selectPortShip(port_id,port_name,mark){
            var btn =document.createElement('button');
                btn.className="layui-btn layui-btn-normal";
                btn.style="display: inline\;" ;
                btn.innerHTML=port_name;
                btn.setAttribute('id',(port_id+'_'+port_name))
                btn.addEventListener("click",function() {
                        del(this);
                        return false;
                });
            var ipt= document.createElement('input');
                ipt.type="hidden";
                ipt.name='port_code[]';
                ipt.value=port_id;
            var  i_tag=document.createElement('i');
                 i_tag.className="layui-icon";
                 i_tag.innerHTML="&#xe640\;";
            btn.appendChild(ipt);   
            btn.appendChild(i_tag);
            mark.appendChild(btn);
         }
        
         function del(obj){
            obj.setAttribute('style','display: none;');
           // 删除button的子节点
            var childs = obj.childNodes; 
                for(var i = childs.length - 1; i >= 0; i--) { 
                    obj.removeChild(childs[i]); 
                }
                //删除本身button
                obj.parentNode.removeChild(obj);
         }
         
        function toajax (){
                var loading = layer.load(1);
                post_adduser = true;    
                $.ajax({
                    type:'POST',
                    url:url,
                    data:$("#routeaddform").serialize(),
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