<?php
$aop = new AopClient ();
$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = 'your app_id';
$aop->rsaPrivateKey = '请填写开发者私钥去头去尾去回车，一行字符串';
$aop->alipayrsaPublicKey='请填写支付宝公钥，一行字符串';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset='GBK';
$aop->format='json';
$request = new AlipayTradeWapPayRequest ();
$request->setBizContent("{" .
"\"body\":\"对一笔交易的具体描述信息。如果是多种商品，请将商品描述字符串累加传给body。\"," .
"\"subject\":\"大乐透\"," .
"\"out_trade_no\":\"70501111111S001111119\"," .
"\"timeout_express\":\"90m\"," .
"\"time_expire\":\"2016-12-31 10:05\"," .
"\"total_amount\":9.00," .
"\"seller_id\":\"2088102147948060\"," .
"\"auth_token\":\"appopenBb64d181d0146481ab6a762c00714cC27\"," .
"\"goods_type\":\"0\"," .
"\"passback_params\":\"merchantBizType%3d3C%26merchantBizNo%3d2016010101111\"," .
"\"quit_url\":\"http://www.taobao.com/product/113714.html\"," .
"\"product_code\":\"QUICK_WAP_WAY\"," .
"\"promo_params\":\"{\\\"storeIdType\\\":\\\"1\\\"}\"," .
"\"royalty_info\":{" .
"\"royalty_type\":\"ROYALTY\"," .
"        \"royalty_detail_infos\":[{" .
"          \"serial_no\":1," .
"\"trans_in_type\":\"userId\"," .
"\"batch_no\":\"123\"," .
"\"out_relation_id\":\"20131124001\"," .
"\"trans_out_type\":\"userId\"," .
"\"trans_out\":\"2088101126765726\"," .
"\"trans_in\":\"2088101126708402\"," .
"\"amount\":0.1," .
"\"desc\":\"分账测试1\"," .
"\"amount_percentage\":\"100\"" .
"          }]" .
"    }," .
"\"extend_params\":{" .
"\"sys_service_provider_id\":\"2088511833207846\"," .
"\"hb_fq_num\":\"3\"," .
"\"hb_fq_seller_percent\":\"100\"," .
"\"industry_reflux_info\":\"{\\\\\\\"scene_code\\\\\\\":\\\\\\\"metro_tradeorder\\\\\\\",\\\\\\\"channel\\\\\\\":\\\\\\\"xxxx\\\\\\\",\\\\\\\"scene_data\\\\\\\":{\\\\\\\"asset_name\\\\\\\":\\\\\\\"ALIPAY\\\\\\\"}}\"," .
"\"card_type\":\"S0JP0000\"" .
"    }," .
"\"sub_merchant\":{" .
"\"merchant_id\":\"19023454\"," .
"\"merchant_type\":\"alipay: 支付宝分配的间连商户编号, merchant: 商户端的间连商户编号\"" .
"    }," .
"\"enable_pay_channels\":\"pcredit,moneyFund,debitCardExpress\"," .
"\"disable_pay_channels\":\"pcredit,moneyFund,debitCardExpress\"," .
"\"store_id\":\"NJ_001\"," .
"\"settle_info\":{" .
"        \"settle_detail_infos\":[{" .
"          \"trans_in_type\":\"cardSerialNo\"," .
"\"trans_in\":\"A0001\"," .
"\"summary_dimension\":\"A0001\"," .
"\"amount\":0.1" .
"          }]" .
"    }," .
"\"invoice_info\":{" .
"\"key_info\":{" .
"\"is_support_invoice\":true," .
"\"invoice_merchant_name\":\"ABC|003\"," .
"\"tax_num\":\"1464888883494\"" .
"      }," .
"\"details\":\"[{\\\"code\\\":\\\"100294400\\\",\\\"name\\\":\\\"服饰\\\",\\\"num\\\":\\\"2\\\",\\\"sumPrice\\\":\\\"200.00\\\",\\\"taxRate\\\":\\\"6%\\\"}]\"" .
"    }," .
"\"specified_channel\":\"pcredit\"," .
"\"business_params\":\"{\\\"data\\\":\\\"123\\\"}\"," .
"\"ext_user_info\":{" .
"\"name\":\"李明\"," .
"\"mobile\":\"16587658765\"," .
"\"cert_type\":\"IDENTITY_CARD\"," .
"\"cert_no\":\"362334768769238881\"," .
"\"min_age\":\"18\"," .
"\"fix_buyer\":\"F\"," .
"\"need_check_info\":\"F\"" .
"    }" .
"  }");
$result = $aop->pageExecute ( $request); 

$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
$resultCode = $result->$responseNode->code;
if(!empty($resultCode)&&$resultCode == 10000){
echo "成功";
} else {
echo "失败";
}
?>