<?php
/*
 *  权限管理
 */
namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use think\Db;
class Jurisdiction extends Base
{
    public function control() 
    {
        return $this->view->fetch('Jurisdiction/control');
    }
    
    
    public function userData($uid='') {
        //区域表
        $map =[];
        $uid ?  $map['U.id']=['=',$uid] :$map['U.id']=['>',0];
        $data = Db::name('user')->alias('U')
                ->join('hl_team T','T.id = U.team_id','left')
                ->join('hl_auth_group_access AGA','U.id=AGA.uid','left')
                ->join('hl_auth_group AG','AG.id=AGA.group_id','left')
                ->join('hl_user_area UA','UA.user_id =U.id','left')
                ->join('hl_port P',"FIND_IN_SET(P.port_code ,UA.area_code) and P.status = 1 and UA.type = 'port'",'left')
                ->join('hl_city C',"FIND_IN_SET(C.city_id ,UA.area_code) and  UA.type = 'city'",'left')
                ->field('U.id,U.user_name,U.user_code,T.title,T.job,T.pid,'
                        . "group_concat(distinct AG.title order by AG.id ) as power,"
                        . "group_concat(distinct AG.id order by AG.id ) as power_id,"
                        . "group_concat(distinct P.port_name order by P.id) as port_name,"
                        . "group_concat(distinct P.port_code order by P.id) as port_code,"
                        . "group_concat(distinct C.city order by C.id) as city_name ")
                ->group('U.id')->where($map)->select();

        foreach ($data as $key=> $value){
//                       $this->_p($value);exit;
            if($value['pid']!=0){
                $parent_id = Db::name('team')->field('id,pid,title')
                        ->where('id',$value['pid'])->find();
                if($parent_id['pid']!=0){
                    $parent_id = Db::name('team')->field('id,pid,title')
                        ->where('id',$value['pid'])->find();
                }
                $data[$key]['department']=$parent_id['title'];
            }  else {
                $data[$key]['department']= '';   
            }
 
            $data[$key]['power'] = explode(',', $value['power']);    
            $data[$key]['power_id'] = explode(',', $value['power_id']);
            $data[$key]['port_name'] = explode(',', $value['port_name']); 
            $data[$key]['port_code'] = explode(',', $value['port_code']);    
        }
       
        if($uid){
            $count = 1;
            $data = $data[0];
        }  else {
            $count = count($data);
        }
        return json(array('code'=>0,'msg'=>'','count'=>$count,'data'=>$data));
        

    }
    
    
    public function aaa() 
    {
        var_dump($this->request->param());exit;
    }

} 