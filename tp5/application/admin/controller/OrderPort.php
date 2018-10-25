<?php
namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use app\admin\model\orderPort as OrderM;
use think\Db;
use app\index\model\Order as IndexOrderM;

class OrderPort extends Base
{   
    
    private $order_status;
    private $page=5;

    public function _initialize()
    {  
        $this->order_status=config('config.order_status');
  
    }


    public function Upload()
    {
        // 获取表单上传文件,订单号，上传文件的类别 
        // sea_waybill 水运单  book_note 订舱单
        $file = request()->file('file');
        $order_num = $this->request->get('order_num');
        $type = $this->request->get('type');
        $rename = $order_num.'_'.$type;
         // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>2097152,'ext'=>'text,txt,pdf,docx,doc,docm,dotx,dotm'])
                 ->move(ROOT_PATH . 'public' . DS . 'uploads',$rename);
        $response =[];
        if($info){
            $reFile = str_replace('.','_',$info->getSaveName());
             // 将A926548346305370_book_note.pdf文档存进order_port表里
            $res = Db::name('order_port')->where('order_num',$order_num)
                    ->update([$type=>$reFile]);
            $res ? $response=['status'>1,'mssage'=>'提交成功']:$response=['status'>0,'mssage'=>'提交失败'];
            //文件上传成功后更新订单状态
            if($res){
                  // 上传成功
                 return['status'=>1,'mssage'=>'上传成功'] ;
            }
        }else{
            // 上传失败获取错误信息
            return['status'=>0,'mssage'=>$file->getError()] ;
        }


    }
    
    public function downs(){    
            $order_name = $this->request->param('order_num');    //下载文件名  
            $type = $this->request->param('type'); //文件类型
            $file = Db::name('order_port')->where('order_num',$order_name)->value($type);
            var_dump($file);
            //将后缀修改成.
            $file_Extension= strstr(strrev($file),'_',true);
            $file_name = substr($file,0,strrpos($file, '_')).'.'.$file_Extension;     
//              var_dump($file_name);exit;
            $file_dir = ROOT_PATH . 'public' . DS . 'uploads';        //下载文件存放目录    
            //检查文件是否存在    
//            var_dump($file_dir .DS. $file_name);exit;
            if (! file_exists ($file_dir .DS. $file_name)) {    
                echo "文件找不到";    
                exit ();    
            } else {    
                //打开文件
//                var_dump($file_dir .DS. $file_name);
                $file = fopen ($file_dir .DS. $file_name, "r" );    
                //输入文件标签     
                Header ( "Content-type: application/octet-stream" );    
                Header ( "Accept-Ranges: bytes" );    
                Header ( "Accept-Length: " . filesize ($file_dir .DS. $file_name) );    
                Header ( "Content-Disposition: attachment; filename=" . $file_name );    
                //输出文件内容     
                //读取文件内容并直接输出到浏览器    
                echo fread ( $file, filesize ($file_dir .DS. $file_name) );    
                fclose ( $file );    
                exit ();    
            }    

        }

