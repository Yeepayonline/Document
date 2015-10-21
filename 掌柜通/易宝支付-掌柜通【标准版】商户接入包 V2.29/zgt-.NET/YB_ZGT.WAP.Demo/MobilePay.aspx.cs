
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace YB_ZGT.WAP.Demo
{
    public partial class MobilePay : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            //加载页面时初始化支付需要的业务明文参数
            if (!IsPostBack)
            {
                orderAmount.Text = "0.01";//默认的交易金额，单位元

                Random ra = new Random();
                traderOrderID.Text = "1234567" + 50 * ra.Next();//商户订单号


                productCatalog.Text = "30";// 
                productName.Text = "玉米加农炮";//商品名称
                productDesc.Text = "植物大战僵尸道具";//商品描述
                bankId.Text = "CMBCHINA-NET-B2C";//银行编码
                fcallbackURL.Text = "http://218.5.9.29:1058/Zgt/CallBack.aspx";
                callbackURL.Text = "http://218.5.9.29:1058/Zgt/CallBack.aspx";
            }
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            //请求移动终端网页收银台支付

            //一键支付URL前缀
            string apiprefix = APIURLConfig.mobilePrefix;

            //网页支付地址
            string mobilepayURI = APIURLConfig.webpayURI;

            //商户账户编号
            string customernumber = Config.merchantAccount;
            string hmacKey = Config.merchantKey;
            string AesKey = Config.AescKey;

            //日志字符串
            StringBuilder logsb = new StringBuilder();
            logsb.Append(DateTime.Now.ToString() + "\n");

            Random ra = new Random();
            string payproducttype = "ONEKEY"; // "支付方式";
            string amount = (orderAmount.Text);//支付金额为单位元       
            string requestid = traderOrderID.Text;//订单号
            string productcat = productCatalog.Text;//商品类别码，商户支持的商品类别码由易宝支付运营人员根据商务协议配置
            string productdesc = productDesc.Text;//商品描述
            string productname = productName.Text;//商品名称
            string assure = "0";//是否需要担保,1是，0否
            string divideinfo = "";//分账信息，格式”ledgerNo:分账比
            string bankid = bankId.Text;//银行编码
            string period = "";//担保有效期，单位 ：天；当assure=1 时必填，最大值：30
            string memo = "";//商户备注
            string userno = "";//用户标识
            string ip = "";//IP
            string cardname = "";//持卡人姓名
            string idcard = "";//身份证
            string bankcardnum = "";//银行卡号

            //商户提供的商户后台系统异步支付回调地址
            string callbackurl = callbackURL.Text;
            //商户提供的商户前台系统异步支付回调地址
            string webcallbackurl = fcallbackURL.Text;
            string hmac = "";


            hmac = Digest.GetHMAC(customernumber, requestid, amount, assure, productname, productcat, productdesc, divideinfo, callbackurl, webcallbackurl, bankid, period, memo, hmacKey);

            SortedDictionary<string, object> sd = new SortedDictionary<string, object>();
            sd.Add("customernumber", customernumber);
            sd.Add("amount", amount);
            sd.Add("requestid", requestid);
            sd.Add("assure", assure);
            sd.Add("productname", productname);
            sd.Add("productcat", productcat);
            sd.Add("productdesc", productdesc);
            sd.Add("divideinfo", divideinfo);
            sd.Add("callbackurl", callbackurl);
            sd.Add("webcallbackurl", webcallbackurl);
            sd.Add("bankid", bankid);
            sd.Add("period", period);
            sd.Add("memo", memo);
            sd.Add("payproducttype", payproducttype);
            sd.Add("userno", userno);
            sd.Add("ip", ip);
            sd.Add("cardname", cardname);
            sd.Add("idcard", idcard);
            sd.Add("bankcardnum", bankcardnum);
            sd.Add("hmac", hmac);



            //将网页支付对象转换为json字符串
            string wpinfo_json = Newtonsoft.Json.JsonConvert.SerializeObject(sd);
            logsb.Append("手机支付明文数据json格式为：" + wpinfo_json + "\n");

            string datastring = AESUtil.Encrypt(wpinfo_json, AesKey);

            logsb.Append("手机支付业务数据经过AES加密后的值为：" + datastring + "\n");



            //打开浏览器访问一键支付网页支付链接地址，请求方式为get
            string postParams = "data=" + HttpUtility.UrlEncode(datastring) + "&customernumber=" + customernumber;
            string url = apiprefix + mobilepayURI + "?" + postParams;

            logsb.Append("手机支付链接地址为：" + url + "\n");

#if DEBUG
            SoftLog.LogStr(logsb.ToString(), "MobilePayLog");
#endif
            string ybResult = YJPayUtil.payAPIRequest(apiprefix + mobilepayURI, datastring, false);

            logsb.Append("请求支付结果：" + ybResult + "\n");

            //将支付结果json字符串反序列化为对象
            RespondJson respJson = Newtonsoft.Json.JsonConvert.DeserializeObject<RespondJson>(ybResult);
            string yb_data = respJson.data;

            yb_data = AESUtil.Decrypt(yb_data, Config.merchantKey);
            PayRequestJson result = Newtonsoft.Json.JsonConvert.DeserializeObject<PayRequestJson>(yb_data);
            if (result.code == 1)
            {
                bool r = Digest.PayRequestVerifyHMAC(result.customernumber, result.requestid, result.code, result.externalid, result.amount, result.payurl, hmacKey, result.hmac);
                if (r)
                {
                    //重定向跳转到易宝支付收银台
                    Response.Redirect(result.payurl);
                }
                else
                {
                    Response.Write("回调验签失败");
                }
            }
            else
            {
                Response.Write(result.msg);
            }


        }
    }
}