<?php
/*
 *  运价设置
 */
namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use app\admin\model\Price as PriceM;
use app\admin\model\Port as PortM;
use think\Db;

class Price extends Base
{   
//    public function __construct(Request $request = null) {
//        parent::__construct($request);
//        $this->request= $request;
//    }
     //航线运价
    public function price_route() 
    {   
        $ship_name =  input('get.ship_name');
        $port_start = input('get.s_port_name');
        $port_over = input('get.e_port_name');
        $port_start? $this->assign('s_port_name',$port_start):''; 
        $ship_name ? $this->assign('ship_name',$ship_name):''; 
        $port_over ? $this->assign('e_port_name',$port_over):''; 
        
        $route = new PriceM;
        $ship_name=trim($ship_name); $port_start=trim($port_start); $port_over=trim($port_over);
        $list = $route->price_route_list($ship_name,$port_start,$port_over ,5);
        $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->view->fetch('price/price_route'); 
    }
    //航线详情添加展示页面
    public function route_add(){
        
//        //传递船公司下面的船只
//        $sql ="select * from hl_boat ";
//        $boat_data = Db::query($sql);
//        $js_boat=json_encode($boat_data);
//        $this->view->assign('js_boat',$js_boat);
        $message =$this->quickMessage();
        $this->view->assign('message',$message);
        return $this->view->fetch('price/route_add');
    }
    //传递根据前面选择的起点和终点的中间线路行情
    public function route_select(){
        $data = $this->request->param();
     //   $this->_v($data);exit;
        $sl_start =$data['sl_start'];
        $sl_end =$data['sl_end'];
        //使用PortM 里的行情list方法查询对应的中间港口
        $ship_route = new PriceM;
        $list =$ship_route->route_select($sl_start,$sl_end);
       // $this->_p($res);exit;
        //$middle_route =$res->column('port_name','m_id');
        return json($list);    
    }
    //航线添加
    public function route_toadd(){
        $data = $this->request->param();
//       $this->_p($data);  exit;
        $seaprice = new PriceM;
        $res = $seaprice->price_route_add($data); 
        if(!array_key_exists('fail', $res)){
            $response=['status'=>1,  'message'=>'添加成功'];
        }else {
            $response=['status'=>0,  'message'=>$res['fail']];
        } 
      
        return $response; 
    }
    
    //航线修改页面
    public function route_edit(){
        $seaprice_id = input('get.seaprice_id');
        $seaprice = new PriceM;
        $res = $seaprice-> price_route_list('','','',100,$seaprice_id);
//        $this->_p($res['0']);exit;
        $this->assign('data',$res['0']);
        return $this->view->fetch("price/route_edit");
    }
    //航线执行修改
    public function route_toedit(){
        $data = $this->request->param();
//      $this->_p($data);exit;
        $seaprice = new PriceM;
        $res = $seaprice->price_route_toedit($data);          
        if(!array_key_exists('fail', $res)){
            $status =1; 
        }else {$status =0;} 
        json_encode($status);  
         return $status; 
    }
    //航线运价删除
    public function route_del(){
        //接受price_route_del 的id 数组
        $data = $this->request->param();
        $seaprice_id = $data['id'];
        $seaprice = new PriceM;
        $res = $seaprice->price_route_del($seaprice_id);
         if(!array_key_exists('fail', $res)){
            $status =1; 
        }else {$status =0;} 
        json_encode($status);   
        return $status;   
    }
    
    
        //拖车运价
    public function price_trailer() 
    {      
        $port_name = input('get.port_name');
        $port_name =  trim($port_name);
        if($port_name){
            $this->assign('port_name',$port_name); 
        }
    
        $route = new PriceM;
        $list = $route->price_trailer_list($port_name ,15);
        //$this->_p($list);exit;
        $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->view->fetch('price/price_trailer'); 
    }

    
    //拖车添加展示页面
    public function trailer_add(){
//        //传递所有的港口给前台页面
//        $sql="select *  from  hl_port ";
//        $port_data =Db::query($sql);
//       //转成json格式传给js
//        $js_port = json_encode($port_data);
        
        //传递所有的车队给前台页面
        $sql2="select id ,car_name from  hl_cardata ";
        $car_data =Db::query($sql2);
       //转成json格式传给js
        $js_car = json_encode($car_data);
        
      //  $this->view->assign('js_port',$js_port);
        $this->view->assign('js_car',$js_car);
        
        return $this->view->fetch("price/trailer_add");
    }
    //拖车添加执行页面
    public function trailer_toadd(){
        $data = $this->request->param();
    //   $this->_v($data);exit;
        //根据港口和地址 贮存车队送货/装货线路
        $port_id = strstr($data['port'],'_',true); 
        $address_data =  $data['town'] ? $data['town'] :$data['area']; 
        $load = $data['load'];
        $load['car']= strstr($data['car_load'],'_',true); 
        $send = $data['send'];
        $send['car']= strstr($data['car_send'],'_',true); 
        $carprice = new PriceM;
        $res = $carprice->price_trailer_toadd($port_id, $address_data, $load, $send);
        if(!array_key_exists('fail', $res)){
            $status =1; 
        }else {$status =0;} 
        json_encode($status);   
        return $status;   
      
    }
    
