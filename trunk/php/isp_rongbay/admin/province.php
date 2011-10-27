<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>THÊM TỈNH THÀNH PHỐ:</strong></div>

<?php
if($_POST['InsertAds'])	  {
	 
				
				
			    uploads($file='picture',$folder = '../images/ads/');
				 
				mysql_query("INSERT INTO ".tinh." SET 
				name='".$_POST['name']."',regions='".$_POST['regions']."',stt='".$_POST['order']."'");
				
				echo "Thêm vùng thành công";
			  
	  }
	
	if($_POST['Ads'])	  {
				mysql_query("UPDATE ".tinh." SET 
				name='".$_POST['name']."',regions='".$_POST['regions']."',stt='".$_POST['order']."' WHERE tid='".intval(@$_GET['Edit'])."'");
				
				echo "Cập nhật vùng thành công";
			  
	  }
	
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".tinh." WHERE tid in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".tinh." SET status='false' WHERE tid in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".tinh." SET status='true' WHERE tid in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['AddNews']!='') {?>
<div style="float:left">
<table border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
<form action="" method="post" enctype="multipart/form-data" >
  <tr>
    <td width="19%" align="right" class="height_row">Tên tỉnh </td>
    <td width="81%" class="height_row"><label>
      <input name="name" type="text" class="input_text" id="name" />
    </label></td>
  </tr>
   <tr>
    <td class="height_row"><div align="right">Số thứ tự </div></td>
    <td colspan="3" class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,100,$_POST['order'])?>
	</select>	</td>
  </tr>
   <tr>
     <td><div align="right">Vùng miền </div></td>
     <td><select name="regions" id="regions">
       <option value="1">Miền Bắc</option>
       <option value="2">Miền Trung</option>
       <option value="3">Miền Nam</option>
     </select>
     </td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input name="InsertAds" type="submit" id="InsertAds" value="Thêm tỉnh" />
      <input type="reset" name="Submit2" value="Nhập Lại" />
    </label></td>
  </tr>
  </form>
</table>
</div>
<?php
}?>

<?php
if(@$_GET['Edit']!='') {?>
<div style="float:left">
 <?php
$sqlstr=mysql_query("SELECT * FROM ".tinh."  WHERE tid='".intval(@$_GET['Edit'])."'");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
<form method="post" action=""  enctype="multipart/form-data">
   <tr>
    <td width="20%" class="height_row"><div align="right">Tên vùng </div></td>
    <td width="80%" class="height_row"><label>
      <input name="name" type="text" class="input_text" id="name" value="<?php echo $row['name']?>" />
    </label></td>
  </tr>
   <tr>
    <td class="height_row"><div align="right">Số thứ tự </div></td>
    <td colspan="3" class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,100,$row['stt'])?>
	</select>	</td>
  </tr>
   <tr>
     <td><div align="right">Vùng miền </div></td>
     <td><select name="regions">
       <option value="1" <?php
echo $row['regions']=='1'?'Selected':''?>>Miền Bắc</option>
       <option value="2" <?php
echo $row['regions']=='2'?'Selected':''?>>Miền Trung</option>
       <option value="3" <?php
echo $row['regions']=='3'?'Selected':''?>>Miền Nam</option>
     </select></td>
   </tr>
   <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input type="submit" name="Ads" value="Sửa tên tỉnh" />
      <input type="reset" name="Submit2" value="Nhập Lại" />
    </label></td>
  </tr>
  </form>
</table>
</div>
<?php
} }?>
<div style="float:left; padding-top:20px">

<table  border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
<tr height="22px">
      <form id="form1" name="form1" method="post" action="">
      <td width="80%" height="27" ><label></label>
         <label>
           <input  type="button" onClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&AddNews=true'"  value="Thêm tỉnh mới" />
        </label></td>
	 </form>
</tr>
</table>
</div>
<div style="float:left; padding-top:20px">
<table  border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
<tr height="22px">
      <td width="5%" height="27" ><div align="center">#ID</div></td>
	    <td width="38%" >Tên tỉnh </td>
        <td width="22%" ><div align="center">Vùng miền </div></td>
        <td width="21%" align="center" >STT</td>
        <td width="14%" ><div align="center">Trạng Thái</div></td>        
</tr>
</table>
</div>
<div style="float:left">
<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolordark="#FFFFFF" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800">
  <?php
$p=50;
		 $sqlstr="SELECT * FROM ".tinh."	";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by regions,stt ASC limit $s,$p";		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
			
		  if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	{
	
?>	  
	  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['tid']?>'">
	    <td width="40" height="28"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" value="<?php echo $row['tid']?>" />		</td>
		<td width="284"   ><?php echo $row['name']?></td>
		<td width="172" align="center"   >
		<?php
if($row['regions']=='1') echo "Miền Bắc";?>
		<?php
if($row['regions']=='2') echo "Miền Trung";?>
		<?php
if($row['regions']=='3') echo "Miền Nam";?></td>
		<td width="157" align="center"   ><?php echo $row['stt']?>&nbsp;</td>
		<td width="105" align="center"><?php echo $row['status']?></td>
	</tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn tin này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện tin này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer">		</td>
        <td colspan="3" align="right" ><?php
view_page($link)?></td>
      </tr>		  
</table>
</form>
</div>

