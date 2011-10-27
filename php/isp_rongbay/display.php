<?php
session_start();
    $display=@$_GET['display'];
    @$_SESSION['display']=$display;	
	echo "<script>location.href='".$_SERVER['HTTP_REFERER']."'</script>";     
	  
?>		
