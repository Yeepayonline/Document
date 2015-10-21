using System;
using System.Collections.Generic;
using System.Text;

///
///API返回结果对象
///

public class RespondJson
{
    /// <summary>
    ///加密的响应结果
    /// </summary>
    public string data;
}


/// <summary>
/// 支付请求易宝处理实体
/// </summary>
public class PayRequestJson
{

    /// <summary>
    /// 商户编号
    /// </summary>
    public string customernumber { get; set; }

    /// <summary>
    /// 商户订单号
    /// </summary>
    public string requestid { get; set; }

    /// <summary>
    /// 返回码成功返回：1
    /// </summary>
    public int code { get; set; }

    /// <summary>
    /// 易宝交易流水号
    /// </summary>
    public string externalid { get; set; }

    /// <summary>
    /// 订单金额
    /// </summary>

    public string amount { get; set; }

    /// <summary>
    /// 支付链接
    /// </summary>
    public string payurl { get; set; }

    /// <summary>
    /// 绑卡 ID  
    /// </summary>
    public string bindid { get; set; }

    /// <summary>
    /// 银行编码
    /// </summary>
    public string bankcode { get; set; }

    /// <summary>
    /// 签名信息
    /// </summary>
    public string hmac { get; set; }

    /// <summary>
    /// 
    /// </summary>
    public string msg { get; set; }

}


/// <summary>
/// 支付操作返回结果实体
/// </summary>
public class PayResultJson
{

    /// <summary>
    /// 商户编号
    /// </summary>
    public string customernumber { get; set; }

    /// <summary>
    /// 商户订单号
    /// </summary>
    public string requestid { get; set; }

    /// <summary>
    /// 返回码成功返回：1
    /// </summary>
    public int code { get; set; }

    /// <summary>
    /// 易宝交易流水号
    /// </summary>
    public string externalid { get; set; }

    /// <summary>
    /// 订单金额
    /// </summary>

    public string amount { get; set; }

    /// <summary>
    /// 通知类型
    /// </summary>
    public string notifytype { get; set; }

    /// <summary>
    /// 暂时没有启用
    /// </summary>
    public string cardno { get; set; }

    /// <summary>
    /// 银行编码
    /// </summary>
    public string bankcode { get; set; }

    /// <summary>
    /// 签名信息
    /// </summary>
    public string hmac { get; set; }
 

}