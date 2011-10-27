<title>Xác nhận email đăng ký</title>
<?php
$sqlstr = mysql_query("SELECT * FROM ".confirm." WHERE strcode='".text($id_1)."'");
if(mysql_num_rows($sqlstr)>0){
$row=mysql_fetch_array($sqlstr);
if(NumRow(id,members,"email='".$row['email']."'")>0){}else{
	mysql_query("INSERT INTO ".members." SET 
	fullname                   = '".$row['fullname']."'
	,address                   = '".$row['address']."'
	,telephone                 = '".$row['telephone']."'
	,email                     = '".$row['email']."'
	,website                   = '".$row['website']."'
	,username                  = '".$row['username']."'
	,password                  = '".$row['password']."'
	,postdate                  = '".$row['postdate']."'");
	@$_SESSION['idcus']       = $row['id'];
	@$_SESSION['fullname'] = $row['fullname'];	
	@$_SESSION['timelog'] = time();
	@$_SESSION['pic_member'] = $row['picture'];
	mysql_query("UPDATE ".members." SET online='true' WHERE id='".$row['id']."'");
	mysql_query("DELETE FROM ".confirm." where strcode='".text($id_1)."'");
	echo "<div style='padding-top:50px; font-size:12px' align='center'>Xác nhận email thành công. Chúc mừng bạn đã là thành viên của website. Click <a href='".$domain."' class='xemtiep' style='color:red'>vào đây</a> để về trang chủ<div>";
}}else{
	echo "<div style='padding-top:50px; font-size:12px' align='center'>Liên kết này đã được kích hoạt hoặc không tồn tại. Click <a href='".$domain."' class='xemtiep' style='color:red'>vào đây</a> để về trang chủ<div>";
}
?>
