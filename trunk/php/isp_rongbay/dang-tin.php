<?php
if(!defined("edocom")) exit ();?>
<title>Đăng tin - <?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<?php
include("fckeditor/fckeditor.php") ;?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
   <tr ><td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" width="11" height="9" />&nbsp;&nbsp;Đăng tin</td>   
   </tr>
   <tr >
       <td style="padding:10px;text-align:center; color:#FF0000">     
          
<?php
if($_POST['Upload']) {
		   uploads($file='picture',$folder = 'images/product/');	
		   if($picture!=''){
				$path_src= "images/product/".$picture;
				$path_desc="images/product/thumb/".$picture;
				$path_desc1="images/product/icon/".$picture;
				crop($path_src,$path_desc,100,100);
				crop($path_src,$path_desc1,26,24);	
		}			 			 
		if(is_file('images/product/thumb/'.$picture)) {
		
				@$_SESSION['picture1'] .= '|'.$picture;
		}}		
		if($id_1 != '') {
		
		  @$_SESSION['picture1'] = str_replace('|'.$id_1,'',@$_SESSION['picture1']);
		  unlink("images/product/".$id_1);
		  header('location:'.$domain.'/dang-tin'.$vip.'');
		}
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
            if(@$_SESSION['idcus']!='') $member=@$_SESSION['idcus'];
			if(@$_SESSION['idcus']=='') $member=0;

            mysql_query("INSERT INTO ".userpost." SET title='".text($_POST['title'])."'
            ,categories='".$_POST['categories']."',needs='".$_POST['needs']."',type='".$_POST['type']."', memberid='".intval($member)."', place='".$_POST['place']."',picture='".@$_SESSION['picture1']."',
			fullname='".$_POST['fullname']."',address='".$_POST['address']."',
			telephone='".$_POST['telephone']."',email='".$_POST['email']."',
            content='".textContent($_POST['content'])."',postdate='".time()."'");
			if(@$_SESSION['idcus']!='') mysql_query("UPDATE ".members." SET count=count+1 WHERE id='".@$_SESSION['idcus']."'");
            @$_SESSION['picture1']='';
            echo "<script>alert('Bạn đã đăng tin thành công. Tin đăng của bạn sẽ được admin kiểm duyệt');location.href='".$domain."';</script>";
            }	
        }
        ?>
       
         <form method="post" action="" enctype="multipart/form-data">
          <table width="95%"  border="0" align="center" cellpadding="5" cellspacing="0">
          
            <tr>
              <td colspan="2" class="height_row">
			  <div id="settyper" align="center">Chọn kiểu gõ &nbsp;&nbsp;<input value="1" name="typer" onClick="return Mudim.SetMethod(4);" type="radio">&nbsp;Tự động &nbsp;&nbsp;<input checked="checked" value="1" name="typer" onClick="return  Mudim.SetMethod(2);" type="radio">&nbsp;Telex &nbsp;&nbsp;<input value="1" name="typer" onClick="return  Mudim.SetMethod(1);" type="radio">&nbsp;VNI &nbsp;&nbsp;<input value="0" name="typer" onClick="return Mudim.SetMethod(0);" type="radio">&nbsp;Tắt</div>			  </td>
            </tr>
            <tr>
              <td class="height_row"><div align="left"><strong> Chọn ảnh:              </strong></div></td>
              <td class="height_row"><input type="file" name="picture" />
                <input type="submit" name="Upload" value="Đăng ảnh" /></td>
            </tr>
            
            <tr>
              <td>&nbsp;</td>
              <td >
