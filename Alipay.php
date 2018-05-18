<?php

    function alipayNotify()
    {
        //file_put_contents("alipay_result.txt",json_encode($_POST));
        require_once('vendor/Alipay/aop/AopClient.php');
        $aop = new \AopClient;
        $public_path = "./vendor/Alipay/key/alipay_public_key_sha.pem";//公钥路径
        $aop->alipayrsaPublicKey = 'IIBCgKCAQEAsymouOHTv+STYvTX/gKaWvUCk+fi5UWXnm1R9USsZDlJ2ei7ZOo4wjTTZDsziDhyAMsQCAzALbTEMq4gTqil0qp05AdUeJ/MtgSE5pmekf0u3VkIZp9zRzLJoJWIXXwtfuPvGgORTyuIiJ1+nF36SdLPcYweLsz+sMSKs8D7SUQdnk1UaHEec1KqHCCdidFw2RoyB1GihVWpbDL411b2CYS7iwbqKRvY7YVHlfPMMfSZXhxLSXulaQ5mgAiQ9JTa0Czub2tBtkLns5rCI+wDJkSNTtAkTpGW8oepGvqDblVHQeCWa/RoyKCoIbpbgOxfiaAuyN3uUQPxfYQIDAQAB';
        
        //此处验签方式必须与下单时的签名方式一致
        //$public_key = 'symouNF99FfWOHTv+STYvTX/gKaWvUCk+fi5UWXnm1R9USsZDlJ2ei7ZOo4wjTTZDsziDhyAMsQCAzALbTEMq4gTqil0qp05AdUeJ/MtgSE5pmekf0u3VkIZp9zRzLJoJWIXXwtfuPvGgORTyuIiJ1+nF36SdLPcYweLsz+sMSKs8D7SUQdnk1UaHEec1KqHCCdidFw2RoyB1GihVWpbDL411b2CYS7iwbqKRvY7YVHlfPMMfSZXhxLSXulaQ5mgAiQ9JTa0Czub2tBtkLns5rCI+wDJkSNTtAkTpGW8oepGvqDblVHQeCWa/RoyKCoIbpbgOxfiaAuyN3uUQPxfYQIDAQAB';
        $flag = $aop->rsaCheckV1($_POST, $public_path, "RSA2");
       
        //验签通过后再实现业务逻辑，比如修改订单表中的支付状态。
        /**
         *  ①验签通过后核实如下参数out_trade_no、total_amount、seller_id
         *  ②修改订单表
        **/
        //打印success，应答支付宝。必须保证本界面无错误。只打印了success，否则支付宝将重复请求回调地址。
        
        //验证成功
        if ($flag) {                           
            $order_sn = $out_trade_no = trim($_POST['out_trade_no']); //商户订单号
            $trade_no = $_POST['trade_no'];//支付宝交易号
            $trade_status = $_POST['trade_status'];//交易状态
            
			
		     1支付成功验证订单金额和支付金额是否一致
		     2修改订单支付状态
		     3给支付宝返回结果
		  
            if ($_POST['trade_status'] == 'TRADE_FINISHED') {
                 2修改订单支付状态
            } elseif ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                 2修改订单支付状态         
            }               
                              在此修改订单支付方式
            echo "success"; //  告诉支付宝支付成功 请不要修改或删除   
               
        } else {
            echo "fail"; //验证失败         
            
        }
        
    }
 
    //新版支付宝签名 app支付
    function alipay_sign()
    {
        
        require_once 'alipay/Alipay/aop/AopClient.php';
        $private_path =  "alipay/Alipaykey/rsa_private_key.pem";//私钥路径
        
        
        //构造业务请求参数的集合(订单信息)
        $content = array();
        $content['subject'] = 订单商品名称;
        $content['out_trade_no'] = 订单号;
        $content['timeout_express'] = 过期时间;
        $content['total_amount'] = 订单金额单位元;
        $content['product_code'] = "QUICK_MSECURITY_PAY";
        $con = json_encode($content);//$content是biz_content的值,将之转化成json字符串
        
        //公共参数
        $Client = new \AopClient();//实例化支付宝sdk里面的AopClient类,下单时需要的操作,都在这个类里面
        $param['app_id'] = 申请支付接口获取的appid;
        $param['method'] = 'alipay.trade.app.pay';//接口名称，固定值
        $param['charset'] = 'utf-8';//请求使用的编码格式
        $param['sign_type'] = 'RSA2';//商户生成签名字符串所使用的签名算法类型
        $param['timestamp'] = date("Y-m-d H:i:s");//发送请求的时间
        $param['version'] = '1.0';//调用的接口版本，固定为：1.0
        $param['notify_url'] = 回调地址alipayNotify;
        $param['biz_content'] = $con;//业务请求参数的集合,长度不限,json格式，即前面一步得到的
        
        $paramStr = $Client->getSignContent($param);//组装请求签名参数
        $sign = $Client->alonersaSign($paramStr, $private_path, 'RSA2', true);//生成签名
        $param['sign'] = $sign;
        $str = $Client->getSignContentUrlencode($param);//最终请求参数
        
        $this->ajaxReturn(['status' => 1, 'msg' => '支付参数签名成功', 'result' => $str]);
    }
    
