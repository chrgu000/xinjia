<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"E:\xampp\htdocs\xinjia\tp5\public/../application/index\view\login\register.html";i:1531300153;s:66:"E:\xampp\htdocs\xinjia\tp5\application\index\view\public\head.html";i:1531300153;}*/ ?>
<!-- 注册 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/index/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/index/css/font.css">
    <link rel="stylesheet" href="/static/index/css/index.css">
    <link rel="stylesheet" href="/static/index/css/top.css">
    <link rel="stylesheet" href="/static/index/css/foot.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/static/index/js/jquery-1.9.0.min.js"></script>
    <script src="/static/index/layui/layui.js"></script>
    
</head>
  <body>
      <link rel="stylesheet" type="text/css" href="/static/index/css/iziModal.css">
      <link rel="stylesheet" href="/static/index/css/logout.css">
    <div class="tou">
      <div class="zuo">
        <a href="<?php echo url('../index/index'); ?>"><img src="/static/index/image/logo.jpg" alt=""></a>
      </div>
      <div class="you">
        <div class="zi">
          <i class="fa fa-phone-square fa-5x"></i>
        </div>
        <div class="kf">
          <p>客服热线（tel）</p>
          <h1>020-28211720</h1>
        </div>
      </div>
    </div>
    <div class="bei"></div>
    <div class="zhuce">
      <!-- <ul class="layui-row" id="zc">
        <li class="layui-col-xs6">
          <div class="jiao"></div>
          个人注册
        </li>
        <li class="layui-col-xs6">
          <div class="jiao"></div>
          企业注册
        </li>
      </ul> -->
      <h1>注册帐号</h1>
      <div class="fm layui-row">
        <form  id="register_form">
          <div class="layui-form-item">
            <div class="layui-col-xs12 gu">
              <div >姓名</div>
              <input type="text" name="membername" class="layui-col-xs12" placeholder="请输入您的姓名" required="required">
            </div>
            <div class="layui-col-xs12 gu">
            <div >登录名</div>
                <input type="text" name="member_code" class="layui-col-xs12" placeholder="请输入你的登录名" required="required">
            </div>只能使用英文名

            <div class="layui-col-xs12 gu">
              <div >手机号</div>
              <input type="text" name="phone" class="layui-col-xs12" placeholder="请输入您的手机号码" required="required">
            </div>

