  <table width="100%" border="0" cellspacing="0" cellpadding="0"  align="center">
    <tr>
      <td height="5"></td>
    </tr>
	<tr>
      <td align="center" class="bgMenu"></td>
      <td align="center" class="bgMenu"><a href="<?php echo $domain ?>" class="menu-top">Trang chủ</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/gioi-thieu<?php echo $vip ?>" class="menu-top">Giới thiệu</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/huong-dan<?php echo $vip ?>" class="menu-top">Hướng dẫn </a>
	  <?php
if(@$_SESSION['idcus']==""){?><span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/dang-ky-thanh-vien<?php echo $vip ?>" class="menu-top">Đăng ký</a> <?php
}?>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/dang-nhap<?php echo $vip ?>" class="menu-top">Đăng nhập</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/dang-tin<?php echo $vip ?>" class="menu-top">Đăng tin</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/lien-he<?php echo $vip ?>" class="menu-top">Liên hệ</a></td>
     
	  <td align="center"  class="bgMenu">&nbsp;</td>
      
      <td height="30" align="right" class="bgMenu" style="color:#3E3E3E; font-weight:bold">Bạn đang xem tin tại: <span id="chooseCityButton" class="other" onmouseover="fn_over_chooseCityButton(this)" onmouseout="fn_out_chooseCityButton(this)" onclick="fn_click_chooseCityButton(this)" style="cursor:pointer; color:#FFFFFF; padding-right:20px"><?php
if(@$_SESSION['province']!=''){?><?php
Province(@$_SESSION['province'],tinh);?><?php
}else{ echo "Toàn quốc";}?>&nbsp;<img src="<?php echo $domain?>/images/arrow_bottom.gif" /></span></td>
    </tr>
    <tr>
      <td height="5"></td>
    </tr>
  </table>
<div style="display: none;" id="chooseCity">
<div><img style="cursor: none;" src="<?php echo $domain?>/images/i_close2.gif" class="boxClose" onmouseover="fn_over_boxClose(this)" onmouseout="fn_out_boxClose(this)" onclick="fn_click_boxClose()" width="13" height="13"></div>
<div class="AllCity"><a href="<?php echo $domain?>/all.php">- Toàn quốc -</a></div>               
<div class="RegionPanel">
<div style="float: left;">
<div class="Region">Miền bắc</div>
<?php
$sqlstr=mysql_query("SELECT tid,name FROM ".tinh." WHERE status='true' AND regions='1' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {
	  while($row=mysql_fetch_array($sqlstr)){
?> 
<div><a href="<?php echo $domain?>/index.php?page=province&province=<?php echo $row['tid']?>"><?php echo $row['name']?></a></div>
<?php
}}mysql_free_result($sqlstr);?>
</div>             
<div style="float: left;">
<div class="Region">Miền trung</div>
<?php
$sqlstr=mysql_query("SELECT tid,name FROM ".tinh." WHERE status='true' AND regions='2' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {
	  while($row=mysql_fetch_array($sqlstr)){
?> 
<div><a href="<?php echo $domain?>/index.php?page=province&province=<?php echo $row['tid']?>"><?php echo $row['name']?></a></div>
<?php
}}mysql_free_result($sqlstr);?>
</div>            
<div style="float: left;">
<div class="Region">Miền nam</div>
<?php
$sqlstr=mysql_query("SELECT tid,name FROM ".tinh." WHERE status='true' AND regions='3' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {
	  while($row=mysql_fetch_array($sqlstr)){
?> 
<div><a href="<?php echo $domain?>/index.php?page=province&province=<?php echo $row['tid']?>"><?php echo $row['name']?></a></div>
<?php
}}mysql_free_result($sqlstr);?>
</div>            
</div>        
</div>
<div class="enbacContent" align="center">
  <div style="clear: both;"><span></span></div>

</div>
