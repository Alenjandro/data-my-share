<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>ĐỔI MẬT KHẨU:</strong></div>
<?php
if($_POST['UpdatePass'])	  {			
			  			
			
			 
			   $passold            =md5(md5(text($_POST['passold'])));
			   $passnew            =md5(md5(text($_POST['passnew'])));
			   $fullname           =text($_POST['fullname']);
			   if($fullname != '') { 
				 if(mysql_num_rows(mysql_query("SELECT * FROM ".admin." WHERE password='$passold'"))>0)   {
				 
					mysql_query("UPDATE ".admin." SET password='$passnew',fullname='$fullname' WHERE username='".@$_SESSION['admin']."'");
					
					echo "<script>alert('Đổi mật khẩu thành công');</script>";
				 }	
				 else {
					echo "<script>alert('Đổi mật khẩu không thành công.Mời bạn đổi lại');</script>";
				 } 
				} else {
				   echo "<script>alert('Mời bạn nhập tên hiển thị');</script>";
				} 
		 
	}	  
	 
?>
<form method="post" action="">
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
  <tr>
    <td width="18%" height="32" align="right"><div align="left">Mật khẩu cũ</div></td>
    <td width="82%"><label>
    <input type="password" name="passold">
    </label></td>
  </tr>
  <tr>
    <td height="32" align="right"><div align="left">Mật khẩu mới</div></td>
    <td><input type="password" name="passnew"></td>
  </tr>
  
  <tr>
    <td height="32" align="right"><div align="left">Tên hiển thị </div></td>
    <td><label>
      <input name="fullname" type="text" id="fullname" value="<?php echo @$_SESSION['fullnameadmin']?>" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="UpdatePass" value="Đổi mật khẩu" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
      <input type="reset" name="Submit2" value="Hủy đổi mật khẩu" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
    </label></td>
  </tr>
</table>
</form>


