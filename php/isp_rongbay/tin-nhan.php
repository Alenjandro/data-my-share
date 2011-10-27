<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<title>Quản lý tin nhắn thành viên - <?php echo titleweb?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<link href="<?php echo $domain?>/css/tab.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $domain?>/css/tabpane.js"></script>
<script type="text/javascript" src="<?php echo $domain?>/css/webfxlayout.js"></script>
<?php
include "css/nicEdit.php"?>
<?php
if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".msg." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
		if($_POST['ItemDelete']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".msg1." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
?><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td valign="top" width="100%">

<div class="tab-pane" id="tabPane3">
<script type="text/javascript">
tp1 = new WebFXTabPane(document.getElementById("tabPane1") ,false);
tp1.selectedIndex = 0;
</script>	
<div class="tab-page"  id="tabPage1">
	<h2 class="tab" style="float:left;"><b>Tin nhắn đã nhận </b></h2>
	<script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage1"));</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
 <?php
if($id_1=='tin-da-nha'||$id_2!==''){ 
  $sqlstr=mysql_query("SELECT * FROM ".msg." WHERE id='".intval($id_2)."'");
  mysql_query("UPDATE ".msg." SET status='true' WHERE id='".intval($id_2)."'");
  if(mysql_num_rows($sqlstr)>0)   {
  $row=mysql_fetch_array($sqlstr);
?> 
 <tr >
   <td style="padding:10px; "><table width="100%" border="0" cellpadding="10" cellspacing="0" bgcolor="#f0f0f0" style="padding-top:20px;">
     <tr>
       <td width="23%" ><div align="right"><strong>Người nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td width="74%" ><?php
Members($row['id_from'],members)?></td>
     </tr>
     <tr>
       <td ><div align="right"><strong>Thời gian nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td ><?php echo date("h:m:s A, d.m.Y",$row['postdate'])?></td>
     </tr>
     <tr>
       <td ><div align="right"><strong>Tiêu đề tin nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td ><?php echo $row['title']?></td>
     </tr>
     <tr>
       <td ><div align="right"><strong>Nội dung tin nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td ><?php echo $row['content']?></td>
     </tr>
   </table></td>
 </tr><?php
}}?>
 <tr >   
   <td ><form name="form1" method="post" action="">
   	<table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse">
  <?php
$p=50;
		  $sqlstr="SELECT * FROM ".msg." WHERE id_to='".intval(@$_SESSION['idcus'])."'";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by id DESC limit $s,$p";
		  
	  	
		  $sqlstr=mysql_query($sqlstr);		
?>
         <tr>
           <td width="3%" height="30" align="center"><strong>ID</strong></td>
           <td width="47%"><strong>Tiêu đề tin nhắn </strong></td>
           <td width="25%" align="center"><strong>Ngày gửi </strong></td>
           <td width="25%" align="center" nowrap="nowrap"><strong>Tình trạng </strong></td>
         </tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	 {
?>		 
         <tr>
           <td><input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" /></td>
           <td style="cursor:pointer"  ondblclick="location.href='<?php echo $domain?>/tin-nhan/tin-da-nhan/<?php echo $row['id']?><?php echo $vip?>'"><?php echo sub_str($row['title'],15)?></td>
           <td align="center" nowrap="nowrap"><?php echo date("d/m/Y",$row['postdate'])?></td>
           <td align="center" nowrap="nowrap"><?php
echo $row['status']=='true'?'Đã đọc':'Chưa đọc';?></td>
         </tr><?php
}}?>	
         <tr>
           <td colspan="4">
             <input name="ItemDel" type="submit" id="ItemDel" value="Xóa tin nhắn này">
           
           </td>
         </tr>
	 
    </table></form>   </td>            
   </tr>  
</table>
</div>
<div class="tab-page" id="tabPage2">
	<h2 class="tab" style="float:left;"><strong>Tin nhắn đã gửi </strong></h2>	
	<script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage2"));</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
 <?php
if($id_1=='tin-da-gui'&&$id_2!=''){ 
  $sqlstr=mysql_query("SELECT * FROM ".msg1." WHERE id='".intval($id_2)."'");
  if(mysql_num_rows($sqlstr)>0)   {
  $row=mysql_fetch_array($sqlstr);
?> 
 <tr >
   <td style="padding:10px;"><table width="100%" border="0" cellpadding="10" cellspacing="0" bgcolor="#f0f0f0" >
     <tr>
       <td width="23%" ><div align="right"><strong>Người nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td width="74%" ><?php
Members($row['id_from'],members)?></td>
     </tr>
     <tr>
       <td ><div align="right"><strong>Thời gian nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td ><?php echo date("h:m:s A, d.m.Y",$row['postdate'])?></td>
     </tr>
     <tr>
       <td ><div align="right"><strong>Tiêu đề tin nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td ><?php echo $row['title']?></td>
     </tr>
     <tr>
       <td ><div align="right"><strong>Nội dung tin nhắn : </strong></div></td>
       <td >&nbsp;</td>
       <td ><?php echo $row['content']?></td>
     </tr>
   </table></td>
 </tr><?php
}}?>
 <tr >   
   <td ><form name="form2" method="post" action="">
   	<table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse">
  <?php
