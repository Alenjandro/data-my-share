<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>CẬP NHẬT QUY ĐỊNH ĐĂNG TIN:</strong></div>

<?php
if($_POST['UpdateIntro']){			
			  			
				
				mysql_query("UPDATE ".team." SET full='".$_POST['full']."' WHERE id=".intval($_POST['id'])."");
				
				echo "Cập nhật thành công";
		}		  
	 
?>
<div style="float:left">
<?php
$sqlstr=mysql_query("SELECT * FROM ".team."");
  if(mysql_num_rows($sqlstr)>0)   {
		   
		$row=mysql_fetch_array($sqlstr);
	
?>
<table border="0"  cellpadding="0" cellspacing="0" width="800">
<form action="" method="post" enctype="multipart/form-data" >
  
  <tr>
    <td >
      <?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		
		$oFCKeditor = new FCKeditor('full') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Height = 480;
		$oFCKeditor->Width = 800;
		$oFCKeditor->Value		= $row['full'] ;
		$oFCKeditor->Create() ;
	?>	</td>
    </tr>
  <tr>
    <td align="center">	  
	  <input type="hidden" name="id" value="<?php echo $row['id']?>" />
      <input name="UpdateIntro" type="submit"  value="Cập nhật" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
      <input type="reset" name="Submit2" value="Nhập Lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>    </td>
    </tr>
  </form>
</table>
<?php
}?>
</div>