<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>THÊM SLIDE :</strong></div>

<?php
if($_POST['InsertAds'])	  {
	 
				
				
			    uploads($file='picture',$folder = '../images/slide/');
				 
				mysql_query("INSERT INTO ".slide." SET 
				link='".$_POST['link']."',picture='$picture',stt='".$_POST['order']."'");
				
				echo "Thêm quảng cáo thành công";
			  
	  }
	
	if($_POST['Ads'])	  {
	 
				
				
			    uploads($file='picture',$folder = '../images/slide/');
				 
				if($picture=='') $picture=$_POST['picture_hidden'];				
				
				mysql_query("UPDATE ".slide." SET 
				link='".$_POST['link']."',picture='$picture',stt='".$_POST['order']."' WHERE id='".intval(@$_GET['Edit'])."'");
				
				echo "Cập nhật  quảng cáo thành công";
			  
	  }
	
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".slide." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".slide." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".slide." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['AddNews']!='') {?>
<div style="float:left">
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form action="" method="post" enctype="multipart/form-data" >
  <tr>
    <td width="19%" class="height_row"><div align="right">Link </div></td>
    <td width="81%" class="height_row"><label>
      <input type="text" name="link" class="input_text" />
    </label></td>
  </tr>
  
  <tr>
    <td class="height_row"><div align="right">Picture</div></td>
    <td class="height_row"><label>
      <input name="picture" type="file" id="picture" />
    </label></td>
  </tr>
  <tr>
    <td class="height_row"><div align="right">Số thứ tự </div></td>
    <td class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,101,$id)?>
	</select></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input name="InsertAds" type="submit" id="InsertAds" value="Thêm slide" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
      <input type="reset" name="Submit2" value="Nhập Lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
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
$sqlstr=mysql_query("SELECT * FROM ".slide."  WHERE id='".intval(@$_GET['Edit'])."'");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form method="post" action=""  enctype="multipart/form-data">
   <tr>
    <td width="20%" class="height_row"><div align="right">Link </div></td>
    <td width="80%" class="height_row"><label>
      <input type="text" name="link" class="input_text" value="<?php echo $row['link']?>" />
    </label></td>
  </tr>
  
  <tr>
    <td class="height_row"><div align="right">Picture</div></td>
    <td class="height_row"><label>	
	  <input name="picture_hidden"  type="hidden"  value="<?php echo $row['picture']?>" />
      <input name="picture" type="file" id="picture" />	 
    </label></td>
  </tr>
  <tr>
    <td class="height_row"><div align="right">Số thứ tự </div></td>
    <td class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,101,$row['stt'])?>
	</select></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input type="submit" name="Ads" value="Sửa slide" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
      <input type="reset" name="Submit2" value="Nhập Lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
    </label></td>
  </tr>
  </form>
</table>
</div>
<?php
} }?>
<div style="float:left; padding-top:20px">

<table  border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<tr height="22px">
      <form id="form1" name="form1" method="post" action="">
      <td width="80%" height="27" ><label></label>
         <label>
           <input  type="button" onClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&AddNews=true'"  value="Thêm slide mới" />
        </label></td>
	 </form>
</tr>
</table>
</div>
<div style="float:left; padding-top:20px">

<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800px">
  <?php
$p=50;
		 $sqlstr="SELECT * FROM ".slide."	";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by stt ASC limit $s,$p";		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
?>
<tr>  
  <td colspan="6" align="center"  ><?php
view_page($link)?></td>
</tr>
<tr height="22px" style="background-color:#EEEEEE">
      <td width="35" height="27" align="center" >#ID</td>
	    <td  >Link</td>
        <td  align="center" >Số TT</td>
        
      <td  align="center" >Hình ảnh </td>
      <td  align="center" >Trạng Thái</td>        
</tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	{
	
?>	  
	  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['id']?>'">
	    <td width="35" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" />		</td>
		<td width="500"   ><?php echo $row['link']?>&nbsp;</td>
		<td width="111"  ><div align="center">&nbsp;<?php echo $row['stt']?></div></td>
		
		<td width="131"  ><div align="center"><a target="_blank" href="../images/slide/<?php echo $row['picture']?>">View</a>&nbsp;</div></td>
		<td width="81" align="center"><?php echo $row['status']?></td>
	</tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="3" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn tin này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện tin này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>		</td>
        <td colspan="2" align="right" >&nbsp;</td>
      </tr>
<tr>
  <td height="32" colspan="6"  align="center" bgcolor="#FFFFFF"><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

