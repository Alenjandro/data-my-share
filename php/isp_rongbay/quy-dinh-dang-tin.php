<?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="border">
   <tr ><td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Quy định đăng tin</td>   </tr>
   <tr >
       <td>
         <div align="justify" style="padding:10px;">
           <?php
$sqlstr=mysql_query("SELECT * FROM ".team."");
		  if(mysql_num_rows($sqlstr)>0) {
		   
		   while($row=mysql_fetch_array($sqlstr)) {
		   
		   echo $row['full'];
		   
		   }
		  }
   ?>
         </div></td>
  </tr>
    <tr>
     <td>&nbsp;</td>
  </tr>
</table>