    //拖车运价修改页面
    public function trailer_edit(){
        $data = $this->request->param();
        $carprice = new PriceM;
        $res =$carprice->price_trailer_edit($data);   
//      $this->_p($res);exit;

  
        //传递所有的车队给前台页面
        $sql2="select id ,car_name from  hl_cardata ";
        $car_data =Db::query($sql2);
       //转成json格式传给js
        $js_car = json_encode($car_data);
        
        $this->view->assign('js_car',$js_car);
        $this->view->assign('data',$res);
        return $this->view->fetch("price/trailer_edit");
    }
        //拖车运价执行修改
    public function trailer_toedit(){
        $data = $this->request->param();
       $this->_p($data);exit;
        $carprice = new PriceM;
        $res =$carprice->price_trailer_toedit($data);          
        if(!array_key_exists('fail', $res)){
            $status =1; 
        }else {$status =0;} 
        json_encode($status);  
         return $status; 
    }
        //拖车运价执行删除
    public function traile_del(){
        //接受price_route_del 的id 数组
        $data = $this->request->param();
        $carprice_id = $data['id'];
        $carprice = new PriceM;
        $res = $carprice->price_trailer_del($carprice_id);
         if(!array_key_exists('fail', $res)){
            $status =1; 
        }else {$status =0;} 
        json_encode($status);   
        return $status;   
    }
    //港口杂费
    public function priceIncidental(){
        //获取每页显示的条数
        $limit= $this->request->param('limit',10,'intval');
        //获取当前页数
        $page= $this->request->param('page',1,'intval');  
        //获取查询条件
        $port_name =$this->request->param('port_name');
        $ship_name =$this->request->param('ship_name');  
        //计算出从那条开始查询
        $tol=($page-1)*$limit;
        $dataM = new PriceM;
        $listArr = $dataM->priceIncidental($tol,$limit,$port_name,$ship_name);
        //分页数据
        $list =$listArr[0];
        // 总页数
        $count = $listArr[1];
        $this->view->assign('port_name',$port_name);
        $this->view->assign('ship_name',$ship_name);
        $this->view->assign('list',$list);
        $this->view->assign('page',$page); 
        $this->view->assign('count',$count); 
        $this->view->assign('limit',$limit); 
        $this->view->assign('page_url',url('admin/price/priceIncidental'));
        return $this->view->fetch('price/price_incidental'); 
        
    }
    
    //港口杂费修改
    public function incidentalEdit(){
        $data = $this->request->only(['rid','sid'],'get');
       // var_dump($data);exit;
        $list =Db::name('price_incidental')->alias('R')->
                join('hl_price_incidental S',"R.port_code=S.port_code " 
                        . "and R.ship_id =S.ship_id and R.type='R' and  S.type='S' and S.id <> R.id",'left')
                ->join('hl_port P','P.port_code=R.port_code','left')
                ->join('hl_shipcompany SC','SC.id=R.ship_id','left')
                ->where('S.id',$data['sid'])->where('R.id',$data['rid'])
                ->field('R.id rid,S.id sid,R.port_code,P.port_name,R.40HQ r40HQ,'
                        . 'R.20GP r20GP,S.40HQ s40HQ,S.20GP s20GP ,R.ship_id ,SC.ship_short_name')
                ->group('R.id,S.id')
                ->find();
//        $this->_p($list);EXIT;
        $this->view->assign('list',$list);
        return $this->view->fetch('price/price_incidentaledit'); 
    }

