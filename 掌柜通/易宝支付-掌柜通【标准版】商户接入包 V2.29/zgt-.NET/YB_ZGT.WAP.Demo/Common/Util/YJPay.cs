using System;
using System.Collections.Generic;
using System.Text;
using System.Security.Cryptography;


public class YJPay
{
    //商户账户编号
    public static string merchantAccount = Config.merchantAccount;

    //商户私钥（商户公钥对应的私钥）
    public static string merchantPrivatekey = Config.merchantPrivatekey;

    //易宝支付分配的公钥（进入商户后台公钥管理，报备商户的公钥后分派的字符串）
    public static string yibaoPublickey = Config.yibaoPublickey;

    //一键支付商户通用接口URL前缀
    public string apimercahntprefix = APIURLConfig.mobilePrefix;

    /// <summary>
    /// 请求提现实现方法
    /// </summary>
    /// <param name="sd"></param>
    /// <returns></returns>
    public string requestWithDraw(SortedDictionary<string, object> sd)
    {
        return createMerchantDataAndRequestYb(sd, APIURLConfig.withdrwURI, true);
    }

    /// <summary>
    /// 查询提现结果
    /// </summary>
    /// <param name="requestid">商户提现订单ID</param>
    /// <param name="ybdrawflowid">易宝流水号订单ID</param>
    /// <returns></returns>
    public string queryWithDrawResult(string requestid, string ybdrawflowid)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("requestid", requestid);
        sd.Add("ybdrawflowid", ybdrawflowid);
        return createMerchantDataAndRequestYb(sd, APIURLConfig.drawRecordURI, false);
    }

    /// <summary>
    /// 绑定银行卡列表查询（适用场景：获取用户绑定的银行卡，然后让用户在商户的交互页面选择提现的银行卡）
    /// </summary>
    /// <param name="identityid">用户身份标识</param>
    /// <param name="identitytype">用户身份标识类型，0为IMEI，1为MAC，2为用户ID，3为用户Email，4为用户手机号，5为用户身份证号，6为用户纸质协议单号</param>
    /// <returns></returns>
    public string queryBankCardList(string identityid, int identitytype)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("identityid", identityid);
        sd.Add("identitytype", identitytype);
        return createMerchantDataAndRequestYb(sd, APIURLConfig.bankCardListURI, false);
    }


    /// <summary>
    /// 解除银行卡绑定关系（适用场景：用来解除用户绑定的银行卡，解除绑定后，用户能重新绑定与解绑卡同人的银行卡）
    /// </summary>
    /// <param name="identityid">用户身份标识</param>
    /// <param name="identitytype">用户身份标识类型，0为IMEI，1为MAC，2为用户ID，3为用户Email，4为用户手机号，5为用户身份证号，6为用户纸质协议单号</param>
    /// <param name="card_top">银行卡前6位</param>
    /// <param name="card_last">银行卡后6位</param>
    /// <returns></returns>
    public string unBindBankCard(string identityid, int identitytype, string card_top, string card_last)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("card_top", card_top);
        sd.Add("card_last", card_last);
        sd.Add("identityid", identityid);
        sd.Add("identitytype", identitytype);
        return createMerchantDataAndRequestYb(sd, APIURLConfig.unbindBankCardURI, true);
    }

    /// <summary>
    /// 银行卡信息查询(适用场景：根据用户输入的银行卡号查询银行卡的借贷类型、银行名称等信息)
    /// </summary>
    /// <param name="cardno">银行卡</param>
    /// <returns></returns>
    public string queryBankCard(string cardno)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("cardno", cardno);
        return createMerchantDataAndRequestYb(sd, APIURLConfig.queryBankCardURI, true);
    }



    /// <summary>
    /// 订单单笔查询
    /// </summary>
    /// <param name="orderid">商户订单号</param>
    /// <returns></returns>
    public string queryPayOrderInfo(string orderid)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        if (orderid != null)
        {
            if (orderid.Trim() != "")
            {
                sd.Add("orderid", orderid);
            }
        }
        string uri = APIURLConfig.queryOrderURI;

        string viewYbResult = createMerchantDataAndRequestYb(sd, uri, false);

        return viewYbResult;

    }

    /// <summary>
    /// 单笔退款接口
    /// </summary>
    /// <param name="orderid">商户退款订单号</param>
    /// <param name="origyborderid">原来易宝支付交易订单号</param>
    /// <param name="amount">退款金额（单位：分）</param>
    /// <param name="currency">币种</param>
    /// <param name="cause">退款原因</param>
    /// <returns></returns>
    public string directRefund(string orderid, string origyborderid, int amount, int currency, string cause)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("orderid", orderid);
        sd.Add("origyborderid", origyborderid);
        sd.Add("amount", amount);
        sd.Add("currency", currency);
        sd.Add("cause", cause);

        string uri = APIURLConfig.directFundURI;

        string viewYbResult = createMerchantDataAndRequestYb(sd, uri, true);

        return viewYbResult;

    }

    /// <summary>
    /// 退款单笔查询接口
    /// </summary>
    /// <param name="yborderid">退款请求号</param>
    /// <returns></returns>
    public string queryRefundOrder(string orderid)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("orderid", orderid);
        sd.Add("yborderid", "");

        string uri = APIURLConfig.queryRefundURI;

        string viewYbResult = createMerchantDataAndRequestYb(sd, uri, false);

        return viewYbResult;

    }

    /// <summary>
    /// 消费对账文件下载
    /// </summary>
    /// <param name="startdate">开始日期，如:2015-04-02</param>
    /// <param name="enddate">结束日期，如:2015-04-02</param>
    /// <returns></returns>
    public string getClearPayData(string startdate, string enddate)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("startdate", startdate);
        sd.Add("enddate", enddate);

        string uri = APIURLConfig.clearPayDataURI;

        string viewYbResult = createMerchantDataAndRequestYb2(sd, uri, false);

        return viewYbResult;

    }

    /// <summary>
    /// 退款对账文件下载
    /// </summary>
    /// <param name="startdate">开始日期，如:2014-03-01</param>
    /// <param name="enddate">结束日期，如:2014-03-01</param>
    /// <returns></returns>
    public string getClearRefundData(string startdate, string enddate)
    {
        SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
        sd.Add("merchantaccount", merchantAccount);
        sd.Add("startdate", startdate);
        sd.Add("enddate", enddate);

        string uri = APIURLConfig.clearRefundDataURI;

        string viewYbResult = createMerchantDataAndRequestYb2(sd, uri, false);

        return viewYbResult;

    }

    /// <summary>
    /// 将请求接口中的业务明文参数加密并请求一键支付接口--商户通用接口
    /// </summary>
    /// <param name="sd"></param>
    /// <param name="apiUri"></param>
    /// <returns></returns>
    private string createMerchantDataAndRequestYb(SortedDictionary<string, object> sd, string apiUri, bool ispost)
    {
        StringBuilder logsb = new StringBuilder("请求链接为：" + apiUri);

        try
        {
            //随机生成商户AESkey
            string merchantAesKey = AES.GenerateAESKey();

            //生成RSA签名
            string sign = EncryptUtil.handleRSA(sd, merchantPrivatekey);
            sd.Add("sign", sign);


            //将对象转换为json字符串
            string bpinfo_json = Newtonsoft.Json.JsonConvert.SerializeObject(sd);
            string datastring = AES.Encrypt(bpinfo_json, merchantAesKey);
            //将商户merchantAesKey用RSA算法加密
            string encryptkey = RSAFromPkcs8.encryptData(merchantAesKey, yibaoPublickey, "UTF-8");

            logsb.AppendLine("生成的签名为：" + sign + "\n");
            logsb.AppendLine("json格式为：" + bpinfo_json + "\n");
            logsb.AppendLine("AES加密后的值为：" + datastring + "\n");
            logsb.AppendLine("merchantAesKey为：" + merchantAesKey + "\n");
            logsb.AppendLine("encryptkey为：" + encryptkey + "\n");

            String ybResult = "";

            if (ispost)
            {
                ybResult = YJPayUtil.payAPIRequest(apimercahntprefix + apiUri, datastring, encryptkey, true);
            }
            else
            {
                ybResult = YJPayUtil.payAPIRequest(apimercahntprefix + apiUri, datastring, encryptkey, false);
            }
            String viewYbResult = YJPayUtil.checkYbResult(ybResult);

            logsb.AppendLine("请求返回未解密值:" + ybResult);
            logsb.AppendLine("请求返回解密结果:" + viewYbResult);

            return viewYbResult;
        }
        catch (Exception error)
        {
            return "";
        }
        finally {
            SoftLog.LogStr(logsb.ToString(),"requestLog");
        }

    }

    /// <summary>
    /// 将请求接口中的业务明文参数加密并请求一键支付接口，单不对返回的数据进行解密，用于获取清算对账单接口--商户通用接口
    /// </summary>
    /// <param name="sd"></param>
    /// <param name="apiUri"></param>
    /// <returns></returns>
    private string createMerchantDataAndRequestYb2(SortedDictionary<string, object> sd, string apiUri, bool ispost)
    {
        //随机生成商户AESkey
        string merchantAesKey = AES.GenerateAESKey();

        //生成RSA签名
        string sign = EncryptUtil.handleRSA(sd, merchantPrivatekey);
        sd.Add("sign", sign);


        //将对象转换为json字符串
        string bpinfo_json = Newtonsoft.Json.JsonConvert.SerializeObject(sd);
        string datastring = AES.Encrypt(bpinfo_json, merchantAesKey);

        //将商户merchantAesKey用RSA算法加密 https://ok.yeepay.com/payapi/api/tzt/drawrecord
        string encryptkey = RSAFromPkcs8.encryptData(merchantAesKey, yibaoPublickey, "UTF-8");

        String ybResult = "";

        if (ispost)
        {
            ybResult = YJPayUtil.payAPIRequest(apimercahntprefix + apiUri, datastring, encryptkey, true);
        }
        else
        {
            ybResult = YJPayUtil.payAPIRequest(apimercahntprefix + apiUri, datastring, encryptkey, false);
        }

        return YJPayUtil.checkYbClearResult(ybResult);

    }
}
