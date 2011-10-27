<?php
$string_a = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9");
       $keys = array_rand($string_a,6);
       foreach($keys as $n=>$v)
	     {
           $string .= $string_a[$v];
         }
		session_register("stringcode");
		@$_SESSION['stringcode'] = $string;	

		 
	$to='xuan_phu2004@yahoo.com';
	$cc='vietwebsite@gmail.com';
	$bcc='vietwebsite@gmail.com';
    // subject
    $subject = 'Lay lai mat khau';
    // message
    $message = "Thông tin truy cập của bạn là:<br>Tên đăng nhập: <br>Mật khẩu: ".@$_SESSION['stringcode']."<br>Bạn có thể đăng nhập vào website với tài khoản trên"; 
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

  echo "<script>alert('Chúng tôi đã gửi mật khẩu mới cho bạn qua email');location.href='index.php';</script>";
	  
?>