$p=50;
		  $sqlstr="SELECT * FROM ".msg1." WHERE id_from='".intval(@$_SESSION['idcus'])."'";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by id DESC limit $s,$p";
		  
	  	
		  $sqlstr=mysql_query($sqlstr);		
?>
         <tr>
           <td width="4%" height="30" align="center"><strong>ID</strong></td>
           <td width="63%"><strong>Tiêu đề tin nhắn </strong></td>
           <td width="33%" align="center"><strong>Ngày gửi </strong></td>
           </tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	 {
?>		 
         <tr>
           <td><input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" /></td>
           <td style="cursor:pointer"  ondblclick="location.href='<?php echo $domain?>/tin-nhan/tin-da-gui/<?php echo $row['id']?><?php echo $vip?>'"><?php echo sub_str($row['title'],15)?></td>
           <td align="center" nowrap="nowrap"><?php echo date("d/m/Y",$row['postdate'])?></td>
           </tr><?php
}}?>	
         <tr>
           <td colspan="3">
             <input name="ItemDelete" type="submit" id="ItemDelete" value="Xóa tin nhắn này">           </td>
         </tr>
    </table>
   </form>   </td>            
   </tr>  
</table>
</div>			
</div>
</td></tr>
<tr><td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
 <tr >   
   <td ><form name="form3" method="post" action="">
  
     <table width="100%" border="0" cellspacing="0" cellpadding="5">
       <tr>
         <td colspan="3" align="center" style="color:#FF0000">
<?php
if($_POST['nhantin']){
		if($_POST['user_name']=="") echo "Bạn phải cho biết Username thành viên cần nhắn tin";
		elseif($_POST['title']=="") echo "Bạn phải nhập tiêu đề tin nhắn";
		elseif($_POST['content']=="") echo "Bạn phải nhập nội dung tin nhắn";
		elseif(NumRow(username,members,"username='".text($_POST['user_name'])."'")<0)
			echo "Username này không tồn tại trong CSDL. Xin vui lòng kiểm tra lại";
		else{
		$sqlstr=mysql_query("SELECT * FROM ".members." WHERE status='true' AND username = '".text($_POST['user_name'])."'");
		if(mysql_num_rows($sqlstr)>0) {	
		$row=mysql_fetch_array($sqlstr);
		//insert bảng gửi đến thành viên nhận quản lý
			mysql_query("INSERT INTO ".msg." SET title='".text($_POST['title'])."',
			content='".textContent($_POST['content'])."', id_to='".$row['id']."',
			id_from='".@$_SESSION['idcus']."',postdate='".time()."'");
		
		//insert bảng gửi đến thành viên gửi quản lý	
			mysql_query("INSERT INTO ".msg1." SET title='".text($_POST['title'])."',
			content='".textContent($_POST['content'])."', id_to='".$row['id']."',
			id_from='".@$_SESSION['idcus']."',postdate='".time()."'");
			echo "<script>alert('Bạn đã gửi tin nhắn thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}}
	}
?>
		 </td>
         </tr>
       <tr>
         <td width="21%"><div align="right">
           <?php echo $require?><strong>
           Gửi đến thành viên : </strong></div></td>
         <td width="1%">&nbsp;</td>
         <td width="78%"><input name="user_name" type="text" id="user_name" style="width:300px;" /></td>
       </tr>
       <tr>
         <td><div align="right">
           <?php echo $require?><strong>
           Tiêu đề : </strong></div></td>
         <td>&nbsp;</td>
         <td><input name="title" type="text" id="title"  style="width:300px;"/></td>
       </tr>
       <tr>
         <td><div align="right">
           <?php echo $require?><strong>
           Nội dung : </strong></div></td>
         <td>&nbsp;</td>
         <td><textarea name="content" id="content"  style="width:550px; height:60px;"></textarea></td>
       </tr>
       <tr>
         <td colspan="3" align="center"><input name="nhantin" type="submit" id="nhantin" value="   Gửi đi   " /></td>
         </tr>
     </table>
   </form>   </td>            
   </tr>  
</table>
</td></tr>
</table>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>