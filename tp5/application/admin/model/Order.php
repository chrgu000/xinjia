<?php
namespace app\admin\model;
use think\Model;
use think\Db;
//订单模块
class Order extends Model
{
    //审核客户提交的订单
    public function order_audit($pages=5)
    {
        $pageParam  = ['query' =>[]]; //设置分页查询参数
        //查询客户的订单编号order_father 查询对应的订单信息
        $fatherSql= Db::name('order_father')->alias('OF')
                ->join('hl_container_size CS','CS.id =OF.container_size','left')  //箱型20gp 40hq
                ->join('hl_book_line BL','BL.id = OF.book_line_id','left')   //船运 车运 价格中间表
                ->join('hl_seaprice SP','SP.id= BL.seaprice_id','left')  //对应的船运价格表
                ->join('hl_ship_route SR','SR.id = SP.route_id','left') //船运路线表
                ->join('hl_sea_bothend SB','SB.sealine_id = SR.bothend_id','left') //船运路线 目的 和起运港表
                ->join('hl_port P1','P1.port_code = SB.sl_start','left') //船运起点港口
                ->join('hl_port P2','P2.port_code = SB.sl_end','left')   //船运目的港口
                ->join('hl_shipcompany SC','SC.id =SP.ship_id','left')//船公司
                ->join('hl_boat B','B.boat_code =SP.boat_code','left')//船公司合作的船舶
                ->join('hl_sales_member SM','SM.member_code = OF.member_code','left')  //业务对应客户表
                ->join('hl_salesman SA','SA.sales_code= SM.sales_code','left')  //业务表
                ->join('hl_member MB','MB.member_code =OF.member_code' ,'left')//客户表
                ->field('OF.id ,OF.order_num,MB.phone,MB.membername,SA.salesname,'
                        . 'SB.sl_start,P1.port_name s_port_name,SB.sl_end,P2.port_name e_port_name,'
                        . 'OF.cargo,SC.ship_short_name,B.boat_code,B.boat_name,OF.mtime')
                ->group('OF.id')->where('OF.state','eq','1')
                ->order('OF.id ,OF.mtime desc ')->buildSql();

        $list = Db::table($fatherSql.' A')->paginate($pages,false,$pageParam);
        
        return $list;
       
    }
    // 展示需要处理的订单列表
    public function order_list($pages=5) {
        $pageParam  = ['query' =>[]]; //设置分页查询参数
        //查询客户的订单编号order_father 查询对应的订单信息
        $fatherSql= Db::name('order_father')->alias('OF')
                ->join('hl_container_size CS','CS.id =OF.container_size','left')  //箱型20gp 40hq
                ->join('hl_book_line BL','BL.id = OF.book_line_id','left')   //船运 车运 价格中间表
                ->join('hl_seaprice SP','SP.id= BL.seaprice_id','left')  //对应的船运价格表
                ->join('hl_ship_route SR','SR.id = SP.route_id','left') //船运路线表
                ->join('hl_sea_bothend SB','SB.sealine_id = SR.bothend_id','left') //船运路线 目的 和起运港表
                ->join('hl_port P1','P1.port_code = SB.sl_start','left') //船运起点港口
                ->join('hl_port P2','P2.port_code = SB.sl_end','left')   //船运目的港口
                ->join('hl_shipcompany SC','SC.id =SP.ship_id','left')//船公司
                ->join('hl_boat B','B.boat_code =SP.boat_code','left')//船公司合作的船舶
                ->join('hl_sales_member SM','SM.member_code = OF.member_code','left')  //业务对应客户表
                ->join('hl_salesman SA','SA.sales_code= SM.sales_code','left')  //业务表
                ->join('hl_member MB','MB.member_code =OF.member_code' ,'left')//客户表
                ->join('hl_order_add OA','OA.id = OF.add_id and OA.member_code = OF.member_code','left')
              //  ->join('hl_linkman LK1','OA.s_linkman_id=LK1.id','left') //送货人资料
                ->join('hl_linkman LK2','OA.r_linkman_id=LK2.id','left')//收货人资料
                ->field('OF.id ,OF.order_num,SA.salesname,'
                        . 'SB.sl_start,P1.port_name s_port_name,SB.sl_end,P2.port_name e_port_name,'
                        . 'OF.cargo,CS.type,OF.container_num,'
                        . 'SC.ship_short_name,B.boat_code,B.boat_name,OF.mtime,'
                        . 'SP.shipping_date,SP.sea_limitation,SP.cutoff_date,'
                        . 'LK2.company,LK2.id linkmanid ,OA.r_linkman_id,OA.id add_id,OF.add_id')
                ->group('OF.id')->where('OF.state','eq','2')
                ->order('OF.id ,OF.mtime desc')->buildSql();
var_dump($fatherSql);exit;
        $list = Db::table($fatherSql.' A')->paginate($pages,false,$pageParam);
        return $list;
    //    
    }
    
    
    //待订舱
    public function order_book(){

    
    }
    
    //前台页面展示门到门的价格表
    public function price_sum(){
        $pageParam  = ['query' =>[]]; //设置分页查询参数
        $nowtime= time();//要设置船期
        $price_sea = Db::name('seaprice')->alias('SP')
            ->join('hl_ship_route SR','SR.id =SP.route_id','left')
            ->join('hl_sea_bothend SB','SB.sealine_id =SR.bothend_id')
            ->field('SP.*,SB.sl_start,SB.sl_end')
            ->order('SP.route_id')->buildSql();
          
        $price_car = Db::name('carprice')->alias('CP')
            ->join('hl_car_line CL','CL.id =CP.cl_id','left')
            ->field('CP.*,CL.port_id,CL.address_name')
            ->order('CP.cl_id')->buildSql();
        
        $price_sql = Db::table($price_sea.' A')
                ->join($price_car.' B','A.sl_start =B.port_id and  B.variable = "r"','left')
                ->join($price_car.' C','A.sl_end =C.port_id and C.variable = "s"','left')
                ->join('hl_shipcompany SC','SC.id = A.ship_id')
                ->join('hl_boat BA','BA.boat_code =A.boat_code')
                ->field('A.id,B.id rid,C.id sid,A.route_id,A.ship_id,SC.ship_short_name,A.shipping_date,'
                        . 'A.cutoff_date,A.boat_code,BA.boat_name,A.sea_limitation,'
                        . 'A.ETA,A.EDD,A.generalize,A.mtime,'
                        . 'A.sl_start,A.sl_end,'
                        . '(select A.price_20GP + B.price_20GP + C.price_20GP  ) as price_20GP,'
                        . '(select A.price_40HQ + B.price_40HQ + C.price_40HQ  ) as price_40HQ')
                ->buildSql();
        var_dump($price_sql);exit;
        return $price_sql;
//        
//        $res = "create table hl_book_line  as  select * from  $price_sql"." as B "; 
//                //create table t1 as select * from person;
//        $res1 = Db::execute("create table hl_book_line  as  select * from  $price_sql"." as B ");
//        var_dump($res1);exit;
//        $list = Db::table($price_sql.' D')->paginate($pages,false,$pageParam);   
    }
    
    
}