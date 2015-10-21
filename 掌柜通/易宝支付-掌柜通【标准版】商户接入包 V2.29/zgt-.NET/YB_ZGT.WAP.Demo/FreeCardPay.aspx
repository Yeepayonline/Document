<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="FreeCardPay.aspx.cs" Inherits="YB_ZGT.WAP.Demo.FreeCardPay" %>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="demo.css">

    <title>无卡直连-首次支付</title>
</head>
<body>
    <form id="form1" method="post" runat="server">
        <div class="content2">
            <h2>无卡直连-首次支付示例</h2>
            <ul>
                <li>交易金额：
                    <asp:TextBox ID="orderAmount" runat="server"></asp:TextBox>（单位分,必须大于0）</li>
                <li>商户交易订单号：
                    <asp:TextBox ID="traderOrderID" runat="server"></asp:TextBox></li>
                <li>商品类别：
                    <asp:TextBox ID="productCatalog" runat="server" Text="30"></asp:TextBox>(投资通默认：30)</li>
                <li>商品名称：
                    <asp:TextBox ID="productName" runat="server" MaxLength="50"></asp:TextBox></li>
                <li>商品描述：
                    <asp:TextBox ID="productDesc" runat="server" MaxLength="200"></asp:TextBox></li>
                <li>持卡人姓名:
                    <asp:TextBox ID="Cardname" runat="server"></asp:TextBox>
                </li>
                <li>身份证号:
                    <asp:TextBox ID="idCard" runat="server"></asp:TextBox>
                </li>
                <li>支付的银行卡号:
                    <asp:TextBox ID="Bankcardnum" runat="server" Width="395px"></asp:TextBox>
                </li>
                <li>预留手机号:
                    <asp:TextBox ID="Mobilephone" runat="server" Width="395px"></asp:TextBox>
                </li>
                <li>CVV2:
                    <asp:TextBox ID="CVV2" runat="server" Width="395px"></asp:TextBox> 
                </li>
                <li>有效期:
                    <asp:TextBox ID="Expiredate" runat="server" Width="395px"></asp:TextBox>(信用卡时必填，格式：MMYY)
                </li>
                <li>行业代码:
                    <asp:TextBox ID="Mcc" Tex="5969" runat="server" Width="395px"></asp:TextBox>
                </li>
                <li>地区码：
                    <asp:TextBox ID="Areacode" runat="server" Width="395px"></asp:TextBox></li>
                <li>用户标识:
                    <asp:TextBox ID="Userno" runat="server" Width="395px"></asp:TextBox>
                </li>
                <li>是否绑卡：
                    <asp:TextBox ID="Isbind" runat="server" Width="395px"></asp:TextBox>
                    (Y – 绑卡; N 或"" – 不绑卡)
                </li>

                <li>支付成功商户前台回调地址：
                    <asp:TextBox ID="fcallbackURL" runat="server" Width="500px"></asp:TextBox></li>
                <li>支付成功商户后台台回调地址：
                    <asp:TextBox ID="callbackURL" runat="server" Width="500px"></asp:TextBox></li>

                <li>
                    <asp:Button ID="Button1" runat="server" AccessKey="A" Text="去支付" OnClick="Button1_Click" /></li>
            </ul>
        </div>
    </form>
</body>
</html>
