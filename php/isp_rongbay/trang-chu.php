<?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<script language="JavaScript">
var ADS_slide = new Banner('ADS_slide');
<?php
$sql=mysql_query("SELECT link,picture,width,height FROM ".ads." WHERE status='true' AND alignment='8' order by stt");
	  if(mysql_num_rows($sql)>0) { 
	  while($rs=mysql_fetch_array($sql)){
	  if(!preg_match("#swf$#i", $rs['picture'])){
?>
ADS_slide.add( "IMAGE", "<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>", 15, <?php
echo $rs['height']!='0'?$rs['height']:"200"?>, <?php
echo $rs['width']!='0'?$rs['width']:"760"?>, "<?php echo $rs['link']?>", '');
<?php
}else{?>
ADS_slide.add( "FLASH", "<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>", 15, <?php
echo $rs['height']!='0'?$rs['height']:"200"?>, <?php
echo $rs['width']!='0'?$rs['width']:"760"?>, "", '');
<?php
}}}?>
</script>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
<?php
if(slidehome == '2') {?>   
<tr>
    <td align="center">
	<script>
			try {document.write( ADS_slide);ADS_slide.start();}catch(e){}
	</script>
	</td>
  </tr>
<?php
}?>
  <tr>
    <td height="5px"></td>
  </tr>
  <tr>
    <td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
<?php
$sqlstr = mysql_query("SELECT * FROM ".menu_product." WHERE status='true' AND parent='0' ORDER BY stt ASC");
 if(mysql_num_rows($sqlstr) > 0) { $i = 0;
 while($row = mysql_fetch_array($sqlstr)){ $i += 1;
?>	     
        <td  valign="top" class="boderHome" width="33%">
		 <table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
		  <tr>
            <td style="height:22px; border:#FFFFFF 1px solid;" <?php
echo $row['bgcolor']==''?'class="colorTitle"':"bgcolor=".$row['bgcolor'];?>>
			<div class="titleCatHome"><a href="<?php echo $domain?>/danh-muc/<?php echo $row['id']?>/<?php echo convertSpace($row['category'])?><?php echo $vip?>" class="titleCategory" onmouseover="this.style.color='#<?php echo $row['hovercolor']?>'" onmouseout="this.style.color='#<?php echo $row['color']?>'"><?php echo $row['category']?></a> (<?php echo NumRow("categories", "raovat_userpost", " status='true' AND categories = '".$row['id']."'")?>)</div>
			</td>
            </tr>
          <tr>
            <td>
<?php
$sqlsub = mysql_query("SELECT id,category FROM ".menu_product." WHERE status='true' AND parent='".$row['id']."' ORDER BY stt ASC");
 if(mysql_num_rows($sqlsub) > 0) { $j=0;
 while($rowsub = mysql_fetch_array($sqlsub)){ $j+=1;
  $sql = mysql_query("SELECT * FROM ".menu_service." WHERE status='true' AND parent='".$row['id']."'");
 if(mysql_num_rows($sql) > 0) {
 		if($j%2=='0') echo "<div style=\"line-height:22px;  height:22px; float:right; width:49%\">";
		else echo "<div style=\"line-height:22px; float:left;  height:22px; width:49%\">";
 }else{
?>	
	<div style="padding-left:10px; line-height:22px; height:22px;">
<?php
}mysql_free_result($sql);?>

<img src="<?php echo $domain?>/images/arrow4.gif" /><a href="<?php echo $domain?>/danh-muc/<?php echo $row['id']?>/p<?php echo $rowsub['id']?>/<?php echo convertSpace($row['category'])."-".convertSpace($rowsub['category'])?><?php echo $vip?>" class="categoryName"><?php echo $rowsub['category']?></a></div>

    <?php
}}mysql_free_result($sqlsub);?></td>
      </tr>
          <tr>
            <td style="padding-left:5px;">
<?php
$sqlsub = mysql_query("SELECT id,category FROM ".menu_service." WHERE status='true' AND parent='".$row['id']."' ORDER BY stt ASC");
 if(mysql_num_rows($sqlsub) > 0) { $j=0;
 while($rowsub = mysql_fetch_array($sqlsub)){  $j+=1;
?>	
<div <?php
if($j%2=='0'){ echo "style=\"float:right; width:49%; line-height:18px; height:18px; \""; }else{ echo "style=\"float:left; width:49%; line-height:18px;\"";}?> >
<img src="<?php echo $domain?>/images/bullet_arrow.gif" />&nbsp;<a href="<?php echo $domain?>/danh-muc/<?php echo $row['id']?>/n<?php echo $rowsub['id']?>/<?php echo convertSpace($row['category'])."-".convertSpace($rowsub['category'])?><?php echo $vip?>" class="categoryParent"><?php echo $rowsub['category']?></a></div>
<?php
}}mysql_free_result($sqlsub);?></td>
          </tr>		  
        </table>
		</td>
		<?php
if($i%3!='0') echo "<td width='3'></td>";?>
        <?php
if($i%3=='0') echo "</tr><tr><td height='3' colspan='10'></td></tr>";?>
<?php
if($i%6=='0'){?>
		<tr><td style="padding:5px 0 5px 0" colspan="10">
<?php
if($i=='6')$p=0; else $p=($i/6)-1;
	  $sql=mysql_query("SELECT link,picture,height,width FROM ".ads." WHERE status='true' AND alignment='5' limit $p,1");
	  if(mysql_num_rows($sql)>0) { 
	  while($rs=mysql_fetch_array($sql)){
	  if(!preg_match("#swf$#i", $rs['picture'])){
?>  		
            <a href="<?php echo $rs['link']?>" target="_blank"><img src="<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>" width="<?php
echo $rs['width']!='0'?$rs['width']:"760"?>" <?php
echo $rs['height']!='0'?'height="'.$rs['height'].'"':""?> border="0"></a>
<?php
}else{?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="<?php
echo $rs['width']!='0'?$rs['width']:"760"?>" <?php
echo $rs['height']!='0'?'height="'.$rs['height'].'"':""?>>
  <param name="movie" value="<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>">
  <param name="quality" value="high">
  <param name="wmode" value="transparent" /> 
  <embed src="<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>" quality="high"	align="middle"    wmode="transparent"	allowScriptAccess="always"	swLiveConnect="true"	type="application/x-shockwave-flash"	pluginspage="http://www.macromedia.com/go/getflashplayer" width="<?php
echo $rs['width']!='0'?$rs['width']:"760"?>" <?php
echo $rs['height']!='0'?'height="'.$rs['height'].'"':""?>></embed>
</object>
<?php
}}}mysql_free_result($sql);?>
</td></tr>		  
<?php
}}}mysql_free_result($sqlstr);?>
  
    </table>
	</td>
  </tr>
  <tr>
  <td style="padding-top:5px;">
  <?php