<?php
$pic = explode('|',@$_SESSION['picture1']);
	foreach($pic as $pic1) {
	  if(is_file('images/product/'.$pic1)) {
	   ?>
	     <a onClick="return confirm('Bạn muốn xóa ảnh này ?');" href="<?php echo $domain?>/dang-tin/<?php echo $pic1?><?php echo $vip?>"><img src="<?php echo $domain?>/images/product/<?php echo $pic1?>" style="width:80px;border:0px"   /></a>
		 
	<?php
}} ?></td>
            </tr>
          
          <tr>
            <td width="145" nowrap><div align="left">
              &nbsp;<?php echo $require?><strong>
            Tiêu đề tin:&nbsp;&nbsp;</strong></div></td>
            <td width="529" ><input name="title" type="text" class="Contact_text" id="title" value="<?php echo $_POST['title']?>" ></td>
          </tr>
          <tr>
            <td><div align="left"> &nbsp;
              <?php echo $require?><strong>
            Chuyên mục:&nbsp;&nbsp;</strong></div></td>
            <td><span class="height_row">
              <select  name="categories" class="Contact_text" id="categories" onChange="getCity('getmodel.php?categories='+this.value)">
                <option value="0">--- Chọn chuyên mục ---</option>
                <?php
CategoryParent($_POST['categories'],menu_product)?>
              </select>
            </span></td>
          </tr>
          <tr>
            <td colspan="2">
			<div id="modeldiv"><table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td width="143" nowrap="nowrap"><div align="left"><strong> Nhu cầu:&nbsp;&nbsp;</strong></div></td>
                <td width="538"><select  name="needs" disabled="disabled" class="Contact_text" id="needs">
                  <option value="0">--- Chọn nhu cầu ---</option>
                </select></td>
              </tr>
              <tr>
                <td><div align="left"><strong> Chủng loại:&nbsp;&nbsp;</strong></div></td>
                <td><select  name="type" disabled="disabled" class="Contact_text" id="type">
                  <option value="0">--- Chọn chủng loại ---</option>
                </select></td>
              </tr>
            </table>
			</div></td>
            </tr>
          <tr>
            <td><div align="left"><strong> &nbsp;Nơi rao:&nbsp;&nbsp;</strong></div></td>
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
echo $_POST['place'] == $r01['tid']?'selected':''?>><?php echo $r01['name']?></option>
<?php
}?>
              </select>
            </span></td>
          </tr>
          <tr>
            <td> 
              <?php echo $require?>
           <strong> Người liên hệ:</strong></td>
            <td><input name="fullname" type="text" class="Contact_text" id="fullname" value="<?php echo $_POST['fullname']?>"></td>
          </tr>
          <tr>
            <td> 
              <?php echo $require?>
            <strong>Địa chỉ:</strong></td>
            <td><input name="address" type="text" class="Contact_text" id="address" value="<?php echo $_POST['address']?>"></td>
          </tr>
          <tr>
            <td>
              <?php echo $require?>
            <strong> Điện thoại:</strong></td>
            <td><input name="telephone" type="text" class="Contact_text" id="telephone" value="<?php echo $_POST['telephone']?>"></td>
          </tr>
          <tr>
            <td> 
              <?php echo $require?>
           <strong> Email:</strong></td>
            <td><input name="email" type="text" class="Contact_text" id="email" value="<?php echo $_POST['email']?>"></td>
          </tr>
          
          <tr>
            <td colspan="2"><div align="left">
              &nbsp;<?php echo $require?><strong>
            Nội dung:&nbsp;&nbsp;</strong></div></td>
            </tr>
          <tr>
            <td colspan="2">
	<?php

		$sBasePath = $_SERVER['PHP_SELF'] ;
		$oFCKeditor = new FCKeditor('content') ;
		$oFCKeditor->BasePath	= './fckeditor/' ;
		$oFCKeditor->ToolbarSet = 'Basic';
		$oFCKeditor->EnterMode = 'div';
		$oFCKeditor->Height = 350;
		$oFCKeditor->Value		= $_POST['content'] ;
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
            <td><input name="Send" type="submit" value=" Gửi đi "></td>
          </tr>
        </table>  
        </form>	   
     </td>
  </tr>
    <tr>
       <td>&nbsp;</td>
  </tr>
</table>