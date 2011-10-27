<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<title>Đăng ký thành viên - <?php echo titleweb?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
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
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
 <tr >
   <td width="600" class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Hộp thư thành viên </td>   
 </tr> 
 <?php
if($id_1!=''){ 
  $sqlstr=mysql_query("SELECT * FROM ".msg." WHERE id='".intval($id_1)."'");
  mysql_query("UPDATE ".msg." SET status='false' WHERE id='".intval($id_1)."'");
  if(mysql_num_rows($sqlstr)>0)   {
  $row=mysql_fetch_array($sqlstr);
?> 
 <tr >
   <td style="padding:10px;"><table width="100%" border="0" cellpadding="10" cellspacing="0" bgcolor="#f0f0f0" style="border:#0070DF 2px solid">
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
   	<table width="100%" border="1" cellspacing="0" cellpadding="3" style="border:#CCCCCC 1px solid; border-collapse:collapse">
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
           <td style="cursor:pointer"  onclick="location.href='<?php echo $domain?>/hop-thu-den/<?php echo $row['id']?><?php echo $vip?>'"><?php echo sub_str($row['title'],15)?></td>
           <td align="center" nowrap="nowrap"><?php echo date("d/m/Y",$row['postdate'])?></td>
           <td align="center" nowrap="nowrap"><?php
echo $row['status']=='true'?'Đã đọc':'Chưa đọc';?></td>
         </tr>
         <tr>
           <td colspan="4">
             <input name="ItemDel" type="submit" id="ItemDel" value="Xóa tin nhắn này">
           
           </td>
         </tr>
<?php
}}?>		 
    </table></form>   </td>            
   </tr>  
</table>
