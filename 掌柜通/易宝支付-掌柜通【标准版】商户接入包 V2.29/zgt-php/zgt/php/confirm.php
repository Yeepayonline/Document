<?php
require_once(__DIR__ . "/../inc/config.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=<?=__LOCALE__CODE__?>" />
		<title>担保确认接口</title>
	</head>
<body>
	<br />
	<div align="center">
		<strong>担保确认——请输入订单号</strong>
	</div>
	<br> <hr /> <br>
	<form method="post" action="../php/sendConfirm.php" accept-charset="<?=__LOCALE__CODE__?>">
		<div align="center">
				<strong>商户订单号：</strong>
				<input type="text" name="orderrequestid" />&nbsp;
				<span style="color:#FF0000;font-weight:100;">*</span>
		</div>
		<br />
		<div align="center">
				<input type="submit" value="单击确认" />
				&nbsp;&nbsp;
		</div>
	</form>
	<hr /><br />

</body>
</html>
