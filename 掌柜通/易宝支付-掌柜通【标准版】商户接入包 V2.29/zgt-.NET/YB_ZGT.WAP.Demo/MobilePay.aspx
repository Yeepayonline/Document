<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="MobilePay.aspx.cs" Inherits="YB_ZGT.WAP.Demo.MobilePay" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="demo.css">

    <title>手机支付</title>
</head>
<body>
    <form id="form1" method="post" runat="server">
        <div class="content2">
            <h2>手机支付示例</h2>
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

                <li>银行编号：
                    <asp:TextBox ID="bankId" runat="server" MaxLength="50"></asp:TextBox></li>

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
