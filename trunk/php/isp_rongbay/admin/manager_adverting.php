<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>THÊM QUẢNG CÁO:</strong></div>

<?php
if($_POST['InsertAds'])	  {
	 
				
				
			    uploads($file='picture',$folder = '../images/ads/');
				 
				mysql_query("INSERT INTO ".ads." SET 
				link='".$_POST['link']."',picture='$picture',category='".$_POST['category']."',
				stt='".$_POST['order']."',alignment='".$_POST['alignment']."',
				width='".$_POST['width']."',height='".$_POST['height']."',
				postdate='".time()."'");
				
				echo "Thêm quảng cáo thành công";
			  
	  }
	
	if($_POST['Ads'])	  {
	 
				 uploads($file='picture',$folder = '../images/ads/');
				 
				if($picture=='') $picture=$_POST['picture_hidden'];				
				
				mysql_query("UPDATE ".ads." SET 
				link='".$_POST['link']."',picture='$picture',category='".$_POST['category']."',
				stt='".$_POST['order']."',alignment='".$_POST['alignment']."',
				width='".$_POST['width']."',height='".$_POST['height']."',
				postdate='".time()."' WHERE id='".intval(@$_GET['Edit'])."'");
				
				echo "Cập nhật  quảng cáo thành công";
			  
	  }
	
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".ads." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".ads." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".ads." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['AddNews']!='') {?>
<div style="float:left">
<table border="1" bordercolor="#CCCCCC"  bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form action="" method="post" enctype="multipart/form-data" >
  <tr>
    <td width="10%" class="height_row"><div align="right">Link </div></td>
    <td width="27%" class="height_row"><label>
      <input type="text" name="link" class="input-text" />
    </label></td>
    <td width="27%" class="height_row"><div align="right">Picture</div></td>
    <td width="36%" class="height_row"><input name="picture" type="file" id="picture" /></td>
  </tr>
  
  <tr>
    <td class="height_row"><div align="right">Số thứ tự </div></td>
    <td class="height_row">
	<select name="order" class="input-text" >
		<?php
order(1,101,$id)?>
	</select></td>
    <td class="height_row"><div align="right">Danh mục </div></td>
    <td class="height_row"><select  name="category" class="input-text" id="category" >
      <option value="0">Không thuộc nhóm nào</option>
      <?php
CategoryNews($_POST['parent'],menu_product)?>
    </select></td>
  </tr>
  
  <tr>
    <td class="height_row"><div align="right">Vị trí </div></td>
    <td class="height_row">
	<select name="alignment" class="input-text" >
		<option value="1">Banner</option>	
        <option value="2">Bên phải</option>	
		<option value="3">Bottom</option>
		<option value="4">Logo</option>
		<option value="5">Ở giữa</option>
		<option value="6">2 cột phải</option>
		<option value="7">Ở giữa - dưới</option>
		<option value="8">Slide trang chủ</option>
	</select></td>
    <td class="height_row"><div align="right">Kích thước (C.Rộng x C.Cao) </div></td>
    <td class="height_row"><input name="width" type="text" id="width" size="4" />
      x
        <input name="height" type="text" id="height" size="4" />
        <br />
        (VD: 720 x 90. Để trống là mặc định)</td>
  </tr>
  <tr>
    <td align="center"><label></label></td>
    <td colspan="3"><input name="InsertAds" type="submit" id="InsertAds" value="Thêm quảng cáo" /></td>
    </tr>
  <tr>
    <td colspan="4"><p><strong><u>Lưu ý:</u></strong> +) Quảng cáo tại vị trí banner hoặc slide trang chủ sẽ hiển thị cách nhau 15s và được hiển thị ngẫu nhiên.<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+) Chú ý kích thước ảnh quảng cáo nhập vào để giao diện không bị vỡ. <br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+) Kích thước banner chuẩn: 720 x 90.<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+) Kích thước slide chuẩn: 760 x 200.<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+) Kích thước quảng cáo phải chuẩn: 220 x tùy chọn.<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+) Kích thước quảng cáo phải 2 hàng chuẩn: 105 x tùy chọn.<br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+) Kích thước quảng cáo trang chủ chuẩn: 760 x tùy chọn.</td>
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
$sqlstr=mysql_query("SELECT * FROM ".ads."  WHERE id='".intval(@$_GET['Edit'])."'");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#CCCCCC"  bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form method="post" action=""  enctype="multipart/form-data">
   <tr>
    <td width="11%" class="height_row"><div align="right">Link </div></td>
    <td width="27%" class="height_row"><label>
      <input type="text" name="link" class="input-text" value="<?php echo $row['link']?>" />
    </label></td>
    <td width="27%" class="height_row"><div align="right">Picture</div></td>
    <td width="35%" class="height_row"><input name="picture_hidden"  type="hidden"  value="<?php echo $row['picture']?>" />
      <input name="picture" type="file" id="picture" /></td>
   </tr>
  
  <tr>
    <td class="height_row"><div align="right">Số thứ tự </div></td>
    <td class="height_row">
	<select name="order" class="input-text" >
		<?php
