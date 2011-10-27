<?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<?php
$sqlstr=mysql_query("SELECT * FROM ".members." WHERE status='true' AND id='".intval($id_1)."'");
  if(mysql_num_rows($sqlstr)>0)   {
  $row=mysql_fetch_array($sqlstr);
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
   <tr ><td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Thông tin thành viên</td>   </tr>
   <tr >
       <td style="padding-left:70px" class="proCenter">
	   <div style="line-height:22px; float:left; width:30%">Tên thành viên: </div>
	   <div style="line-height:22px; float:left; width:70%"><?php echo $row['fullname']?>&nbsp;</div>
	   <div style="line-height:22px; float:left; width:30%">Email: </div><div style="line-height:22px; float:left; width:70%"><a href="mailto:<?php echo $row['email']?>"><?php echo $row['email']?>&nbsp;</a></div>
	   <div style="line-height:22px; float:left; width:30%">Số lượng tin đăng: </div>
	   <div style="line-height:22px; float:left; width:70%"><?php echo $row['count']?>&nbsp;</div>
	   <div style="line-height:22px; float:left; width:30%">Số lần xem tin: </div>
	   <div style="line-height:22px; float:left; width:70%"><?php echo $row['view']?>&nbsp;</div>
	   </td>
  </tr>
    <tr>
                <td class="proBottom">&nbsp;</td>
  </tr>
</table><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
   <tr ><td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Tin đã đăng</td>   </tr>	
    <tr>
      <td class="proCenter" >
	  <div style="width:100%; line-height:25px; float:left; font-weight:bold; color:#7A7A7A">
	  	<div style="width:45%; float:left; text-align:left">&nbsp;&nbsp;Tiêu đề tin đăng </div>
		<div style="width:25%; float:left; text-align:center">Chuyên mục</div>
	  	<div style="width:15%; float:left; text-align:left">Tỉnh/T.Phố</div>
	  	<div style="width:5%; float:left; text-align:right">Xem</div>
	  <div style="width:10%; float:left; text-align:center">Ngày</div>
	  </div></td>
    </tr>
    <tr>
                <td class="proCenter" >
<?php
$sqlstr=mysql_query("SELECT * FROM ".userpost." WHERE status='true' AND memberid='".intval($id_1)."' ORDER BY id DESC");
	  if(mysql_num_rows($sqlstr)>0) { $i=0;
	  while($row=mysql_fetch_array($sqlstr)){ $i+=1;
?> 				
				<div style="width:100%; float:left; line-height:25px;<?php
if($i%2!='0'){?>background:#D9ECFF<?php
}?>">
	<div style="width:45%; float:left">&nbsp;&nbsp;<img src="<?php echo $domain?>/images/ar_oldest_new.gif">&nbsp;<a href="<?php echo $domain?>/tin-chi-tiet/<?php echo $row['categories']?>/<?php echo $row['id']?><?php echo $vip?>" ONMOUSEOVER="showtip('<?php echo strip_tags($row['title'])?>')" ONMOUSEOUT="hidetip()" class="categorytitle"><?php echo sub_str($row['title'],10)?>...</a></div>
	<div style="width:25%; float:left; text-align:left"><?php
Typecategory($row['categories'], menu_product)?></div>
	<div style="width:15%; float:left; text-align:left"><?php
if($row['place']=='0') { echo "Toàn quốc";}{?><?php
Province($row['place'],tinh);?><?php
}?></div>
	<div style="width:5%; float:left; text-align:right"><?php echo $row['view']?></div>
	<div style="width:10%; float:left; text-align:center"><?php echo date("d-m-y",$row['postdate'])?></div>
	
	</div>
<?php
}}?>				</td>
  </tr>
	<tr>
                <td style="border-top:#188fc9 1px solid" >&nbsp;</td>
  </tr>
</table>
<?php
}?>