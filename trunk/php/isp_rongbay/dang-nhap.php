<?php
if(!defined("edocom")) exit ();?>
<title>Đăng nhập - <?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
 <tr >
   <td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Đăng nhập vào website </td>   
 </tr>
<?php
if($_POST['username'])  {
				
				$username  = text($_POST['username']);
				$password  = text(md5($_POST['password']));
				
				$sqlstr    = mysql_query("SELECT id,fullname,username,picture FROM ".members." WHERE username='$username' AND password='$password' AND status='true'");
				   if(mysql_num_rows($sqlstr)=='0') {
				   
					echo "<script>alert('Tên truy cập hoặc mật khẩu không chính xác');</script>";
					}
				   else {
				   
						$row=mysql_fetch_array($sqlstr);
						@$_SESSION['idcus']       = $row['id'];
						@$_SESSION['fullname'] = $row['fullname'];	
						@$_SESSION['timelog'] = time();
						@$_SESSION['pic_member'] = $row['picture'];
						mysql_query("UPDATE ".members." SET online='true' WHERE id='".$row['id']."'");
				header('location:'.$domain.'');
				   }		
				}

  ?>  <tr >
    <td height="28" colspan="2">&nbsp;</td>
    </tr>
  <tr >
   <td width="261" height="10"><div align="right"><strong>
     <?php echo $require?>
     Tên truy cập:&nbsp;&nbsp;</strong></div></td>
   <td width="506"><input type="text" name="username" id="inputRegister"></td>
 </tr>
 <tr >
   <td height="27"><div align="right"><strong>
     <?php echo $require?>
     Mật khẩu:&nbsp;&nbsp;</strong></div></td>
   <td><input type="password" name="password" id="inputRegister"></td>
 </tr>
 
 <tr >
   <td height="40" colspan="2" align="center"><a href="<?php echo $domain?>/dang-ky-thanh-vien<?php echo $vip?>" class="xemtiep">Đăng ký thành viên</a> | <a href="<?php echo $domain?>/quen-mat-khau<?php echo $vip?>" class="xemtiep">Quên mật khẩu</a> </td>
   </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>
     <input type="submit" name="Send" id="Send" value="   Đăng nhập   ">
   </td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>            
</table>
</form>