order(1,101,$row['stt'])?>
	</select></td>
    <td class="height_row"><div align="right">Danh mục </div></td>
    <td class="height_row"><select  name="category" class="input-text" id="parent" >
      <option value="0">Không thuộc nhóm nào</option>
      <?php
CategoryNews($row['category'],menu_product)?>
    </select></td>
  </tr>
  
  <tr>
    <td class="height_row"><div align="right">Vị trí </div></td>
    <td class="height_row">
	<select name="alignment" class="input-text" >
		<option value="1" <?php
echo $row['alignment']=='1'?'Selected':''?>>Banner</option>
        <option value="2" <?php
echo $row['alignment']=='2'?'Selected':''?>>Bên phải</option>	
		<option value="3" <?php
echo $row['alignment']=='3'?'Selected':''?>>Bottom</option>
		<option value="4" <?php
echo $row['alignment']=='4'?'Selected':''?>>Logo</option>
		<option value="5" <?php
echo $row['alignment']=='5'?'Selected':''?>>Ở giữa</option>
		<option value="6" <?php
echo $row['alignment']=='6'?'Selected':''?>>Hai cột phải</option>	
		<option value="7" <?php
echo $row['alignment']=='7'?'Selected':''?>>Ở giữa - dưới</option>	
		<option value="8" <?php
echo $row['alignment']=='8'?'Selected':''?>>Slide trang chủ</option>	
	</select>    </td>
    <td class="height_row"><div align="right">Kích thước (C.Rộng x C.Cao) </div></td>
    <td class="height_row"><input name="width" type="text" id="width" value="<?php echo $row['width']?>" size="4" />
x
  <input name="height" type="text" id="height" value="<?php echo $row['height']?>" size="4" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><label>	  
      <input type="submit" name="Ads" value="Sửa quảng cáo" />
    </label></td>
  </tr>
  </form>
</table>
</div>
<?php
} }?>
<div style="float:left; padding-top:20px">

<table  border="1" bordercolor="#CCCCCC"  bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<tr height="22px">
      <form id="form1" name="form1" method="post" action="">
      <td width="80%" height="27" ><label></label>
         <label>
           <input  type="button" onClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&AddNews=true'"  value="Thêm quảng cáo mới" />
        </label></td>
	 </form>
</tr>
</table>
</div>

<div style="float:left; padding-top:20px	">
<form method="post" action="" name="check_form">
<table  border="1" bordercolor="#DDDDDD"  bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800px">
  <?php
$p=50;
		 $sqlstr="SELECT * FROM ".ads."	";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by alignment, stt ASC limit $s,$p";		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
?>
<tr>  
  <td colspan="6" align="center"  ><?php
view_page($link)?></td>
</tr>
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow1.png" border="0" /></td>
	    <td colspan="5" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn tin này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện tin này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer">		</td>
      </tr>
<tr height="22px" style="background-color:#EEEEEE">
      <td width="33" height="27" align="center" ><input name="checkall" type="checkbox" id="checkall" value="1" onclick="agreeTerm()" alt="Check all"/></td>
	    <td width="380" >Link</td>
        <td width="53" ><div align="center">Số TT </div></td>
        <td width="133" ><div align="center">Vị trí </div></td>
      <td width="58" ><div align="center">Hình ảnh </div></td>
      <td width="93" ><div align="center">Trạng Thái</div></td>        
</tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	{
	
?>	  
	  
	  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['id']?>'">
	    <td width="33" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" id="element"/>		</td>
		<td width="380"   ><?php echo $row['link']?></td>
		<td width="53"  ><div align="center">&nbsp;<?php echo $row['stt']?></div></td>
		<td width="133"  ><div align="center">&nbsp;
		<?php
if( $row['alignment']=='1') echo 'Banner';
		if( $row['alignment']=='2') echo 'Bên Phải';
		if( $row['alignment']=='3') echo 'Bottom';
		if( $row['alignment']=='4') echo 'Logo';
		if( $row['alignment']=='5') echo 'Ở giữa';
		if( $row['alignment']=='6') echo '2 cột phải';
		if( $row['alignment']=='7') echo 'Ở giữa - dưới';
		if( $row['alignment']=='8') echo 'Slide trang chủ';
		?>
		</div></td>
		<td width="58"  ><div align="center"><a target="_blank" href="../images/ads/<?php echo $row['picture']?>">View</a>&nbsp;</div></td>
		<td width="93" align="center"><?php echo $row['status']?></td>
	</tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="5" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn tin này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer"> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện tin này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer">		</td>
      </tr>
<tr>  
  <td colspan="6" align="center" ><?php
view_page($link)?></td>
</tr>		  
</table>
</form>
</div>

