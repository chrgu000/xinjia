<?php
//客户的账单
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\api\controller\common AS CommonM ;
use app\index\model\Order as OrderM;
use think\cache\driver\Redis as RedisM;

class Wechat extends Controller
{    
    public  $order_status;
    public  $page=5;
    public  $mtime ;
    public  $member_code;
    
    protected $_config =[
        'DATA_CACHE_PREFIX' => 'Redis_',//缓存前缀
        'DATA_CACHE_TYPE'=>'Redis',//默认动态缓存为Redis
        'DATA_CACHE_TIMEOUT' => false,
        'REDIS_RW_SEPARATE' => true, //Redis读写分离 true 开启
        'REDIS_HOST'=>'127.0.0.1', //redis服务器ip，多台用逗号隔开；读写分离开启时，第一台负责写，其它[随机]负责读；
        'REDIS_PORT'=>'6379',//端口号
        'REDIS_TIMEOUT'=>'300',//超时时间
        'REDIS_PERSISTENT'=>false,//是否长连接 false=短连接
        'REDIS_AUTH'=>'',//AUTH认证密码
    ];
    
    protected $wechat_config = [
    //微信的接口配置
    'appid' =>'wx00e2fa705cc5a3fc'
    ,'AppSecret'=>'ee123d5edeab39f44ecca894cc9eb984'

    ];


    
    public function _initialize()
    {  
        $this->order_status = config('config.order_status');
        $this->mtime =  date('Y-m-d H:i:s');
        $this->member_code =Session::get('member_code','wechat');
        if(is_null($this->member_code)){
            $this->notlogin();
        }
    }
   
//    public function __call($function_name, $arguments) {
//        return $function_name.implode(', ', $arguments).'不存在';
//    }
    
    //登陆检查
    public function notlogin()
    {
        //如果登录常量为nll，表示没有登录
        if(is_null($this->member_code)){
            return json(array('status'=>0,'message'=>'未登录，无权访问'));
        }   
        return json(array('status'=>1,'message'=>'success'));
    }
    
    
    //登陆
    public function wechatLogin($account,$password) {
        $password = md5($password);
        $member =Db::name('member')->where('phone',$account)
                ->field('password,member_code,name,wechat_openid')
                ->find();
        if(!$member){
            return json(array('status'=>0,'message'=>'账号不存在'));   
        }  
        if($password !== $member['password']){
            return json(array('status'=>0,'message'=>'密码错误'));     
        }
        //验证无误 就写入 session
        Session::set('member_code',$member['member_code'],'wechat');
        Session::set('name',$member['name'],'wechat'); 
        if(empty($member['wechat_openid'])){
            return json(array('status'=>1,'message'=>'unboundWechat'));     
        }  else {
            return json(array('status'=>1,'message'=>'登录成功'));     
        }
    
        
    }
    
     //用户注册 或者手机号码绑定 与 weixin_code 绑定
    public function wechatRegister ($wechat_code,$wechat_name,$phone,$code) {
         //20分钟内有效
        $valid_time  = array(date('Y-m-d H:i:s',strtotime('-20min')),date('Y-m-d H:i:s'));
        $res_code = Db::name('ali_sms')->where('phone',$phone)
                ->where('ctime','between time',$valid_time)
                ->order('ctime desc')->column('code');
        if(!in_array($code,$res_code)){
            return json(array('status'=>0,'message'=>'验证码不正确'));
        }
        //先查询 是否存在 相同的手机号 存在就绑定,不存在就添加
        $isset_phone = Db::name('member')->where('phone',$phone)->field('id','name')->find();
        if($isset_phone){
            $res_phone = Db::name('member')->where('id',$isset_phone['id'])
                    ->update(['wechat_code'=>$wechat_code,
                            'wechat_name'=>$wechat_name]);
            $message = '绑定';
        }  else {
                $IDCode = new \app\index\controller\IDCode();
                //查询用户表最大的id 生成零时客户member_code
                $id =Db::name('member')->max('id')+1;
                $member_code = $IDCode->create($id, 'zh');
                $map['member_code'] = $member_code; //唯一帐号
                $map['wechat_code'] = $wechat_code; 
                $map['create_time'] = $this->mtime; 
                $map['type'] = 'wechat'; 
                $map['wechat_name'] = $wechat_name;
            $res_phone = Db::name('member')->insert($map);
            $message = '注册';
        }
        //操作成功后，写入session 信息将用户
        if($res_phone){
            Session::set('member_code',$member['member_code']);
           
            //设置默认利润
            if($message=='注册'){
                Session::set('name',$wechat_name);
                $member_profit =  new \app\index\model\Login();
                $member_profit->member_profit($member_code);
            }  else {
                Session::set('name',$isset_phone['name']);
            }
        }
        return $res_phone ? array('status'=>1,'message'=>$message.'success'): array('status'=>0,'message'=>$message.'fail');
    }
    
    // 小程序门到门下单页面
    public function orderList($limit=10,$page=1,$start_add='',$end_add='',$load_time=''){
        $member_code = $this->member_code;
        //计算出从那条开始查询
        $sea_pirce =new OrderM;
        $data = $sea_pirce ->price_sum($member_code,$start_add,$end_add,$load_time,$page,$limit);
        //获取总页数
        $count = $data['count']; 
        $list =  $data['list'] ;
        return json(array('count'=>$count, 'page'=>$page,'limit'=>$limit,'list'=>$list)) ;
    }
    
