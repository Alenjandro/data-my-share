<?php
if(!defined("edocom")) exit ();?>
<?php
if(!isset($_SESSION['idcus'])) {
	 header('location:'.$domain.'/dang-nhap'.$vip.'');
	 }?>
<title>Thống kê, theo dõi - <?php echo titleweb?></title>
<meta name="description" content="<?php echo description?>">
<meta name="keywords" content="<?php echo keywords?>">
<link href="<?php echo $domain?>/css/tab.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $domain?>/css/tabpane.js"></script>
<script type="text/javascript" src="<?php echo $domain?>/css/webfxlayout.js"></script>

<style type="text/css">
<!--
.style1 {color: red}
-->
</style>
<?php
if($_POST['Submit']){
		mysql_query("DELETE FROM ".stories." WHERE id = '".intval($_POST['matin'])."'");
	}
?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td valign="top" width="100%">

<div class="tab-pane" id="tabPane2">
<script type="text/javascript">
tp1 = new WebFXTabPane(document.getElementById("tabPane1") ,false);
tp1.selectedIndex = 0;
</script>	
<div class="tab-page"  id="tabPage1">
	<h2 class="tab" style="float:left;"><b>Thống kê chung</b></h2>
	<script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage1"));</script>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding-left:40px;">
 <?php
$sqlstr=mysql_query("SELECT COUNT(id) AS id1,SUM(view) AS view FROM ".userpost." WHERE memberid='".intval(@$_SESSION['idcus'])."'");
  if(mysql_num_rows($sqlstr)>0)   {
  $row=mysql_fetch_array($sqlstr);
?> 		
			<div style="width:100%; float:left; line-height:30px;">
				<div style="width:30%; float:left">Số tin đã đăng :</div>
				<div style="width:70%; float:left;"><b><?php echo $row['id1']?></b> bản tin.</div>
			</div>
			<div style="width:100%; float:left; line-height:30px;">
				<div style="width:30%; float:left">Tổng số lượt xem của tin :</div>
				<div style="width:70%; float:left;"><b><?php echo $row['view']?></b> lượt xem.</div>
			</div>
<?php
}?>
 <?php
$sqlstr=mysql_query("SELECT * FROM ".members." WHERE id='".intval(@$_SESSION['idcus'])."'");
  if(mysql_num_rows($sqlstr)>0)   {
  $row=mysql_fetch_array($sqlstr);
?> 				
			<div style="width:100%; float:left;  line-height:30px;">
				<div style="width:30%; float:left">Ngày đăng ký thành viên :</div>
				<div style="width:70%; float:left; font-weight:bold"><?php echo date("H:m:s d/m/Y",$row['postdate'])?>.</div>
			</div>
<?php
}?>			
			<div style="width:100%; float:left;  line-height:30px;">
				<div style="width:30%; float:left">Lần đăng nhập gần đây :</div>
				<div style="width:70%; float:left; font-weight:bold"><?php echo date("H:m:s d/m/Y",@$_SESSION['timelog'])?>.</div>
			</div>
		</td>
      </tr>
    </table>
</div>
<div class="tab-page" id="tabPage2">
	<h2 class="tab" style="float:left;"><strong>Tin quan tâm</strong></h2>	
	<script type="text/javascript">tp1.addTabPage(document.getElementById("tabPage2"));</script>
	<form action="" method="post" name="orderForm" id="orderForm">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="padding-left:5px;">
<?php
$sql=mysql_query("SELECT * FROM ".stories." WHERE memberid='".intval(@$_SESSION['idcus'])."' ORDER BY id DESC");
  if(mysql_num_rows($sql)>0)   {?>		
		<div style="line-height:30px;">
			<div style="width:55%; float:left"><strong>Tin rao</strong></div>
			<div style="width:20%; float:left; text-align:center"><strong>Người đăng tin</strong></div>
			<div style="width:20%; float:left; text-align:center"><strong>Ngày</strong></div>
			<div style="width:5%; float:left"><strong>Xóa</strong></div>
		</div>
<?php
while($rowsub = mysql_fetch_array($sql)){ 

 $sqlstr = mysql_query("SELECT * FROM ".userpost." WHERE status='true' AND id='".$rowsub['newsid']."'");
 if(mysql_num_rows($sqlstr) > 0) { 
 $row = mysql_fetch_array($sqlstr);
?>		
		<div style="line-height:22px;">
			<div style="width:55%; float:left"><img src="<?php echo $domain?>/images/node.gif" />
			  <a href="<?php echo $domain?>/tin-chi-tiet/<?php echo $row['categories']?>/<?php echo $row['id']?><?php echo $vip?>" ONMOUSEOVER="showtip('<?php echo $row['title']?>')" ONMOUSEOUT="hidetip()" class="categorytitle"><?php echo sub_str($row['title'],15)?>...</a>&nbsp;</div>
			<div style="width:20%; float:left; text-align:center">
			<?php
$mem = mysql_query("SELECT * FROM ".members." WHERE status='true' AND id='".$rowsub['postid']."'");
 				if(mysql_num_rows($mem) > 0) { 
 				$rowmem = mysql_fetch_array($mem);
					echo "<a href=\"".$domain."/tin-thanh-vien/".$rowmem['id']."".$vip."\">".$rowmem['fullname']."</a>"; }else{ echo "Khách vãng lai";}
			?>
			&nbsp;</div>
			<div style="width:20%; float:left; text-align:center"><?php echo date("H:m:s d.m.Y",$row['postdate'])?>&nbsp;</div>
			<div style="width:5%; float:left">
			<input type="hidden" name="matin" value="<?php echo $rowsub['id']?>" />
			  <input type="submit" onClick="return confirm('Bạn có chắc không ?');" name="Submit" value="Xóa" style="border:0px; background-color:#FFFFFF; cursor:pointer; width:30px;"/>
			</div>
		</div>
<?php
}}}else{ echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Bạn chưa lưu tin nào cho mục này!</b>";}?>		
		</td>
      </tr>
    </table>
	</form>	
</div>			
</div>
</td></tr></table>