<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>QUẢN LÝ THÀNH VIÊN:</strong></div>

<?php
if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".members." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
	 
	 if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".members." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".members." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['view']) {?>
 <?php
$sqlstr=mysql_query("SELECT * FROM ".members." WHERE id=".intval(@$_GET['view'])."" );
  mysql_query("UPDATE ".members." SET status='true' WHERE id=".intval(@$_GET['view'])."" );
  if(mysql_num_rows($sqlstr)>0)   {
		   
		$row=mysql_fetch_array($sqlstr);
	
?>
<div style="float:left; padding-top:20px">
<table  border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="820">
  <tr>
    <td width="136"><div align="right">Tên đăng nhập </div></td>
    <td width="666"><?php echo $row['username']?>&nbsp;</td>
  </tr>
 
  <tr>
    <td><div align="right">Họ tên</div></td>
    <td><?php echo $row['fullname']?>      &nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Địa chỉ </div></td>
    <td><?php echo $row['address']?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Telephone</div></td>
    <td><?php echo $row['telephone']?>&nbsp;</td>
  </tr>
 
  <tr>
    <td><div align="right">Email</div></td>
    <td><?php echo $row['email']?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Website</div></td>
    <td><?php echo $row['website']?></td>
  </tr>
  <tr>
    <td><div align="right">Ngày đăng ký</div></td>
    <td><?php echo date("d/m/Y",$row['postdate'])?>&nbsp;</td>
  </tr>
</table>

<?php
} }?> 
</div>



<div style="float:left; padding-top:20px;">
<form method="post" action="" name="check_form">
<table  border="1" bordercolor="#DDDDDD" bordercolordark="#FFFFFF" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="820">
<?php
$p=50;
		  $sqlstr="SELECT * FROM ".members."";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by ID DESC limit $s,$p";
		  
	  	
		  $sqlstr=mysql_query($sqlstr);
?>
<tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'">
  <td height="15" colspan="7"  align="center" bgcolor="#EEEEEE"><?php
view_page($link)?></td>
  </tr>
<tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'">
	    <td height="15"  align="center" bgcolor="#EEEEEE"><img src="../images/arrow1.png" width="28" height="18" border="0" style="width:20px" /></td>
	    <td colspan="6"  ><input name="ItemDel" type="submit" id="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" />
          <input name="ItemHid" type="submit" id="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Đình chỉ hoạt động" />
          <input name="ItemShow" type="submit" id="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Hủy đình chỉ" /></td>
      </tr>
<tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'">
  <td height="15"  align="center" bgcolor="#EEEEEE"><input name="checkall" type="checkbox" id="checkall" value="1" onclick="agreeTerm()" alt="Check all"/></td>
  <td bgcolor="#EEEEEE"  >Tên truy cập </td>
  <td bgcolor="#EEEEEE"  ><div align="center">Email</div></td>
  <td nowrap="nowrap" bgcolor="#EEEEEE"  ><div align="center">Nhận email</div></td>
  <td align="center" bgcolor="#EEEEEE"  ><div align="center">Ẩn email </div></td>
  <td align="center" bgcolor="#EEEEEE"  ><div align="center">Ngày đăng ký</div></td>
  <td bgcolor="#EEEEEE"  ><div align="center">Trang thái </div></td>
</tr>
  <?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	 {
	
?>	  
	  
	  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'">
	    <td width="26" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" id="element" value="<?php echo $row['id']?>" />		</td>
		<td width="143"  ><?php echo $row['username']?></td>
	    <td width="230"><?php echo $row['email']?></td>
	    <td width="138"  align="center"><?php
echo $row['no_email']=='true'?"Không nhận tin qua email":"Có nhận tin qua email";?></td>
	    <td width="63"  align="center"><?php
echo $row['hidden_email']=='true'?"Giấu email":"Hiện email";?></td>
	    <td width="80" style="cursor:pointer" ><div align="center"><?php echo date("d/m/Y",$row['postdate'])?></div></td>
	    <td width="62" nowrap="nowrap" style="cursor:pointer" ><div align="center"><?php
echo $row['status']=='true'?'Hoạt động':'Đình chỉ';?></div></td>
	  </tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img src="../images/arrow.png" height="18" border="0" style="width:20px" /></td>
	    <td colspan="6" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer">
        <input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Đình chỉ hoạt động" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hủy đình chỉ" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer">        </td>
      </tr>
<tr>
  <td height="32" colspan="7"  align="center" bgcolor="#EEEEEE"><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

