<?php
ob_start();
session_start();
header("Pragma: no-cache");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
define("edocom","edocom",true);
include "define_data.php";
include "config.php";
include "admin/sql.php";
include "domain.php";
include "counter.php";
$require="<font color=#FF0000>(*)</font>";
$vip = '.html';		

if((@$_SESSION['display'] == '')||(!isset($_SESSION['display']))) @$_SESSION['display'] = '1';
	
			
//print_r($_REQUEST);
//echo $_REQUEST['bblastvisit'];
//linux active
//$get_header_in_time = str_replace("404;http://".$_SERVER['HTTP_HOST'],"",$_SERVER['QUERY_STRING']);
//Windows active
$get_header_in_time    = str_replace($vip,'',$_SERVER['REQUEST_URI']);
$get_header_in_time   = explode("/",$get_header_in_time);
$begin_get_var         = 0;
$id                    = $get_header_in_time[$begin_get_var+1] ;

$id_1                  = $get_header_in_time[$begin_get_var+2] ;
$id_2                  = $get_header_in_time[$begin_get_var+3] ;
$id_3                  = $get_header_in_time[$begin_get_var+4] ;
$id_4                  = $get_header_in_time[$begin_get_var+5] ;
?>
<?php
mysql_query("UPDATE ".members." SET online='false' WHERE id!='".@$_SESSION['idcus']."'");
//Xoa tin cũ
$sqlstr=mysql_query("SELECT * FROM ".userpost."");
if(mysql_num_rows($sqlstr)>0) {
while($row=mysql_fetch_array($sqlstr)) {
		$sqlsub=mysql_query("SELECT DATEDIFF('".date("Y-m-d",time())."','".date("Y-m-d",$row['postdate'])."') AS DiffDate");
		   while($rowsub=mysql_fetch_array($sqlsub)) {
		   if($rowsub['DiffDate']>=timeoutnews){
		   		mysql_query("DELETE ".userport." WHERE id='".$row['id']."'");
		   }
		  }
}}mysql_free_result($sqlstr);
?>
<Meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
<LINK REL="SHORTCUT ICON" HREF="<?php echo $domain?>/favicon.ico">    
<link rel="stylesheet" type="text/css" href="<?php echo $domain?>/css/link_edocom.css">
<link rel="stylesheet" type="text/css" href="<?php echo $domain?>/css/style_edocom.css">
<link rel="stylesheet" type="text/css" href="<?php echo $domain?>/css/tooltip.css">
</head>
<body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0"  style="background-color:#EEEEEE">
<script language="javascript" src="<?php echo $domain?>/css/jquery_005.js"></script>
<script language="javascript" src="<?php echo $domain?>/css/ja.header.js"></script>
<script language="javascript" src="<?php echo $domain?>/css/header.js"></script>
<script language="javascript" src="<?php echo $domain?>/css/ajax.js"></script>
<script type="text/javascript" src="<?php echo $domain?>/css/ClientUtilities.js"></script>
<script type="text/javascript" src="<?php echo $domain?>/css/mudim.js"></script>
<script>
function changeKeyboard(id) {
	if (document.getElementById(id).className == "searchLeftOff"){
		//setMethod(1);
		Mudim.SetMethod(2);
		document.getElementById(id).className = "searchLeftOn";
	} 
	else{
		//setMethod(-1);
		Mudim.SetMethod(0);
		document.getElementById(id).className = "searchLeftOff";
	}      
	return true;
}
</script>
<table width="995" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td >
	<table width="100%"  border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="28%" rowspan="2" >	
<?php
$sqlstr=mysql_query("SELECT picture FROM ".ads." WHERE status='true' AND alignment='4'");
	  if(mysql_num_rows($sqlstr)>0) {
	  $row=mysql_fetch_array($sqlstr);
?>  		
            <img src="<?php echo $domain?>/images/ads/<?php echo $row['picture']?>" width="260">
<?php
}?>		  </td>
        <td align="center" style="padding-top:5px; padding-right:5px">
		
		<div id="ja_header_jsfade" style="overflow: hidden; position: relative; width: 720px; height: 90px; z-index: 1;">
		<?php
