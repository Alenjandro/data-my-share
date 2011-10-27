<script language="JavaScript" src="<?php echo $domain?>/css/func.js"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td  align="center" colspan="3" style="padding:5px 0 5px; border:#CCCCCC 1px solid" height="100">
<script language="JavaScript" src="<?php echo $domain?>/css/func.js"></script>
	<script language="javascript">
	<!--
		var iedom=document.all||document.getElementById;
		var sliderwidth="990px";

		var sliderheight="105px";

		var slidespeed=1;

		slidebgcolor="";

		var leftrightslide=new Array()
		var finalslide='';
		var i=0;
	//-->
	</script>

<script language="javascript"><!--
<?php
$sqlstr = mysql_query("SELECT link,picture FROM ".ads." WHERE status='true' and alignment='3' ORDER BY stt ASC");
 if(mysql_num_rows($sqlstr) > 0) { $i = 0; 
 while($row = mysql_fetch_array($sqlstr)){ $i += 1;
 if(!preg_match("#swf$#i", $rs['picture'])){
?>leftrightslide[i++]='<a href="<?php echo $row['link']?>" target="_blank"><img src="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" height="100" border="0"/></a>';<?php
}}}?>


//--></script>

<script language="javascript"><!--
	//Specify gap between each image (use HTML):
	var imagegap="";
	//Specify pixels gap between each slideshow rotation (use integer):
	var slideshowgap=0;
	////NO NEED TO EDIT BELOW THIS LINE/////
	var copyspeed2=slidespeed;
	leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>';
//										leftrightslide='<nobr>'+imgStr+'</nobr>';
	if (iedom){
		document.write('<span id="temp" style="visibility:hidden;position:absolute;top:0px;left:0px;width:' + sliderwidth + '>'+leftrightslide+'</span>');
	}
	var actualwidth='';
	var cross_slide, ns_slide;

	document.open();

	with (document){
		if (iedom){

			write('<div style="position:relative;left:2px;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">');
			write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed2=0" onMouseout="copyspeed2=slidespeed">');
			write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>');
			write('<div id="test3" style="position:absolute;left:0px;top:0px"></div>');
			write('</div></div>');
		}
		else if (document.layers){
			write('<ilayer align=center left=2px width='+sliderwidth+' height='+sliderheight+' name="ns_slidemenu" bgColor='+slidebgcolor+'>');
			write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed2=0" onMouseout="copyspeed2=slidespeed"></layer>');
			write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed2=0" onMouseout="copyspeed2=slidespeed"></layer>');
			write('</ilayer>');
		}

	}
	document.close();
	window.onload=startSlide;

	function startSlide(){
		fillup();
	}
	//-->
</script>
	</td>
  </tr>
  <tr>
    <td height="5" colspan="3"></td>
  </tr>
  <tr>
    <td height="27" colspan="3">
		<table width="100%" border="0" cellspacing="0" cellpadding="0"  align="center">
    <tr>
      <td width="96%" height="30" align="center" class="bgMenu"><a href="<?php echo $domain ?>" class="menu-top">Trang chủ</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/gioi-thieu<?php echo $vip ?>" class="menu-top">Giới thiệu</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/huong-dan<?php echo $vip ?>" class="menu-top">Hướng dẫn </a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/quy-che-thanh-vien<?php echo $vip ?>" class="menu-top">Quy chế thành viên  </a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/quy-dinh-dang-tin<?php echo $vip ?>" class="menu-top">Quy định đăng tin</a>
	  <span class="spaceBottom">|</span>
	  <a href="<?php echo $domain ?>/lien-he-quang-cao<?php echo $vip ?>" class="menu-top">Liên hệ quảng cáo</a></td>
      </tr>
  </table>	</td>
  </tr>
  <tr>
    <td width="1%" height="27">&nbsp;</td>
    <td width="80%" >&nbsp;</td>
    <td width="19%">&nbsp;</td>
  </tr>
  <tr>
    <td height="29">&nbsp;</td>
    <td colspan="2" rowspan="2" align="center">
	<?php echo footerbottom?>	</td>
  </tr>
  <tr>
    <td height="26" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="23" align="center" valign="top">&nbsp;</td>
    <td align="right" valign="top"><strong>&nbsp;Thiết kế: <a href="http://vietwebsite.vn" target="_blank" style="text-decoration:none; color:#FF0000">vietwebsite.vn</a> </strong>&nbsp;&nbsp;</td>
  </tr>
</table>
