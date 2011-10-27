<?php
if(!defined("edocom")) exit ();?>
<script language="javascript" src="<?php echo $domain?>/css/tabcontent.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $domain?>/css/tabcontent.css">
<script src="<?php echo $domain?>/css/fetchscript.php" type="text/javascript"></script>
  <link href="<?php echo $domain?>/css/fetchscript.css" type="text/css" rel="stylesheet">
<?php
include "css/nicEdit.php"?>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr>
	<td colspan="2" style="border-bottom:#d4ddec 1px solid" >
	<?php
include'category.php';?></td>
  </tr>
  <tr>
    <td colspan="2" style="border-bottom:#5dc725 1px solid" >&nbsp;</td>
  </tr> 
    <tr>
      <td colspan="2" class="proCenter" style="padding-left:10px; padding-right:10px; ">
<?php
$sqlstr=mysql_query("SELECT * FROM ".userpost." WHERE status='true' AND id='".intval($id_2)."' ORDER BY id DESC");
	 mysql_query("UPDATE ".userpost." SET view=view+1 WHERE id='".intval($id_2)."'");
	 if(@$_SESSION['idcus']!='') { mysql_query("UPDATE ".members." SET view=view+1 WHERE id='".intval(@$_SESSION['idcus'])."'");}
	 if(mysql_num_rows($sqlstr)>0) {
	 $row=mysql_fetch_array($sqlstr);
?>
<title><?php echo $row['title']?> - <?php echo title?></title>
		<div style="height:25px;"><img src="<?php echo $domain?>/images/icon.gif" />&nbsp;<span class="Title">Tiêu đề tin</span></div>
		<div class="textTitle"><?php echo $row['title']?></div>
		<div style="height:25px;"><strong>Người đăng: </strong>
<?php
if($row['memberid']>0){
	$sqlstrid=mysql_query("SELECT * FROM ".members." WHERE id='".intval($row['memberid'])."' AND status='true' ");
	if(mysql_num_rows($sqlstrid)>0)   {
	$rowid=mysql_fetch_array($sqlstrid); 
		echo  "<a href=\"".$domain."/tin-thanh-vien/".$rowid['id']."".$vip."\">".$rowid['fullname']."</a>";
		if($rowid['online']=='true') echo "&nbsp;<img border=0 src=\"".$domain."/images/online_text.gif\"/>&nbsp;";
		if($rowid['hidden_email']!='true'){ echo " - <b>Email: </b><a href=\"mailto:'".$rowid['email']."'\">".$rowid['email']."</a>";	}	
}}else echo "Khách vãng lai";
?>
		 <strong>- <?php
if($row['place']=='0') { echo "Toàn quốc";}{?><?php
Province($row['place'],tinh);?><?php
}?></strong></div>
		<div><strong>Ngày đăng: </strong><?php echo date("d.m.Y H:m")?>. - <strong>Lượt xem: </strong><?php echo $row['view']?></div>
		<div><img src="<?php echo $domain?>/images/icon.gif" />&nbsp;<span class="Title">Thông tin liên hệ</span></div>
		<div><strong>Người liên hệ: <?php echo $row['fullname']?></strong></div>
		<div><strong>Địa chỉ:</strong> <?php echo $row['address']?></div>
		<div><strong>Điện thoại:</strong> <?php echo $row['telephone']?></div>
		<div><strong>Email:</strong> <a href="mailto:<?php echo $row['email']?>" style="color:#0000FF"><?php echo $row['email']?></a></div>
		
		<div><img src="<?php echo $domain?>/images/icon.gif" />&nbsp;<span class="Title">Nội dung</span></div>
		<div align="justify" style="padding:10px;">
		  <?php
if($row['picture']!=''){?>
		  <?php
$pic = explode('|',$row['picture']);	  ?>
		  <?php
$size = getimagesize('images/product/'.$pic[1]);?>
		  <a href="<?php echo $domain?>/images/product/<?php echo $pic[1]?>"  rel="lightbox[product]"><img src="<?php echo $domain ?>/images/product/<?php echo $pic[1]?>"  <?php
echo  $size[0]>100?'width=100px':'' ;?> border="0" align="right" style="margin-left:10px;"></a>
	<?php
$picture = explode('|',$row['picture']);	  		     
				foreach($picture as $pic) { 
				if(@is_file('images/product/'.$pic)) {
				$size = @getimagesize('images/product/'.$pic);
			echo	"<a href=\"".$domain."/images/product/".$pic."\"  rel=\"lightbox[product]\"></a>";
				}}
	?><?php
}?>
		  <?php echo $row['content']?>
		</div>	</td>
  </tr>
<?php
if(@$_SESSION['idcus']!=''){?>  
    <tr>
      <td height="50" colspan="2" align="right" class="proCenter"><img src="<?php echo $domain?>/images/BackUp.gif" width="20" height="20" /><a href="<?php echo $domain?>/luu-tin/<?php echo $id_2?><?php echo $vip?>" style="color:#333333; text-decoration:none; font-weight:bold; padding-right:20px;"> Lưu lại để đọc sau &raquo;</a></td>
    </tr>
<?php
}?>	
	<tr>
                <td colspan="2" style="border-top:#5dc725 1px solid" >&nbsp;</td>
  </tr>
	<tr>
	  <td colspan="2" >
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
			if($_POST['email']=='Email') echo "Mời bạn nhập email của bạn";
			elseif(!eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$',$_POST['email'])) echo "Email của bạn không hợp lệ";
			elseif($_POST['content']=='') echo "Mời bạn nhập nội dung phản hồi";
			elseif(text($_POST['code'])!= @$_SESSION["code"]) echo "Bạn nhập mã bảo vệ không chính xác";
			else{
				mysql_query("INSERT INTO ".feedback." SET telephone='".$_POST['telephone']."', email='".$_POST['email']."', content='".$_POST['content']."',id_news='".intval($id_2)."',id_member='".@$_SESSION['idcus']."',postdate='".time()."'");
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
                                <td colspan="4" style="padding-left:30px"><div style="background:#FFFFFF; width:698px;"><textarea name="content" id="content" style="width:700px; height:60px;"></textarea></div></td>
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
			if($_POST['title']=='Tiêu đề') echo "Mời bạn nhập tiêu đề tin nhắn";
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
                                <td style="padding-left:30px">
                                  <div style="background:#FFFFFF; width:698px;"><textarea name="content" id="content" style="width:700px; height:60px; "></textarea></div>								  </td>
                              </tr>
                              <tr>
                                <td align="right" style="padding-right:22px"><input name="nhantin" type="submit" id="nhantin" value="Gửi tin nhắn" /></td>
                              </tr>
                            </table>
                          </form>
</div>
						</div>	  </td>
  </tr>
    <tr>
      <td width="4%"><img src="<?php echo $domain?>/images/Ask.gif" width="35" height="35" style="padding-right:5px; padding-bottom:10px;"/></td>
      <td width="96%" style="font-size:20px; font-family:Times New Roman; color:#E10000"><?php echo NumRow(id,feedback,"id_news='".intval($id_2)."'")?> phản hồi </td>
    </tr><?php
}?>
  <tr><td colspan="2"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
$sqlstr = mysql_query("SELECT id_member,postdate,content FROM ".feedback." WHERE id_news='".intval($id_2)."'  ORDER BY id DESC");				
    if(mysql_num_rows($sqlstr)>0) {	    
    while($row=mysql_fetch_array($sqlstr)){ 
?> 
    <tr>
      <td style="border-bottom:#999999 1px dotted; padding-top:3px;"><img src="<?php echo $domain?>/images/<?php
echo is_file("images/members/".anhthanhvien($row['id_member'],members))?"members/".anhthanhvien(members,$row['id_member']):"50x50.gif"?>" align="left" style="margin-right:15px; margin-bottom:10px; width:50px; height:50px;"/><span style="color:#FF6600; font-weight:bold"><?php
Members($row['id_member'],members)?></span> - Lúc <?php echo date("h:m:s A, d.m.Y",$row['postdate'])?><br />
<?php echo $row['content']?></td>
    </tr>
<?php
}}?>	
  </table></td></tr>
</table>
<script type="text/javascript">

var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()

</script>

