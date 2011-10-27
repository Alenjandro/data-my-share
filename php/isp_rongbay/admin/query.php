<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>QUẢN LÝ CÂU HỎI:</strong></div>

<?php
if($_POST['EditNews'])	  {		
			   				
				
				mysql_query("UPDATE ".query." SET 	email = '".text($_POST['email'])."',question = '".$_POST['question']."',answer = '".$_POST['answer']."',postdate='".time()."' WHERE id='".intval(@$_GET['Edit'])."'");
				
				echo "Trả lời thành công";
		  
	  }
	   
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".query." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		  
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".query." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".query." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['Edit']!='') {?>
<div style="float:left">
 <?php
$sqlstr=mysql_query("SELECT * FROM ".query."  WHERE id='".intval(@$_GET['Edit'])."'");
	  mysql_query("UPDATE ".query." SET status='true' WHERE id=".intval(@$_GET['view'])."" );
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800px">
<form method="post" action=""  enctype="multipart/form-data">
   <tr>
    <td width="13%" class="height_row"><div align="right">Người gửi: </div></td>
    <td width="87%" class="height_row"><label>
      <input type="text" name="email" class="input_text" value="<?php echo $row['email']?>" style="width:300px"/>
    </label></td>
  </tr>
  
  <tr>
    <td class="height_row"><div align="right">Câu hỏi : </div></td>
    <td class="height_row"><label>
	<?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		
		$oFCKeditor = new FCKeditor('question') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Height = 250;
		$oFCKeditor->Width = 600;
		$oFCKeditor->Value		= $row['question'];
		$oFCKeditor->Create() ;
	?>
    
    </label></td>
  </tr>
  <tr>
    <td class="height_row"><div align="right">Trả lời : </div></td>
    <td class="height_row">
	<?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		
		$oFCKeditor = new FCKeditor('answer') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Height = 250;
		$oFCKeditor->Width = 600;
		$oFCKeditor->Value		= $row['answer'];
		$oFCKeditor->Create() ;
	?>
	</td>
  </tr>
  
  <tr>
    <td><div align="right">Ngày gửi : </div></td>
    <td><?php echo date("d/m/Y",$row['postdate'])?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>	  
      <input type="submit" name="EditNews" value="Trả lời câu hỏi" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
    </label></td>
  </tr>
 
  </form>
</table>
</div>
<?php
} }?>
<div style="float:left; padding-top:20px">

<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800px">
  <?php
$p=50;
		 $sqlstr="SELECT * FROM ".query."	";			
	  
		  $page=mysql_query($sqlstr);
		  $n_record=mysql_num_rows($page);
		  num_page(); 
		  $link="index.php?menu=".@$_GET['menu']."&site=".@$_GET['site'].""; 
		  $page=@$_GET['page']?intval(@$_GET['page']):1;   
		  $s=($page-1)*$p;   
		  
		  $sqlstr.=" order by postdate DESC limit $s,$p";		  
	  	
		  $sqlstr=mysql_query($sqlstr);	
?>
<tr>
  <td height="32" colspan="5"  align="center" bgcolor="#FFFFFF"><?php
view_page($link)?></td>
</tr>
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow1.png" border="0" /></td>
	    <td colspan="4" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn tin này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện tin này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>	
		</td>
      </tr>
<tr height="22px">
      <td width="26" height="27" bgcolor="#EEEEEE" ><div align="center">#ID</div></td>
	    <td width="236" bgcolor="#EEEEEE" >Người gửi </td>
        <td width="468" bgcolor="#EEEEEE" ><div align="center">Câu hỏi </div></td>
        <td width="136" bgcolor="#EEEEEE" ><div align="center">Trạng Thái</div></td>        
</tr>
<?php
if(mysql_num_rows($sqlstr)>0)   {
		   
		  while($row=mysql_fetch_array($sqlstr))	{
	
?>	  
	  <tr style="cursor:pointer" onDblClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['id']?>'">
	    <td width="26" height="15"  align="center" bgcolor="#EEEEEE">
		<input  type="checkbox" name="element[]" value="<?php echo $row['id']?>" />		</td>
		<td width="236"   ><?php echo $row['email']?></td>
		<td width="468"  >
		  <div align="left">
		    <?php echo sub_str($row['question'],60)?>
        </div></td>
		
		<td width="136" align="center"><?php
echo $row['status'];?></td>
	</tr>	  
<?php
}
}
?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="4" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa tin này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn tin này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện tin này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>	
		</td>
      </tr>
<tr>
  <td height="32" colspan="5"  align="center" bgcolor="#FFFFFF"><?php
view_page($link)?></td>
  </tr>		  
</table>
</form>
</div>

