<?php
if(!defined("edocom")) exit ();?>
<title>Kết quả tìm kiếm - <?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF"> 
   <tr >
     <td class="proTop textLeftMenu" style="padding-left:10px;"><img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;Kết quả tìm kiếm</td>   
   </tr>
   <tr><td class="proCenter" height="50" style="padding-left:50px;">
   <?php
$tongtin = NumRow(categories,userpost,"status='true' AND (title like '%".urldecode(text($id_1))."%' OR content like '%".urldecode(text($id_1))."%')");
		if(isset($_SESSION['province'])) $tongtin = NumRow(categories,userpost,"status='true' AND (title like '%".urldecode(text($id_1))."%' OR content like '%".urldecode(text($id_1))."%') AND place='".@$_SESSION['province']."'");
   ?>
   Tìm thấy tổng <b style="color:#FF0000"><?php echo $tongtin?></b> kết quả phù hợp với cụm từ <b style="color:#FF0000">"<?php echo urldecode($id_1)?>"</b> và nơi đăng tin <b style="color:#FF0000"><?php
if(@$_SESSION['province']!=''){?><?php
Province(@$_SESSION['province'],tinh);?><?php
}else{ echo "Toàn quốc";}?></b></td></tr>
    <tr>
      <td class="proCenter" >
	  <div style="width:100%; line-height:25px; float:left; font-weight:bold; color:#7A7A7A">
	  	<div style="width:65%; float:left; text-align:left">&nbsp;&nbsp;Tiêu đề tin đăng </div>
	  	<div style="width:15%; float:left; text-align:left">Tỉnh/T.Phố</div>
	  	<div style="width:5%; float:left; text-align:right">Xem</div>
	  <div style="width:10%; float:left; text-align:center">Ngày</div>
	  <div style="width:5%; float:left; text-align:center">Ảnh</div></div></td>
    </tr>
    <tr>
                <td class="proCenter" style="padding-left:5px; padding-right:5px; padding-bottom:5px;">
<?php
$p=pro;
	$sqlstr = "SELECT * FROM ".userpost." WHERE status='true' AND (title like '%".urldecode(text($id_1))."%' OR content like '%".urldecode(text($id_1))."%')";
	if(isset($_SESSION['province'])) $sqlstr .= " AND place ='".@$_SESSION['province']."'";	
	$page = mysql_query($sqlstr);
	$n_record = mysql_num_rows($page);
	num_page(); 
	
	$link = $domain.'/'.$id.'/'.$id_1;
	$view = $id_2?$id_2:1;   
	$s =($view-1)*$p; 				  
	$sqlstr .= " order by id DESC limit $s,$p";						  
				
	$sqlstr=mysql_query($sqlstr);	
		
 if(mysql_num_rows($sqlstr) > 0) { $i = 0;
 
 while($row = mysql_fetch_array($sqlstr)){ $i += 1;
 $description = str_replace("\r\n"," ",strip_tags(trim($row['content'])));
?>				
	<div style="width:100%; float:left; line-height:25px; padding-left:5px; <?php
if($i%2!='0'){?>background:#D9ECFF<?php
}?>">
	<div style="width:65%; float:left;"><img src="<?php echo $domain?>/images/ar_oldest_new.gif">&nbsp;<a href="<?php echo $domain?>/tin-chi-tiet/<?php echo $row['categories']?>/<?php echo $row['id']?>/<?php echo convertSpace($row['title'])?><?php echo $vip?>" ONMOUSEOVER="showtip('<?php echo sub_str($description,50)?>')" ONMOUSEOUT="hidetip()" class="categorytitle"><?php echo $row['title']?>...</a></div>
	<div style="width:15%; float:left; text-align:left">&nbsp;&nbsp;<?php
if($row['place']=='0') { echo "Toàn quốc";}{?><?php
Province($row['place'],tinh);?><?php
}?></div>
	<div style="width:5%; float:left; text-align:right"><?php echo $row['view']?></div>
	<div style="width:10%; float:left; text-align:center"><?php echo date("d-m-y",$row['postdate'])?></div>
	<div style="width:5%; float:left; text-align:center"><?php
if($row['picture']!=''){?>
   <div style="float:right; width:auto;"><img src="<?php echo $domain?>/images/product/<?php echo $row['picture']?>" border="0" align="right" style="width:20px; height:20px; "/></a><?php
}else{ echo "<img src=\"".$domain."/images/noimage.gif\" align=\"right\"/>";}?></div>
	</div>
	</div>
<?php
}}?>				</td>
  </tr>
	<tr>
                <td style="border-top:#188fc9 1px solid" >&nbsp;</td>
  </tr>
	<tr>
	  <td align="center" ><?php
view_page_view($link,$id_2)?></td>
  </tr>
</table>