<!--            <div class="layui-col-xs12 gu yanz">
              <div class="hong">*</div>
              <input type="text" name="title" class="layui-col-xs8" placeholder="请输入您的短信验证码" required="required">
              <button type="button" name="button" class="">
                获取验证码
              </button>
            </div>-->

            <div class="layui-col-xs12 gu">
                <div >密码</div>
              <input type="text" name="password" class="layui-col-xs12" placeholder="请输入您的密码" required="required">
            </div>

            <div class="layui-col-xs12 gu">
              <div >确认密码*</div>
              <input type="text" name="repassword" class="layui-col-xs12" placeholder="请再次确认密码" required="required">
            </div>

            <div class="layui-col-xs12 gu">
                <div >企业名*</div>
              <input type="text" name="company" class="layui-col-xs12" placeholder="请输入您的企业名">
            </div>

            <div class="layui-col-xs12 gu">
                <div >推荐人*</div>
              <input type="text" name="sales" class="layui-col-xs12" placeholder="请输入推荐人">
            </div>
          </div>

          <div class="sub layui-col-xs12">
            <button type="button" class="layui-btn layui-btn-fluid" onclick="toajax()">提交注册</button>
          </div>

          <div class="zh">
            <span>已经注册&nbsp;&nbsp;<a href="<?php echo url('login/login'); ?>">登陆</a></span>
          </div>
          <div class="jz" id="container">
              <div class="pwd_le"><input type="checkbox" class="input_check" id="check1" checked='true'><label for="check1"></label><a href="#" class="trigger-default">《注册协议》</a></div>
          </div>
        </form>
      </div>

      <!-- <div class="fm layui-row">
        <form class="" action="index.html" method="post">
          <input type="text" name="title" placeholder="请输入您的企业名" class="layui-col-xs12">
          <input type="text" name="title" placeholder="请输入推荐人" class="layui-col-xs12">

          <div class="sub layui-col-xs12">
            <button type="submit" class="layui-btn layui-btn-fluid" name="button">登陆</button>
          </div>

          <div class="zh">
            <span>没有帐号？<a href="#">立即注册</a></span>
          </div>
        </form>
      </div> -->

    </div>
    <!-- 模态窗口 -->
    <div id="modal-default" class="iziModal">
      <div class="aw">
				<p>
					尊敬的用户：<br>
					欢迎您使用“智通三千” 物联信息平台所提供的各项服务，“智通三千” 物联信息平台所提供的各项服务的所有权和运作权归江苏零浩网络科技有限公司（以下简称“江苏零浩”）所有。您承诺，在您注册成为“智通三千” 物联信息平台用户之前，已经详细阅读并理解了本协议的全部内容，已经充分了解可能产生的风险并愿意承担责任。如对本协议内容有任何疑问、意见或建议，您可通过官方客服电话400-158-3000与我们联系。<br>
					一、	特别声明 <br>
					1.	本协议适用于智通三千的手机APP软件（以下简称本平台），本平台保留变更、修改、增加或删除本协议部分内容的权利。您在本协议变更、修改、增加或删除部分内容之后继续使用本平台的，即视为您同意并接受本协议全部内容。<br>
					2.	本协议内容包括以下条款及本平台已经发布的或将来可能发布的各类规则。所有规则为本协议不可分割的一部分，与协议正文具有同等法律效力。本协议是您与本平台共同签订的，适用于您在本平台的全部活动。<br>
					3.	您注册加入、登录使用本平台，并不代表授予您任何与本平台有关的版权及相关知识产权权益。您对本平台系统享有的权益仅限于正常使用所享有的权益。<br>
					4.	与本平台相关的一切知识产权权益归属于江苏零浩所有。<br>
					二、	服务内容<br>
					本平台为您提供汽运物流运输撮合、大宗商品在线交易及相关服务， 具体详见《货物运输服务协议》。<br>
					三、	注册<br>
					1.	进行注册时，请您务必填写正确且真实有效的个人/企业资料，如您填写了任何不正确、不真实、不合法、已失效或不完整的资料，以及本平台有正当理由怀疑资料不正确、不真实、不合法、已失效、不完整或不足以反映当时情况的，本平台有权保留、冻结或终止您的使用权限，并拒绝您现在或将来使用本平台的服务。<br>
					2.	您的注册用户名中不得含有违反国家法律法规、涉嫌侵犯他人权利或干扰本平台正常运营等的相关信息；同一个用户名只能注册一个账号，并且验证该账号有效的手机号或邮箱未用于其它账号的验证。<br>
					3.	在您注册成功、设置密码、通过验证后，可随时登录手机APP账户信息页面更改您的基本信息。<br>
					4.	您对您的账号和密码的安全负全部责任，且对您账号进行的所有行为负法律责任。如系统提示您的上一次登录地址与您所在位置信息不符，请尽快修改密码，并升级密保程序。<br>
					四、	保证和承诺<br>
					1.	您承诺根据我国法律、法规的规定和本平台相关协议和规则，正当、合理、善意地使用本平台。用户保证不得进行任何违反我国法律、法规及本平台相关协议和规则的行为，不得侵犯国家、集体、第三人的合法权益，否则用户自行承担因此产生的一切法律后果，本平台因此受到的损失，有权向用户追偿。<br>
					2.	您承诺在本平台发布的所有信息均正确、真实、有效和完整。<br>
					3.	您承诺授权并委托江苏零浩使用您的注册信息为您注册电子签名，您的电子签名仅由您本人可以在本平台使用，并具有代表您真实意思表达的法律效力。<br>
					4.	您不可试图以破解或盗用密码、非法侵入或其他任何非法方式，访问本平台未授权您的任何功能和服务，或链接至本平台服务器、任何其他系统及网络。<br>
					5.	您不得使用扫描、测试本平台及链接至本平台任何网络的弱点，也不可违反本平台及链接至本平台任何网络的安全或认证措施。您不可反向查找、追踪或尝试追踪任何关于本平台任何其他用户的信息，包括任何非您所有账户的来源；或为获取非经本平台授权允许的除您个人信息以外的其他用户的任何信息，包括但不限于其他用户向本平台提供的身份证明、商业信息等。<br>
					6.	您承诺不使用任何行为或方式，在本平台基础架构、系统或网络上，存储不合理或不成比例的大量数据；不使用任何设备、软件或程序，干扰或试图干扰本平台的正常运行或本平台进行的任何交易，干扰或试图干扰他人使用本平台。<br>
					7.	本平台保证在其能力范围内尽到一般性谨慎义务，对用户的身份进行核实和认证。<br>
					8.	本平台有权禁止的行为包含但不限于：用户使用任何“抓取页面”、“深层链接”、“机器人”等其他自动程序或类似程序、算法、方法方式，以访问、获取、复制或监测本平台任何部分及内容；用户以任何方式复制、规避本平台或任何内容的导航结构及介绍；用户通过非本平台授权的方式，取得或试图取得任何资料、文件或信息。<br>
					9.  为向您提供更契合您需求的页面展示和搜索结果、了解产品适配性、识别账号异常状态，我们会收集关于您使用的服务以及使用方式的信息并将这些信息进行关联。以下情形中，共享、转让、公开披露您的个人/企业信息无需事先征得您的授权同意：<br>
					（1）与国家安全、国防安全有关的；<br>
					（2）与公共安全、公共卫生、重大公共利益有关的；<br>
					（3）与犯罪侦查、起诉、审判和判决执行等有关的；<br>
					（4）出于维护您或其他个人的生命、财产等重大合法权益但又很难得到本人同意的；<br>
					（5）您自行向社会公众公开的个人信息；<br>
					（6）从合法公开披露的信息中收集个人信息的，如合法的新闻报道、政府信息公开等渠道。<br>
					根据法律规定，共享、转让经去标识化处理的个人信息，且确保数据接收方无法复原并重新识别个人信息主体的，不属于个人信息的对外共享、转让及公开披露行为，对此类数据的保存及处理将无需另行向您通知并征得您的同意。<br>
					五、	免责声明  <br>
					1.本平台保留在任何时候不经通知进行以下行为的权利：<br>
					(1) 修改、中止或终止本平台手机APP软件或其任何部分的运行或访问；<br>
					(2) 修改或变更本平台手机APP软件或其任何部分及任何适用规则或协议；<br>
					(3) 在定期或非定期维护、升级系统、纠正错误等必要时期内，中断本平台或其任何部分的运行。<br>
					2.由于不可抗力或者因计算机病毒感染、黑客攻击等特殊外力侵扰，导致用户因使用本平台遭受任何损失的，本平台不承担任何法律责任。<br>
					六、	服务的变更及终止<br>
					1.	您或本平台可随时根据实际情况中断一项或多项网络服务。本平台随时中断服务不需对任何用户或第三方负责。您对本平台修改、变更的条款修改有异议，或对本平台的服务不满，可以行使如下权利：<br>
					（1）停止使用本平台的服务。<br>
					（2）通告本平台停止对您的服务。结束服务后，您使用网络服务的权利马上终止，您无权使用本平台，本平台也无义务传送任何未处理的信息或未完成的服务给您或第三方。<br>
					2.	如您擅自使用本平台的标识，以本平台名义从事有关活动，本平台有权单方终止提供服务。<br>
					3.如您在本平台发布信息时违反国家有关的法律、法规、政策及国际条约和惯例的，发布明显带有对江苏零浩、本平台非讨论性、恶意攻击性或错误导向性文章的，发布有损江苏零浩、本平台声誉或商业利益文章的，本平台有权单方终止提供服务。<br>
					七、	 侵权投诉<br>
					1.任何第三方认为，用户利用本平台侵害本人民事权益或实施侵权行为的，包括但不限于侮辱、诽谤、侵犯其知识产权等，被侵权人有权书面通知本平台采取删除、屏蔽、断开链接等必要措施，并对通知书的真实性负责。通知书应当包含下列内容：<br>
					（1）权利人的姓名（名称）、联系方式和地址；<br>
					（2）要求删除或者断开链接的侵权作品、表演、录音录像制品的名称和网络地址；<br>
					（3）构成侵权的初步证明材料。<br>
					2.本平台提请用户注意：请保证侵权投诉的真实性、合法性，否则，用户须承担由此产生的全部法律责任（包括但不限于经济责任）。<br>
					八、其他<br>
					1.在本平台平台交易需订立的协议采用电子合同方式，可以有一份或者多份并且每一份具有同等法律效力。您根据有关协议及本平台的相关规则在本平台确认签署的电子合同即视为您本人真实意愿并以您本人名义签署的合同，具有法律效力。您应妥善保管自己的账户密码等账户信息，您通过前述方式订立的电子合同对合同各方具有法律约束力，您不得以账户密码等账户信息被盗用或其他理由否认已订立的合同的效力或不按照该等合同履行相关义务。<br>
					2.因用户使用本平台站而引起的一切争议、权利主张或其它事项，均受中华人民共和国法律的管辖。<br>
					3.用户和本平台发生争议的，应首先本着诚信原则通过协商加以解决。如果协商不成，则应向江苏零浩网络科技有限公司所在地有管辖权的人民法院提起诉讼。<br>
					更新时间：2017年12月14日<br>
				</p>
			</div>
    </div>
    <script src="/static/index/js/iziModal.min.js"></script>
    <script type="text/javascript">
      // $('#zc li').eq(0).addClass('yan');
      // $('.fm').eq(0).show();
      // $('#zc li').click(function(event) {
      //   $(this).addClass('yan').siblings('li').removeClass('yan');
      //   $('.fm').eq($(this).index()).show().siblings('.fm').hide();
      // });
      $("#modal-default").iziModal({
          title: "注册协议",
          iconClass: 'icon-announcement',
          width: 700,
          padding: 20,
      });
      //启动模态窗
      $(document).on('click', '.trigger-default', function (event) {
          event.preventDefault();
          $('#modal-default').iziModal('open');
      });
      
    function toajax (){
            $.ajax({
                type:'POST',
                url:"<?php echo url('index/login/check_register'); ?>",    
                data:$("#register_form").serialize(),
                dataType:"json",
                success:function(status){
                            alert(status)
                            }
            })
        }
    </script>
 </body>
</html>
