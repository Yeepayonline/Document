using System;
using System.Collections.Generic;
using System.Text;
using System.Security.Cryptography;


/// <summary>
/// 一键支付工具类
/// </summary>

public class YJPayUtil
{
    //商户账户编号
    public static string merchantAccount = Config.merchantAccount;



    /// <summary>
    /// 请求一键支付接口
    /// </summary>
    /// <param name="requestURL">完整的URL</param>
    /// <param name="data">加密后的业务数据</param>
    /// <param name="post">是否发生post请求</param>
    /// <returns></returns>
    public static string payAPIRequest(string requestURL, string datastring, bool post)
    {
        string postParams = "data=" + HttpUtil.UrlEncode(datastring) + "&customernumber=" + merchantAccount;
        string responseStr = "";
        if (post)
        {
            responseStr = HttpUtil.HttpPost(requestURL, postParams);
        }
        else
        {
            responseStr = HttpUtil.HttpGet(requestURL, postParams);
        }
        return responseStr;
    }

}

