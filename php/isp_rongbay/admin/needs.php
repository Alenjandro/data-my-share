<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>THÊM DANH MỤC CHỦNG LOẠI:</strong></div>
<?php
if($_POST['InsertCategory'])	  {
	 
				if($_POST['category']!='')   {
			 
				mysql_query("INSERT INTO ".menu_service." SET category='".text($_POST['category'])."',parent='".$_POST['parent']."',stt='".$_POST['order']."'");
				
				echo "Thêm category  <b>".$category."</b> thành công";
		}	  
	  }
	
	if($_POST['EditCategory'])	  {
	 
				if($_POST['category']!='')   {
			 
				mysql_query("UPDATE ".menu_service." SET category='".text($_POST['category'])."',parent='".$_POST['parent']."',stt='".$_POST['order']."' WHERE id='".intval(@$_GET['Edit'])."'");
				
				echo "Cập nhật category  <b>".$category."</b> thành công";
		}	  
	  }
	
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".menu_service." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".menu_service." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".menu_service." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['Edit']=='') {?>
<div style="float:left">
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form method="post" action="" >
  <tr>
    <td width="17%" class="height_row"><div align="right">Tên nhóm</div></td>
    <td width="30%" class="height_row">
	<input name="category" type="text" maxlength="100"  style="width:200px;"/> 	</td>
    <td width="15%" class="height_row">Thuộc nhóm</td>
    <td width="38%" class="height_row">
    <select  name="parent" class="input_text">
      <option value="0">Không thuộc nhóm nào</option>
      <?php
CategoryParent($_POST['parent'],menu_product)?>
    </select></td>
  </tr> 
  <tr>
    <td class="height_row"><div align="right">Số TT</div></td>
    <td colspan="3" class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,100,$_POST['order'])?>
	</select>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><label>	  
      <input type="submit" name="InsertCategory" value="Thêm Category" />
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
$sqlstr=mysql_query("SELECT * FROM ".menu_service."  WHERE id='".intval(@$_GET['Edit'])."'");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form method="post" action="" >
  <tr>
    <td width="18%" class="height_row"><div align="right">Tên nhóm</div></td>
    <td width="29%" class="height_row">
	<input name="category" type="text" maxlength="100"  style="width:200px;" value="<?php echo $row['category']?>"/>	</td>
    <td width="14%" class="height_row">Thuộc nhóm</td>
    <td width="39%" class="height_row">
    <select name="parent" class="input_text" >
    <option value="0">Không thuộc nhóm nào</option>
		<?php
CategoryParent($row['parent'],menu_product)?>
	</select></td>
    </tr>
  <tr>
    <td class="height_row"><div align="right">Số TT</div></td>
    <td colspan="3" class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,100,$row['stt'])?>
	</select>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><label>	  
      <input type="submit" name="EditCategory" value="Sửa Category" />
      <input type="reset" name="Submit2" value="Nhập Lại" />
    </label></td>
  </tr>
  </form>
</table>
</div>
<?php
} }?>

<div style="float:left; padding-top:20px">

<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800px">
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow1.png" border="0" /></td>
	    <td colspan="4" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa nhóm này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn nhóm này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện nhóm này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer">		</td>
  </tr>
  <tr height="25px" style="background-color:#EEEEEE">
      <td width="24" ><div align="center">#ID</div></td>
	    <td width="309" >Tên nhóm</td>
        <td width="225" align="center" >Thuộc danh mục </td>
        <td width="108" ><div align="center">Hiển thị </div></td>
      <td width="92" ><div align="center">Trạng Thái</div></td>        
</tr>
 <?php
$sqlstr=mysql_query("SELECT * FROM ".menu_service." order by parent, stt ASC");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      while($row=mysql_fetch_array($sqlstr))	 {
	
?>	  
	  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['id']?>'">
	    <td width="24" height="15"  align="center" bgcolor="#EEEEEE" >
		<input  type="checkbox" name="element[]"  value="<?php echo $row['id']?>" /></td>
		<td width="309"   ><?php echo $row['category']?></td>
		<td width="225" align="center"   >
		<?php
$sqlSub=mysql_query("SELECT * FROM ".menu_product." WHERE id='".$row['parent']."'");
			  if(mysql_num_rows($sqlSub)>0)   {
			  $rowSub=mysql_fetch_array($sqlSub);
			  	echo $rowSub['category'];	
				}
			?></td>
		<td width="108"  ><div align="center"><?php echo $row['stt']?></div></td>
		<td width="92" align="center"><?php echo $row['status']?></td>
	</tr>	  
             
<?php
}}?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="4" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa nhóm này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn nhóm này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện nhóm này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer">		</td>
  </tr>		  
</table>
</form></div>

