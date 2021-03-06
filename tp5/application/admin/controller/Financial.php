<?php
/*
 *  财务中心
 */
namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use think\Db;
use think\Session;
class Financial extends Base
{

    
    //账单列表
    public function financial_list() 
    {
      return $this->view->fetch('financial/financial_list'); 
    }
    //修改账单列表
    public function financial_edit() 
    {
      return $this->view->fetch('financial/financial_edit'); 
    }
    //详情账单列表
    public function financial_select() 
    {
        return $this->view->fetch('financial/financial_select'); 
    }
    //客户订单
    public function customer_list() 
    {
        return $this->view->fetch('financial/customer_list'); 
    }
    //客户报表截取时间
    public function customer_data() 
    {
        return $this->view->fetch('financial/customer_data'); 
    }
    //公司报表
    public function company_form() 
    {
        return $this->view->fetch('financial/company_form'); 
    }
    //修改公司报表
    public function company_edit() 
    {
      return $this->view->fetch('financial/company_edit'); 
    }
    
     //放货对账付款状态更改页面
    public function OrderPortCenter(){
        return $this->view->fetch('financial/OrderPortCenter'); 
    }
    //收款状态修改
    public function orderport_money(){
        $order_num = $this->request->post('order_num');
        //同时修改订单的付款状态
        // 启动事务
        $mtime =  date('Y-m-d H:is:s');
        Db::startTrans();
        try{
            $res =Db::name('order_port')->where('order_num',$order_num)
                    ->update(['money_status'=>'do','mtime'=>$mtime]);
            Db::commit();    
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return array('status'=>0,'message'=>'操作失败');
        }
        $data = new \app\admin\model\OrderProcess();
        $status= $this->order_status['payment_status'];
        $action='确认收款';
        $data->orderUpdate($order_num,$status,$action);
        return array('status'=>1,'message'=>'操作成功');
    }
    
      //订单的扣柜状态更改 通过和 驳回,需要填写说明
    public function orderport_judgment() 
    { 
       if (request()->isAjax()){
            $data =$this->request->param();
//             var_dump($data);exit;
            $type =$data['type'];
            $order_num =$data['order_num'];
            $comment =$data['comment'];
            $mtime =  date('Y-m-d H:is:s');
            //$type 的值是pass就放柜，fail 就不放柜
            if($type=='fail'){
                $status = $this->order_status['container_lock'];
                $title='申请放柜>驳回';
                $map= ['container_buckle'=>'lock','mtime'=>$mtime];
            }elseif($type=='pass') {
                $status = $this->order_status['container_unlock'];
                $map= ['container_buckle'=>'unlock','mtime'=>$mtime];
                $title='申请放柜>通过';
            }
            //同时修改订单的扣柜状态
            $res =Db::name('order_port')
                ->where('order_num',$order_num)->update($map);
            $data = new \app\admin\model\OrderProcess();
            $response= $data->orderUpdate($order_num,$status,$title,$comment);
            return $response;
       }
    }
    
