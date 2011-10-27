<?php
include "check.php";?>
<?php
if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".contact." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
	 

?>
<?php
if(@$_GET['view']) {?>
<?php
$sqlstr=mysql_query("SELECT * FROM ".contact." WHERE id=".intval(@$_GET['view'])."" );
  mysql_query("UPDATE ".contact." SET status='true' WHERE id=".intval(@$_GET['view'])."" );
  if(mysql_num_rows($sqlstr)>0)   {
		   
		$row=mysql_fetch_array($sqlstr);
	
?>
<div style="float:left; padding-top:20px">
<table  border="1" bordercolor="#999999" bordercolordark="#FFFFFF" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="820">
  <tr>
    <td width="146"><div align="right">Tiêu đề</div></td>
    <td width="536"><?php echo $row['title']?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Nội dung</div></td>
    <td><?php echo $row['content']?>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right">Họ tên</div></td>
    <td><?php echo $row['fullname']?>&nbsp;</td>
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
    <td><div align="right">Ngày gửi</div></td>
    <td><?php echo date("d/m/Y",$row['postdate'])?>&nbsp;</td>
  </tr>
</table>

<?php
} }?> 
</div>
<div style="float:left; padding-top:20px">
<form method="post" name="check_form" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolordark="#FFFFFF" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="820">
  <?php
$p=50;
		  $sqlstr="SELECT * FROM ".contact."";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  if(@$_GET['view']!="") $link .= "&view=".@$_GET['view']."";
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by ID DESC limit $s,$p";
		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
	
?>	  
	  <tr >
	    <td height="32" colspan="4"  align="center" bgcolor="#EEEEEE"><?php
view_page($link)?></td>
      </tr>
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img src="../images/arrow1.png" width="28" height="18" border="0" style="width:20px" /></td>
	    <td colspan="3" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa liên hệ này" name="ItemDel" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
		<div style="float:right"><span style="font-size:11px; color:#FF0000; font-family:tahoma" >&#8220;DoubleClick vào trường Người gửiđể xem thông tin.&#8221;</span></div></td>
      </tr>
	  <tr bgcolor="#EEEEEE"  height="22px">
        <td height="27" align="center" ><input name="checkall" type="checkbox" id="checkall" value="1" onclick="agreeTerm()" alt="Check all"/></td>
	    <td ><strong>Người gửi</strong></td>
	    <td ><div align="center"><strong>Ngày gửi </strong></div></td>
	    <td ><div align="center"><strong>Trạng thái </strong></div></td>
      </tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {$i=0;
		   
		  while($row=mysql_fetch_array($sqlstr))	 { $i+=1;?>	  
	  <tr <?php
if($i%2=='0') echo "style=\"background:#FFFFEC;\"" ?>>
	    <td width="20" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" id="element" value="<?php echo $row['id']?>" />		</td>
		<td width="501"  style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'"><?php echo $row['fullname']?></td>
	    <td width="129"><div align="center"><?php echo date("d/m/Y",$row['postdate'])?></div></td>
	    <td width="116"><div align="center"><?php
echo $row['status']=='true'?'Đã xem':'Chưa xem';?></div></td>
	  </tr>	  
<?php
}}?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="3" ><input type="submit"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa liên hệ này" name="ItemDel2" class="button" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?> /></td>
      </tr>
<tr>
  <td height="32" colspan="4"  align="center" bgcolor="#EEEEEE"><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

