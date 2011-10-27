<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
<link href="../css/style.css"  rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<form name="frmLogin" method="post" action="check_login.php">
<table align="center" border="0" width="389" cellspacing="0" cellpadding="0">
	<tr>
		<td width="44">
			<img src="../images/Login_03.gif" border="0"></td>
		<td background="../images/login_06.gif" valign="top">
		<table class="font" border="0" width="100%" id="table2" cellspacing="0" cellpadding="0">
		
			<tr>
				<td width="13%" valign="top">
					<img src="../images/login_07.gif">
				</td>
				<td valign="top">&nbsp;</td>
				<td width="13%" valign="top">
					<img src="../images/login_07.gif">
				</td>
			</tr>
			<tr>
				<td colspan="3" valign="top">
					<img src="../images/login_10.gif" align="left" hspace="5">
					<font size="5" color="#FFFFFF"><strong>_LOGINFORM</strong></font><br><br>
					<p align="right">&nbsp;</p>
				</td>
			</tr>
			<tr>
                <td height="10"></td>
            </tr>
			<tr>
				<td colspan="3" valign="top">
				<table class="font" border="0" width="100%" id="table3" cellpadding="0">
					<tr>
						<td align="right" width="37%"><strong>USERNAME</strong></td>
						<td><input class="txtbox" type="text" name="username" size="20"></td>
					</tr>
					<tr>
						<td align="right"><strong>PASSWORD</strong></td>
						<td><input class="txtbox" type="password" name="password" size="20"></td>
					</tr>
					<tr>
						<td colspan="2" height="10"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input class="button" type="submit" name="login" value="LOGINBUTTON"> <input class="button" type="reset" name="reset" value="RESETBUTTON"></td>
					</tr>
					<tr>
						<td colspan="2" height="10"></td>
					</tr>
	                				</table>
				</td>
			</tr>
		</table>
		</td>
		<td width="37">
			<img src="../images/login_08.gif" border="0"></td>
	</tr>
   
	
</table>
</form>

<script language="javascript">
document.frmLogin.username.focus();
</script>
