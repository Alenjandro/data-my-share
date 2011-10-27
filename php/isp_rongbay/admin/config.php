<?php
include "check.php";?>
<?php
if($_POST['Edit'] != '')  {

            mysql_query("UPDATE ".config." SET define = '".$_POST['slidehome']."' WHERE id = '5'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['footerbottom'])."' WHERE id = '3'");
		    mysql_query("UPDATE ".config." SET define = '".textContent($_POST['contacts'])."' WHERE id = '4'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['adsright'])."' WHERE id = '10'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['pro'])."' WHERE id = '11'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['title'])."' WHERE id = '2'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['description'])."' WHERE id = '12'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['keywords'])."' WHERE id = '13'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['timeoutnews'])."' WHERE id = '18'");
			mysql_query("UPDATE ".config." SET define = '".textContent($_POST['hotline'])."' WHERE id = '19'");
			
			header('location:'.$_SERVER['HTTP_REFERER'].'');	
			
}			
?>

<div style="float:left; padding-top:20px">
<form action="" method="post">
<table  border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
	<tr>
    <td width="115"><div align="right">Slide trang chủ</div></td>
    <td width="667"><label>
      <input name="slidehome" type="radio"  value="1" <?php
echo slidehome == '1'?'checked':'' ?>>&nbsp;Ẩn<input name="slidehome" type="radio"  value="2" <?php
echo slidehome == '2'?'checked':'' ?>>&nbsp;Hiện
    </label>	</td>
  </tr>
	
	
	
	
	
	<tr>
	  <td><div align="right">Thời gian tồn tại tin </div></td>
	  <td><input name="timeoutnews" type="text" id="timeoutnews" value="<?php echo timeoutnews?>"/> 
	    (Ngày) </td>
	  </tr>
	<tr>
	  <td><div align="right">Quảng cáo phải </div></td>
	  <td><input name="adsright" type="text" id="adsright" value="<?php echo adsright?>"/></td>
	  </tr>
	<tr>
	  <td nowrap="nowrap"><div align="right">Sản phẩm trang trong </div></td>
	  <td><input name="pro" type="text" id="pro" value="<?php echo pro?>"/></td>
	  </tr>
	<tr>
	  <td nowrap="nowrap"><div align="right">Số điện thoại HT </div></td>
	  <td><input name="hotline" type="text" id="hotline" value="<?php echo hotline?>"/></td>
	  </tr>
	
	
	<tr>
	  <td><div align="right">Title</div></td>
	  <td>
	  <textarea name="title"  style="width:650px; height:100px"><?php echo title?></textarea>	  </td>
	  </tr>
	<tr>
	  <td><div align="right">Description</div></td>
	  <td><textarea name="description"  style="width:650px; height:100px"><?php echo description?></textarea></td>
	  </tr>
	<tr>
	  <td><div align="right">Keywords</div></td>
	  <td><textarea name="keywords"  style="width:650px; height:100px"><?php echo keywords?></textarea></td>
	  </tr>
  <tr>
    <td width="115"><div align="right">Footer</div></td>
    <td width="667">
	<?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		
		$oFCKeditor = new FCKeditor('footerbottom') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Height = 350;
		$oFCKeditor->Width = 650;
		$oFCKeditor->Value		= footerbottom;
		$oFCKeditor->Create() ;
	?>	</td>
  </tr>
  <tr>
    <td width="115"><div align="right">Thông tin liên hệ</div></td>
    <td width="667">
		<?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		
		$oFCKeditor = new FCKeditor('contacts') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Height = 350;
		$oFCKeditor->Width = 650;
		$oFCKeditor->Value		= contacts;
		$oFCKeditor->Create() ;
	?></td>
  </tr>
  <tr>
    <td height="42">&nbsp;</td>
    <td><label>
      <input name="Edit" type="submit" id="Edit" value="Sửa cấu hình" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
      <input name="Edit2" type="reset" id="Edit2" value="Làm lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
    </label></td>
  </tr>
</table>
</form>
</div>
