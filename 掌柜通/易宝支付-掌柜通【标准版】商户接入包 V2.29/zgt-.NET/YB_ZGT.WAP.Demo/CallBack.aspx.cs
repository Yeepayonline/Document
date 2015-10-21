using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace YB_ZGT.WAP.Demo
{
    public partial class CallBack : System.Web.UI.Page
    {
        /// <summary>
        /// 接收易宝支付回调示例
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        protected void Page_Load(object sender, EventArgs e)
        {
            string callback_result = "";
            try
            {
                if (Request["data"] == null)
                {
                    Response.Write("参数不正确！");
                }
                else
                {
                    //商户注意：接收到易宝的回调信息后一定要回写success用以保证握手成功！
                    string data = Request["data"].ToString(); //回调中的参数data
                    DataLabel.Text = data;

                    data = AESUtil.Decrypt(data, Config.merchantKey);
                    CallBackResultLabel.Text = data;

                    PayResultJson result = Newtonsoft.Json.JsonConvert.DeserializeObject<PayResultJson>(data);

                    ///支付结果回调验签
                    bool r = Digest.PayResultVerifyHMAC(result.customernumber, result.requestid, result.code, result.notifytype, result.externalid, result.amount, result.cardno, Config.merchantKey, result.hmac);
                    if (r)
                    {
                        if (result.code == 1)
                        {
                            Response.Write("SUCCESS");
                            LabResult.Text = "支付成功";
                        }
                        else
                        {
                            LabResult.Text = "支付失败";
                        }
                    }
                    else
                    {
                        LabResult.Text = "验签失败";
                    }

                }
            }
            catch (Exception err)
            {
                Response.Write("支付失败！");
                return;
            }
            finally
            {
                SoftLog.LogStr("支付回调信息" + Request["data"] + "处理结果:" + callback_result, "yeepay/CallbackLog");
            }

        }
    }
}