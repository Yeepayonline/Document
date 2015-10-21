<?php
require_once(__DIR__ . "/../inc/config.php");

$requestid = "ZGTREGISTER" . date("ymd_His") . rand(10, 99);

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=<?=__LOCALE__CODE__?>" />
	<title>掌柜通注册接口</title>
</head>
	<body>
		<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0" style="border:solid 1px #107929">
			<tr>
		  		<th align="center" height="30" colspan="5" bgcolor="#6BBE18">
					分账账号注册
				</th>
		  	</tr> 

			<form method="POST" action="../php/sendRegister.php" target="_blank" accept-charset="<?=__LOCALE__CODE__?>">
				<tr >
					<td width="20%" align="left">&nbsp;注册请求号</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="requestid" value="<?=$requestid?>"/>
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">requestid</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;绑定手机号</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="bindmobile" value="12345678901" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">bindmobile</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;注册类型</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<select name="customertype">
							<option value="PERSON">个人</option>
							<option value="ENTERPRISE">企业</option>
						</select>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">customertype</td> 
				</tr> 


				<tr >
					<td width="20%" align="left">&nbsp;签约名</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="signedname" value="掌柜通测试" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">signedname</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;联系人姓名</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="linkman" value="张三" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">linkman</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;个人身份证号</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="idcard" value="123456789012345678" />
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">idcard</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="55%" align="left"> 
						<span style="font-size:12px; color:#FF0000; font-weight:100;"> 
							「个人身份证」在「注册类型」为「个人」时必填！
						</span>
					</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="15%" align="left">&nbsp;</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;企业营业执照号</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="businesslicence" value="" />
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">businesslicence</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="55%" align="left"> 
						<span style="font-size:12px; color:#FF0000; font-weight:100;"> 
							「企业营业执照」在「注册类型」为「企业」时必填！
						</span>
					</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="15%" align="left">&nbsp;</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;姓名</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="legalperson" value="张三" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">legalperson</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="55%" align="left"> 
						<span style="font-size:12px; color:#FF0000; font-weight:100;"> 
							「姓名」在「注册类型」为「企业」时，填写企业法人姓名；为「个人」时填写身份证姓名！
						</span>
					</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="15%" align="left">&nbsp;</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;起结金额</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="minsettleamount" value="1" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">minsettleamount</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;结算周期</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="riskreserveday" value="1" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">riskreserveday</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;银行卡号</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="bankaccountnumber" value="1234567890123456" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">bankaccountnumber</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;银行卡开户行</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="bankname" value="招商银行股份有限公司杭州分行" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">bankname</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;银行卡开户名</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="accountname" value="张三" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">accountname</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;银行卡类型</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<select name="bankaccounttype">
							<option value="PrivateCash">对私</option>
							<option value="PublicCash">对公</option>
						</select>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">bankaccounttype</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;银行卡开户省</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="bankprovince" value="浙江" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">bankprovince</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;银行卡开户市</td>
					<td width="5%"  align="center"> : &nbsp;</td> 
					<td width="55%" align="left"> 
						<input size="70" type="text" name="bankcity" value="杭州" />
						<span style="color:#FF0000;font-weight:100;">*</span>
					</td>
					<td width="5%"  align="center"> - </td> 
					<td width="15%" align="left">bankcity</td> 
				</tr>

				<tr >
					<td width="20%" align="left">&nbsp;</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="55%" align="left"> 
						<input type="submit" value="提交注册信息" />
					</td>
					<td width="5%"  align="center">&nbsp;</td> 
					<td width="15%" align="left">&nbsp;</td> 
				</tr>

			</form>
		</table>
</body>
</html>
