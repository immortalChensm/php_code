<?php
require_once 'Alipay/aop/AopClient.php';
require_once 'Alipay/aop/request/AlipayTradeRefundRequest.php';


$aop = new \AopClient ();
$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '2018032702455466';
$aop->rsaPrivateKey = 'MIIEowIBAAKCAQEA34N3xw3eDcfhwWXpiKzZV1ET7EI3cbir2yLTeY+p+oZeuRCG
7mMsjT7CMzoqrrj0mS/9BwXPbbcI1Q4vAC1Q1rRrFwm/gj3FXzi+KNKsQPQFFTKZ
qKqjbjk7IlEKb3BdRnJGh+a4+XHqPppHKbK3Fvv52i1IFjltXwolWky17GdsUyJv
yH5nlva1ppY4hEK1Mos3sxydmo5iTKibcvQFFkISNxkXvCiX1tXthLNKb4MHe1tM
OLSlzAvVtp1hoI11Mr5IIOwL6iGFjQRGgIYrrZEPSXcmt1PrPeAUFHrNdGxROCog
cFwvV7Ye2yp3+bNEVAgRY2lKuJH2R4g+wSB06wIDAQABAoIBAEBTSKxrzEUxCkKr
fstL23zqo44x/FzpJeR6IFxywRuNgkNGg16mAhNgRWmSyuff6N0RV4Om42yS6aLP
Yy1s3T/9Snil4IyuFFh0Lx32i4Zh8/iGyHwnJ8O4CtG0ewlZUC7PAodoGkIHy79a
jTJt8Y1W1TA6Ke3jdxuMAvX677xp+auNRqLEdGb56e+0486+GkaUXfsqqVvGwbhA
XVykDrbiXCNLviA1JuCS9ycQxfFYFhvGipbyWnPsPEZ3P9fN0cvVjqoSxhMb/amG
e2BA4g0BhJFdsPrsGmg6bEOfLVaVh2OVVB8BTKc5340arDpBApVni1wEN7/aYRj/
cecceGkCgYEA8ltcs2a9g2qekr8ThsU8caTVwZ8E/A8wAxLOWrmz0bR5QCi4p5ex
/+j1xH/KGXCCORLbWoCVqmhwG+fb83/SIV8K3gQxb9Kk1zlxxlR0Yy/l/X1PktB4
owXFwrkwV+a6AKKRy8O3hVo/QaI9xDWSk86dglqZhev3KBsPYRQAH1cCgYEA7BiN
SIW1Azxllp6A+iZDBCwK4clS18M00X8upCw8Qn1POEri/aeu3avADN5PczsMtCH+
LnqU92wKllT4v90WrdWHRLXJFxCF8Nqs/xjAaLU2+NadqHFlFYh7+3dXGJ9e0G0/
FC9DjdGrtPAkrDT72sudLPLNTThmSsuz9srVHo0CgYEAmYfRMQFb+x2W+SW8y/q0
8NVYaMFBWiCQ7NGEEitkQ+vNiByD5f+OTq0YzHOb5wPEKz3L4ghlR7/DjZoTV61Y
w7U+4CjN3KYXsRR+BANKe+9DBpPUzg/s7HFit5mzi2vp1y8lp20EHKFwQzbxZBQA
GEyisYqNiS5Ts394/am67h8CgYA1WHbT5CI6UPNDTR0naG3MC4eJ7MtjJSBSFcKc
JcKX42h697DCT5kbTStfvPuGtdjw+p1MMzZlkWvy+9AYygPN02l1BP4i0ADzovVj
zlvrTMbXAucsoDKO4v/gmd58GcZ6obSXAvbonG+HupsOrgoaLdedyF7LC+tRCyXm
pX3yIQKBgHwISfZR1ryqTrd/+GnVHya6ubudOKKRuHB7APoA3KZh1vaR+e09b0oZ
3bsdY3p7aG9kJNwEOUIStO4UMTXlbZmpF06YyDemvvzxZT+mvfchQd9mgfIHwfJo
dlYRdB7GWRXrWq2nDz/lX1Ik45N4LNOsquJ+aLSaLTIZzDRYE5ZJ';
$aop->alipayrsaPublicKey='MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsymouNF99FfWOHTv+STYvTX/gKaWvUCk+fi5UWXnm1R9USsZDlJ2ei7ZOo4wjTTZDsziDhyAMsQCAzALbTEMq4gTqil0qp05AdUeJ/MtgSE5pmekf0u3VkIZp9zRzLJoJWIXXwtfuPvGgORTyuIiJ1+nF36SdLPcYweLsz+sMSKs8D7SUQdnk1UaHEec1KqHCCdidFw2RoyB1GihVWpbDL411b2CYS7iwbqKRvY7YVHlfPMMfSZXhxLSXulaQ5mgAiQ9JTa0Czub2tBtkLns5rCI+wDJkSNTtAkTpGW8oepGvqDblVHQeCWa/RoyKCoIbpbgOxfiaAuyN3uUQPxfYQIDAQAB';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset='UTF-8';
$aop->format='json';
$request = new \AlipayTradeRefundRequest ();
$request->setBizContent("{" .
"\"out_trade_no\":\"201805181302447290\"," .
//"\"trade_no\":\"2014112611001004680073956707\"," .
"\"refund_amount\":0.1," .
//"\"refund_currency\":\"USD\"," .
"\"refund_reason\":\"正常退款\"," .
//"\"out_request_no\":\"201805181302447290008\"," .
//"\"operator_id\":\"OP001\"," .
//"\"store_id\":\"NJ_S_001\"," .
//"\"terminal_id\":\"NJ_T_001\"," .
//"      \"goods_detail\":[{" .
//"        \"goods_id\":\"apple-01\"," .
//"\"alipay_goods_id\":\"20010001\"," .
//"\"goods_name\":\"ipad\"," .
//"\"quantity\":1," .
//"\"price\":2000," .
//"\"goods_category\":\"34543238\"," .
//"\"body\":\"特价手机\"," .
//"\"show_url\":\"http://www.alipay.com/xxx.jpg\"" .
//"        }]" .
"  }");
$result = $aop->execute ( $request); 

$responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
$resultCode = $result->$responseNode->code;
if(!empty($resultCode)&&$resultCode == 10000){
echo "成功";
} else {
echo "失败";
}
?>