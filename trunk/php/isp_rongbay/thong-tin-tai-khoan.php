<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<title>Đăng ký thành viên - <?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<script type="text/javascript" src="<?php echo $domain?>/css/mudim.js"></script>
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
 <tr ><td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Đăng ký thành viên</td>   </tr>
  <div style="text-align:left; color:#FF0000;  width:400px">	   
<?php
if($_POST['Upload']) {	
		uploads($file='picture',$folder = 'images/members/');
		if(is_file('images/members/'.$picture)) {		
			@$_SESSION['picture'] = $picture;}	
			
		}
       if($_POST['Send']) {
	   
	   echo "<tr><td  colspan=2 style='text-align:left; color:#FF0000;text-align:center'>";
            $submit = '';
			    	
				
			    if(text($_POST['code'])!=@$_SESSION['code']) {
					$alert = "Mã xác nhận không chính xác";
					$submit = true;
				}	
			
			    if(text($_POST['email'])=='') {
					$alert = "Mời bạn nhập địa chỉ Email";
					$submit = true ;
				}				
					
				
			    if(text($_POST['address'])=='') {
					$alert = "Mời bạn nhập địa chỉ liên hệ";
				   $submit = true ;
				}	
				
				if(text($_POST['fullname'])=='') {
					$alert = "Mời bạn nhập đầy đủ họ tên";
				   $submit = true;
				}
						
				if($submit=='') {				 
				if(@$_SESSION['picture']!='') $anh = @$_SESSION['picture'];
				if(@$_SESSION['picture']=='') $anh = @$_SESSION['picture2'];				
				mysql_query("UPDATE ".members." SET 
				fullname                   = '".text($_POST['fullname'])."'
				,address                   = '".text($_POST['address'])."'
				,telephone                 = '".text($_POST['telephone'])."'
				,website                   = '".text($_POST['website'])."'
				,picture				   = '".$anh."'
				,no_email                   = '".$_POST['no_email']."'
				,hidden_email                   = '".$_POST['hidden_email']."'
				WHERE id='".intval(@$_SESSION['idcus'])."'");
				@$_SESSION['picture']='';
				@$_SESSION['picture2']='';
				echo "<script>alert('Cập nhật thông tin thành viên thành công');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
				}	
				
		if($submit!='') {	
			  echo $alert;					
		}	
				
		echo "</td></tr>";		
        }
        ?>
 </div>
 <?php
$sqlstr=mysql_query("SELECT * FROM ".members." WHERE id='".intval(@$_SESSION['idcus'])."'");
  if(mysql_num_rows($sqlstr)>0)   {
		   
	$row=mysql_fetch_array($sqlstr);
?> 
 <tr id="content" >
   <td height="35" colspan="2"><div id="settyper" align="center">Chọn kiểu gõ &nbsp;&nbsp;<input value="1" name="typer" onClick="return Mudim.SetMethod(4);" type="radio">&nbsp;Tự động &nbsp;&nbsp;<input checked="checked" value="1" name="typer" onClick="return  Mudim.SetMethod(2);" type="radio">&nbsp;Telex &nbsp;&nbsp;<input value="1" name="typer" onClick="return  Mudim.SetMethod(1);" type="radio">&nbsp;VNI &nbsp;&nbsp;<input value="0" name="typer" onClick="return Mudim.SetMethod(0);" type="radio">&nbsp;Tắt</div></td>
 </tr>
 <tr id="content" >   
   <td height="35" colspan="2" style="padding-left:50px; text-transform:uppercase"><div align="left"><strong>Thông tin cá nhân</strong><hr /></div></td>            
   </tr>
 <tr >
   <td  height="28"><div align="right"><strong>Đăng ảnh:&nbsp;&nbsp; </strong></div></td>
   <td><input type="file" name="picture" />
                <input name="Upload" type="submit" id="Upload" value="Đăng" /></td>
 </tr>
<?php
if(@$_SESSION['picture']!=''){?> 
 <tr >
   <td  height="28"><div align="right"><strong>Ảnh mới:&nbsp;&nbsp; </strong></div></td>
   <td><img src="<?php echo $domain?>/images/members/<?php echo @$_SESSION['picture']?>" style="width:80px;height:80px; border:0px" /> </td>
 </tr>
<?php
}?> 
<?php
if($row['picture']!=''){?>
<?php
@$_SESSION['picture2']=$row['picture'];?>
 <tr >
   <td  height="28"><div align="right"><strong>Ảnh cũ:&nbsp;&nbsp; </strong></div></td>
   <td> <img src="<?php echo $domain?>/images/members/<?php echo $row['picture']?>" style="width:80px;height:80px; border:0px" /> </td></tr>
<?php
}?>
 <tr >
   <td width="190"  height="28"><div align="right">
     <?php echo $require?><strong>
     Họ tên:&nbsp;&nbsp;</strong></div></td>
   <td width="410">
     <input type="text" name="fullname" id="inputRegister" value="<?php echo $row['fullname']?>" >   </td>
 </tr>
 <tr >
   <td height="28"><div align="right">
     <?php echo $require?><strong>
     Địa chỉ:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="address" id="inputRegister" value="<?php echo $row['address']?>"></td>
 </tr>
 <tr >
   <td height="28"><div align="right"><strong> Điện thoại:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="telephone" id="inputRegister" value="<?php echo $row['telephone']?>"></td>
 </tr>
 <tr >
   <td height="27"><div align="right"><strong>
     Email:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="email" id="inputRegister" value="<?php echo $row['email']?>" readonly=""></td>
 </tr>
 <tr >
   <td height="27"><div align="right"><strong>Website:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="website" id="inputRegister" value="<?php echo $row['website']?>"></td>
 </tr>
 <tr >
   <td height="35" colspan="2" style="padding-left:50px; text-transform:uppercase"><div align="left"><strong>Thông tin tài khoản</strong><hr /></div></td>
   </tr>
 <tr >
   <td height="28"><div align="right"><strong> ID thành viên:&nbsp;&nbsp;</strong></div></td>
   <td><b style="color:#FF0000"><?php echo @$_SESSION['idcus']?></b></td>
 </tr>
 <tr >
   <td height="28"><div align="right"><strong>
     Tên truy cập:&nbsp;&nbsp;</strong></div></td>
   <td><input type="text" name="username" id="inputRegister" value="<?php echo $row['username']?>" readonly=""></td>
 </tr>
 <tr >
   <td height="26" colspan="2" style="padding-left:50px; text-transform:uppercase"><div align="left"><strong>Lựa chọn thêm </strong><hr /></div></td>
   </tr>
 <tr >
   <td height="26">&nbsp;</td>
   <td><input name="no_email" type="checkbox" id="no_email" value="true" <?php
echo $row['no_email']=='true'?"Checked":""?>/>
     Không muốn nhận bản tin qua email </td>
 </tr>
 <tr >
   <td height="26">&nbsp;</td>
   <td><input name="hidden_email" type="checkbox" id="hidden_email" value="true" <?php
echo $row['hidden_email']=='true'?"Checked":""?>/> 
     Giấu email của tôi</td>
 </tr>
 <tr >
   <td height="26" rowspan="2"><div align="right">
     <?php echo $require?><strong>
     Mã bảo vệ:&nbsp;&nbsp;</strong></div></td>
   <td>
     
    <img src="<?php echo $domain?>/verify.php" />   </td>
 </tr>
 <tr >
   <td><input type="text" name="code"  size="6" style="width:80px;"></td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>
     <input type="submit" name="Send" id="Send" value="Cập nhật thông tin">   </td>
 </tr>
 <tr >
   <td height="29">&nbsp;</td>
   <td>&nbsp;</td>
 </tr>  
 <?php
}?>          
</table>
</form>