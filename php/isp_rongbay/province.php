<?php
session_start();
    $province=@$_GET['province'];
    @$_SESSION['province']=$province;	
	header('location:'.$_SERVER['HTTP_REFERER'].'');  
	  
?>		
