<?php
ob_start();
session_start();
include "../define_data.php";
include "../config.php";
	$username             =text($_POST['username']);
	$password             =md5(md5(text($_POST['password'])));

$sql=mysql_query("Select * from ".admin." where username='$username' AND password='$password'");
if(mysql_num_rows($sql)>0) {

	$row=mysql_fetch_array($sql);
		
	@$_SESSION['idadminpc']     = $row['id'];
	@$_SESSION['admin']       = $row['username'];
	@$_SESSION['modmana']     = $row['user_mod'];
	@$_SESSION['nhomdanhmuc'] = $row['category'];	
	@$_SESSION['fullnameadmin']    = $row['fullname'];
	
	header('location:index.php');
}
else  
{
	header('location:login.php');
}
?>