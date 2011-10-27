<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>CẬP NHẬT GIỚI THIỆU:</strong></div>

<?php
if($_POST['UpdateIntro'])	  {			
			  			
				
				mysql_query("UPDATE ".intro." SET full_intro='".$_POST['full_intro']."' WHERE id=".intval($_POST['id'])."");
				
				echo "Cập nhật thành công";
		}		  
	 
?>
<div style="float:left">
<?php
$sqlstr=mysql_query("SELECT * FROM ".intro."");
  if(mysql_num_rows($sqlstr)>0)   {
		   
		$row=mysql_fetch_array($sqlstr);
	
?>
<table border="0"  cellpadding="0" cellspacing="0" width="800px">
<form action="" method="post" enctype="multipart/form-data" >
  
  <tr>
    <td colspan="2" >
      <?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		
		$oFCKeditor = new FCKeditor('full_intro') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Height = 350;
		$oFCKeditor->Width = 700;
		$oFCKeditor->Value		= $row['full_intro'] ;
		$oFCKeditor->Create() ;
	?>	</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>	  
	  <input type="hidden" name="id" value="<?php echo $row['id']?>" />
      <input name="UpdateIntro" type="submit"  value="Cập nhật" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
      <input type="reset" name="Submit2" value="Nhập Lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
    </td>
  </tr>
  </form>
</table>
<?php
}?>
</div>


