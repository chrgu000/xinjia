//获取文本value值
function input_wu() {
    $('.er .in').each(function () {
        if ($(this).val() == '') {
            $(this).val('无');
        }
    })
}
function input_null() {
    $('.er .in').each(function () {
        if ($(this).val() == '无') {
            $(this).val('');
        }
    })
}
//修改设置
input_wu();
$('.in').css('border', '0');
function xiu() {
    var gai = $('.er_anniu .wt3').val();
    console.log(gai);

    if (gai == '修改' || gai == '') {
        $('.er_anniu .wt3').val('确认');
        $('.in').css('border', '1px solid #e6e6e6');
        $('.in').removeAttr('readonly');
        input_null();
    } else if (gai == '确认') {

        $('.er_anniu .wt3').val('修改');
        $('.in').css('border', '0');
        $('.in').attr('readonly', 'readonly');
        input_wu();
    }
}
//发票设置
$('#fk').change(function () {
    let fk = $(this).children('option:selected').val();
    if (fk == 3) {
        $('.jin input').removeClass('layui-disabled').attr('disabled', false);
    } else {
        $('.jin input').addClass('layui-disabled').attr('disabled', true);
    }
});

//开取发票
function kfp(fp) {
    if ($(fp).find('input[type="checkbox"]').prop('checked')) {
        $('.fp01').removeClass('layui-disabled').attr('disabled', false);
    } else {
        $('.fp01').addClass('layui-disabled').attr('disabled', true);
    }
};
//设置发票增税值
$('.fp01').change(function () {
    let fk = $(this).children('option:selected').val();
    if (fk == 0) {
        $('.tx').hide();
    } else {
        $('.tx').show();
    }
});

//柜量
for (let i = 1; i < 31; i++) {
    $('.guil').append("<option value='" + i + "'>" + i + "</option>");
}


// 接受后台的联系人资料
function selectlink(url) {
    var member_code = 'kehu001';
    var data = { 'member_code': member_code };
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: "json",
        success: function (status) {
            //接受数据 展示页面
             wt(status);
//            status =JSON.parse(status)
//            console.log(status);
        }
    });
}
var arr = [];

//展示委托信息
function wt(data) {
    var dataArray = eval(data);
    arr = dataArray;
    for (let i in dataArray) {
        $('.xin').append('<li class="layui-col-xs6">'
            + '<div class="nei" onclick="nei(this)">'
            + ' <div class="le">'
            + '<div class="tiao">姓名：</div>'
            + '<div class="tiao">手机号：</div>'
            + '<div class="tiao">公司名：</div>'
            + '<div class="tiao">装货地址：</div>'
            + '</div>'
            + '<div class="rig">'
            + '<div class="tiao_id" style="display: none;"> '+ dataArray[i].id + '</div>'
            + '<div class="tiao">' + dataArray[i].name + '</div>'
            + '<div class="tiao">' + dataArray[i].phone + '</div>'
            + '<div class="tiao">' + dataArray[i].company + '</div>'
            + '<div class="tiao wu">' + dataArray[i].address + '</div>'
            + '</div>'
            + '</div>'
            + '</li>'
        )
    }
}
//委托信息放input上
function nei(zj) {
    let id = $(zj).find('.tiao_id').html();//获取当前选中ID
    let lei = $(zj).parents('.xin')[0];//判断是送货还是收货
    let input = $('.er .in');//获取委托信息的input
    let nei;//当前选中的内容
    for (let i in arr) {
        if (arr[i].id = id) {
            nei = arr[i];
        }
    }

    if ($(lei).hasClass('song')) {
        $(input[0]).val(nei.company);
        $(input[1]).val(nei.name);
        $(input[2]).val(nei.phone);
        $(input[3]).val(nei.address);
    } else {
        $(input[4]).val(nei.company);
        $(input[5]).val(nei.name);
        $(input[6]).val(nei.phone);
        $(input[7]).val(nei.address);
    }
    $('#wt1').iziModal('close');
}

//收货/发货人的表单提交 
function linkman_btn() {
    var url = "<{:url('index/order/linkman')}>";
    var data = $("#linkman_form").serialize();
    toajax(url, data);
}

//发票的信息提交 
function invoice() {
    var url = "<{:url('index/order/invoice')}>";
    var data = $("#invoice_form").serialize();
    toajax(url, data);
}

//订单信息的提交
function order_data() {
    var url = "<{:url('index/order/order_data')}>";
    var data = $("#order_data_form").serialize();
    toajax(url, data);
}

function toajax(url, data) {
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        dataType: "json",
        success: function (status) {
            if (status == 1) {
                alert('提交表单成功');
                window.location.href = "<{:url('index/order/order_list')}>"
            }
        }
    });
    //return false;//只此一
}

//计算运费
function zong_sum(shu) {
    var money = $('.money').text();//纯运费
    var sum = $("#container_num option:selected").val();//柜量
    var bxje = $('#bxje').val();//保险金额
    var fp = $(".fp01 option:selected").val();//发票
    var zong = money * sum + bxje * 6;//总价格
    console.log(zong,zong * 1.038,zong * 1.06);
    if (shu == 1) {//发票6%
        zong = zong * 1.038;        
    }else if(shu == 2){//发票10%
        zong = zong * 1.06;  
    }
    zong = Math.round(zong*100)/100;//保留小数点后面两位
    $('#price_sum').html('￥' + zong); 

}
$('#container_num').change(function () {//监听柜量
    zong_sum(0);
})
$('#bxje').bind('input propertychange', function () {//监听保险金额
    zong_sum(0);
});
$('.fp01').change(function () {//发票柜量
    let fp = $(this).children('option:selected').val();
    if (fp == 1) {//6%
        zong_sum(fp);    
    } else if (fp == 2) {//10%
        zong_sum(fp);
    }else{//0%
        zong_sum(0);
    }
});