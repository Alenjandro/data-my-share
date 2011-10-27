<?php
ob_start();
session_start();
include "define_data.php";
include "counter.php";
include "domain.php";
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }
$sqlstrid=mysql_query("SELECT * FROM ".userpost." WHERE id='".intval($id_1)."' AND status='true' ");
if(mysql_num_rows($sqlstrid)>0)   {
$row=mysql_fetch_array($sqlstrid); 
		mysql_query("INSERT INTO ".stories." SET newsid = '".intval($row['id'])."', memberid ='".@$_SESSION['idcus']."', postid ='".intval($row['memberid'])."', postdate='".$row['postdate']."'");
		echo "<script>location.href='".$_SERVER['HTTP_REFERER']."'</script>";
	}	
?>