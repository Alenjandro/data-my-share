<?php
include "check.php";?>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-style: italic;
	font-size: 11px;
}
-->
</style>

<div style="width:96%" align="left"><strong>QUẢN LÝ TRUY CẬP:</strong></div>
<?php
if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".check." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
	 
	if($_POST['ItemDelAll']) {
		mysql_query("DELETE FROM ".check." ");
	}
	if(NumRow(id,check,"id!=''")>10000){
		mysql_query("DELETE FROM ".check." ");
	}
?>

<div style="float:left">
<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800">

  <?php
$p=50;
		  $sqlstr="SELECT * FROM ".check."";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by ID DESC limit $s,$p";
		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
?>
<tr>
  <td height="32" colspan="5" align="center" ><?php
view_page($link)?></td>
</tr>
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow1.png" border="0" /></td>
	    <td width="168" nowrap="nowrap" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer">
		<input name="ItemDelAll" type="submit" id="ItemDelAll" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa tất cả" /></td>
        <td colspan="3" align="right" ><span class="style1">Để tránh dự liệu quá nhiều. Hệ thống sẽ tự động xóa khi bảng thống kê lớn hơn 10.000 bản ghi</span></td>
</tr>	
<tr >
	    <td height="15"  align="center" bgcolor="#EEEEEE"><strong>#ID</strong></td>
	    <td  bgcolor="#EEEEEE"><strong>Domain</strong></td>
	    <td width="263" align="center"  bgcolor="#EEEEEE"><strong>Vùng Miền</strong> </td>
	    <td width="135" align="center"  bgcolor="#EEEEEE"><strong>IP</strong></td>
	    <td align="center" style="cursor:pointer" bgcolor="#EEEEEE"><strong>Ngày</strong></td>
      </tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	 {
	
?>	  
	  
	  
	  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&view=<?php echo $row['id']?>'">
	    <td width="31" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" />		</td>
		<td  ><?php echo urldecode($row['domain'])?>&nbsp;</td>
	    <td align="center"  ><a target="_blank" href="http://api.hostip.info/get_html.php?ip=<?php echo $row['ip']?>">Tra cứu</a>&nbsp;</td>
	    <td align="center"  ><?php echo $row['ip']?>&nbsp;</td>
	    <td width="161" style="cursor:pointer" ><div align="center"><?php echo date("d/m/Y H:i:s A",$row['time'])?></div></td>
      </tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td width="168" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer">
		<input name="ItemDelAll" type="submit" id="ItemDelAll" style="border:0px; background-color:#DDDDDD; cursor:pointer"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa tất cả" /></td>
        <td colspan="3" align="right" ></td>
</tr>
<tr>
  <td height="32" colspan="5" align="center" ><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

