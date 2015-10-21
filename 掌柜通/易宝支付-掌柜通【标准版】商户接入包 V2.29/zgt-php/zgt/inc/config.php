<?php

!defined("__LOCALE__CODE__") && define("__LOCALE__CODE__", "GBK");

header("Content-Type:text/html;charset=" . __LOCALE__CODE__);

if ( !defined("__DEBUG_MODE__") ) {
	
	//调试、测试模式
	define("__DEBUG_MODE__", true);
	
	//生产模式
	//define("__DEBUG_MODE__", false);
}

//设置错误报告
error_reporting(__DEBUG_MODE__ ? 2047 : 0);

//统一的异常处理
set_exception_handler(
	function($e) {
		
		echo "Uncaught exception: " , $e->getMessage(), "\n<br />";
		echo "Code: " , $e->getCode(), "\n<br />";
		
		if ( __DEBUG_MODE__ ) {
			
			echo "File: " , $e->getFile(), "\n<br />";
			echo "Line: " , $e->getLine(), "\n<br />";
			echo "Trace: " , $e->getTraceAsString(), "\n<br />";
		}
	}
);

//系统配置
$sysConfig = array();

//商户编号
$sysConfig["customernumber"] = "10012431666";

//商户密钥
$sysConfig["keyValue"] = "7Fx2N19V34U810042Tu8047395002h75u72A8K9jDhf979p6LdQmUxD8F9p6";

//以下部分请勿修改
//AES密钥
$sysConfig["keyAesValue"] = substr($sysConfig["keyValue"], 0, 16);

//本地编码
$sysConfig["localeCode"] = __LOCALE__CODE__;

//远程编码
$sysConfig["remoteCode"] = "UTF-8";

//请求的服务器
$sysConfig["serverURI"] = "http://o2o.yeepay.com/zgt-api/api";
//分账账号注册请求地址
$sysConfig["registerURL"] = "${sysConfig["serverURI"]}/register";
//交易请求地址
$sysConfig["payURL"] = "${sysConfig["serverURI"]}/pay";
//订单查询请求地址
$sysConfig["queryURL"] = "${sysConfig["serverURI"]}/queryOrder";
//非交易转账请求地址
$sysConfig["transferURL"] = "${sysConfig["serverURI"]}/transfer";
//非交易转账查询请求地址
$sysConfig["transferQueryURL"] = "${sysConfig["serverURI"]}/transferQuery";
//订单转账请求地址
$sysConfig["divideURL"] = "${sysConfig["serverURI"]}/divide";
//订单转账查询请求地址
$sysConfig["divideQueryURL"] = "${sysConfig["serverURI"]}/queryDivide";
//订单退款请求地址
$sysConfig["refundURL"] = "${sysConfig["serverURI"]}/refund";
//订单退款查询请求地址
$sysConfig["refundQueryURL"] = "${sysConfig["serverURI"]}/queryRefund";
//担保确认请求地址
$sysConfig["confirmURL"] = "${sysConfig["serverURI"]}/settleConfirm";
//余额查询请求地址
$sysConfig["balanceQueryURL"] = "${sysConfig["serverURI"]}/queryBalance";

//以下部分，除非接口参数，或者返回参数改动，否则请勿修改
$infConfig = array();