$sql=mysql_query("SELECT link,picture,height,width FROM ".ads." WHERE status='true' AND alignment='7'");
	  if(mysql_num_rows($sql)>0) { 
	  while($rs=mysql_fetch_array($sql)){
	  if(!preg_match("#swf$#i", $rs['picture'])){
?>  		
            <a href="<?php echo $rs['link']?>" target="_blank"><img src="<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>" width="<?php
echo $rs['width']!='0'?$rs['width']:"760"?>" <?php
echo $rs['height']!='0'?'height="'.$rs['height'].'"':""?> border="0"></a>
<?php
}else{?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="<?php
echo $rs['width']!='0'?$rs['width']:"760"?>" <?php
echo $rs['height']!='0'?'height="'.$rs['height'].'"':""?>>
  <param name="movie" value="<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>">
  <param name="quality" value="high">
  <param name="wmode" value="transparent" /> 
  <embed src="<?php echo $domain?>/images/ads/<?php echo $rs['picture']?>" quality="high"	align="middle"    wmode="transparent"	allowScriptAccess="always"	swLiveConnect="true"	type="application/x-shockwave-flash"	pluginspage="http://www.macromedia.com/go/getflashplayer" width="<?php
echo $rs['width']!='0'?$rs['width']:"760"?>" <?php
echo $rs['height']!='0'?'height="'.$rs['height'].'"':""?>></embed>
</object>
<?php
}}}mysql_free_result($sql);?>
  </td>
  </tr>
  </table>
