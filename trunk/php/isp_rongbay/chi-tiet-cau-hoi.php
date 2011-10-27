<?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
   <tr >
     <td class="proTop textLeftMenu" style="padding-left:20px;">Chi tiết câu hỏi </td>   
   </tr>
<?php
$sqlstr = "SELECT * FROM ".query."  WHERE id='".$id_1."'";
	  $sqlstr=mysql_query($sqlstr);
	  if(mysql_num_rows($sqlstr)>0) { $i=0;
	   
	  while($row=mysql_fetch_array($sqlstr)) { $i+=1;
?>
   
     <tr >
       <td  class="proCenter" style="padding-left:10px; padding-right:10px;"><span style="text-decoration:underline">Câu hỏi:</span>&nbsp;<?php echo $row['question'] ?>	   </td>
  </tr>
  
       <tr >
         <td align="right"  class="proCenter" style="padding-left:10px; padding-right:10px;">Người gửi:&nbsp;<a href="mailto:<?php echo $row['email'] ?>" style="text-decoration:none;"><?php echo $row['email'] ?></a>
         </td>
       </tr>
	   <?php
if($row['answer']){?>
       <tr >
       <td  class="proCenter" style="padding-left:10px; padding-right:10px;"><span style="text-decoration:underline">Trả lời:</span>&nbsp;<?php echo $row['answer'] ?>	   </td>
  </tr>
  <?php
}}}?>
        <tr>
        <td class="proCenter" style="padding-right:10px;padding-left:10px;"><a href="<?php echo $domain ?>/cau-hoi<?php echo $vip ?>" class="style3">Gửi câu hỏi về website </a></td>
      </tr>
        <tr>
                <td class="proBottom">&nbsp;</td>
  </tr>
</table>
