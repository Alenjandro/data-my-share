<?php
if(!defined("edocom")) exit ();?>
<?php
include("fckeditor/fckeditor.php") ;?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
   <tr ><td class="proTop textLeftMenu" style="padding-left:10px;" colspan="2"><img src="<?php echo $domain?>/images/icon_muiten.gif" width="11" height="9" />&nbsp;&nbsp;Liên hệ</td>   
   </tr>
   <tr >
       <td style="padding:10px; text-align:center; color:#FF0000">     
          
		<?php
if($_POST['Send']) {
            
            if($_POST['fullname']=='') {
                echo "Mời bạn nhập đầy đủ họ tên";}
                
            elseif($_POST['address']=='') {
                echo "Mời bạn nhập địa chỉ liên hệ";}	
            
            elseif($_POST['telephone']=='') {
                echo "Mời bạn nhập số điện thoại";}	
                
            elseif($_POST['email']=='') {
                echo "Mời bạn nhập địa chỉ Email";}
                
            elseif($_POST['title']=='') {
                echo "Mời bạn nhập tiêu đề";}
            
            elseif($_POST['content']=='') {
                echo "Mời bạn nhập nội dung liên hệ";}
            else {
            
            mysql_query("INSERT INTO ".contact." SET fullname='".$_POST['fullname']."'
            ,address='".$_POST['address']."',telephone='".$_POST['telephone']."',email='".$_POST['email']."'
            ,title='".$_POST['title']."',content='".$_POST['content']."',postdate='".time()."'");
            
            echo "<script>alert('Nội dung liên hệ đã gửi tới chúng tôi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất');location.href='".$domain."';</script>";
            }	
        }
        ?>
       
         <form method="post" action="">
          <table width="98%"  border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td  colspan="2"><?php echo contacts?></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
			<div id="settyper" align="center">Chọn kiểu gõ &nbsp;&nbsp;<input value="1" name="typer" onClick="return Mudim.SetMethod(4);" type="radio">&nbsp;Tự động &nbsp;&nbsp;<input checked="checked" value="1" name="typer" onClick="return  Mudim.SetMethod(2);" type="radio">&nbsp;Telex &nbsp;&nbsp;<input value="1" name="typer" onClick="return  Mudim.SetMethod(1);" type="radio">&nbsp;VNI &nbsp;&nbsp;<input value="0" name="typer" onClick="return Mudim.SetMethod(0);" type="radio">&nbsp;Tắt</div>			</td>
            </tr>
          <tr>
            <td width="103"><div align="right"><strong>
                <?php echo $require?>
            Họ tên:&nbsp;&nbsp;</strong></div></td>
            <td width="608" ><input name="fullname" class="Contact_text" type="text" value="<?php echo $_POST['fullname']?>" ></td>
          </tr>
          <tr>
            <td><div align="right"><strong>
                <?php echo $require?>
            Địa chỉ:&nbsp;&nbsp;</strong></div></td>
            <td><input name="address" class="Contact_text" type="text" value="<?php echo $_POST['address']?>" ></td>
          </tr>
          <tr>
            <td nowrap="nowrap"><div align="right"><strong>
                <?php echo $require?>
            Điện thoại:&nbsp;&nbsp;</strong></div></td>
            <td><input name="telephone" class="Contact_text" type="text" value="<?php echo $_POST['telephone']?>" ></td>
          </tr>
          <tr>
            <td><div align="right"><strong>
                <?php echo $require?>
            Email:&nbsp;&nbsp;</strong></div></td>
            <td><input name="email" class="Contact_text" type="text" value="<?php echo $_POST['email']?>" ></td>
          </tr>
          <tr>
            <td><div align="right"><strong>
                <?php echo $require?>
            Tiêu đề:&nbsp;&nbsp;</strong></div></td>
            <td><input name="title" class="Contact_text" type="text" value="<?php echo $_POST['title']?>" ></td>
          </tr>
          <tr>
            <td><div align="right"><strong>
                <?php echo $require?>
            Nội dung:&nbsp;&nbsp;</strong></div></td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><?php

				$sBasePath = $_SERVER['PHP_SELF'] ;
				$oFCKeditor = new FCKeditor('content') ;
				$oFCKeditor->BasePath	= './fckeditor/' ;
				$oFCKeditor->ToolbarSet = 'Basic';
				$oFCKeditor->EnterMode = 'div';
				$oFCKeditor->Height = 200;
				$oFCKeditor->Value		= '' ;
				$oFCKeditor->Create() ;
			?></td>
            </tr>
          <tr>
            <td></td>
            <td><input name="Send" type="submit" value=" Gửi đi ">
               <input name="Send" type="reset" value="Hủy liên hệ"></td>
          </tr>
        </table>  
        </form>	   
     </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
  </tr>
</table>