//分账账号注册接口配置
$infConfig["register"] = array();
$infConfig["register"]["requestURL"] = $sysConfig["registerURL"];
$infConfig["register"]["needRequestHmac"] = array(0 => "requestid", 1 => "bindmobile", 2 => "customertype", 3 => "signedname", 4 => "linkman", 5 => "idcard", 6 => "businesslicence", 7 => "legalperson", 8 => "minsettleamount", 9 => "riskreserveday", 10 => "bankaccountnumber", 11 => "bankname", 12 => "accountname", 13 => "bankaccounttype", 14 => "bankprovince", 15 => "bankcity");
$infConfig["register"]["mustFillRequest"] = array(0 => "requestid", 1 => "bindmobile", 2 => "customertype", 3 => "signedname", 4 => "linkman", 5 => "legalperson", 6 => "minsettleamount", 7 => "riskreserveday", 8 => "bankaccountnumber", 9 => "bankname", 10 => "accountname", 11 => "bankaccounttype", 12 => "bankprovince", 13 => "bankcity");
$infConfig["register"]["needRequest"] = array(0 => "requestid", 1 => "bindmobile", 2 => "customertype", 3 => "signedname", 4 => "linkman", 5 => "idcard", 6 => "businesslicence", 7 => "legalperson", 8 => "minsettleamount", 9 => "riskreserveday", 10 => "bankaccountnumber", 11 => "bankname", 12 => "accountname", 13 => "bankaccounttype", 14 => "bankprovince", 15 => "bankcity");
$infConfig["register"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code", 3 => "ledgerno");

//订单支付接口配置
$infConfig["pay"] = array();
$infConfig["pay"]["requestURL"] = $sysConfig["payURL"];
$infConfig["pay"]["needRequestHmac"] = array(0 => "requestid", 1 => "amount", 2 => "assure", 3 => "productname", 4 => "productcat", 5 => "productdesc", 6 => "divideinfo", 7 => "callbackurl", 8 => "webcallbackurl", 9 => "bankid", 10 => "period", 11 => "memo");
$infConfig["pay"]["mustFillRequest"] = array(0 => "requestid", 1 => "amount", 2 => "callbackurl");
$infConfig["pay"]["mustFillRequest_SALES"] = array(0 => "payproducttype");
$infConfig["pay"]["mustFillRequest_ONEKEY"] = array(0 => "payproducttype");
$infConfig["pay"]["mustFillRequest_DIRECT"] = array(0 => "payproducttype", 1 => "cardname", 2 => "idcard", 3 => "bankcardnum", 4 => "mobilephone", 5 => "mcc");
$infConfig["pay"]["needRequest"] = array(0 => "requestid", 1 => "amount", 2 => "assure", 3 => "productname", 4 => "productcat", 5 => "productdesc", 6 => "divideinfo", 7 => "callbackurl", 8 => "webcallbackurl", 9 => "bankid", 10 => "period", 11 => "memo", 12 => "payproducttype", 13 => "userno", 14 => "ip", 15 => "cardname", 16 => "idcard", 17 => "bankcardnum", 18 => "mobilephone", 19 => "cvv2", 20 => "expiredate", 21 => "mcc", 22 => "areacode");
$infConfig["pay"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code", 3 => "externalid", 4 => "amount", 5 => "payurl");
$infConfig["pay"]["needCallbackHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code", 3 => "notifytype", 4 => "externalid", 5 => "amount", 6 => "cardno");

//订单查询接口配置
$infConfig["paymentQuery"] = array();
$infConfig["paymentQuery"]["requestURL"] = $sysConfig["queryURL"];
$infConfig["paymentQuery"]["needRequestHmac"] = array(0 => "requestid");
$infConfig["paymentQuery"]["mustFillRequest"] = array(0 => "requestid");
$infConfig["paymentQuery"]["needRequest"] = array(0 => "requestid");
$infConfig["paymentQuery"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code", 3 => "externalid", 4 => "amount", 5 => "productname", 6 => "productcat", 7 => "productdesc", 8 => "status", 9 => "ordertype", 10 => "busitype", 11 => "orderdate", 12 => "createdate", 13 => "bankid");

//转账接口配置
$infConfig["transfer"] = array();
$infConfig["transfer"]["requestURL"] = $sysConfig["transferURL"];
$infConfig["transfer"]["needRequestHmac"] = array(0 => "requestid", 1 => "ledgerno", 2 => "amount");
$infConfig["transfer"]["mustFillRequest"] = array(0 => "requestid", 1 => "amount");
$infConfig["transfer"]["needRequest"] = array(0 => "requestid", 1 => "ledgerno", 2 => "amount", 3 => "sourceledgerno");
$infConfig["transfer"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code");

//转账查询接口配置
$infConfig["transferQuery"] = array();
$infConfig["transferQuery"]["requestURL"] = $sysConfig["transferQueryURL"];
$infConfig["transferQuery"]["needRequestHmac"] = array(0 => "requestid");
$infConfig["transferQuery"]["mustFillRequest"] = array(0 => "requestid");
$infConfig["transferQuery"]["needRequest"] = array(0 => "requestid");
$infConfig["transferQuery"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code", 3 => "ledgerno", 4 => "amount", 5 => "status");

//分账接口配置
$infConfig["divide"] = array();
$infConfig["divide"]["requestURL"] = $sysConfig["divideURL"];
$infConfig["divide"]["needRequestHmac"] = array(0 => "requestid", 1 => "orderrequestid", 2 => "divideinfo");
$infConfig["divide"]["mustFillRequest"] = array(0 => "requestid", 1 => "orderrequestid", 2 => "divideinfo");
$infConfig["divide"]["needRequest"] = array(0 => "requestid", 1 => "orderrequestid", 2 => "divideinfo");
$infConfig["divide"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code");

//分账查询接口配置
$infConfig["divideQuery"] = array();
$infConfig["divideQuery"]["requestURL"] = $sysConfig["divideQueryURL"];
$infConfig["divideQuery"]["needRequestHmac"] = array(0 => "orderrequestid", 1 => "dividerequestid", 2 => "ledgerno");
$infConfig["divideQuery"]["mustFillRequest"] = array(0 => "orderrequestid");
$infConfig["divideQuery"]["needRequest"] = array(0 => "orderrequestid", 1 => "dividerequestid", 2 => "ledgerno");
$infConfig["divideQuery"]["needResponseHmac"] = array(0 => "customernumber", 1 => "orderrequestid", 2 => "code", 3 => "divideinfo");

//退款接口配置
$infConfig["refund"] = array();
$infConfig["refund"]["requestURL"] = $sysConfig["refundURL"];
$infConfig["refund"]["needRequestHmac"] = array(0 => "requestid", 1 => "orderrequestid", 2 => "amount", 3 => "divideinfo", 4 => "confirm", 5 => "memo");
$infConfig["refund"]["mustFillRequest"] = array(0 => "requestid", 1 => "orderrequestid", 2 => "amount", 3 => "confirm", 4 => "memo");
$infConfig["refund"]["needRequest"] = array(0 => "requestid", 1 => "orderrequestid", 2 => "amount", 3 => "divideinfo", 4 => "confirm", 5 => "memo");
$infConfig["refund"]["needResponseHmac"] = array(0 => "customernumber", 1 => "requestid", 2 => "code", 3 => "refundexternalid");

//退款查询接口配置
$infConfig["refundQuery"] = array();
$infConfig["refundQuery"]["requestURL"] = $sysConfig["refundQueryURL"];
$infConfig["refundQuery"]["needRequestHmac"] = array(0 => "orderrequestid", 1 => "refundrequestid");
$infConfig["refundQuery"]["mustFillRequest"] = array(0 => "orderrequestid");
$infConfig["refundQuery"]["needRequest"] = array(0 => "orderrequestid", 1 => "refundrequestid");
$infConfig["refundQuery"]["needResponseHmac"] = array(0 => "customernumber", 1 => "orderrequestid", 2 => "code", 3 => "externalid", 4 => "refundinfo");

//担保确认接口配置
$infConfig["confirm"] = array();
$infConfig["confirm"]["requestURL"] = $sysConfig["confirmURL"];
$infConfig["confirm"]["needRequestHmac"] = array(0 => "orderrequestid");
$infConfig["confirm"]["mustFillRequest"] = array(0 => "orderrequestid");
$infConfig["confirm"]["needRequest"] = array(0 => "orderrequestid");
$infConfig["confirm"]["needResponseHmac"] = array(0 => "customernumber", 1 => "orderrequestid", 2 => "code");


//余额查询接口配置
$infConfig["balanceQuery"] = array();
$infConfig["balanceQuery"]["requestURL"] = $sysConfig["balanceQueryURL"];
$infConfig["balanceQuery"]["needRequestHmac"] = array(0 => "ledgerno");
$infConfig["balanceQuery"]["mustFillRequest"] = array();
$infConfig["balanceQuery"]["needRequest"] = array(0 => "ledgerno");
$infConfig["balanceQuery"]["needResponseHmac"] = array(0 => "customernumber", 1 => "code", 2 => "balance", 3 => "ledgerbalance");

//包含系统文件
require_once(__DIR__ . "/toolsFunc.php");
require_once(__DIR__ . "/func.php");
require_once(__DIR__ . "/RequestService.php");

//包含加解密文件
require_once(__DIR__ . "/CryptAES.php");

//包含自定义异常文件
require_once(__DIR__ . "/ZGTException.php");

?>