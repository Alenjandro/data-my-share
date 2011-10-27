<?php
include "check.php";?>
<BR /><div style="width:96%; vertical-align:top" align="left"><strong>QUẢN LÝ NHÓM DANH MỤC:</strong></div>
	<?php
if($_POST['Insert'])	  {	 
	  
		  $sql           ="INSERT INTO ".manaCategory." SET ";
		  $sql          .=" categoryName          = '".text($_POST['menu'])."'";
		  $sql          .=" ,categoryLink         = '".$_POST['link']."'";
		  
		  mysql_query($sql);
	 
		  echo "<script language=javascript>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	  
	  }
	  if($_POST['Update'])	  {
	  
		  $sql           ="UPDATE ".manaCategory." SET ";
		  $sql          .=" categoryName          = '".text($_POST['menu'])."'";
		  $sql          .=" ,categoryLink         = '".$_POST['link']."'";
		  $sql          .=" where id              ='".intval(@$_GET['edit'])."'";
			  
		  mysql_query($sql);
	 
		  echo "<script language=javascript>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	  }
	  
	    if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".manaCategory." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
	?> 

<div style="float:left">
<?php
if(@$_GET['edit']=='') {?>
<form method="post" action="" name="menu_product">
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
  <tr>
    <td width="28%" height="32" >Tên menu</td>
    <td width="72%">
    <input name="menu" type="text" maxlength="100"  class="input_text" value="<?php echo $_POST['menu']?>"/>    </td>
  </tr>
  <tr>
    <td height="32" >Link menu</td>
    <td><input name="link" type="text"  class="input_text" id="link" value="<?php echo $_POST['link']?>" maxlength="100"/></td>
  </tr>
    
  <tr>
    <td>&nbsp;</td>
    <td>  
      <input type="submit" name="Insert" value="Submit" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
      <input type="reset" name="Submit2" value="Reset" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>    </td>
  </tr>
</table>
</form>
</div>
<?php
}?>

<div style="float:left">
<?php
if(@$_GET['edit']!='') {?>
<?php
$sql=mysql_query("SELECT * FROM ".manaCategory." WHERE id = ".intval(@$_GET['edit'])."");
	    $row=mysql_fetch_array($sql);
?>
<form method="post" action="" name="menu_product">
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
  <tr>
    <td width="28%" height="32" >Tên menu</td>
    <td width="72%">
    <input name="menu" type="text" maxlength="100"  class="input_text" value="<?php echo $row['categoryName']?>"/>    </td>
  </tr>
  <tr>
    <td height="32" >Link menu</td>
    <td><input name="link" type="text"  class="input_text" id="link" value="<?php echo $row['categoryLink']?>" maxlength="100"/></td>
  </tr>
    
  <tr>
    <td>&nbsp;</td>
    <td>  
      <input type="submit" name="Update" value="Submit" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
      <input type="reset" name="Submit2" value="Reset" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>    </td>
  </tr>
</table>
</form>
</div>
<?php
}?>

<div style="float:left; margin-top:20px;">
<form method="post" name="check_form" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800">
<tr bgcolor="#EFEFEF">
        <td width="5%" height="28" ><div align="center"><b>#ID</b></div></td>
	    <td width="56%"  style="padding-left:10px"><b>Tên menu</b></td>
	    <td width="39%"  ><div align="center"><strong>Link menu</strong></div></td>	    
</tr>
 <?php
$sql=mysql_query("SELECT * FROM ".manaCategory."  ORDER BY id ASC"); 
 
 while($row=mysql_fetch_array($sql)) {	 
  ?>
		  <tr ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&edit=<?php echo $row['id']?>'" style="cursor:pointer">
		    <td height="23" align="center" bgcolor="#EFEFEF">
            <input  type="checkbox" name="element[]"  value="<?php echo $row['id']?>" />
            </td>
			<td  style="padding-left:10px"><?php echo $row['categoryName']?></td>
			<td  ><div align="center"><?php echo $row['categoryLink']?></div></td>			
		  </tr>
		  <?php
} ?> 
          <tr bgcolor="#EFEFEF">
		    <td ><img src="../images/arrow.png" border="0" /></td>
		    <td  colspan="3" > 
            <input type="submit"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa nhóm này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />      
           </td>	      
         </tr>	
</table>
</form>
</div>