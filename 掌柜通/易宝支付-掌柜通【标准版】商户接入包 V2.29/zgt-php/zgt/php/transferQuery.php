<?php
require_once(__DIR__ . "/../inc/config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=<?=__LOCALE__CODE__?>" />
		<title>转账查询接口</title>
	</head>
<body>
	<br />
	<div align="center">
		<strong>转账查询——请输入转账请求号</strong>
	</div>
	<br> <hr /> <br>
	<form method="post" action="../php/sendTransferQuery.php" >
		<div align="center">
				<strong>转账请求号：</strong>
				<input type="text" name="requestid" id="requestid" />&nbsp;
				<span style="color:#FF0000;font-weight:100;">*</span>
		</div>
		<br />
		<div align="center">
				<input type="submit" value="单击查询" />
				&nbsp;&nbsp;
		</div>
	</form>
	<hr /><br />

</body>
</html>