    //审核订单的列表页面
    public function order_audit() 
    {
        $data = new OrderM;
        $list = $data->order_audit($this->page,$this->status['order_audit']);
        $page =$list->render();
        $count =  count($list);
        $this->view->assign('count',$count);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page);
        return $this->view->fetch('orderPort/order_audit'); 
    }
        //审核详情页
    public function audit_page()
    {   
        $order_num =  $this->request->get('order_num');
        $data = new OrderM;
        $dataArr = $data->orderData($order_num);
//        $this->_p($dataArr);exit;

        $this->assign([
            'list'  =>$dataArr['list'],
            'containerData' => $dataArr['containerData'],
            'carData'=> $dataArr['carData'],
            'shipperArr'=>$dataArr['shipperArr'],
            'consignerArr'=>$dataArr['consignerArr'],
            'discount'=>$dataArr['discount']
        ]);;
        return $this->view->fetch('orderPort/audit_page');
    }
    
  
    //上传订舱单文件,运单号和 水运单文件
    //参数 type= booking_note或者sea_waybill
    //订单号码
    public function waybill(){
        $file = request()->file('file');
        $order_num = $this->request->get('order_num');
        $type = $this->request->get('type');
        
    }

    //港到港 处理订单公共页
    public function portList()
    {   
        return $this->view->fetch('orderPort/port_list');
    }
    //所有订单
    public function portlist_data()
    {    
//      var_dump($this->order_status['stop']);exit;
        //订单查询
        $order_num =  $this->request->param('order_num');
        //获取每页显示的条数
        $limit= $this->request->param('limit',10,'intval');
        //获取当前页数
        $page= $this->request->param('page',1,'intval');  
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $data = new OrderM;
        $list = $data->order_status($tol,$limit,array(3,4,5,6),$order_num);
    //    $this->_p($list);exit;
        $count =  count($list);
        $this->view->assign('count',$count);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page);
        $this->view->assign('order_num',$order_num);
        $this->view->assign('page',$page); 
        $this->view->assign('count',$count); 
        $this->view->assign('limit',$limit); 
        $this->view->assign('url',url('admin/OrderPort/all_order')); 
        return $this->view->fetch('orderPort/all_order');
    }
    //在线支付
    public function port_payment()
    {   
             //订单查询
        $order_num =  $this->request->param('order_num');
        //获取每页显示的条数
        $limit= $this->request->param('limit',10,'intval');
        //获取当前页数
        $page= $this->request->param('page',1,'intval');  
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $data = new OrderM;
        $list = $data->order_status($tol,$limit,array(3,4,5,6),$order_num,'cash');
//        $this->_p($list);exit;
        $count =  count($list);
        $this->view->assign('count',$count);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page);
        $this->view->assign('order_num',$order_num);
        $this->view->assign('page',$page); 
        $this->view->assign('count',$count); 
        $this->view->assign('limit',$limit); 
        $this->view->assign('url',url('admin/OrderPort/port_payment')); 
        return $this->view->fetch('orderPort/all_order');
    }
    //月结
    public function port_month()
    {   
         //订单查询
        $order_num =  $this->request->param('order_num');
        //获取每页显示的条数
        $limit= $this->request->param('limit',10,'intval');
        //获取当前页数
        $page= $this->request->param('page',1,'intval');  
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $data = new OrderM;
        $list = $data->order_status($tol,$limit,array(3,4,5,6),$order_num,'monthly');
//        $this->_p($list);exit;
        $count =  count($list);
        $this->view->assign('count',$count);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page);
        $this->view->assign('order_num',$order_num);
        $this->view->assign('page',$page); 
        $this->view->assign('count',$count); 
        $this->view->assign('limit',$limit); 
        $this->view->assign('url',url('admin/OrderPort/port_month')); 
        return $this->view->fetch('orderPort/all_order');
    }
    //详情
    public function port_details()
    {   
        $order_num =  $this->request->get('order_num');
        $data = new OrderM;
        $dataArr = $data->orderData($order_num);
//        $this->_p($dataArr['list']);exit;
        $this->assign([
            'list'  =>$dataArr['list'],
            'containerData' => $dataArr['containerData'],
            'carData'=> $dataArr['carData'],
            'shipperArr'=>$dataArr['shipperArr'],
            'consignerArr'=>$dataArr['consignerArr'],
            'discount'=>$dataArr['discount']
        ]);
        return $this->view->fetch('orderPort/port_details');
    }

    //已完成订单
    public function port_end()
    {    
        //订单查询
        $order_num =  $this->request->param('order_num');
        //获取每页显示的条数
        $limit= $this->request->param('limit',10,'intval');
        //获取当前页数
        $page= $this->request->param('page',1,'intval');  
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $data = new OrderM;
        $list = $data->order_status($tol,$limit,array(7),$order_num);
//        $this->_p($list);exit;
        $count =  count($list);
        $this->view->assign('count',$count);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page);
        $this->view->assign('order_num',$order_num);
        $this->view->assign('page',$page); 
        $this->view->assign('count',$count); 
        $this->view->assign('limit',$limit);
        $this->view->assign('url',url('admin/OrderPort/port_end')); 
        return $this->view->fetch('orderPort/all_order');
    }
    
    //订单删除
    public function  orderPortDel(){
        $idArr= $this->request->param();
        $res =Db::name('order_port')->where('id','in',$idArr['id'])->update([
            'status'=>505,'action'=>'订单删除']);
        $respones =[];
        $res ?$respones['success'][] ='订单删除成功':$respones['fail'][] ='订单删除失败';
        $dataM =new OrderM;
        $order_num =Db::name('order_port')->where('id','in',$idArr['id'])->column('order_num');
        $status = 505 ;$title = '订单删除';
        if($res){
        foreach ($order_num as  $value) {
            $res1=$dataM->orderUpdate($value,$status,$title) ;
            $res1 ?$respones['success'][] ='订单状态修改成功':$respones['fail'][] ='订单状态修改失败';
        }
        }
        if(array_key_exists('fail', $respones)){
            return array('status'>1,'mssage'>'删除成功');
        }else{
             return array('status'>0,'mssage'>'删除失败');
        }
    }
    
    //废弃订单
    public function order_cancel() {
        
        //订单查询
        $order_num =  $this->request->param('order_num');
        //获取每页显示的条数
        $limit= $this->request->param('limit',10,'intval');
        //获取当前页数
        $page= $this->request->param('page',1,'intval');  
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $data = new OrderM;
        $list = $data->order_status($tol,$limit,array(404,505),$order_num);
//        $this->_p($list);exit;
        $count =  count($list);
        $this->view->assign('count',$count);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page);
        $this->view->assign('order_num',$order_num);
        $this->view->assign('page',$page); 
        $this->view->assign('count',$count); 
        $this->view->assign('limit',$limit); 
        $this->view->assign('url',url('admin/OrderPort/order_cancel')); 
        return $this->view->fetch('orderPort/all_order');
    }
    //港到港的订单修改
    public function  orderEdit() {
        $data = $this->request->param();
//        $this->_p($data);exit;
        $order_num =$data['order_num'];  
//        //根据订单号查询
        $sqlData =Db::name('order_port')->where('order_num',$order_num)->field('member_code,seaprice_id,container_size')->find();
        $mtime= date('Y-m-d H:i:s');
        //对支付方式做判断
        $payment_method= $data['payment_method'];
        if(intval($payment_method)){
            $special= $payment_method;
            $payment_method='special';
        }  else {
            $special= 0;
        }
        $Pirce =new IndexOrderM;
        //计算单个柜优惠的金额
        $discount = $Pirce->dicountPrice($sqlData['member_code'],$sqlData['seaprice_id'],$sqlData['container_size'], $payment_method, $special);
        //计算装货费用和送货费用
        $truckageData = array('r'=>['container_code'=>$data['r_container_code'],'car_price'=>$data['r_car_price'],'num'=>$data['r_num'],'add'=>$data['r_add'],'link_man'=>$data['r_link_man'],'shipper'=>$data['shipper'],
                    'load_time'=>$data['r_load_time'],'link_phone'=>$data['r_link_phone'],'car'=>$data['r_car'],'comment'=>$data['r_comment']], 
                    's'=>['container_code'=>$data['s_container_code'],'car_price'=>$data['s_car_price'],'num'=>$data['s_num'],'add'=>$data['s_add'],'car'=>$data['s_car'], 'comment'=>$data['s_comment']] );
        $dataM  =  new OrderM;
        $truckagePrice = $dataM->truckage($order_num,$data['container_sum'], $truckageData);
        //计算出对应的海运费
        $seaPrice = Db::name('seaprice')->where('id',$sqlData['seaprice_id'])->value('price_'.$sqlData['container_size']);
  
        //计算总共的成本 (海运费 -优惠)*柜子数量 + 保险金额*6 + 装货费 +送货费;
        $quoted_price= ($seaPrice-$discount)*$data['container_sum'] + ($data['cargo_cost']*6) +$truckagePrice['carprice_r']+$truckagePrice['carprice_s'];
//        var_dump($seaPrice,$discount,$truckagePrice['carprice_r'],$truckagePrice['carprice_s']);exit;
     
        if(!(abs($quoted_price- $data['price_sum'])<0.00001)){
            return array('status'=>0,'mssage'=>'报价错误');
        } 
        if(!array_key_exists('invoice_if',$data)){
            $data['invoice_if']=0;
        }
        
        $shipper = implode(',',array($data['r_name'],$data['r_company'],$data['r_phone']));
        $consigner = implode(',',array($data['s_name'],$data['s_company'],$data['s_phone']));
        $fatherData= array('cargo'=>$data['cargo'],'track_num'=>$data['track_num'],
        'weight'=>$data['weight'],'cargo_cost'=>$data['cargo_cost'],
        'container_type_id'=>$data['container_type'],'comment'=>$data['comment'],'mtime'=>$mtime,
        'payment_method'=>$payment_method,'special_id'=>$special,'invoice_id'=>$data['invoice_if'],
        'shipper'=>$shipper,'consigner'=>$consigner,'seaprice'=>$data['money'],'premium'=>$data['premium'],'discount'=>$discount,
        'carprice_r'=>$truckagePrice['carprice_r'],'carprice_s'=>$truckagePrice['carprice_s'],'quoted_price'=>$quoted_price);
        //查询是否已经有了同样的订单了 判断依据是金额相同,创建时间相差90S内
        $starttime=date("Y-m-d H:i:s", strtotime("-90 seconds", time()));
        $res = Db::name('order_port')->where('order_num',$order_num)->where('mtime','between',[$starttime,$mtime])->find();
        if(empty($res)){
            $res1 = Db::name('order_port')->where('order_num',$order_num)->update($fatherData); 
            return $res1 ? array('status'=>1,'mssage'=>'修改成功'):array('status'=>0,'mssage'=>'修改失败');
        } else {
            return array('status'=>0,'mssage'=>'订单重复修改');
        }
        
    }



    
}
