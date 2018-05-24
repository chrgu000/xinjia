<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Price extends Model
{
     // 定义时间戳字段名
    protected $shipping_date = 'shipping_date';
    protected $cutoff_date = 'cutoff_date';
    protected $ETA = 'ETA';
    protected $EDD = 'EDD';
     //船运航价的展示
    public function  price_route_list($port_start,$port_over,$pages=5)
    {   
        $list = Db::name('seaprice')->alias('SP')
                ->join('hl_shipcompany S', 'S.id = SP.ship_id', 'left')
                ->join('hl_sealine SL','SL.id = SP.sl_id', 'left')
                ->join('hl_port P1', 'SL.sl_start=P1.id', 'left')
                ->join('hl_port P2', 'SL.sl_over=P2.id', 'left')
                ->field('SP.*, S.ship_short_name, P1.port_name as start_port , P2.port_name as over_port')->buildSql();
        
        $pageParam  = ['query' =>[]]; //设置分页查询参数
        if($port_start){
            $list = Db::table($list.' a')->where('a.start_port', 'like', "%{$port_start}%")->buildSql();
            $pageParam['query']['start_port'] = $port_start;
        }
        if($port_over){
            $list = Db::table($list.' b')->where('b.over_port', 'like', "%{$port_over}%")->buildSql();
            $pageParam['query']['over_port'] = $port_over;
        }
        
        $lista =Db::table($list.' a')->paginate($pages,false,$pageParam);   
//            echo '<pre>';
//                var_dump($list);
//            echo '</pre>';exit;
//            echo Db::getLastSql() ;
        return $lista;
    }
    
    //船运航价的添加
     public function  price_route_add($data)
    {
        $pricedata['ship_id'] = strstr($data['ship'],'_', true);
        $pricedata['price_20GP'] = $data['price_20GP'];
        $pricedata['price_40HQ'] = $data['price_40HQ'];
        $pricedata['shipping_date'] = strtotime($data['shipping_date']);
        $pricedata['cutoff_date'] = strtotime($data['cutoff_date']);
        $pricedata['boat_name'] = $data['boat_name'];
        $pricedata['sea_limitation'] = $data['sea_limitation'];
        $pricedata['ETA'] = strtotime($data['shipping_date'].'+ '.$data['sea_limitation'].'day');
        $pricedata['EDD'] = strtotime("+3day",$pricedata['ETA']);
        $pricedata['generalize'] = $data['generalize'];
        $pricedata['mtime'] = time();
        $response= array();
        $port_id = $data['port_name'];
        $port_length = count($port_id); 
        if($port_length>2){
            $sl_start = $port_id['0'];
            $sl_over  = $port_id[$port_length-1];
            $sl_middle = array_splice($port_id,'1','-1');
            $res =  Db::name('sealine')->insert(['sl_start'=>$sl_start,'sl_over'=>$sl_over]);
            $sealine_id = Db::name('sealine')->getLastInsID();
            $pricedata['sl_id'] = $sealine_id;
                $str='';
                foreach ($sl_middle as $k =>$v){
                $str .= "('$sealine_id','$v','$k'),";
                }
            $str=rtrim("$str",',');
            $sql = "insert into hl_sea_middle(sealine_id,middle_port,sequence) values".$str;
            if($res){
                $response['success'][] = '添加sealine表'; 
                $res2 =Db::execute($sql);
                        if($res2){
                        $response['success'][] = '添加sea_middle表';
                        }else{ $response['fail'][] = '添加sea_middle表';   }
            }else{$response['fail'][] = '添加sealine表'; }
                
        }else {return false;  } 
              
        $res3 = Db::name('seaprice')->insert($pricedata);
         // echo Db::getLastSql();exit;
        if($res3){
            $response['success'][] = '添加seaprice表';  
        }else{ $response['fail'][] = '添加seaprice表';   }
        
        return  $response;
    }
    
    //航运价格的修改
      public function  price_route_edit($seaprice_id,$sl_id)
    {   
        $res[] = Db::name('seaprice')->alias('SP')
                ->join('hl_shipcompany S', 'S.id = SP.ship_id', 'left')
                ->join('hl_sealine SL','SL.id = SP.sl_id', 'left')
                ->join('hl_port P1', 'SL.sl_start=P1.id', 'left')
                ->join('hl_port P2', 'SL.sl_over=P2.id', 'left')
                ->field('SP.*, S.ship_short_name, P1.port_name as start_port ,'
                        . ' P2.port_name as over_port,SL.sl_start,SL.sl_over')
                ->where('SP.id',$seaprice_id)->find();
        $res[] = Db::name('sea_middle')->alias('SM')
                ->join('hl_port P','P.id = SM.middle_port','left')
                ->where('sealine_id',$sl_id)
                ->field('SM.sequence,SM.middle_port,P.port_name')
                ->order('SM.sequence')
                ->select();
        return $res;
    }
      //航运价格的修改更新
      public function  price_route_toedit($data)
    {   
        $pricedata['ship_id'] = strstr($data['ship'],'_', true);
        $pricedata['price_20GP'] = $data['price_20GP'];
        $pricedata['price_40HQ'] = $data['price_40HQ'];
        $pricedata['shipping_date'] = strtotime($data['shipping_date']);
        $pricedata['cutoff_date'] = strtotime($data['cutoff_date']);
        $pricedata['boat_name'] = $data['boat_name'];
        $pricedata['sea_limitation'] = $data['sea_limitation'];
        $pricedata['ETA'] = strtotime($data['shipping_date'].'+ '.$data['sea_limitation'].'day');
        $pricedata['EDD'] = strtotime("+3day",$pricedata['ETA']);
        $pricedata['generalize'] = $data['generalize'];
        $pricedata['mtime'] = time();
        $response= array();
        $port_id = $data['port_name'];
        $port_length = count($port_id); 
        if($port_length>2){
            $sl_start = $port_id['0'];
            $sl_over  = $port_id[$port_length-1];
            $sl_middle = array_splice($port_id,'1','-1');
            $sl_startover = $this->lineStart($sl_start, $sl_over);
            if( !$sl_startover ){
                $res =  Db::name('sealine')->insert(['sl_start'=>$sl_start,'sl_over'=>$sl_over]);
                $pricedata['sl_id'] = Db::name('sealine')->getLastInsID();
            }  else {
                $pricedata['sl_id'] = $sl_startover['id'] ;
            }
                
                   $str='';
                   foreach ($sl_middle as $k =>$v){
                   $str .= "('$sealine_id','$v','$k'),";
                   }
                $str=rtrim("$str",',');
                $sql = "insert into hl_sea_middle(sealine_id,middle_port,sequence) values".$str;
                if($res){
                    $response['success'][] = '添加sealine表'; 
                    $res2 =Db::execute($sql);
                           if($res2){
                           $response['success'][] = '添加sea_middle表';
                           }else{ $response['fail'][] = '添加sea_middle表';   }
               }else{$response['fail'][] = '添加sealine表'; }
            }
           
                
        }else {return false;  } 
              
        $res3 = Db::name('seaprice')->insert($pricedata);
         // echo Db::getLastSql();exit;
        if($res3){
            $response['success'][] = '添加seaprice表';  
        }else{ $response['fail'][] = '添加seaprice表';   }
        
        return  $response;
    }
    
     //船运航价的删除
     public function  price_route_del($seaprice_id)
    {
        $sl_id = Db::name('seaprice')->where('id','in',$seaprice_id)->column('sl_id');
        $res1 = Db::name('sealine')->where('id','in',$sl_id)->delete();
        $res2 = Db::name('sea_middle')->where('id','in',$sl_id)->delete();
        $res3 = Db::name('seaprice')->where('id','in',$seaprice_id)->delete();
     // echo Db::getLastSql();exit;
        if($res1){
            $response['success'][] = '删除sealine表';  
        }else{ $response['fail'][] = '删除sealine表';   }
        if($res2){
            $response['success'][] = '删除sea_middle表';  
        }else{ $response['fail'][] = '删除sea_middle表';   }
        if($res3){
            $response['success'][] = '删除seaprice表';  
        }else{ $response['fail'][] = '删除seaprice表';   }
    
    return  $response;
    }
    
    //查询航线是否存在 参数为中间港口的id依照航行顺序排列的数组
    public function  line($sl_middle){
        $v = implode(',', $sl_middle);
        $k = implode(',', array_keys($sl_middle));
        $sql2 = "select sealine_id, group_concat(middle_port) as middle_str, group_concat(sequence) as sequence_str from hl_sea_middle group by sealine_id;";
        $sql3 = "select sealine_id from ('$sql2') as STR  where  STR.middle_str like '$v' and STR.sequence_str like '$k'"; 
        $res = Db::query($sql3);
        return $res ;
    }
        //查询航线是否存在 参数分别为 起始港口id, 目的港口id, 
    public function  lineStart($sl_start,$sl_over){
        $sql = "select id from hl_sealine where sl_start = '$sl_start' and  sl_over = '$sl_over'";
        $res = Db::query($sql);
        if($res){
            
        }
        return $res ;
    }
}