<?php
require_once(__DIR__ . "/../inc/config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=<?=__LOCALE__CODE__?>" />
		<title>余额查询接口</title>
	</head>
<body>
<br> <br>
	<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="border:solid 1px #107929">
			<tr>
		  		<th align="center" height="30" colspan="3" bgcolor="#6BBE18">
					余额查询接口	
				</th>
		  	</tr> 

			<form method="post" action="../php/sendBalanceQuery.php" target="_blank" accept-charset="<?=__LOCALE__CODE__?>">
				<tr >
					<td width="15%" align="left">&nbsp;子商户编号 : </td>
					<td width="85%" align="left"> 
						<textarea rows="8" cols="110" name="ledgerno" placeholder="ledgerno为空时，将查询主账户余额；格式：ledgerno1,ledgerno2,ledgerno3"></textarea>
					</td>
				</tr>

				<tr >
					<td width="15%" align="left">&nbsp;</td>
					<td width="85%" align="left"> 
						<input type="submit" value="submit" />
					</td>
				</tr>
				
			</form>
		</table>
</body>
</html>
