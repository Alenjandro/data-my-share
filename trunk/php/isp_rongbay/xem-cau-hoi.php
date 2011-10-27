 <?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
   <tr >
     <td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Câu hỏi </td>   
   </tr>
         <tr>
        <td align="right" class="proCenter" style="padding-right:30px;padding-left:10px;"><a href="<?php echo $domain ?>/cau-hoi<?php echo $vip ?>" class="style3">Gửi câu hỏi về website </a></td>
      </tr>
<?php
$p = 10;
	    $sqlstr = "SELECT * FROM ".query." WHERE status = 'true'";	
		
		$page = mysql_query($sqlstr);
		$n_record = mysql_num_rows($page);
		num_page(); 
		
		$link = $domain.'/'.$id;
		$view = $id_1?$id_1:1;   
		$s =($view-1)*$p; 				  
		$sqlstr .= " order by postdate DESC limit $s,$p";			
		$sqlstr = mysql_query($sqlstr);	
		if(mysql_num_rows($sqlstr)>0) {	  $i=0;  
						  
		while($row=mysql_fetch_array($sqlstr)) {    $i+=1;
?>  
   <tr >
       <td  class="proCenter" style="padding:10px;"><div align="justify" style="padding-right:10px;"><a href="<?php echo $domain?>/chi-tiet-cau-hoi/<?php echo $row['id']?><?php echo $vip?> " style="text-decoration:none; color:#000000;"><strong>
        Câu hỏi: </strong>&nbsp; <?php echo $row['question'] ?>
       </a> </div>
	   </td>
  </tr>
     <tr >
       <td align="right"  class="proCenter" style="padding-left:10px; padding-right:10px;">Người gửi:&nbsp;<a href="mailto:<?php echo $row['email'] ?>" style="text-decoration:none;"><?php echo $row['email'] ?></a>   </td>
  </tr>
  <?php
}}?>

      <tr>
                <td height="50" align="center" class="proCenter"  hư30px><?php
view_page_view($link,$id_1)?></td>
  </tr>
        <tr>
                <td class="proBottom">&nbsp;</td>
  </tr>
</table>
