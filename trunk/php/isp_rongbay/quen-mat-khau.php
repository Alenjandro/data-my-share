<title>Lấy lại mật khẩu - <?php echo title?></title>
<meta name="keywords" content="<?php echo keywords?>"/>
<meta name="description" content="<?php echo description?>" />
<table width="610" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr ><td class="proTop textLeftMenu" style="padding-left:10px;" colspan="3"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Lấy lại mật khẩu</td>   </tr>
   <tr >
	<td align="center">
	<form name="form1" method="post" action="">
	<?php
if($_POST['sendmail'] != '' &&text($_POST['email']) != '') {
	
	 
$string_a = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9");
       $keys = array_rand($string_a,6);
       foreach($keys as $n=>$v)
	     {
           $string .= $string_a[$v];
         }
		session_register("stringcode");
		@$_SESSION['stringcode'] = $string;	
$result=mysql_query("SELECT * FROM ".members." WHERE email='".$_POST['email']."'");

		if(mysql_num_rows($result)>0) {
		
		 $row=mysql_fetch_array($result);
		 mysql_query("update ".members." set password='".md5(@$_SESSION['stringcode'])."' where email='".$_POST['email']."'");
		 
	$to=$_POST['email'];
	$cc='tranxuanbac@gmail.com';
	$bcc='tranxuanbac@gmail.com';
    // subject
    $subject = 'Lay lai mat khau';
    // message
    $message = "Thông tin truy cập của bạn là:<br>Tên đăng nhập: ".$row['username']."<br>Mật khẩu: ".@$_SESSION['stringcode']."<br>Bạn có thể đăng nhập vào website với tài khoản trên"; 
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    // Additional headers
    $headers .= 'To:'.$_POST['email']. "\r\n";
    $headers .= 'From:'.$cc."\r\n";
    $headers .= 'Cc:' .$cc. "\r\n";
    $headers .= 'Bcc: ' .$bcc. "\r\n";

    // Mail it
    mail($to, $subject, $message, $headers);	

  echo "<script>alert('Chúng tôi đã gửi mật khẩu mới cho bạn qua email');location.href='".$domain."/dang-nhap".$vip."';</script>";
	   }
		   } 
?>

	  <table width="96%" border="0" cellspacing="0" cellpadding="5" align="center">
   
        <tr>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="130"><div align="right"><strong>Email:</strong></div></td>
          <td width="5" align="center">&nbsp;</td>
          <td width="371"><input name="email" type="text" id="email" style="width:300px;"></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input name="sendmail" class="button_bg" type="submit" id="sendmail" value="  Gửi đi  "></td>
        </tr>
      </table>
      </form>    </td>
  </tr>
  <tr>
    <td ></td>
  </tr>
</table>
