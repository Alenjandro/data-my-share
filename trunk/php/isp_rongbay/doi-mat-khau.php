<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<title>Đăng ký thành viên - <?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
 <tr ><td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Đăng ký thành viên</td>   </tr>
  <div style="text-align:left; color:#FF0000;  width:400px">	   
<?php
if($_POST['Send']) {

	echo "<tr><td  colspan=2 style='text-align:left; color:#FF0000;text-align:center'>";
	$submit='';
	if(text($_POST['passold'])=='') {
		$alert  = "Mời bạn nhập mật khẩu cũ";
		$submit = true;
	}elseif(text($_POST['passnew'])=='') {
		$alert  = "Mời bạn nhập mật khẩu mới";
		$submit = true;
	}elseif(text($_POST['passnew1'])=='') {
		$alert  = "Mời bạn nhập lại mật khẩu mới";
		$submit = true;
	}elseif(text($_POST['passnew'])!=text($_POST['passnew1'])) {
		$alert  = "Mời bạn nhập lại mật khẩu mới không chính xác";
		$submit = true;
	}elseif(NumRow(password,members,"password='".text(md5($_POST['passold']))."'")=='0')  {
		$alert  = "Mật khẩu cũ không chính xác";
		$submit = true ;
	}elseif(text($_POST['code'])!=@$_SESSION['code']) {
					$alert = "Mã xác nhận không chính xác";
					$submit = true;
				} 
	if($submit=='') {				 
	
	mysql_query("UPDATE  ".members." SET 
	password                   = '".text(md5($_POST['passnew']))."'				
	WHERE id                   = ".intval(@$_SESSION['idcus'])."");
	
	echo "<script>alert('Thay đổi mật khẩu thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	}	
	if($submit!='') {	
	echo $alert;					
	}		 
	echo "</td></tr>";		
	}
?>		
 </div> 
 <tr >
   <td width="190"  height="28"><div align="right"><strong>
     <?php echo $require?>
     Mật khẩu cũ:&nbsp;&nbsp;</strong></div></td>
   <td width="410">
     <input type="password" name="passold" id="inputRegister" >   </td>
 </tr>
 <tr >
   <td height="28"><div align="right"><strong>
     <?php echo $require?>
     Mật khẩu mới:&nbsp;&nbsp;</strong></div></td>
   <td><input type="password" name="passnew" id="inputRegister"></td>
 </tr>
 <tr >
   <td height="28"><div align="right"><strong> 
     <?php echo $require?>
     Nhập lại mật khẩu mới:&nbsp;&nbsp;</strong></div></td>
   <td><input type="password" name="passnew1" id="inputRegister"></td>
 </tr>
 <tr >
   <td height="26" rowspan="2"><div align="right"><strong>
     <?php echo $require?>
     Mã bảo vệ:&nbsp;&nbsp;</strong></div></td>
   <td><img src="<?php echo $domain?>/verify.php" /></td>
 </tr>
 <tr >
   <td><input type="text" name="code"  size="6" style="width:80px;" /></td>
 </tr>
 
 <tr >
   <td height="29">&nbsp;</td>
   <td>
     <input type="submit" name="Send" id="Send" value="Cập nhật thông tin">   </td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>          
</table>
</form>