    //港口杂费执行修改
    public function incidentalToEdit(){
        $data = $this->request->param();
        $ship_id = $data['ship_id'];
        $port_code =$data['port_code'];
        $start_40HQ_fee =$data['start_40HQ_fee'];
        $start_20GP_fee =$data['start_20GP_fee'];
        $end_40HQ_fee = $data['end_40HQ_fee'];
        $end_20GP_fee = $data['end_20GP_fee'];
        $mtime = date('Y-m-d H:i:s');
        $res =Db::name('price_incidental')
                ->where(array('ship_id'=>$ship_id,'port_code'=>$port_code,'type'=>'r'))
                ->update(array('40HQ'=>$start_40HQ_fee,'20GP'=>$start_20GP_fee,'mtime'=>$mtime));
        $res1 =Db::name('price_incidental')
               ->where(array('ship_id'=>$ship_id,'port_code'=>$port_code,'type'=>'s'))
               ->update(array('40HQ'=>$end_40HQ_fee,'20GP'=>$end_20GP_fee,'mtime'=>$mtime));
        $response =[];
        
        $res?$response=['status'=>1,'mssage'=>'修改成功']:$response=['status'=>0,'message'=>'修改失败'];
        $res1?$response=['status'=>1,'mssage'=>'修改成功']:$response=['status'=>0,'message'=>'修改失败'];
        return $response;
    }
    
    //港口杂费删除
    public function incidentalDel(){
        $id = $this->request->only(['id'],'post');
        $idArr = explode('_', $id['id']['0']);
        $res =Db::name('price_incidental')->where('id','in',$idArr)->delete();
        return  $res ?$response=['status'=>1,'mssage'=>'删除成功']:$response=['status'=>0,'message'=>'删除失败'];
    }
        //添加港口杂费
    public function incidentalAdd(){
        return $this->view->fetch('price/price_incidentaladd'); 
    }
    public function incidentalToAdd(){
        $data =  $this->request->only(['ship','port_code','end_20GP_fee','end_40HQ_fee','start_20GP_fee','start_40HQ_fee'],'post');
        $mtime = date('Y-m-d H:i:s');
        $port_code=$data['port_code'][0]; $ship_id=$data['ship'];
        $response =[];
        //先查询是否已经存在港口了
        $res1 = Db::name('price_incidental')->where(['ship_id'=>$ship_id,'port_code'=>$port_code])->find();
        if(!$res1){
            $insertData[0] = ['port_code'=>$port_code,'ship_id'=>$ship_id,'40HQ'=>$data['start_40HQ_fee'],'20GP'=>$data['start_20GP_fee'],'type'=>'r','mtime'=>$mtime];
            $insertData[1] = ['port_code'=>$port_code,'ship_id'=>$ship_id,'40HQ'=>$data['end_40HQ_fee'],'20GP'=>$data['end_20GP_fee'],'type'=>'s','mtime'=>$mtime];
            $res= Db::name('price_incidental')->insertAll($insertData);
            return  $res ?$response=['status'=>1,'mssage'=>'添加成功']:$response=['status'=>0,'message'=>'添加失败'];
        }  else {
            return $response=['status'=>0,'message'=>'已经存在此港口请先删除再做添加'];;
        }
      
    }
    // 航线运价 的订单的价格说明
    public function quickMessage() {
        $list =Db::name('quick_message')->select();
        return $list;
    }
    
    public function addMessage() {
        $data = $this->request->param('data');
        if(empty($data)){
            return false;
        }
        $id = Db::name('quick_message')->insertGetId(['message'=>$data]);
        return $id;
    }
    public function delMessage() {
        $id = $this->request->param('id');
        $list =Db::name('quick_message')->where('id',$id)->delete();
    }
}