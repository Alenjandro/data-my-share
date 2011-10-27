<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<?php
include("fckeditor/fckeditor.php") ;?>	 
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
   <tr >
     <td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" width="11" height="9" />&nbsp;&nbsp;Sửa tin đăng tin</td>   
   </tr>
   <tr >
       <td style="padding:10px;text-align:center; color:#FF0000">     
          
		<?php
if($_POST['Send']) {
            
            if($_POST['title']=='') {
                echo "Mời bạn nhập tiêu đề tin đăng";}
                
            elseif($_POST['categories']=='') {
                echo "Mời bạn chọn chuyên mục tin";}	
            
            elseif($_POST['needs']=='') {
                echo "Mời bạn chọn nhu cầu";}	
                
            elseif($_POST['content']=='') {
                echo "Mời bạn nhập nội dung tin đăng";}
			elseif($_POST['fullname']=='') {
                echo "Mời bạn nhập tên liên hệ";}
			elseif($_POST['address']=='') {
                echo "Mời bạn nhập địa chỉ";}
			elseif($_POST['telephone']=='') {
                echo "Mời bạn nhập điện thoại";}
			elseif($_POST['email']=='') {
                echo "Mời bạn nhập email";}	
            elseif(text($_POST['code'])!=@$_SESSION['code']) {
				echo "Mã xác nhận không chính xác";		
            }else {
			if(@$_SESSION['picture3']!='') $image = @$_SESSION['picture3'];
			if(@$_SESSION['picture3']=='') $image = @$_SESSION['picture2']; 
            mysql_query("UPDATE ".userpost." SET title='".text($_POST['title'])."'
            ,categories='".$_POST['categories']."',needs='".$_POST['needs']."'
			,fullname='".$_POST['fullname']."',address='".$_POST['address']."'
			,telephone='".$_POST['telephone']."',email='".$_POST['email']."'
			,picture='".$image."',type='".$_POST['type']."', place='".$_POST['place']."',
            content='".textContent($_POST['content'])."' WHERE id='".intval($id_1)."'");
            @$_SESSION['picture3']="";
			@$_SESSION['picture2']="";
            echo "<script>alert('Sửa tin đăng thành công!');location.href='".$domain."/quan-ly-tin-dang".$vip."';</script>";
            }	
        }
        ?>
       
         <form method="post" action="" enctype="multipart/form-data">
          <table width="95%"  border="0" align="center" cellpadding="5" cellspacing="0">
<?php
$sqlstr=mysql_query("SELECT * FROM ".userpost." WHERE id='".intval($id_1)."'");
  if(mysql_num_rows($sqlstr)>0)   {
		   
	$row=mysql_fetch_array($sqlstr);
?>          
          
          <tr>
            <td colspan="2" class="height_row">
							  	<table border="0" align="left" cellpadding="3" cellspacing="0" width="100%">

<?php
if($_POST['UploadEdit']) {
	uploads($file='picture',$folder = 'images/product/');
	if($picture!=''){
				$path_src= "images/product/".$picture;
				$path_desc="images/product/thumb/".$picture;
				$path_desc1="images/product/icon/".$picture;
				crop($path_src,$path_desc,100,100);
				crop($path_src,$path_desc1,26,24);	
		}					 
			if(is_file('images/product/'.$picture)) {
			
					@$_SESSION['picture3'] .= '|'.$picture;
			}	}
?>
  <tr>
    <td colspan="2" >
	<div id="settyper" align="center">Chọn kiểu gõ &nbsp;&nbsp;<input value="1" name="typer" onClick="return Mudim.SetMethod(4);" type="radio">&nbsp;Tự động &nbsp;&nbsp;<input checked="checked" value="1" name="typer" onClick="return  Mudim.SetMethod(2);" type="radio">&nbsp;Telex &nbsp;&nbsp;<input value="1" name="typer" onClick="return  Mudim.SetMethod(1);" type="radio">&nbsp;VNI &nbsp;&nbsp;<input value="0" name="typer" onClick="return Mudim.SetMethod(0);" type="radio">&nbsp;Tắt</div>	</td>
    </tr>
  <tr>
    <td width="149" >
      <strong>Chọn ảnh:</strong>          </td>
    <td width="539" ><input type="file" name="picture" />
      <input type="submit" name="UploadEdit" value="Đăng ảnh" /></td>
  </tr>
	 <tr>
    <td >&nbsp;</td>
    <td  ><?php
if($id_2 != '') {
	
	  @$_SESSION['picture3'] = str_replace('|'.$id_2,'',@$_SESSION['picture3']);
	  unlink("images/product/".$id_2);
  	  header('location:'.$domain.'/sua-tin-dang/'.id_1.''.$vip.'');
	}
	
	$pic = explode('|',@$_SESSION['picture3']);
	foreach($pic as $pic1) {
	   
	  if(is_file('images/product/'.$pic1)) {
	   ?>
	     <a  onClick="return confirm('Bạn muốn xóa ảnh này ?');" href="<?php echo $domain?>/sua-tin-dang/<?php echo $id_1?>/<?php echo $pic1?><?php echo $vip?>"><img src="<?php echo $domain?>/images/product/<?php echo $pic1?>" style="width:80px;border:0px"   /></a>
		 
	<?php
}
	}
	?>	</td>
	 </tr>
	 
	 <tr>
    <td  ><strong>Ảnh cũ:</strong></td>
    <td ><?php
if($id_2 != '') {
	
	  @$_SESSION['picture2'] = str_replace('|'.$id_2,'',$row['picture']);
	  
	  mysql_query("UPDATE ".userpost." SET picture = '".@$_SESSION['picture2']."' WHERE id = '".intval($id_1)."'");
	  unlink("images/product/".$id_2);
  	  header('location:'.$domain.'/sua-tin-dang/'.$id_1.''.$vip.'');
	} else {
	
	@$_SESSION['picture2'] = $row['picture'];
	
	}
	
	$pic = explode('|',@$_SESSION['picture2']);
	
	foreach($pic as $pic1) {
	   
	  if(is_file('images/product/'.$pic1)) {
	   ?>
	     <a  onClick="return confirm('Bạn muốn xóa ảnh này ?');"  href="<?php echo $domain?>/sua-tin-dang/<?php echo $id_1?>/<?php echo $pic1?><?php echo $vip?>"><img src="<?php echo $domain?>/images/product/<?php echo $pic1?>" style="width:80px;border:0px"   /></a>
		 
	<?php
}}?></td>
	 </tr>
  </table>			</td>
            </tr>         
          <tr>
            <td width="145" nowrap><div align="left"><strong>
              &nbsp;<?php echo $require?>
            Tiêu đề tin:&nbsp;&nbsp;</strong></div></td>
            <td width="529" ><input name="title" type="text" class="Contact_text" id="title" value="<?php echo $row['title']?>" ></td>
          </tr>
          <tr>
            <td><div align="left"><strong> &nbsp;
              <?php echo $require?>
              Chuyên mục:&nbsp;&nbsp;</strong></div></td>
            <td>
              <select  name="categories" class="Contact_text" id="categories" onChange="getCity('getmodel.php?categories='+this.value)">
                <option value="0">--- Chọn chuyên mục ---</option>
                <?php
CategoryParent($row['categories'],menu_product)?>
              </select></td>
          </tr>
          <tr>
            <td colspan="2">
			<div id="modeldiv"><table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td width="143" nowrap="nowrap"><div align="left"><strong> 
                  <?php echo $require?>
                  Nhu cầu:&nbsp;&nbsp;</strong></div></td>
                <td width="541">
<select  name="needs" class="Contact_text" id="needs">
<option value="0">--- Chọn nhu cầu ---</option>
<?php
$sqlstr1=mysql_query("SELECT * FROM ".menu_product." WHERE status = true AND parent = '".$row['categories']."' ORDER BY stt ASC");
	   if(mysql_num_rows($sqlstr1)>0)   {
	   while($rownhucau=mysql_fetch_array($sqlstr1))	    {
?>
<option value="<?php echo $rownhucau['id']?>" <?php
echo $row['needs'] == $rownhucau['id']?'selected':''?>><?php echo $rownhucau['category']?></option>
<?php
}}?>
</select>                </td>
              </tr>
              <tr>
                <td><div align="left"><strong> 
                  <?php echo $require?>
                  Chủng loại:&nbsp;&nbsp;</strong></div></td>
                <td>
<select  name="type" class="Contact_text" id="type">
<option value="0">--- Chọn chủng loại ---</option>
<?php
$sqlstr2=mysql_query("SELECT * FROM ".menu_service." WHERE status = true AND parent = '".$row['categories']."' ORDER BY stt ASC");
	   if(mysql_num_rows($sqlstr2)>0)   {
	   while($rowchungloai=mysql_fetch_array($sqlstr2))	    {
?>
<option value="<?php echo $rowchungloai['id']?>" <?php
echo $row['type'] == $rowchungloai['id']?'selected':''?>><?php echo $rowchungloai['category']?></option>
<?php
}}?>
</select></td>
              </tr>
            </table></div></td>
            </tr>
          <tr>
            <td><div align="left"><strong> &nbsp;
              <?php echo $require?>
              Nơi rao:&nbsp;&nbsp;</strong></div></td>
            <td><span class="height_row">
<select  name="place" class="Contact_text" id="place" >
<option value="">--- Chọn nơi rao ---</option>
<option value="0">Toàn quốc</option>
<?php
$sql1 = "SELECT * FROM ".tinh." ORDER BY regions,stt ASC";
$kq1 = mysql_query($sql1);
while($r01 = mysql_fetch_array($kq1))
{
?>
<option value="<?php echo $r01['tid']?>" <?php
echo $row['place'] == $r01['tid']?'selected':''?>><?php echo $r01['name']?></option>
<?php
}?>
</select>
            </span></td>
          </tr>
          <tr>
            <td>
              <?php echo $require?>
            <strong> Người liên hệ:</strong></td>
            <td><input name="fullname" type="text" class="Contact_text" id="fullname" value="<?php echo $row['fullname']?>" /></td>
          </tr>
          <tr>
            <td>
              <?php echo $require?>
            <strong> Địa chỉ:</strong></td>
            <td><input name="address" type="text" class="Contact_text" id="address" value="<?php echo $row['address']?>" /></td>
          </tr>
          <tr>
            <td>
              <?php echo $require?>
            <strong>Điện thoại:</strong></td>
            <td><input name="telephone" type="text" class="Contact_text" id="telephone" value="<?php echo $row['telephone']?>" /></td>
          </tr>
          <tr>
            <td>
              <?php echo $require?>
            <strong> Email:</strong></td>
            <td><input name="email" type="text" class="Contact_text" id="email" value="<?php echo $row['email']?>" /></td>
          </tr>
          
          <tr>
            <td colspan="2"><div align="left"><strong>
              &nbsp;<?php echo $require?>
            Nội dung tin đăng:&nbsp;&nbsp;</strong></div></td>
            </tr>
          <tr>
            <td colspan="2"><?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
		$oFCKeditor = new FCKeditor('content') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->ToolbarSet = 'Basic';
		$oFCKeditor->EnterMode = 'div';
		$oFCKeditor->Height = 350;
		$oFCKeditor->Value		= $row['content'] ;
		$oFCKeditor->Create() ;
	?></td>
            </tr>
          <tr>
            <td rowspan="2">&nbsp;<?php echo $require?>&nbsp;<strong>Mã bảo vệ: </strong></td>
            <td><img src="<?php echo $domain?>/verify.php" /></td>
          </tr>
          <tr>
            <td><input type="text" name="code"  size="6" style="width:80px;"></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="Send" type="submit" value=" Gửi đi ">
               <input name="Send" type="reset" value="Hủy liên hệ"></td>
          </tr>
<?php
}?>		  
        </table>  
        </form>	   
     </td>
  </tr>
    <tr>
       <td>&nbsp;</td>
  </tr>
</table>