    //账单中心放货对账
    public function OrderPortdata(){
        //用户名，订单号，起始日期，结束日期，审核中apply，扣货lock，已放货unlock， 所有订单2，已付款1，未付款0，
        $member = $this->request->param('member','not null','strval');
        $member = $member? $member:'not null';
        $order_num = $this->request->param('order_num','not null','strval');
        $order_num =$order_num ?$order_num:'not null';
        $date_start = $this->request->param('date_start',date('y-m-d h:i:s',strtotime('-3month')));
        $date_start=$date_start ?$date_start :date('y-m-d H:i:s',strtotime('-3month'));
        $date_end = $this->request->param('date_end',date('y-m-d H:i:s'));
        $date_end=$date_end ?$date_end :date('y-m-d H:i:s');
        $container_buckle = $this->request->param('container_buckle','apply','strval');
        if($container_buckle=='all'){$container_buckle ='not null'; }
//         var_dump($container_buckle);exit;
        $money_status = $this->request->param('money_status','nodo','strval');
//        var_dump($money_status);exit;
        if($money_status == 'all'){
            $money_status = 'not null';
        }
        $page =$this->request->param('page',1,'intval');
        $limit =$this->request->param('limit',10,'intval');
        $list =Db::name('order_bill')->alias('OB')
                ->join('hl_member M','M.member_code=OB.member_code','left')
                ->join('hl_order_port OP','OP.order_num =OB.order_num','left')
                ->field('OB.*,M.name,OP.status,OP.money_status,OP.container_buckle,'
                        . 'OP.container_status,OP.extra_info')
                ->where('OB.member_code|M.name',$member)
                ->where('OB.order_num',$order_num)
                ->whereTime('OB.ctime','between', [$date_start, $date_end])
                ->where('OP.container_buckle',$container_buckle)
                ->where('OP.money_status',$money_status)->group('OB.order_num')
                ->order('ctime desc,mtime desc')->buildSql();
//         var_dump($list);exit;
        $count =  Db::table($list.' a')->count();
        $list = Db::table($list.' a')->page($page,$limit)->select();
//        $this->_p($list);exit;
        foreach($list as $key=>$value){

            switch($value['container_buckle'])
            {
                case 'lock':
                $list[$key]['container_buckle'] ='扣货';
                break;   
                case 'unlock':
                $list[$key]['container_buckle'] ='放货';
                break;  
                case 'apply':
                $list[$key]['container_buckle'] ='申请放货';
                break;  
           }
           
           switch($value['money_status'])
           {
                case 'nodo':
                $list[$key]['money_status'] ='未付款';
                break; 
                case 'do':
                $list[$key]['money_status'] ='已付款';
                break; 
            }
            switch($value['status'])
           {
                case $this->order_status['cancel']:
                $list[$key]['status'] ='订单取消';
                break; 
                case $this->order_status['order_audit']:
                $list[$key]['status'] ='订单审核中';
                break;
                case $this->order_status['completion']:
                $list[$key]['status'] ='订单已完成';
                break;  
                default:
                $list[$key]['status'] ='订单进行中';  
            }


        }
        
        return array('code'=>0,'msg'=>'','count'=>$count,'data'=>$list,
            'member'=>$member,'order_num'=>$order_num,'date_start'=>$date_start,
            'date_end'=>$date_end,'container_buckle'=>$container_buckle,
            'money_status'=>$money_status); 
    }       

    public function check_date(){
        $data =$this->request->param();
//        var_dump($data);exit; 
        $order_num_arr =$data['data'];
        $time =$data['time'];
        $mtime =  date('Y-m-d H:i:s');
        //先查询是否已经订单完成了,在能输入对账日期
        $status_res  = Db::name('order_bill')->alias('OB')
                ->join('hl_order_port OP','OB.order_num = OP.order_num','left')
                ->where('OP.order_num','in',$order_num_arr)
                ->column('OP.order_num,OP.status');
            
        $arr =[];
        foreach ($status_res as $key => $value) {
            if($value!= $this->order_status['completion']){
                $arr[]=$key;
            };
        }        
        if($arr){
            return json(array('status'=>0,'message'=>'订单未完成不可对账'.implode(',', $arr))) ;
        }
        
        //更新账单的对账日期
        $res = Db::name('order_bill')->where('order_num','in',$order_num_arr)
                ->update(['check_date'=>$time,'mtime'=>$mtime]);
        if($res){
            //记录操作人员    
            $tmp =[];
            $orderProcessM =new \app\admin\model\OrderProcess();  
            foreach ($order_num_arr as $order_num) {
               $tmp[] = $orderProcessM->orderUpdate($order_num,$this->order_status['check_bill'],$title='完成对账');
            }
            $status_arr = array_column($tmp, 'status');
            $message_arr = array_column($tmp, 'message');
            $bz =array_search('0', $status_arr);
            if($bz){
                json(array('status'=>0,'message'=>$message_arr[$bz]));
            }  else {
                return  json(['status'=>1,'message'=>'操作成功']);
            }
        }  else {
            return json(array('status'=>0,'message'=>'操作失败'));
        }
       
       
    }

    //确认完成订单
    public function  Order_completion() {
    
            $order_num =$this->request->param('order_num');
            $status = $this->order_status['completion'];
            //先判断是否已经付款了,和对过帐了
            $data = Db::name('order_port')->alias('OP')
                    ->join('hl_order_bill OB','OP.order_num = OB.order_num')
                    ->field('OP.money_status,OB.check_date')
                    ->where('OP.order_num',$order_num)->find();
            if($data['money_status']=='nodo'){
                return json(array('status'=>0,'message'=>'还未付款') );
            }
            // if(empty($data['check_date'])){
            //     return json(array('status'=>0,'message'=>'还未对账') );
            // }
            $title='订单完成';
            $data = new \app\admin\model\OrderProcess();  
            $response= $data->orderUpdate($order_num,$status,$title);
            
            return $response;
    }
    
} 

