<?php
include "check.php";?>
<?php
if($_POST['InsertUsers'])	  {
							    
				 
				mysql_query("INSERT INTO ".support." SET 
				fullname='".text($_POST['fullname'])."',yahoo='".text($_POST['yahoo'])."',skype='".text($_POST['skype'])."'
				,stt='".$_POST['order']."'");	
							
				echo "Thêm thành viên thành công";
		  
	  }
	
	if($_POST['UpdateUsers'])	  {
	 
			    			
				
				mysql_query("UPDATE ".support." SET 
				fullname='".text($_POST['fullname'])."',yahoo='".text($_POST['yahoo'])."',skype='".text($_POST['skype'])."'
				,stt='".$_POST['order']."' WHERE id='".intval(@$_GET['Edit'])."'");
				
				echo "Cập nhật  thành viên thành công";
		  
	  }
	
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".support." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".support." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".support." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
		  if(@$_GET['Hidden']!=""){
		  		mysql_query("UPDATE  ".support." SET status='false' WHERE id = ".intval(@$_GET['Hidden'])."");
		  }
		  if(@$_GET['Display']!=""){
		  		mysql_query("UPDATE  ".support." SET status='true' WHERE id = ".intval(@$_GET['Display'])."");
		  } 
		  if($_POST['Update']){
		  		$orderNoList = $_POST["orderid"];
				foreach ($orderNoList as $k => $v){
					mysql_query("UPDATE  ".support." SET stt='".$v."' WHERE id = ".$k."");			
				}
		  }    

?>
<?php
if(@$_GET['AddNews']!='') {?>

<div style="float:left; padding-top:20px">
<table border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="820">
<form action="" method="post" enctype="multipart/form-data" >
  <tr>
    <td class="height_row"><div align="right">Tên đầy đủ</div></td>
    <td class="height_row"><label>
      <input type="text" name="fullname" id="textfield" class="input_text" />
    </label></td>
  </tr>
  <tr>
    <td width="19%" class="height_row"><div align="right">Nick Yahoo </div></td>
    <td width="81%" class="height_row"><label>
      <input name="yahoo" type="text" class="input_text" id="username" />
    </label></td>
  </tr>
  <tr>
    <td class="height_row"><div align="right">Nick Skype </div></td>
    <td class="height_row"><input name="skype" type="text" class="input_text" id="yahoo" /></td>
  </tr>
   <tr>
    <td class="height_row"><div align="right">Số TT</div></td>
    <td class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,21,$id)?>
	</select>	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input name="InsertUsers" type="submit" id="InsertUsers" value="Thêm thành viên" <?php
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
<div style="float:left; padding-top:20px;">
 <?php
$sqlstr=mysql_query("SELECT * FROM ".support."  WHERE id='".intval(@$_GET['Edit'])."'");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="820">
<form method="post" action=""  enctype="multipart/form-data">
    <tr>
      <td class="height_row"><div align="right">Tên đầy đủ</div></td>
      <td class="height_row"><input type="text" name="fullname" id="fullname"  value="<?php echo $row['fullname']?>" class="input_text" /></td>
    </tr>
    <tr>
    <td width="19%" class="height_row"><div align="right">Nick Yahoo </div></td>
    <td width="81%" class="height_row"><label>
      <input name="yahoo" type="text" class="input_text" id="username" value="<?php echo $row['yahoo']?>" />
    </label></td>
  </tr>
    <tr>
      <td class="height_row"><div align="right">Nick Skype </div></td>
      <td class="height_row"><input name="skype" type="text" class="input_text" id="skype" value="<?php echo $row['skype']?>" /></td>
    </tr>
   <tr>
    <td class="height_row"><div align="right">Số TT</div></td>
    <td class="height_row">
	<select name="order" class="input_text" >
		<?php
order(1,21,$row['stt'])?>
	</select>	</td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input type="submit" name="UpdateUsers" value="Sửa thành viên" <?php
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

<table  border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="820">
<tr height="22px">
      <td height="27" >
         <input  type="button" onClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&AddNews=true'"  value="Thêm thành viên mới" /></td>
	  <td align="center" style="font-size:11px; color:#FF0000; font-family:tahoma">&#8220;DoubleClick vào trường Fullname để thay đổi thông tin. DoubleClick vào trường trạng thái để thay đổi trạng thái cho từng trường&#8221;</td>
	  <form id="form1" name="form1" method="post" action="">
      </form>
</tr>
</table>
</div>
<div style="float:left">
<form method="post" name="check_form" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolordark="#FFFFFF" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="820">
<?php
$p=50;
		  $sqlstr="SELECT * FROM ".support."	";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site']."";
		  if(@$_GET['Edit']!="") $link .= "&Edit=".@$_GET['Edit'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by stt limit $s,$p";		  
	  	
		  $sqlstr=mysql_query($sqlstr);
?>
	  
	  <tr>
	    <td height="32" colspan="6"  align="center" bgcolor="#EEEEEE"><?php
view_page($link)?></td>
      </tr>
	  <tr>
        <td height="32"  align="center" bgcolor="#EEEEEE"><img src="../images/arrow1.png" width="28" height="18" border="0" style="width:20px" /></td>
	    <td colspan="5" ><input type="submit"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa thành viên này" name="ItemDel" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />
	      <input name="ItemHid" type="submit" id="ItemHid" class="button"   onclick="return confirm('Bạn có chắc không ?');" value="Ẩn thành viên này" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />
	      <input type="submit"   onclick="return confirm('Bạn có chắc không ?');" value="Kích hoạt thành viên này" name="ItemShow" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />
            <input name="Update" type="submit" id="Update" class="button"   onclick="return confirm('Bạn có chắc không ?');" value="Cập nhật thay đổi" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> /></td>
      </tr>
	  <tr  bgcolor="#EEEEEE" height="22px">
        <td height="27" align="center" ><input name="checkall" type="checkbox" id="checkall" value="1" onclick="agreeTerm()" alt="Check all"/></td>
	    <td ><strong>Fullname</strong></td>
	    <td ><div align="center"><strong>Skype</strong></div></td>
	    <td ><div align="center"><strong>Yahoo</strong></div></td>
	    <td ><div align="center"><strong>Số TT </strong></div></td>
	    <td ><div align="center"><strong>T.Thái</strong></div></td>
      </tr>
<?php
if(mysql_num_rows($sqlstr)>0)   { $i=0;
		   
		  while($row=mysql_fetch_array($sqlstr))	{ $i+=1;
	
?>	  
	  <tr <?php
if($i%2=='0') echo "style=\"background:#FFFFEC;\"" ?>>
	    <td width="20" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" id="element" value="<?php echo $row['id']?>" />		</td>
		<td width="289" style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['id']?>'"><?php echo $row['fullname']?></td>
		<td width="153"   ><div align="center"><img src="../images/skype.png" /> <?php echo $row['skype']?></div></td>
		<td width="205"  ><div align="center"><img src="../images/yahoo.gif" /> <?php echo $row['yahoo']?></div></td>
		<td width="50"  ><div align="center">
		  <input name="orderid[<?php echo $row['id']?>]" type="text" style="width:50px; text-align:center" id="orderid[<?php echo $row['id']?>]" value="<?php echo $row['stt']?>"/>
</div></td>
		<td width="53" align="center" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&<?php
echo $row['status']=='true'?'Hidden':'Display';?>=<?php echo $row['id']?>'" style="cursor:pointer"><?php echo $row['status']?></td>
	</tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="5" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa thành viên này" name="ItemDel" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn thành viên này" name="ItemHid" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Kích hoạt thành viên này" name="ItemShow" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
		<input name="Update" type="submit" id="Update" class="button"   onclick="return confirm('Bạn có chắc không ?');" value="Cập nhật thay đổi" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> /></td>
      </tr>
<tr>
  <td height="32" colspan="6"  align="center" bgcolor="#EEEEEE"><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

