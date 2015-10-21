using System;
using System.Collections.Generic;
using System.Text;

/// <summary>
/// 地址配置文件
/// </summary>
public class APIURLConfig
{

    static APIURLConfig()
    {
        //移动终端网页收银台前缀
        mobilePrefix = "https://o2o.yeepay.com";

        //商户通用接口前缀
        merchantPrefix = "https://o2o.yeepay.com";

        //移动终端网页收银台支付地址 https://o2o.yeepay.com/zgt-api/api/pay
        webpayURI = "/zgt-api/api/pay";

        //提现请求url地址 https://ok.yeepay.com/payapi/api/tzt/withdraw
        withdrwURI = "/payapi/api/tzt/withdraw";

        //提现查询接口https://ok.yeepay.com/payapi/api/tzt/drawrecord
        drawRecordURI = "/payapi/api/tzt/drawrecord";

        //绑卡结果查询 https://ok.yeepay.com/payapi/api/bankcard/authbind/list
        bankCardListURI = "/payapi/api/bankcard/authbind/list";

        //解除银行卡绑定关系https://ok.yeepay.com/payapi/api/tzt/unbind
        unbindBankCardURI = "/payapi/api/tzt/unbind";

        //银行卡绑定信息查询 https://ok.yeepay.com/payapi/api/bankcard/check
        queryBankCardURI = "/payapi/api/bankcard/check";


        //支付结果查询接口
        queryPayResultURI = "/api/query/order";

        //直接退款
        directFundURI = "/query_server/direct_refund";

        //交易记录查询
        queryOrderURI = "/query_server/pay_single";

        //退款订单查询
        queryRefundURI = "/query_server/refund_single";

        //获取消费清算对账单
        clearPayDataURI = "/query_server/pay_clear_data";

        //获取退款清算对账单
        clearRefundDataURI = "/query_server/refund_clear_data";


    }

    /// <summary>
    /// 一键支付前缀
    /// </summary>
    public static string mobilePrefix
    { get; set; }

    /// <summary>
    /// 商户地址前缀
    /// </summary>
    public static string merchantPrefix
    { get; set; }

    /// <summary>
    /// 网页一键支付地址
    /// </summary>
    public static string webpayURI
    { get; set; }

    /// <summary>
    /// 提现接口地址
    /// </summary>
    public static string withdrwURI
    { get; set; }

    /// <summary>
    /// 提现结果查询
    /// </summary>
    public static string drawRecordURI
    { get; set; }

    /// <summary>
    /// 绑卡列表查看
    /// </summary>
    public static string bankCardListURI { get; set; }


    /// <summary>
    /// 查询银行卡信息接口
    /// </summary>
    public static string queryBankCardURI { get; set; }


   /// <summary>
   /// 银行卡解绑
   /// </summary>
    public static string unbindBankCardURI { get; set; }


    /// <summary>
    /// 查询支付结果
    /// </summary>
    public static string queryPayResultURI
    { get; set; }

    /// <summary>
    /// 直接退款
    /// </summary>
    public static string directFundURI
    { get; set; }

    /// <summary>
    /// 订单支付接口
    /// </summary>
    public static string queryOrderURI
    { get; set; }

    /// <summary>
    /// 退款订单查询
    /// </summary>
    public static string queryRefundURI
    { get; set; }

    /// <summary>
    /// 获取消费清算对账单
    /// </summary>
    public static string clearPayDataURI
    { get; set; }

    /// <summary>
    /// 获取退款账单
    /// </summary>
    public static string clearRefundDataURI
    { get; set; }
}

