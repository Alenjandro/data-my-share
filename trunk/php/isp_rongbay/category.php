<?php
if(!defined("edocom")) exit ();?>
<style type="text/css">

#dropmenudiv{
position:absolute;
width: 180px;
line-height:22px;
}

#dropmenudiv a{
width: 180px;
height:22px;
display: block;
text-indent: 3px;
border-bottom: 1px   solid #CCCCCC;
border-left: 1px   solid #CCCCCC;
border-right: 1px   solid #CCCCCC;
padding-left:10px;
text-decoration: none;
color:#006799;
background-color:#FFFFFF;

}

#dropmenudiv a:hover{ /*hover background color*/
display: block;
width: 180px;
color:#FF3300;
background-color:#FFFFCC;
text-decoration:none;
font-weight:bold;
}

</style>
<script type="text/javascript">

              var menu=new Array()
		      <?php
$sqlsub=mysql_query("SELECT id,category FROM ".menu_product." WHERE parent='0' AND id!='".intval($id_1)."' ORDER BY stt ASC");
			 
			  if(mysql_num_rows($sqlsub)>0)   {	 $j=-1;
			 
			  while($rowsub=mysql_fetch_array($sqlsub)) { $j+=1;
			 ?>
             menu[<?php echo $j?>]='<a href="<?php echo $domain?>/danh-muc/<?php echo $rowsub['id'] ?>/<?php echo convertSpace($rowsub['category'])?><?php echo $vip?>" class="textMenuLeft"><?php echo $rowsub['category']?></a>'
 <?php
} }?>
var menuwidth='180px' //default menu width
var menubgcolor='lightyellow'  //menu bgcolor
var disappeardelay=20  //menu disappear speed onMouseout (in miliseconds)
var hidemenu_onclick="yes" //hide menu when user clicks within menu?

/////No further editting needed

var ie4=document.all
var ns6=document.getElementById&&!document.all

if (ie4||ns6)
document.write('<div id="dropmenudiv" style="visibility:hidden;width:'+menuwidth+';background-color:'+menubgcolor+'" onMouseover="clearhidemenu()" onMouseout="dynamichide(event)"></div>')

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}


function showhide(obj, e, visible, hidden, menuwidth){
if (ie4||ns6)
dropmenuobj.style.left=dropmenuobj.style.top="-500px"
if (menuwidth!=""){
dropmenuobj.widthobj=dropmenuobj.style
dropmenuobj.widthobj.width=menuwidth
}
if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover")
obj.visibility=visible
else if (e.type=="click")
obj.visibility=hidden
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=0
if (whichedge=="rightedge"){
var windowedge=ie4 && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-15 : window.pageXOffset+window.innerWidth-15
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure-obj.offsetWidth
}
else{
var topedge=ie4 && !window.opera? iecompattest().scrollTop : window.pageYOffset
var windowedge=ie4 && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure){ //move up?
edgeoffset=dropmenuobj.contentmeasure+obj.offsetHeight
if ((dropmenuobj.y-topedge)<dropmenuobj.contentmeasure) //up no good either?
edgeoffset=dropmenuobj.y+obj.offsetHeight-topedge
}
}
return edgeoffset
}

function populatemenu(what){
if (ie4||ns6)
dropmenuobj.innerHTML=what.join("")
}


function dropdownmenu(obj, e, menucontents, menuwidth){
if (window.event) event.cancelBubble=true
else if (e.stopPropagation) e.stopPropagation()
clearhidemenu()
dropmenuobj=document.getElementById? document.getElementById("dropmenudiv") : dropmenudiv
populatemenu(menucontents)

if (ie4||ns6){
showhide(dropmenuobj.style, e, "visible", "hidden", menuwidth)

dropmenuobj.x=getposOffset(obj, "left")
dropmenuobj.y=getposOffset(obj, "top")
dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+"px"
dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+obj.offsetHeight+"px"
}

return clickreturnvalue()
}

