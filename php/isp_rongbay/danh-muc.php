<?php
if(!defined("edocom")) exit ();?>
<title><?php echo title?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">

  <tr>
	<td style="border-bottom:#d4ddec 1px solid;">
	<?php
include'category.php';?></td>
  </tr> 
    <tr>
      <td>
	  <div style="width:100%; line-height:25px; float:left; font-weight:bold; color:#7A7A7A">
	  	<div style="width:65%; float:left; text-align:left">&nbsp;&nbsp;Tiêu đề tin đăng </div>
	  	<div style="width:15%; float:left; text-align:left">Tỉnh/T.Phố</div>
	  	<div style="width:5%; float:left; text-align:right">Xem</div>
	  <div style="width:10%; float:left; text-align:center">Ngày</div>
	  <div style="width:4%; float:right; text-align:center">Ảnh</div></div></td>
    </tr>
    <tr>
       <td >
<?php
$ch = explode("/trang-",str_replace($vip,"",$_SERVER['REQUEST_URI']));
$a1 = explode("/p",str_replace($vip,"",$_SERVER['REQUEST_URI']));
$a1 = explode("/",$a1[1]); 
$cat = $a1[0];
$a2 = explode("/n",str_replace($vip,"",$_SERVER['REQUEST_URI']));
$a2 = explode("/",$a2[1]); 
$typ = $a2[0];
$p=pro;
	    $sqlstr = "SELECT categories,id,title,picture,vip,place,view,postdate,content FROM ".userpost." WHERE status='true' AND categories ='".intval($id_1)."'";	
		if($cat!='') $sqlstr.=" AND needs='".intval($cat)."'";
		if($typ!='') $sqlstr.=" AND type='".intval($typ)."'";
		if(@$_SESSION['province']!='') $sqlstr.=" AND (place='".intval(@$_SESSION['province'])."' OR place='0')";
		$page = mysql_query($sqlstr);
		$n_record = mysql_num_rows($page);
		num_page();
		$link = explode("/trang-",str_replace($vip,"",$_SERVER['REQUEST_URI']));
		$link = $link[0];
		$view = $ch[1]!=''?$ch[1]:1;   
		$s =($view-1)*$p; 				  
		$sqlstr .= " order by vip,postdate DESC,id DESC limit $s,$p";						  
					
		$sqlstr=mysql_query($sqlstr);	
		
 if(mysql_num_rows($sqlstr) > 0) { $i = 0;
 
 while($row = mysql_fetch_array($sqlstr)){ $i += 1;
   $description = sub_str(str_replace("\r\n"," ",trim(strip_tags($row['content']))),50);
?>				
	<div style="width:100%; float:left; line-height:25px;<?php
if($i%2!='0'){?>background:#D9ECFF<?php
}?>">
	<div style="width:65%; float:left; line-height:25px; padding-left:5px;"><img src="<?php echo $domain?>/images/ar_oldest_new.gif">&nbsp;<a href="<?php echo $domain?>/tin-chi-tiet/<?php echo $row['categories']?>/<?php echo $row['id']?>/<?php echo convertSpace($row['title'])?><?php echo $vip?>" ONMOUSEOVER="showtip('<?php echo $description?>')" ONMOUSEOUT="hidetip()" class="categorytitle"><?php echo $row['title']?>...<?php
if($row['vip']=='true'){?><img src="<?php echo $domain?>/images/hot.gif" border="0"/><?php
}?></a></div>
	<div style="width:15%; float:left; text-align:left">&nbsp;&nbsp;<?php
if($row['place']=='0') { echo "Toàn quốc";}{?><?php
Province($row['place'],tinh);?><?php
}?></div>
	<div style="width:5%; float:left; text-align:right"><?php echo $row['view']?></div>
	<div style="width:10%; float:left; text-align:center"><?php echo date("d-m-y",$row['postdate'])?></div>
	<div style="width:4%; float:right; text-align:right">
	<?php
if($row['picture']!=''){?>
<?php
$pic = explode('|',$row['picture']);	  ?>
   <div><img src="<?php echo $domain?>/images/product/<?php echo $pic[1]?>" style="width:20px; height:20px; " border="0"/></div>
	<?php
}else{ echo "<img src=\"".$domain."/images/noimage.gif\" />";}?></div>
	</div>
<?php
}}?>	</td>
  </tr>
	<tr>
	  <td height="50" align="center" ><?php
view_page_link($link)?></td>
  </tr>

</table>
