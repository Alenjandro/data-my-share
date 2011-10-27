<?php
if(!defined("edocom")) exit ();?>
<title>Đăng ký thành viên - <?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
  <tr ><td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Đăng ký thành viên</td>   </tr>
  <tr>
    <td>
	<form action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
 
  <div style="text-align:left; color:#FF0000;  width:400px">	   
		<?php
if($_POST['Send']) {
	   
	   echo "<tr><td  colspan=2 style='text-align:left; color:#FF0000;text-align:center'>";
            $submit = '';
			    if(text($_POST['fullname'])=='') {
					$alert = "Mời bạn nhập đầy đủ họ tên";
				   $submit = true;
				}elseif(text($_POST['address'])=='') {
					$alert = "Mời bạn nhập địa chỉ liên hệ";
				   $submit = true ;
				}elseif(text($_POST['email'])=='') {
					$alert = "Mời bạn nhập địa chỉ Email";
					$submit = true ;
				}elseif(NumRow(email,members,"email='".text($_POST['email'])."'")>0 || NumRow(email,confirm,"email='".text($_POST['email'])."'")>0)  {
					$alert = "Email này  đã có người sử dụng";
					$submit = true ;
				}elseif(!eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$',$_POST['email'])){
					$alert = "Email của bạn không hợp lệ";
					$submit = true ;
				}elseif(text($_POST['username'])=='') {
					$alert = "Mời bạn nhập tên truy cập";
					$submit = true ;
				}elseif(NumRow(username,members,"username='".text($_POST['username'])."'")>0||NumRow(username,confirm,"username='".text($_POST['username'])."'")>0)  {
					$alert = "Tên truy cập đã có người sử dụng";
					$submit = true ;
				}elseif(!eregi('^[a-zA-Z0-9._-]+[a-zA-Z0-9._-]$',text($_POST['username']))){
					$alert = "Tên đăng nhập của bạn không hợp lệ";
					$submit = true ;
				}elseif(text($_POST['password'])=='') {
					$alert = "Mời bạn nhập mật khẩu";
					$submit = true ;
				}elseif(text($_POST['retypepassword'])=='') {
					$alert = "Mời bạn xác nhận lại mật khẩu";
					$submit = true ;
				}elseif(text($_POST['password'])!=text($_POST['retypepassword'])) {
					$alert = "Mật khẩu nhập lại không chính xác";
					$submit = true ;
				}elseif(text($_POST['code'])!=@$_SESSION['code']) {
					$alert = "Mã xác nhận không chính xác";
					$submit = true;
				}elseif($_POST['checkbox']=='') {
					$alert = "Bạn phải đánh dấu vào ô chấp nhận điều khoản thành viên";
					$submit = true ;
				}elseif($submit=='') {	
				$matv = mysql_query("select max(id) from ".members."");		 
				$string_code = sha1(time());
				mysql_query("INSERT INTO ".confirm." SET 
				fullname                   = '".text($_POST['fullname'])."'
				,address                   = '".text($_POST['address'])."'
				,telephone                 = '".text($_POST['telephone'])."'
				,email                     = '".text($_POST['email'])."'
				,website                   = '".text($_POST['website'])."'
				,username                  = '".text($_POST['username'])."'
				,password                  = '".text(md5($_POST['password']))."'
				,strcode				   = '".$string_code."'
				,postdate                  = '".time()."'");
				$to  = $_POST['email'];
				// subject
				$subject = 'Thông tin xác nhận việc đăng ký thành viên'; 
				// message
				$message .= 'Bạn đã đăng ký là thành viên của website chúng tôi. Chúng tôi mong bạn sẽ có những đóng góp tích cực để giúp cho website ngày càng phát triển hơn nữa.</br>'. "\r\n";
				$message .= '<h2>Thông tin thành viên</h2></br>'. "\r\n";
				$message .= "<br><br>".'Họ và tên: '.text($_POST['fullname']) ."\r\n";
				$message .= "<br><br>".'Email: '.text($_POST['email']) ."\r\n";
				$message .= "<br><br>".'Địa chỉ: '.text($_POST['address']) ."\r\n";
				$message .= "<br><br>".'Điện thoại: '.text($_POST['telephone']) ."\r\n";
				$message .= "<br><br>".'Website: '.text($_POST['website']) ."\r\n";
				$message .= '<h2>Thông tin tài khoản</h2></br>'. "\r\n";
				$message .= "<br><br>".'Tên đăng nhập: '.text($_POST['username']) ."\r\n";
				$message .= "<br><br>".'Mật khẩu: '.text($_POST['password']) ."\r\n";
				//$message .= "<br><br>".'Mã thành viên của bạn:'.($matv+1) ."\r\n";
				$message .= "<br><br>".'Ngày đăng ký: '.date("h:i:s A, d/m/Y",time()) ."\r\n";
				$message .= "<br><br>".'Để hoàn thành việc đăng ký thành viên bạn hãy <a href="'.$domain.'/xac-nhan-dang-ky/'.$string_code.$vip.'" target="_blank">click vào đây</a>.'."\r\n";
				
				// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				// Additional headers
				$headers .= 'From:tranxuanbac@gmail.com'."\r\n";
				// Mail it
				mail($to, $subject, $message, $headers);
				
				echo "<script>alert('Chúc mừng bạn đã đăng ký thành công. Bạn hãy check mail để xác nhận tài khoản của bạn');location.href='".$domain."';</script>";
				}	
				
		if($submit!='') {	
			  echo $alert;					
		}	
				
		echo "</td></tr>";		
        }
        ?>
 </div>
  <tr id="content" >
    <td height="35" colspan="2"><div id="settyper" align="center">Chọn kiểu gõ &nbsp;&nbsp;<input value="1" name="typer" onClick="return Mudim.SetMethod(4);" type="radio">&nbsp;Tự động &nbsp;&nbsp;<input checked="checked" value="1" name="typer" onClick="return  Mudim.SetMethod(2);" type="radio">&nbsp;Telex &nbsp;&nbsp;<input value="1" name="typer" onClick="return  Mudim.SetMethod(1);" type="radio">&nbsp;VNI &nbsp;&nbsp;<input value="0" name="typer" onClick="return Mudim.SetMethod(0);" type="radio">&nbsp;Tắt</div></td>
  </tr>
  <tr id="content" >   
   <td height="35" colspan="2" style="padding-left:50px"><div align="left"><strong>Thông tin cá nhân</strong></div></td>            
   </tr>
 <tr >
   <td width="190"  height="28"><div align="right"><strong>
     <?php echo $require?>
     Họ tên:&nbsp;&nbsp;</strong></div></td>
   <td width="410">
     <input type="text" name="fullname" id="inputRegister" value="<?php echo $_POST['fullname']?>" >   </td>
 </tr>
 <tr >
   <td height="28"><div align="right"><strong>
     <?php echo $require?>
     Địa chỉ:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="address" id="inputRegister" value="<?php echo $_POST['address']?>"></td>
 </tr>
 <tr >
   <td height="28"><div align="right"><strong> Điện thoại:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="telephone" id="inputRegister" value="<?php echo $_POST['telephone']?>"></td>
 </tr>
 <tr >
   <td height="27"><div align="right"><strong>
     <?php echo $require?>
     Email:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="email" id="inputRegister" value="<?php echo $_POST['email']?>"></td>
 </tr>
 <tr >
   <td height="27"><div align="right"><strong>Website:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="website" id="inputRegister" value="<?php echo $_POST['website']?>"></td>
 </tr>
 <tr >
   <td height="35" colspan="2" style="padding-left:50px"><div align="left"><strong>Thông tin tài khoản</strong></div></td>
   </tr>
 <tr >
   <td height="28"><div align="right"><strong>
     <?php echo $require?>
     Tên truy cập:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="username" id="inputRegister" value="<?php echo $_POST['username']?>"></td>
 </tr>
 <tr >
   <td height="27"><div align="right"><strong>
     <?php echo $require?>
     Mật khẩu:&nbsp;&nbsp;</strong></div></td>
   <td><input type="password" name="password" id="inputRegister" value="<?php echo $_POST['password']?>"></td>
 </tr>
 <tr >
   <td height="26"><div align="right"><strong>
     <?php echo $require?>
     Nhập lại mật khẩu:&nbsp;&nbsp;</strong></div></td>
   <td><input type="password" name="retypepassword" id="inputRegister" value="<?php echo $_POST['retypepassword']?>"></td>
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
   <td><input type="checkbox" name="checkbox" value="checkbox">
     Tôi chấp nhận những <a href="<?php echo $domain?>/quy-che-thanh-vien<?php echo $vip?>" style="text-decoration:none; color:#0000FF">điều khoản</a> của website. </td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td><label>
     <input type="submit" name="Send" id="Send" value="Đăng ký">
   </label></td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>            
</table>
</form>
	</td>
  </tr>
</table>