    //小程序门到门下单页面 //海运费id
    public function orderBook($sea_id,$container_size){
        if(!($container_size=='40HQ' || $container_size=='20GP')){
            return false;
        }
        $member_code = $this->member_code;
        $sea_pirce =new OrderM;
        $list = $sea_pirce ->orderBook($sea_id ,$container_size,$member_code);
        
         //创建订单令牌
        action('index/OrderToken/createToken','', 'controller');
        $TOKEN = Session::get('TOKEN');
        return json(array('TOKEN'=>$TOKEN,'list'=>$list));
    } 
    
    //小程序 获取联系/发货人的信息  action
      public function selectlinkman()
    {
        $data = action('index/Order/selectlinkman','controller');
        return json($data);
    }
    
    //小程序 //添加收/发货人的信息
    public function linkmanAdd($data)
    {
        $result = $this->validate(
            $data,
            [
            'link_name' => 'require|max:25',
            'phone' =>'require|number|length:11',
            'company'=>'require|length:50',
            ]);
        if(true !== $result){
        // 验证失败 输出错误信息
        return json($result);
        }

       $response = action('index/Order/linkmanAdd',['data'=>$data],'controller');
       return json($response);    
        
    }
    
     //收/发货人的信息的删除
    public function linkmanDel($id=0) {
        $response = action('index/Order/linkmanDel',['id'=>$id],'controller');
        return json($response);
    }
    
    //收发货人的信息修改
    public function  linkmanUpdate($data){
        $response = action('index/Order/linkmanUpdate',['id'=>$data],'controller');
        return json($response);
    }
  
    //小程序 门到门 订单处理
      public function orderData($data)
    {
//        $result = $this->validate(
//            $data,
//            [
//            'link_name' => 'require|max:25',
//            'phone' =>'require|number|length:11',
//            'company'=>'require|length:50',
//            ]);
//        if(true !== $result){
//        // 验证失败 输出错误信息
//        return json($result);
//        }
        $response = action('index/Order/order_data',['data'=>$data,'post_token'=>$post_token],'controller');
        return json($response);    
    }
    
    //门到门 订单查询
    ////状态 已完成completion，待支付payment，已取消cancel，审核中audit_in，审核通过audit_pass，已订舱book，派车中send_car，
    //状态 已完成，待支付，已取消，信息处理中，承运中，已订舱，派车中，
    public function orderQuery($limit=0,$page=10,$status='all',$order_num='',$s_port='',$e_port=''){
     
        $dataM = new \app\api\model\Wechat();
        $member_code =  $this->member_code;
        $data = $dataM->orderQuery($member_code,$limit=0,$page=10,$status='all',$order_num='',$s_port='',$e_port='');
        return json($data);
        
    }
    //订单详情
    public function orderDetail($order_num){
        
        $dataM = new \app\api\model\Wechat();
        $member_code =  $this->member_code;
        $data = $dataM->orderDetail($member_code,$order_num,$this->order_status['container_lock']);
        return json($data);
    }
            
            
    //船公司 
    public function ship($id='all') {
          $port_code = Db::name('port')->lock(true)->where('city_id',564564)->max('port_code');
          var_dump($port_code);exit;
        if (is_int($id)){
            $map = ['id'=>$id];
        }else{
            $map = ['id'=>'not null'];
        }
        $data = Db::name('shipcompany')
                ->where('status',1)
                ->field('id,shipcompany_short_name')
                ->where($map)->select();
        
    }

    
    public function wechatOpenid($code='033tggLd05OcTs1TsSId0rJ5Ld0tggLj',$phone='')
    {
        $appid = $this->wechat_config['appid'];  $AppSecret = $this->wechat_config['AppSecret'];

        $url ='https://api.weixin.qq.com/sns/jscode2session?appid='
                ."$appid"         
                . '&secret='
                ."$AppSecret"             
                . '&js_code='.$code.'&grant_type=authorization_code';
        
        $info = file_get_contents($url);//发送HTTPs请求并获取返回的数据，推荐使用curl
        $json = json_decode($info);//对json数据解码
        $arr = get_object_vars($json);
        $this->_v($arr);exit;
        if(array_key_exists('errcode', $arr)){
            return json(array('status'=>0,'message'=>  implode(',', $arr)));
        }
        $this->_v($arr);exit;
        $openid = $arr['openid'];
        $session_key = $arr['session_key'];
                $sql = "select wechat_id,session_key  from bbm_wechat where wechat_id = '$openid'";
                $result = $this->dao->query($sql)->fetch();
                if ($result!=null) {//如果数据库中存在此用户的信息，则不需要重新获取
                    $result = json_encode($result);
                    //同时修改访问次数 和时间
                    $last_time = time();
                    $sql2 = "update bbm_wechat visit_times ='visit_times+1' ,last_time='$last_time ' where wechat_id ='$openid'";
                    $result2 = $this->dao->exec($sql1);
                    if(dao::isError()) {
                        return $fail[]= '更新失败';
                    }
                }
                else {//没有则将数据存入数据库
                    $add_time =time();
                    $sql1 = "insert into bbm_wechat(wechat_id,add_time,session_key)  values('$openid','$add_time','$session_key')";
//                    var_dump($sql1);
                    $result1 = $this->dao->exec($sql1);;
                    if(dao::isError()) {
                        return $fail[]= dao::getError();
                    }
                }
        return $this->send(array('id' => $openid, 'message' =>$session_key)); ;
    }
    
    
    public function  redis(){
        $redis=new RedisM();
           $redis->connect($_config("REDIS_HOST"),$_config("REDIS_PORT"));
        $redis->set("test","test");

        echo  $redis->get("test");
    }
}