function clickreturnvalue(){
if (ie4||ns6) return false
else return true
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function dynamichide(e){
if (ie4&&!dropmenuobj.contains(e.toElement))
delayhidemenu()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhidemenu()
}

function hidemenu(e){
if (typeof dropmenuobj!="undefined"){
if (ie4||ns6)
dropmenuobj.style.visibility="hidden"
}
}

function delayhidemenu(){
if (ie4||ns6)
delayhide=setTimeout("hidemenu()",disappeardelay)
}

function clearhidemenu(){
if (typeof delayhide!="undefined")
clearTimeout(delayhide)
}

if (hidemenu_onclick=="yes")
document.onclick=hidemenu

</script>
<?php
$a1 = explode("/p",str_replace($vip,"",$_SERVER['REQUEST_URI']));
$a1 = explode("/",$a1[1]); 
$cat = $a1[0];
$a2 = explode("/n",str_replace($vip,"",$_SERVER['REQUEST_URI']));
$a2 = explode("/",$a2[1]); 
$typ = $a2[0];
?>
<?php
$sqlstr=mysql_query("SELECT bgcolor,color,hovercolor FROM ".menu_product." WHERE status='true' AND id='".intval($id_1)."' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {
	  $row=mysql_fetch_array($sqlstr);
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#<?php echo $row['bgcolor']!=''?$row['bgcolor']:"188fc9"?>; border-bottom:#FFFFFF 1px solid">
	  <tr>
		<td width="30%" nowrap="nowrap">&nbsp;&nbsp;<img src="<?php echo $domain?>/images/icon_muiten.gif" />&nbsp;&nbsp;<span style="color:#FFFFFF; padding-right:10px;">Chuyên mục:</span><a class="textLeftMenu" style="padding-bottom:8px; cursor:pointer; text-decoration:none; color:#FFFFFF" onMouseover="dropdownmenu(this, event, menu, '180px')" onMouseout="delayhidemenu()" href="<?php echo $domain?>/danh-muc/<?php echo $id_1."/".convertSpace(headerCat(menu_product,$id_1)).$vip?>"><?php echo headerTop(menu_product,$id_1);?></a></td>
		<td width="4%" valign="top"><img src="<?php echo $domain?>/images/headerSplash.png" /></td>
		<td style="background:#FFFFFF; border-bottom:#<?php echo $row['bgcolor']!=''?$row['bgcolor']:"188fc9"?> 5px solid">&nbsp;</td>
	  </tr>
	</table>
<?php
}?>	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#d4ddec 1px solid; border-bottom:0px;">
	<tr><td height="5"></td></tr>
	  <tr>
	  	<td>
	   <a href="<?php echo $domain?>/danh-muc/<?php echo $id_1?>/<?php
if($typ!='') echo "n".$typ."/";?><?php echo convertSpace(headerCat(menu_product,$id_1)).$vip?>" class="listmenu<?php
echo $cat==''?"-select":"";?>">Tất cả</a>
<?php
$sqlstr=mysql_query("SELECT id,category,parent FROM ".menu_product." WHERE status='true' AND parent='".intval($id_1)."' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {
	  while($row=mysql_fetch_array($sqlstr)){
?> 
<a href="<?php echo $domain?>/danh-muc/<?php echo $row['parent']?>/p<?php echo $row['id']?><?php
if($typ!='') echo "/n".$typ;?>/<?php echo convertSpace(headerCat(menu_product,$id_1))."-".convertSpace($row['category'])?><?php echo $vip?>" class="listmenu<?php
echo $cat==$row['id']?"-select":"";?>"><?php echo $row['category']?></a>
<?php
}}?>
	</td></tr>
	<tr><td height="5"></td></tr>
	</table>
<?php
$sqlstr=mysql_query("SELECT id,category FROM ".menu_service." WHERE status='true' AND parent='".intval($id_1)."' ORDER BY stt");
	  if(mysql_num_rows($sqlstr)>0) {
?>  
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:#d4ddec 1px solid; border-bottom:0px; border-top:#d4ddec 1px dotted;">
	  <tr><td height="5"></td></tr>
	  <tr>
	  	<td>
	 <a href="<?php echo $domain?>/danh-muc/<?php echo $id_1?>/<?php
if($cat!='') echo "p".$cat."/";?><?php echo convertSpace(headerCat(menu_product,$id_1)).$vip?>" class="submenu<?php
echo $typ==''?"-select":"";?>">&#8226;&nbsp;Tất cả</a><?php
while($row=mysql_fetch_array($sqlstr)){?><a href="<?php echo $domain?>/danh-muc/<?php echo $id_1?>/<?php
if($cat!='') echo "p".$cat."/";?>n<?php echo $row['id']?>/<?php echo convertSpace(headerCat(menu_product,$id_1))."-".convertSpace($row['category'])?><?php echo $vip?>" class="submenu<?php
echo $typ==$row['id']?"-select":"";?>">&#8226;&nbsp;<?php echo $row['category']?></a>
<?php
}?>	
	</td></tr>
	<tr><td height="5"></td></tr>
	</table>
<?php
}?>