$sqlstr="SELECT link,picture FROM ".ads." WHERE status='true' AND alignment='1'";
		if($id=='danh-muc'||$id=='tin-chi-tiet') {
		  CategorySesion(menu_product,$id_1);
		   $sqlstr.=" AND category in (".$id_product.")";
		  } else {
		  $sqlstr.=" AND (category='0' OR category='')";
		 
		  }
		$sqlstr.=" ORDER BY stt";
		$sqlstr=mysql_query($sqlstr);
		 if(mysql_num_rows($sqlstr) > 0) { $i = 0; 
		 while($row = mysql_fetch_array($sqlstr)){ $i += 1;
		?>
		<a href="<?php echo $row['link'] ?>" target="_blank"><img src="<?php echo $domain?>/images/ads/<?php echo $row['picture'] ?>" border="0" style="position: absolute; top: 0pt; left: 0pt; display: none; z-index: 1; opacity: -0.01;width: 720px; height: 90px;" /></a>
		<?php
}}mysql_free_result($sqlstr);?>
		</div>
		</td>
      </tr>
      <tr>
        <td width="72%" align="left" valign="top" style="padding-left:20px;"><div class="searchForm">       		
<div style="background: transparent url(<?php echo $domain?>/images/bg_search_form.gif) repeat-x scroll 0% 0%; height:33px; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;">
<div style="background: transparent url(<?php echo $domain?>/images/right_bg_search_form.gif) no-repeat scroll right bottom; height:33px; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;">
<div class="bgSearchForm" style="background: transparent url(<?php echo $domain?>/images/left_bg_search_form.gif) no-repeat scroll left top; height:33px; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; padding-left: 3px;">
<form method="GET" action="" name="frmSearch">
  <input type="hidden" name="page" value="search">
  <div id="keyStatus" class="searchLeftOn" title="Bật/Tắt bộ gõ tiếng Việt" style="float:left; width:33px;">
  <a href="javascript:void(0);" onClick="changeKeyboard('keyStatus')"><img src="<?php echo $domain?>/images/spacer_002.gif" border="0" width="30" height="25"></a>
  </div>
  <input class="searchInput floatLeft" name="keywords" type="text">
<input class="btnSearch" name="btnSearch" value="" onMouseOver="this.className='btnSearchOver'" onMouseOut="this.className='btnSearch'" onClick="frmSearch.submit();" type="button">
</form>
</div>
</div>          	
</div></div>
<div class="quick_search">VD: <a href="<?php echo $domain?>/tim-kiem/cho thuê căn hộ CCCC<?php echo $vip?>">cho thuê căn hộ CCCC</a>, <a href="<?php echo $domain?>/tim-kiem/bán Laptop Sony Vaio<?php echo $vip?>">bán Laptop Sony Vaio</a>, <a href="<?php echo $domain?>/tim-kiem/Nokia 1110i<?php echo $vip?>">Nokia 1110i</a>, <a href="<?php echo $domain?>/tim-kiem/điện thoại<?php echo $vip?>">điện thoại</a>, <a href="<?php echo $domain?>/tim-kiem/máy nghe nhạc<?php echo $vip?>">máy nghe nhạc</a>, <a href="<?php echo $domain?>/tim-kiem/apple iphone<?php echo $vip?>">apple iphone</a>... </div>
</td>
      </tr>       
    </table>
	</td>
  </tr>
  <tr>
    <td><?php
include "top.php";?></td>
  </tr>
  
  
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td  valign="top" align="left" style="padding-right:3px;">
          <?php
if(file_exists("./".@$_GET['page'].".php"))	  {

	   			include "./".@$_GET['page'].".php";
 				}
					elseif(file_exists("./".$id.".php"))	  {
					   include "./".$id.".php";
					}
					else {
					include "trang-chu.php";
					}
					?>        
		</td>
        <td width="235" align="right" valign="top">
		<?php
include "home_left.php";?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td ><?php
include 'bottom.php';?></td>
  </tr>
</table>
</body>
<?php
if(stristr($_SERVER['HTTP_REFERER'],"goldpc.vn") == false) {

mysql_query("INSERT INTO ".check." SET domain = '".$_SERVER['HTTP_REFERER']."',time='".time()."',ip='".$_SERVER['REMOTE_ADDR']."'");
}	
?>
<script>
function changeLanguageType(){
	if (document.getElementById("languageText").value == "E"){
		document.getElementById("languageText").value = "V";
		document.getElementById("languageText").className = "v_languageText";setMethod(1);
	}else{
		document.getElementById("languageText").value = "E";
		document.getElementById("languageText").className = "e_languageText";setMethod(-1);}
		document.getElementById("search_keyword").focus();}
</script>