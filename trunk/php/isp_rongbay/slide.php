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
include "domain.php";?>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<script language="javascript" src="css/ja.header.js"></script>
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="center"> 	
<script type="text/javascript">fadetime = 2000;</script>
<div id="ja_header_jsfade" style="overflow: hidden; position: relative; width: 760px; height: 200px; z-index: 1;">
<?php
$sqlstr = mysql_query("SELECT link,picture FROM ".slide." WHERE status='true'  ORDER BY stt ASC");
 if(mysql_num_rows($sqlstr) > 0) { $i = 0; 
 while($row = mysql_fetch_array($sqlstr)){ $i += 1;
?>
<a href="<?php echo $row['link'] ?>" target="_blank"><img src="<?php echo $domain?>/images/slide/<?php echo $row['picture'] ?>" border="0" style="position: absolute; top: 0pt; left: 0pt; display: none; z-index: 1; opacity: -0.01;width: 758px; height: 198px; border:#359AFF 1px solid" /></a>
<?php
}}mysql_free_result($sqlstr);?>
</div></td>
  </tr>
</table>
</body>