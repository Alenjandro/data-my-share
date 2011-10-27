<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<title><?php echo title?></title>
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
		  
			  mysql_query("DELETE FROM ".userpost." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
		  if($id_1=='cap-nhat'){
		  		mysql_query("UPDATE ".userpost." SET postdate='".time()."' WHERE id = '".intval($id_2)."'");
				header('location:'.$domain.'/quan-ly-tin-dang'.$vip.'');
		  }
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
   <tr >
     <td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Quản lý tin đăng của ID thành viên: <b style="color:#333333"><?php echo @$_SESSION['idcus']?></b></td>   
   </tr>
   <tr >
       <td class="proCenter"><form id="form1" name="form1" method="post" action=""><table width="100%" border="1" cellspacing="0" cellpadding="3" style="border:#CCCCCC 1px solid; border-collapse:collapse">
  <?php
$p=50;
		  $sqlstr="SELECT id,title,categories,status,postdate FROM ".userpost." WHERE memberid='".intval(@$_SESSION['idcus'])."'";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link=$domain."/".$id; 
		  $page=$id_1?intval($id_1):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by ID DESC limit $s,$p";
		  $sqlstr=mysql_query($sqlstr);		
		  $tu = strtotime("00:00:00 ".date("m/d/Y",time()))."<br>";
		  $den = strtotime("23:59:49 ".date("m/d/Y",time()));
?>
         <tr>
           <td width="4%" height="30" align="center" bgcolor="#E6F2FF"><strong>ID</strong></td>
           <td width="47%" bgcolor="#E6F2FF"><strong>Tiêu đề tin đăng </strong></td>
           <td width="21%" align="center" bgcolor="#E6F2FF"><strong>Thuộc chuyên mục </strong></td>
           <td width="17%" align="center" bgcolor="#E6F2FF"><strong>Ngày đăng tin </strong></td>
           <td width="11%" align="center" nowrap="nowrap" bgcolor="#E6F2FF"><strong>Tình trạng </strong></td>
         </tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	 {
?>		 
         <tr>
           <td><input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" /></td>
           <td style="cursor:pointer"  onclick="location.href='<?php echo $domain?>/sua-tin-dang/<?php echo $row['id']?><?php echo $vip?>'"><?php echo sub_str($row['title'],15)?>...</td>
           <td align="center" nowrap="nowrap">
		   <?php echo headerTop(menu_product,$row['categories'])?></td>
           <td align="center" nowrap="nowrap"><?php echo date("d/m/Y",$row['postdate'])?> <?php
if($row['postdate']<$tu || $row['postdate']>$den){?><a href="<?php echo $domain?>/quan-ly-tin-dang/cap-nhat/<?php echo $row['id']?><?php echo $vip?>" style="color:#0099FF; text-decoration:none;">[Cập nhật]</a><?php
}?></td>
           <td align="center" nowrap="nowrap"><?php
echo $row['status']=='true'?'Đã duyệt':'Chưa duyệt';?></td>
         </tr><?php
}}?>	
         <tr>
           <td colspan="5" align="center" height="30"><?php
view_page_view($link,$id_1)?></td>
         </tr>
         <tr>
           <td colspan="5">
             <input name="ItemDel" type="submit" id="ItemDel" value="Xóa tin này" />           </td>
         </tr>
	 
       </table>
       </form></td>
  </tr>
    <tr>
                <td class="proBottom">&nbsp;</td>
  </tr>
</table>