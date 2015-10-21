<?php

/**
  * @检查一个数组是否是有效的
  * @$checkArray 数组
  * @$arrayKey 数组索引
  * @return boolean
  * 如果$arrayKey传参，则不止检查数组，
  * 而且检查索引是否存在于数组中。
  *
 */
function isViaArray($checkArray, $arrayKey = null) {
	
	if ( !$checkArray || empty($checkArray) ) {
		
		return false;
	}
	
	if ( !$arrayKey ) {
		
		return true;
	}
	
	return array_key_exists($arrayKey, $checkArray);
}

/**
  * @取得hmac签名
  * @$dataArray 明文数组或者字符串
  * @$key 密钥
  * @return string
  *
 */
function getHmac(array $dataArray, $key) {
	
	if ( !isViaArray($dataArray) ) {
	
		return null;	
	}
	
	if ( !$key || empty($key) ) {
		
		return null;
	}
	
	if ( is_array($dataArray) ) {
	
		$data = implode("", $dataArray);
	} else {
	
		$data = strval($dataArray);	
	}
	
	//print_r($data);
	
	if ( getLocaleCode() != "UTF-8" ) {
	
		$key = iconv(getLocaleCode(), "UTF-8", $key);
		$data = iconv(getLocaleCode(), "UTF-8", $data);	
	}
	

	$b = 64; // byte length for md5
	if (strlen($key) > $b) {
		
		$key = pack("H*",md5($key));
	}
	
	$key = str_pad($key, $b, chr(0x00));
	$ipad = str_pad('', $b, chr(0x36));
	$opad = str_pad('', $b, chr(0x5c));
	$k_ipad = $key ^ $ipad ;
	$k_opad = $key ^ $opad;

	return md5($k_opad . pack("H*",md5($k_ipad . $data)));
}

/**
  * @取得aes加密
  * @$dataArray 明文字符串
  * @$key 密钥
  * @return string
  *
 */
function getAes($data, $aesKey) {

	//print_r(mcrypt_list_algorithms());
	//print_r(mcrypt_list_modes());

	$aes = new CryptAES();
	$aes->set_key($aesKey);
	$aes->require_pkcs5();
	$encrypted = strtoupper($aes->encrypt($data));
	
	return $encrypted;

}

/**
  * @取得aes解密
  * @$dataArray 密文字符串
  * @$key 密钥
  * @return string
  *
 */
function getDeAes($data, $aesKey) {

	$aes = new CryptAES();
	$aes->set_key($aesKey);
	$aes->require_pkcs5();
	$text = $aes->decrypt($data);
	
	return $text;
}

/**
  * @发起http请求
  * @$url 请求的url
  * @$method POST 或者 GET
  * @$postfields 请求的参数
  * @return mixed
  */
function post($url, $postfields = null) {
	
	$http_info = array();
	$ci = curl_init();
	curl_setopt($ci, CURLOPT_USERAGENT, "Yeepay ZGT PHPSDK v1.1x");
	curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ci, CURLOPT_TIMEOUT, 30);
	curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ci, CURLOPT_HTTPHEADER, array("Expect:"));
	curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
	//curl_setopt($ci, CURLOPT_HEADERFUNCTION, array());
	curl_setopt($ci, CURLOPT_HEADER, false);
	
	curl_setopt($ci, CURLOPT_POST, true);
	
	if (!empty($postfields)) {
				
		curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
	}
	
	curl_setopt($ci, CURLOPT_URL, $url);
	$response = curl_exec($ci);
	$http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
	$http_info = array_merge($http_info, curl_getinfo($ci));
	curl_close ($ci);
	//print_r($response);

	return $response;
}

/**
  * @使用特定function对数组中所有元素做处理
  * @&$array 要处理的字符串
  * @$function 要执行的函数
  * @$apply_to_keys_also 是否也应用到key上
  *
  */
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }

        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
}

/**
  *
  * @将数组转换为JSON字符串（兼容中文）
  * @$array 要转换的数组
  * @return string 转换得到的json字符串
  *
  */
function cn_json_encode($array) {
    $array = cn_url_encode($array);
    $json = json_encode($array);
    return urldecode($json);
}

/**
  *
  * @将数组统一进行urlencode（兼容中文）
  * @$array 要转换的数组
  * @return array 转换后的数组
  *
  */
function cn_url_encode($array) {
    arrayRecursive($array, "urlencode", true);
	return $array;
}

?>