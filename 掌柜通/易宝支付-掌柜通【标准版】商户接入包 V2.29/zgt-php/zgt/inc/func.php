<?php

/**
  * @取得某个系统配置项
  * @$configKey 系统配置的key
  * @return string
  *
  */
function getSysConfig($configKey) {

	global $sysConfig;

	if ( !$configKey || empty($configKey) )	{
	
		return null;	
	}
	
	if ( !isViaArray($sysConfig, $configKey) ) {
		
		return null;
	}
	
	return $sysConfig[$configKey];
}

/**
  * @取得商户编号
  * @return string
  *
  */
function getCustomerNumber() {
	
	return getSysConfig("customernumber");
}

/**
  * @取得Hmac密钥
  * @return string
  *
  */
function getKeyValue() {

	return getSysConfig("keyValue");
}

/**
  * @取得AES密钥
  * @return string
  *
  */
function getKeyForAes() {

	return getSysConfig("keyAesValue");
}

/**
  * @取得本地字符集编码
  * @return string
  *
  */
function getLocaleCode() {

	return getSysConfig("localeCode");
}

/**
  * @取得远程字符集编码
  * @return string
  *
  */
function getRemoteCode() {

	return getSysConfig("remoteCode");
}

?>