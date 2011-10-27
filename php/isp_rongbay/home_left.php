<?php
if(@$_SESSION['idcus']!=''){?>

	<table width="230" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;">
  <tr>
    <td   class="colorTitle" align="center"><strong>Menu thành viên</strong></td>
  </tr>
  <tr>
    <td style="padding-left:5px" class="border">
	<div style="font-weight:bold; color:#FF6600; text-align:center; line-height:25px;">Xin chào: <?php echo @$_SESSION['fullname']?></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/tin-nhan<?php echo $vip?>" class="info">Hộp thư đến</a><?php
$num = NumRow(id,msg,"status='false' AND id_to='".@$_SESSION['idcus']."'");
	if($num>0) echo " (".$num." tin nhắn mới)";?></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/thong-tin-tai-khoan<?php echo $vip?>" class="info">Thông tin tài khoản</a></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/doi-mat-khau<?php echo $vip?>" class="info">Đổi mật khẩu</a></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/quan-ly-tin-dang<?php echo $vip?>" class="info">Quản lý tin đăng</a></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/dang-tin<?php echo $vip?>" class="info">Đăng tin</a></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/thong-ke<?php echo $vip?>" class="info">Thống kê, theo dõi</a></div>
	<div><img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/LogOut<?php echo $vip?>" class="info">Thoát</a></div></td>
  </tr>
</table>
<?php
}?>	
<?php
if($id==''){?>
<table width="230" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;">
      <tr>
        <td   class="colorTitle" align="center"><strong>Hỗ trợ trực tuyến </strong></td>
      </tr>
      <tr>
        <td style="padding-left:5px" class="border">
		<?php
$sqlstr = mysql_query("SELECT yahoo,fullname FROM ".support." WHERE status='true' and yahoo!='' ORDER BY stt");
		if(mysql_num_rows($sqlstr)>0){
		while($row=mysql_fetch_array($sqlstr)){
		?>
		<div class="statis"><a href="ymsgr:sendim?<?php echo $row['yahoo'] ?>" title="<?php echo $row['yahoo'] ?>"> <img src="http://opi.yahoo.com/online?u=<?php echo $row['yahoo'] ?>" border="0" align="absmiddle"/> <?php echo $row['fullname']?></a></div>
		<?php
}}mysql_free_result($sqlstr);?>
		<?php
$sqlstr = mysql_query("SELECT skype,fullname FROM ".support." WHERE status='true' and skype!='' ORDER BY stt");
		if(mysql_num_rows($sqlstr)>0){
		while($row=mysql_fetch_array($sqlstr)){
		?>
		<div class="statis"><a href="skype:<?php echo $row['skype']?>?chat" title="<?php echo $row['skype']?>"><img src="<?php echo $domain ?>/images/skype2.gif" style="border: medium none ;" alt="Skype Me™!"> <?php echo $row['fullname']?></a></div>
		<?php
}}mysql_free_result($sqlstr);?>
		<div style="padding:5px 0 5px; color:#FF0000; font-weight:bolder; font-size:18px" align="center"><?php echo hotline?></div>
		</td>
      </tr>
</table>
	<table width="230" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;">
      <tr>
        <td   class="colorTitle" align="center"><strong>Tiện ích </strong></td>
      </tr>
      <tr>
        <td style="padding:5px;" class="border">
		<div style="height:25px;"><img src="<?php echo $domain?>/images/forex.png" />&nbsp;&nbsp;<strong>Tỷ giá</strong></div>
		<div style="overflow:auto; height:61px;">
		<script type="text/javascript" language="JavaScript" src="http://vnexpress.net/Service/Forex_Content.js"></script>
        <script language="JavaScript" type="text/javascript">
document.write("<table width='100%' cellpadding='3' cellspacing='0' border='1' style='border-collapse:collapse;' align='center'  bordercolor='#DBDBDB'><tr><td align='Left' width='25%'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[0] +"</td><td align=left width='25%'>"+ vCosts[0]+" </td><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[10] +"</td><td align=left>"+ vCosts[10] +"</td></tr>");
document.write("<tr><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[1] +"</td><td align=left>"+ vCosts[1] +"</td><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[3] +"</td><td align=left>"+ vCosts[3] +"</td></tr>");
document.write("<tr><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[6] +"</td><td align=left>"+ vCosts[6] +"</td><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[2] +"</td><td align=left>"+ vCosts[2] +"</td></tr>");
document.write("<tr><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[4] +"</td><td align=left>"+ vCosts[4] +"</td><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[5] +"</td><td align=left>"+ vCosts[5] +"</td></tr>");
document.write("<tr><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[7] +"</td><td align=left>"+ vCosts[7] +"</td><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[8] +"</td><td align=left>"+ vCosts[8] +"</td></tr>");
document.write("<tr><td align='Left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ vForexs[9] +"</td><td align=left>"+ vCosts[9] +"</td></tr></table>");
       </script>
	   </div>
	   <div style="padding:5px 0 5px 0"><img src="<?php echo $domain?>/images/gold.png" />&nbsp;&nbsp;<strong>Giá vàng</strong></div>
	   <script type="text/javascript" language="JavaScript" src="http://vnexpress.net/Service/Gold_Content.js"></script>
        <script language="JavaScript" type="text/javascript">
document.write("<table width='100%' border='1' cellpadding='3' bordercolor='#DBDBDB' cellspacing='0' style='border-collapse:collapse' align='center'><tr><td align='center'>Loại</td><td align='center' width='35%'>Mua vào</td><td align=center width='35%'>Bán ra</td></tr>");
document.write("<tr><td align='center'>SBJ</td><td align='right'>"+ vGoldSbjBuy +"</td><td align=right>"+ vGoldSbjSell  +"</td></tr>");
document.write("<tr><td align='center'>SJC</td><td align='right'>"+ vGoldSjcBuy +"</td><td align=right>"+ vGoldSjcSell +"</td></tr></table>");
         </script>
		</td>
      </tr>
</table>
<?php
}?>
<table width="230" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;">
  <tr>
    <td   class="colorTitle" align="center"><strong><?php echo adsright?></strong></td>
  </tr>
  <tr>
    <td   class="border" align="center" style="padding-top:5px;">
<?php
$sqlstr="SELECT link,picture,height,width FROM ".ads." WHERE status='true' AND alignment='2'";
if($id=='danh-muc'||$id=='tin-chi-tiet') {
  CategorySesion(menu_product,$id_1);
   $sqlstr.=" AND category in (".$id_product.")";
  } else {
  $sqlstr.=" AND (category='0' OR category='')";
  }
  $sqlstr.=" ORDER BY stt";
$sqlstr=mysql_query($sqlstr);
	if(mysql_num_rows($sqlstr)>0) {
	while($row=mysql_fetch_array($sqlstr)){
?> 

<?php
if(preg_match("#swf$#i", $row['picture'])){?>
<div align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="<?php
echo $row['width']!=''?$row['width']:"220"?>" <?php
echo $row['height']!='0'?'height="'.$row['height'].'"':""?>>
  <param name="movie" value="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" />
  <param name="quality" value="high" />
  <embed src="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php
echo $row['width']!='0'?$row['width']:"220"?>" <?php
echo $row['height']!='0'?'height="'.$row['height'].'"':""?>></embed>
</object></embed></div>
<?php
}else{?>
	<div align="center"><a href="<?php echo $row['link']?>" target="_blank"><img src="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" border="0" style="margin-bottom:5px;" width="<?php
echo $row['width']!='0'?$row['width']:"220"?>" <?php
echo $row['height']!='0'?'height="'.$row['height'].'"':""?>/></a></div>
<?php
}?>
<?php
}}mysql_free_result($sqlstr);?>

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:4px;">
  <tr>
  <?php
$sqlstr="SELECT link,picture,height,width FROM ".ads." WHERE status='true' AND alignment='6' ";
if($id=='danh-muc'||$id=='tin-chi-tiet') {
  CategorySesion(menu_product,$id_1);
   $sqlstr.=" AND category in (".$id_product.")";
  } else {
  $sqlstr.=" AND (category='0' OR category='')";
 
  } 
 $sqlstr.=" ORDER BY stt";
$sqlstr=mysql_query($sqlstr);
if(mysql_num_rows($sqlstr)>0) { $i=0;
while($row=mysql_fetch_array($sqlstr)){ $i+=1;
?>
    <td valign="top">
	<?php
if(preg_match("#swf$#i", $row['picture'])){?>
<div align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="<?php
echo $row['width']!='0'?$row['width']:"105"?>" <?php
echo $row['height']!='0'?'height="'.$row['height'].'"':""?>>
  <param name="movie" value="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" />
  <param name="quality" value="high" />
  <embed src="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php
echo $row['width']!='0'?$row['width']:"105"?>" <?php
echo $row['height']!='0'?'height="'.$row['height'].'"':""?>></embed>
</object></embed></div>
<?php
}else{?>
	<a href="<?php echo $row['link']?>" target="_blank"><img src="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" border="0" style="margin-bottom:5px;" width="<?php
echo $row['width']!='0'?$row['width']:"105"?>" <?php
echo $row['height']!='0'?'height="'.$row['height'].'"':""?>/></a>
<?php
}?>
	</td>
  <?php
if($i%2=='0') echo '</tr>';?>
  <?php
}}mysql_free_result($sqlstr);?>
</table>

	</td>
  </tr>
</table>
<?php
if($id==''){?>
<table width="230" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td   class="colorTitle" align="center"><strong>Thống kê truy cập</strong></td>
  </tr>
  <tr>
	<td style="padding-left:10px" class="border">
	<div class="statis">Tổng số thành viên: <span><?php echo NumRow(id,members,"status='true'")?></span></div>
	<div class="statis">Số tin đăng: <span><?php echo NumRow(id,userpost,"status='true'")?></span></div>
	<div class="statis">Thành viên truy cập: <span><?php echo $members?></span></div>
	<div class="statis">Khách truy cập: <span><?php echo $visits?></span></div>
	<div class="statis">Tổng số lượt truy cập: <span><?php echo $visited?></span></div>
	</td>
  </tr>
</table>
<?php
}?>