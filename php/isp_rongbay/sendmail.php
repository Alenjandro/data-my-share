<?php
if(!defined("edocom")) exit ();?>
<Meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SetLanguage("vn", "");
$mail->Host     = "localhost";
$mail->SMTPAuth = true;

$mail->Username = "";				// SMTP username
$mail->Password = ""; 			// SMTP password

$mail->From     = "info@vinamua.vn";				// Email duoc gui tu???
$mail->FromName = "Thu Tu vinamua.vn";	
//Tao chuoi ngong nhien
 $string_a = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9");
       $keys = array_rand($string_a,6);
       foreach($keys as $n=>$v)
	     {
           $string .= $string_a[$v];
         }
		session_register("stringcode");
		@$_SESSION['stringcode'] = $string;	
		$email=text($_POST['email']);
        
		$result=mysql_query("SELECT * FROM ".members." WHERE email='".$email."'");

		if(mysql_num_rows($result)>0) {
		
		 $row=mysql_fetch_array($result);
		 mysql_query("update ".members." set password='".md5(@$_SESSION['stringcode'])."' where email='$email'"); 
		 
		        $to = $email;
				$subject = "Lay lai mat khau tu http://vinamua.vn";
				$message = "Tên tuy cập: ".$row['username']."<br>Mật khẩu: ".@$_SESSION['stringcode']."";
				$message .=   "<br>Mời bạn nhấn vào đây để đăng nhập <a href=\"http://vinamua.vn/dang-nhap.html\">Đăng nhập</a>";
				$from = "info@vinamua.vn";
				$headers = "MIME-Versin: 1.0\r\n" .
							   "Content-type: text/html ; charset=UTF-8; format=flowed\r\n" .
							   "Content-Transfer-Encoding: 8bit\r\n" .
							   "From: $from\r\n" .
							   "X-Mailer: PHP" . phpversion();
				
				mail($to,$subject,$message,$headers);
				
				
				 echo "<script>alert('Mật khẩu đã gửi vào hòm thư của bạn');location.href='index.php';</script>";

}
else{
 echo "<script>alert('Địa chỉ Email không tồn tại');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
}
?>