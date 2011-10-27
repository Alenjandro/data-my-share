<?php
if(!defined("edocom")) exit ();?>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
  <script src="<?php echo $domain?>/css/fetchscript.php" type="text/javascript"></script>
  <link href="<?php echo $domain?>/css/fetchscript.css" type="text/css" rel="stylesheet">
  <script language="javascript" src="<?php echo $domain?>/css/tabcontent.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $domain?>/css/tabcontent.css">
<?php
$sqlstr = mysql_query("SELECT * FROM ".shop." WHERE id='".intval($id_2)."'");				
    if(mysql_num_rows($sqlstr)>0) {	    
    $row=mysql_fetch_array($sqlstr); 
	mysql_query("UPDATE ".shop." SET view=view+1 WHERE id='".intval($id_2)."'");
?> 
<title><?php echo strip_tags($row['content'])?></title>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2" class="proTop textLeftMenu" style="padding-left:10px;">&nbsp;&nbsp;Chi tiết sản phẩm</td>
  </tr>
   <tr >
     <td height="30" colspan="2" style="padding-top:10px;">
<?php
$sql=mysql_query("SELECT * FROM ".members." WHERE status='true' AND id = '".text($row['idmember'])."'");
if(mysql_num_rows($sql)>0) {	
$rows=mysql_fetch_array($sql); ?>	 
	 <table width="100%" border="0" cellpadding="5" cellspacing="0" style="border-bottom:#005CB9 1px dotted">
       <tr>
         <td width="10%" rowspan="5" valign="top"><?php
if($rows['picture']!=''){?><img src="<?php echo $domain?>/images/members/<?php echo $rows['picture']?>" border="0" width="90" height="100px" style="margin-right:10px;"/><?php
}else{?><img src="<?php echo $domain?>/images/avatar.gif" /><?php
}?></td>
         <td width="79%">Người đăng tin: <strong><?php echo $rows['username']?></strong></td>
       </tr>
       <tr>
         <td>Ngày tham gia: <?php echo date("d.m.Y",$rows['postdate'])?></td>
       </tr>
	<?php
if($rows['hidden_email']!='false'){?>    
       <tr>
         <td>Email: <a href="mailto:<?php echo $row['email']?>"><?php echo $rows['email']?></a></td>
       </tr><?php
}?>
       <tr>
         <td>Nơi ở: <?php echo $rows['address']?> - Phone: <?php echo $row['telephone']?></td>
       </tr>
       <tr>
         <td>Website: <a href="<?php echo $row['website']?>" target="_blank"><?php echo $row['website']?></a></td>
       </tr>
     </table>
	 <?php
}?></td>
   </tr>
   <tr >
     <td colspan="2" style="padding:10px">
		<div align="justify"><?php
if($row['picture']!=""){?>
		<?php
$pic = explode('|',$row['picture']);	  ?>
		<?php
$size = getimagesize('images/product/'.$pic[1]);		?>
		
		<a href="<?php echo $domain?>/images/product/<?php echo $pic[1]?>"  rel="lightbox[product]"><img src="<?php echo $domain ?>/images/product/<?php echo $pic[1]?>"  <?php
echo  $size[0]>150?'width=150px':'' ;?> border="0" align="left" style="margin-right:10px;"></a>
	<?php
$picture = explode('|',$row['picture']);	  
			    $i = 0; 		     
				foreach($picture as $pic) {
				$i += 1; 
				if(@is_file('images/product/'.$pic)) {
				$size = @getimagesize('images/product/'.$pic);
			echo	"<a href=\"".$domain."/images/product/".$pic."\"  rel=\"lightbox[product]\"></a>";
				}}
	?>		
   
   <?php
}?><span style="color:#FF0000; font-weight:bolder; font-size:16px"><?php echo $row['title']?></span><br />
<?php echo $row['content']?></div>	 </td>
  </tr>
   <tr >
     <td colspan="2">
	 	 <ul id="countrytabs" class="shadetabs" style="width:760px">
						<li ><a href="#tab1" rel="country1" class="selected">Gửi phản hồi </a></li>
						<li><a href="#tab2" rel="country2">Gửi tin nhắn </a></li>							
					  </ul>
						
						<div style=" width:100%; ">
						
						<div id="country1" class="tabcontent">
						  <form id="form1" name="form1" method="post" action="">
						  
						    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" style="border-collapse:collapse;  background:#f0f0f0;">
                              <tr>
                                <td colspan="4" style="color:#FF0000" align="center">
<?php
if($_POST['phanhoi']){
		if(@$_SESSION['idcus']==''){
			echo "<script>alert('Bạn phải đăng nhập để sử dụng mục này.');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		}else{
			if($_POST['email']=='') echo "Mời bạn nhập email của bạn";
			elseif($_POST['content']=='') echo "Mời bạn nhập nội dung phản hồi";
			elseif(text($_POST['code'])!= @$_SESSION["code"]) echo "Bạn nhập mã bảo vệ không chính xác";
			else{
				mysql_query("INSERT INTO ".feedback." SET telephone = ".text($_POST['telephone']).", email='".text($_POST['email'])."', content='".textContent($_POST['content'])."',id_news='".intval($id_2)."',id_member='".@$_SESSION['idcus']."',shop='1',postdate='".time()."'");
				echo "<script>alert('Cám ơn bạn đã gửi ý kiến phản hồi.');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			}}
	}
?>								</td>
                              </tr>
                              <tr>
                                <td colspan="3" style="padding-left:30px"><input name="telephone" type="text" id="telephone" style="width:320px; color:#999999" onfocus="if(value=='Số điện thoại') value=''" onblur="if(value=='') value='Số điện thoại'" value="Số điện thoại"/></td>
                                <td width="35%" ><input name="email" type="text" id="email" style="width:320px; color:#999999" onfocus="if(value=='Email') value=''" onblur="if(value=='') value='Email'" ONMOUSEOVER="showtip('Email của bạn sẽ không được hiển thị')" ONMOUSEOUT="hidetip()" value="Email"/></td>
                              </tr>
                              <tr>
                                <td colspan="4" style="padding-left:30px"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><textarea name="textarea" id="textarea" style="width:700px; height:60px;"></textarea></td>
                                    </tr>
                                  </table></td>
                              </tr>
                              <tr>
                                <td width="15%" style="padding-left:30px"><input type="text" name="code"  size="6" style="width:80px;" ONMOUSEOVER="showtip('Nhập chính xác 6 ký tự bên cạnh')" ONMOUSEOUT="hidetip()"/></td>
                                <td width="5%" align="left" ><img src="<?php echo $domain?>/verify.php"/></td>
                                <td width="20%" align="center" ><input name="phanhoi" type="submit" id="phanhoi" value="Gửi phản hồi" /></td>
                                <td >&nbsp;</td>
                              </tr>
                            </table>
                          </form>
						</div>
						<div id="country2" class="tabcontent">
<form id="form2" name="form2" method="post" action="">
						  
						    <table width="100%" border="0" style="border-collapse:collapse;  background:#f0f0f0;" cellspacing="0" cellpadding="5">
                              <tr>
                                <td style="color:#FF0000" align="center">
<?php
if($_POST['nhantin']){
			if($_POST['title']=='') echo "Mời bạn nhập tiêu đề tin nhắn";
			elseif($_POST['content']=='') echo "Mời bạn nhập nội dung tin nhắn";
			else{
				mysql_query("INSERT INTO ".msg." SET title='".text($_POST['title'])."',content='".textContent($_POST['content'])."',id_from='".@$_SESSION['idcus']."',id_to='".$row['memberid']."',postdate='".time()."'");
				mysql_query("INSERT INTO ".msg1." SET title='".text($_POST['title'])."',content='".textContent($_POST['content'])."',id_from='".@$_SESSION['idcus']."',id_to='".$row['memberid']."',postdate='".time()."'");
				echo "<script>alert('Bạn đã nhắn tin thành công.');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
			}
	}
?>								</td>
                              </tr>
                              <tr>
                                <td style="padding-left:30px"><input name="title" type="text" id="title" style="width:700px; color:#999999" onfocus="if(value=='Tiêu đề') value=''" onblur="if(value=='') value='Tiêu đề'" value="Tiêu đề"/></td>
                              </tr>
                              <tr>
                                <td style="padding-left:30px"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><textarea name="content" id="content" style="width:700px; height:60px; "></textarea></td>
                                    </tr>
                                  </table></td>
                              </tr>
                              <tr>
                                <td align="right" style="padding-right:22px"><input name="nhantin" type="submit" id="nhantin" value="Gửi tin nhắn" /></td>
                              </tr>
                            </table>
                          </form>
</div>
						</div>	 </td>
   </tr>
      <tr>
      <td width="2%"><img src="<?php echo $domain?>/images/Ask.gif" width="35" height="35" style="padding-right:5px; padding-bottom:10px;"/>
       </td>
      <td width="98%" style="font-size:20px; font-family:Times New Roman; color:#E10000"><?php echo NumRow(id,feedback,"id_news='".intval($id_2)."'")?> phản hồi</td>
    </tr>
  <tr><td colspan="3"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
$sqlstr = mysql_query("SELECT * FROM ".feedback." WHERE id_news='".intval($id_2)."' AND shop='1' ORDER BY id DESC");				
    if(mysql_num_rows($sqlstr)>0) {	    
    while($row=mysql_fetch_array($sqlstr)){ 
	$sql = mysql_query("SELECT * FROM ".members." WHERE id='".intval($row['id_member'])."' AND status='true'");				
    if(mysql_num_rows($sql)>0) {	    
    $rowpic=mysql_fetch_array($sql);
?> 
    <tr>
      <td style="border-bottom:#999999 1px solid"><?php
if($rowpic['picture']!=''){?><img src="<?php echo $domain?>/images/members/<?php echo $rowpic['picture']?>" align="left" style="margin-right:15px; margin-bottom:10px; width:50px; height:50px;"/><?php
}else{?><img src="<?php echo $domain?>/images/50x50.gif" align="left" style="margin-right:15px; margin-bottom:10px"/><?php
}?><span style="color:#FF6600; font-weight:bold"><?php
Members($row['id_member'],members)?></span> - Lúc <?php echo date("h:m:s A, d.m.Y")?><br />
<?php echo $row['content']?></td>
    </tr>
<?php
}}}?>	
  </table></td></tr> 
</table>
<?php
}?>   
<script type="text/javascript">
						
						var countries=new ddtabcontent("countrytabs")
						countries.setpersist(true)
						countries.setselectedClassTarget("link") //"link" or "linkparent"
						countries.init()
						
						</script>
<?php
include "css/nicEdit.php"?>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>						