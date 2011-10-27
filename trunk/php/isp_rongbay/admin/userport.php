<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>QUẢN LÝ THƯ LIÊN HỆ:</strong></div>

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
	 	 if($_POST['ItemShow']) {
		  
			  mysql_query("UPDATE ".userpost." SET status='true' WHERE id ='".intval(@$_GET['view'])."'");

		  }
	 if($_POST['ItemHid']) {
		  
			  mysql_query("UPDATE ".userpost." SET status='false' WHERE id ='".intval(@$_GET['view'])."'");

		  }
  if($_POST['ItemVip']) {
	  mysql_query("UPDATE ".userpost." SET vip='true' WHERE id in (".implode(",",$_POST['element']).")");
  }
  if($_POST['ItemNomal']) {
	  mysql_query("UPDATE ".userpost." SET vip='false' WHERE id in (".implode(",",$_POST['element']).")");
  }
  if($_POST['Vip']) {
	  mysql_query("UPDATE ".userpost." SET vip='true' WHERE id ='".intval(@$_GET['view'])."'");
  }
  if($_POST['Nomal']) {
	  mysql_query("UPDATE ".userpost." SET vip='false' WHERE id ='".intval(@$_GET['view'])."'");
  }

?>
<?php
if(@$_GET['view']) {?>
 <?php
$sqlstr=mysql_query("SELECT * FROM ".userpost." WHERE id=".intval(@$_GET['view'])."" );
  if(mysql_num_rows($sqlstr)>0)   {
		   
		$row=mysql_fetch_array($sqlstr);
	
?>
<div style="float:left; padding-top:20px">
<form name="form1" method="post" action="">
<table  border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
  <tr>
    <td colspan="2"><strong>Thông tin tin đăng </strong></td>
    </tr>
  <tr>
    <td width="146"><div align="right">Tiêu đề</div></td>
    <td width="536"><?php echo $row['title']?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Nội dung</div></td>
    <td><?php echo $row['content']?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Chuyên mục </div></td>
    <td><?php
Typecategory($row['categories'], menu_product)?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Nhu cầu </div></td>
    <td><?php
Typecategory($row['needs'], menu_product)?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Chủng loại </div></td>
    <td><?php
Typecategory($row['type'], menu_service)?>&nbsp;</td>
  </tr>
  
  <tr>
    <td><div align="right">Ngày đăng tin </div></td>
    <td><?php echo date("d/m/Y",$row['postdate'])?>
      &nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Nơi đăng </div></td>
    <td><?php
if($row['place']=='0') { echo "Toàn quốc";}{?><?php
Province($row['place'],tinh);?><?php
}?></td>
  </tr>
 <?php
$sqlmem=mysql_query("SELECT * FROM ".members." WHERE id=".$row['memberid']."" );
  if(mysql_num_rows($sqlmem)>0)   {
		   
		$rowmem=mysql_fetch_array($sqlmem);
?>  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td colspan="2"><strong>Thông tin thành viên đăng tin </strong></td>
    </tr>

  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Tên thành viên đăng tin </div></td>
    <td><?php echo $rowmem['username']?>
      &nbsp;</td>
  </tr>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Họ tên</div></td>
    <td><?php echo $rowmem['fullname']?>
      &nbsp;</td>
  </tr>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Địa chỉ </div></td>
    <td><?php echo $rowmem['address']?>
      &nbsp;</td>
  </tr>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Telephone</div></td>
    <td><?php echo $rowmem['telephone']?>
      &nbsp;</td>
  </tr>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Email</div></td>
    <td><?php echo $rowmem['email']?>
      &nbsp;</td>
  </tr>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Website</div></td>
    <td><?php echo $rowmem['website']?></td>
  </tr>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td><div align="right">Ngày đăng ký</div></td>
    <td><?php echo date("d/m/Y",$rowmem['postdate'])?>
      &nbsp;</td>
  </tr><?php
}?>
  <tr bordercolor="#999999" bordercolordark="#FFFFFF">
    <td>&nbsp;</td>
    <td><input name="ItemShow" type="submit" id="show" style="border:0px; background-color:#DDDDDD; cursor:pointer"  value="Duyệt" />
         <input name="ItemHid" type="submit" id="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"   value="Không chấp nhận" />
         <input name="Vip" type="submit" id="Vip" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Kích hoạt tin vip" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />
         <input name="Nomal" type="submit" id="Nomal" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Bỏ kích hoạt tin vip" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> /></td>
  </tr>
</table>


</form>
<?php
} }?> 
</div>
<div style="float:left; padding-top:20px">

<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800px">
  <?php
$p=50;
		  $sqlstr="SELECT * FROM ".userpost."";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by vip ,status DESC, id DESC limit $s,$p";
		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
?>
<tr>
  <td height="32" colspan="4"  align="center" ><?php
view_page($link)?></td>
  </tr>	
 <tr height="22px" style="background-color:#EEEEEE">
      <td width="5%" height="27" ><div align="center">#ID</div></td>
	    <td width="61%" >Tiêu đề        </td>
        <td width="17%" ><div align="center">Ngày gửi </div></td>
        <td width="17%" ><div align="center">Trang thái </div></td>
</tr>
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow1.png" border="0" /></td>
	    <td width="434" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
		<input name="ItemVip" type="submit" id="ItemVip" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Kích hoạt tin vip" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />
		<input name="ItemNomal" type="submit" id="ItemNomal" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Bỏ kích hoạt tin vip" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> /></td>
        <td colspan="2"  align="right">&nbsp;</td>
      </tr> 	  

<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	 {
	
?>	  
	  <tr>
	    <td width="20" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" />		</td>
		<td style="cursor:pointer" onDblClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'"><?php echo $row['title']?>
	    <?php
if($row['vip']=='true'){?><img src="../images/vip.gif" width="20" height="15" /><?php
}?></td>
	    <td width="112"><div align="center"><?php echo date("d/m/Y",$row['postdate'])?></div></td>
	    <td width="100"><div align="center"><?php
echo $row['status']=='true'?'Đã duyệt':'Chưa duyệt';?></div></td>
	  </tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td width="434" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
		<input name="ItemVip" type="submit" id="ItemVip" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Kích hoạt tin vip" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> />
        <input name="ItemNomal" type="submit" id="ItemNomal" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Bỏ kích hoạt tin vip" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> /></td>
        <td colspan="2"  align="right">&nbsp;</td>
      </tr>
<tr>
  <td height="32" colspan="4"  align="center" ><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

