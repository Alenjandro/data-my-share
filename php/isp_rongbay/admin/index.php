<?php
ob_start();
session_start();
define("edocom","edocom",true);
if(!isset($_SESSION['idadminpc'])) {
	 header('location:login.php');
}
include "../define_data.php";
include "../config.php";
include "sql.php";
include("../fckeditor/fckeditor.php") ;
?>

<script language="javascript"> 
function change_page_home(i)	 {
	 location.href=i;
}

function check_value()  {
  
    for (i=0;i<document.check_form.element_value.length;i++)
	     {			  
         document.check_form.element_value[i].checked=document.check_form.checkall.checked;		  
		 }
}	 
</script> 
<script language="javascript">

function agreeTerm() {
	if(check_form.checkall.checked==true) {
		for (i = 0; i <= document.check_form.element.length; i++) 
		document.check_form.element[i].checked = true ;
	}
	else {
		for (i = 0; i <= document.check_form.element.length; i++) 
		document.check_form.element[i].checked = false ;
	}
}
</script>
<SCRIPT language=javascript src="functions.v2.js"></SCRIPT>
<style type="text/css">
<!--
.style4 {color: #333333; }
-->
</style>
<body topmargin="0" leftmargin="0">
<DIV id=docLoading  style="width:300px; height:70px; background-color:#FF9900"><IMG src="loading.gif" border=0 style="margin-top:10px;  margin-left:10px"><STRONG><FONT color=#ff0000>Đang tải dữ liệu....<BR></FONT><FONT 
color=#0000ff>&nbsp;Admin vui lòng chờ.</FONT></STRONG></DIV>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css"  rel="stylesheet" type="text/css">
<title>HE THONG QUAN TRI NOI DUNG WEBSITE</title>


<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="table">
  <tr>
    <td colspan="2" height="31" style="border-bottom:#CCCCCC 1px solid; background-color:#8AB3B7; color:#FFFFFF">
	<div style="width:600px; text-align:left; float:left; padding-right:10px">Thành viên đăng nhập: <?php echo @$_SESSION['fullnameadmin']?> (<?php
echo @$_SESSION['mod']=1?'Quản trị hệ thống':'Người dùng'?>) - IP: <?php echo $_SERVER['REMOTE_ADDR']?></div>
	<div style="width:300px; text-align:right; float:right;padding-right:10px">Bản quyền <a href="http://vietwebsite.vn" style="color:#FFFFFF; font-weight:bold">Vietwebsite ., JSC</a></div>	</td>    
  </tr>
  <tr>
    <td width="174" rowspan="3"  valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0"  style="background-color:#EEEEEE; border-right:#999999 1px solid">	
     	
	  <tr>
		<td width="19%" class="space_row" >
		<img  src="../images/config.gif" style="width:25px; height:25px" border="0"></td>
	    <td width="81%" class="space_row" >
		<a href="index.php?menu=config&site=config" class="style4">Cấu hình hệ thống</a></td>
      </tr>	
		 
      <tr>
		<td width="19%" class="space_row" >
		<img  src="../images/Categories.gif" style="width:25px; height:25px" border="0"></td>
	    <td width="81%" class="space_row" >
		<a href="index.php?menu=ManagerProduct&site=MenuProduct" class="style4">Danh mục sản phẩm</a></td>
      </tr>	 
      
      <tr>
		<td class="space_row" >
		<img  src="../images/intro.gif" style="width:25px; height:25px" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=intro&site=intro" class="style4">Quản lý giới thiệu</a></td>
      </tr>
	  
   	 <tr>
		<td class="space_row" >
		<img  src="../images/contact.gif" style="width:25px; height:25px" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=contact&site=contact" class="style4">Quản lý liên hệ</a></td>
      </tr>    
       
              
	   <tr>
	     <td class="space_row" ><img src="../images/freelance.gif" width="26" height="26" border="0"></td>
	     <td class="space_row" ><a href="index.php?menu=teammember&site=teammember" class="style4">Quy chế thành viên </a></td>
        </tr>
	   <tr>
	     <td class="space_row" ><img src="../images/edit.gif" width="18" height="18" border="0"></td>
	     <td class="space_row" ><a href="index.php?menu=team&site=team" class="style4">Quy định đăng tin </a></td>
        </tr>
	   <tr>
	     <td class="space_row" ><img src="../images/online.jpg" width="24" height="23" border="0"></td>
	     <td class="space_row" ><a href="index.php?menu=members&site=members" class="style4">Quản lý thành viên </a></td>
        </tr>
	   <tr>
	     <td class="space_row" ><img src="../images/Articles.gif" width="25" height="22" border="0"></td>
	     <td class="space_row" ><a href="index.php?menu=guide&site=guide" class="style4">Quản lý hướng dẫn </a></td>
        </tr>
	   <tr>
	     <td class="space_row" ><img src="../images/province.gif" width="24" height="25" border="0"></td>
	     <td class="space_row" ><a href="index.php?menu=adv&site=adv" class="style4">Liên hệ quảng cáo</a></td>
        </tr>
	   <tr>
         <td class="space_row" ><img src="../images/name.gif" width="23" height="19" border="0"></td>
	     <td class="space_row" ><a href="index.php?menu=userport&site=userport" class="style4">Quản lý tin đăng </a></td>
        </tr>
	   <tr>
		<td class="space_row" >
		<img src="../images/vote.gif" width="25" height="24" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=manager_adverting&site=manager_adverting" class="style4">Quản lý quảng cáo</a></td>
	  </tr> 	
	  <tr>
		<td class="space_row" >
		<img src="../images/BannerManagement.gif" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=slide&site=slide" class="style4">Quản lý slide</a></td>
	  </tr> 	  	  
	  

	  <tr>
        <td class="space_row" ><img src="../images/province.gif" width="30" height="30" border="0" style="width:25px; height:25px"></td>
	    <td class="space_row" ><a href="index.php?menu=province&site=province" class="style4">Quản lý tỉnh thành </a></td>
	    </tr>
	  	
		
		<tr>
          <td class="space_row" ><img src="../images/yahoo.gif" width="16" height="16" border="0" style="width:25px; height:25px"></td>
		  <td class="space_row" ><a href="index.php?menu=SupportOnline&site=SupportOnline" class="style4">Hỗ trợ trực tuyến </a></td>
	    </tr>
			
		 <tr>
		<td class="space_row" >
		<img src="../images/ManageUsers.gif" style="width:25px; height:25px" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=ManageMode&site=ManageMode" class="style4">Phân quyền hệ thống</a></td>
	   </tr>
	  	  	  
	  <tr>
		<td class="space_row" >
		<img src="../images/Categories.gif"  style="width:22px; height:22px" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=ManageCategory&site=ManageCategory" class="style4">QL nhóm danh mục</a></td>
	  </tr>  		
	   <tr>
		<td class="space_row" >
		<img src="../images/ChangePass.gif" style="width:25px; height:25px" border="0"></td>
	    <td class="space_row" >
		<a href="index.php?menu=change_pass&site=change_pass" class="style4">Đổi mật khẩu</a></td>
	   </tr>
	   
	  <tr>
		<td class="space_row" >
		<img src="../images/Logout.gif" style="width:25px; height:25px" border="0"></td>
	    <td class="space_row" >
		<a href="logout.php" class="style4">Thoát đăng nhập</a></td>
	  </tr> 
    </table>	</td>
    <td width="802" valign="top" style="padding-left:10px">		
				<?php
if(@$_GET['site'] != '')	 {
			if(array_search(@$_GET['site'],explode(',',' ,'.@$_SESSION['nhomdanhmuc']))=='') {
			 header('location:index.php');
			}
		}	
			  include "MenuCms.php";
			?>		 
	</td>
  </tr>
  <tr>
    <td valign="top" style="padding-left:10px">
	<?php
if(file_exists("./".@$_GET['site'].".php"))	  {
	   include "./".@$_GET['site'].".php";
	}
	?>	
	
	</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" height="50px" style="border-top:#CCCCCC 1px solid">&nbsp;</td>   
  </tr>
</table>
<SCRIPT language=javascript>
<!--
 setInterval("doInterval()", 7000);
 show_hide_layer('docLoading', 0);
 show_hide_layer('mainPage', 1);
 clearInterval(intChk);
//--> 
</SCRIPT>