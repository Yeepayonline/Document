<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="CallBack.aspx.cs" Inherits="YB_ZGT.WAP.Demo.CallBack" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>支付成功回调结果</title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            支付回调页面：<br />
            <br />
            易宝支付回调返回的data为：<asp:Label ID="DataLabel" runat="server"></asp:Label><br />
            <br />

            解密后的业务明文为：<asp:Label ID="CallBackResultLabel" runat="server"></asp:Label><br />
            <br />

            支付结果：<asp:Label ID="LabResult" runat="server"></asp:Label><br />
            <br />
        </div>
    </form>
</body>
</html>
