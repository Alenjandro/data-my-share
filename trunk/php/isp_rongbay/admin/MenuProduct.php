<?php
include "check.php";?>
<div style="width:96%" align="left"><strong>THÊM DANH MỤC MENU:</strong></div>
<link rel="stylesheet" type="text/css" href="css/screen.css">
<script type="text/javascript" src="js/ddcolorposter.js"></script>
<script type="text/javascript" src="js/YAHOO.js" ></script>
<script type="text/javascript2" src="js/log.js" ></script>
<script type="text/javascript" src="js/color.js" ></script>

<script type="text/javascript" src="js/event.js" ></script>
<script type="text/javascript" src="js/dom.js" ></script>
<script type="text/javascript" src="js/animation.js" ></script>
<script type="text/javascript" src="js/dragdrop.js" ></script>
<script type="text/javascript" src="js/slider.js" ></script>
<script type="text/javascript">

	var hue;
	var picker;
	//var gLogger;
	var dd1, dd2;
	var r, g, b;

	function init() {
		if (typeof(ygLogger) != "undefined")
			ygLogger.init(document.getElementById("logDiv"));
		pickerInit();
		ddcolorposter.fillcolorbox("colorfield1", "colorbox1") //PREFILL "colorbox1" with hex value from "colorfield1"
		ddcolorposter.fillcolorbox("colorfield2", "colorbox2") //PREFILL "colorbox1" with hex value from "colorfield1"
    }

    // Picker ---------------------------------------------------------

    function pickerInit() {
		hue = YAHOO.widget.Slider.getVertSlider("hueBg", "hueThumb", 0, 180);
		hue.onChange = function(newVal) { hueUpdate(newVal); };

		picker = YAHOO.widget.Slider.getSliderRegion("pickerDiv", "selector",
				0, 180, 0, 180);
		picker.onChange = function(newX, newY) { pickerUpdate(newX, newY); };

		hueUpdate();

		dd1 = new YAHOO.util.DD("pickerPanel");
		dd1.setHandleElId("pickerHandle");
		dd1.endDrag = function(e) {
			// picker.thumb.resetConstraints();
			// hue.thumb.resetConstraints();
        };
	}

	executeonload(init);

	function pickerUpdate(newX, newY) {
		pickerSwatchUpdate();
	}


	function hueUpdate(newVal) {

		var h = (180 - hue.getValue()) / 180;
		if (h == 1) { h = 0; }

		var a = YAHOO.util.Color.hsv2rgb( h, 1, 1);

		document.getElementById("pickerDiv").style.backgroundColor =
			"rgb(" + a[0] + ", " + a[1] + ", " + a[2] + ")";

		pickerSwatchUpdate();
	}

	function pickerSwatchUpdate() {
		var h = (180 - hue.getValue());
		if (h == 180) { h = 0; }
		document.getElementById("pickerhval").value = (h*2);

		h = h / 180;

		var s = picker.getXValue() / 180;
		document.getElementById("pickersval").value = Math.round(s * 100);

		var v = (180 - picker.getYValue()) / 180;
		document.getElementById("pickervval").value = Math.round(v * 100);

		var a = YAHOO.util.Color.hsv2rgb( h, s, v );

		document.getElementById("pickerSwatch").style.backgroundColor =
			"rgb(" + a[0] + ", " + a[1] + ", " + a[2] + ")";

		document.getElementById("pickerrval").value = a[0];
		document.getElementById("pickergval").value = a[1];
		document.getElementById("pickerbval").value = a[2];
		var hexvalue = document.getElementById("pickerhexval").value =
			YAHOO.util.Color.rgb2hex(a[0], a[1], a[2]);
			ddcolorposter.initialize(a[0], a[1], a[2], hexvalue)
	}

</script>


<!--[if gte IE 5.5000]>
<script type="text/javascript">

function correctPNG() // correctly handle PNG transparency in Win IE 5.5 or higher.
   {
   for(var i=0; i<document.images.length; i++)
      {
	  var img = document.images[i]
	  var imgName = img.src.toUpperCase()
	  if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
	     {
		 var imgID = (img.id) ? "id='" + img.id + "' " : ""
		 var imgClass = (img.className) ? "class='" + img.className + "' " : ""
		 var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
		 var imgStyle = "display:inline-block;" + img.style.cssText
		 if (img.align == "left") imgStyle = "float:left;" + imgStyle
		 if (img.align == "right") imgStyle = "float:right;" + imgStyle
		 if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
		 var strNewHTML = "<span " + imgID + imgClass + imgTitle
		 + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
	     + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
		 + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>"
		 img.outerHTML = strNewHTML
		 i = i-1
	     }
      }
   }

YAHOO.util.Event.addListener(window, "load", correctPNG);

</script>
<![endif]-->
<?php
if($_POST['InsertAds'])	  {
	 
				if($_POST['category'] != '') {
				
				 
				mysql_query("INSERT INTO ".menu_product." SET 
				category='".$_POST['category']."',stt='".$_POST['order']."'
				,parent='".$_POST['parent']."',color='".$_POST['color']."'
				,bgcolor='".$_POST['bgcolor']."',hovercolor='".$_POST['hovercolor']."'");
				
				echo "Thêm '".$_POST['category']."' thành công";
			   }
	  }
	
	if($_POST['Ads'])	  {
	 
				if($_POST['category'] != '') {
				
				mysql_query("UPDATE ".menu_product." SET 
				category='".$_POST['category']."',stt='".$_POST['order']."'
				,parent='".$_POST['parent']."',color='".$_POST['color']."'
				,bgcolor='".$_POST['bgcolor']."',hovercolor='".$_POST['hovercolor']."'
				WHERE id='".intval(@$_GET['Edit'])."'");
				
				echo "Cập nhật '".$_POST['category']."' thành công";
				}
			  
	  }
	
      if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".menu_product." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }
		
	   if($_POST['ItemHid']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".menu_product." SET status='false' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	 
		  
		if($_POST['ItemShow']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("UPDATE  ".menu_product." SET status='true' WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	     

?>
<?php
if(@$_GET['Edit']=='') {?>
<div style="float:left">
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
<form action="" method="post" enctype="multipart/form-data" >
  <tr>
    <td width="21%"><div align="right">Tên nhóm </div></td>
    <td width="28%">
      <input name="category" type="text" id="category" style="width:200px;" />
    </td>
    <td rowspan="7"><div id="pickerPanel" class="dragPanel">
            <div id="pickerDiv">
              <img id="pickerbg" src="img/pickerbg.png" alt="">
              <div id="selector"><img src="img/select.gif"></div>
            </div>

             <div id="hueBg">
              <div id="hueThumb"><img src="img/hline.png"></div>
            </div>

            <div id="pickervaldiv">
                
                <br />
                R <input name="pickerrval" id="pickerrval" type="text" value="0" size="3" maxlength="3" />
                H <input name="pickerhval" id="pickerhval" type="text" value="0" size="3" maxlength="3" />
                <br />
                G <input name="pickergval" id="pickergval" type="text" value="0" size="3" maxlength="3" />
                S <input name="pickergsal" id="pickersval" type="text" value="0" size="3" maxlength="3" />
                <br />
                B <input name="pickerbval" id="pickerbval" type="text" value="0" size="3" maxlength="3" />
                V <input name="pickervval" id="pickervval" type="text" value="0" size="3" maxlength="3" />
                <br />
                <br />
                # <input name="pickerhexval" id="pickerhexval" type="text" value="0" size="6" maxlength="6" />
            </div>

            <div id="pickerSwatch" ></div>
    </div></td>
    </tr>
  
  <tr>
    <td><div align="right">Thuộc nhóm </div></td>
    <td><select  name="parent" class="input-text" id="parent" >
      <option value="0">Không thuộc nhóm nào</option>
      <?php
CategoryNews($_POST['parent'],menu_product)?>
    </select></td>
    </tr>
  <tr>
    <td><div align="right">Màu nền </div></td>
    <td>#
      <input name="bgcolor" type="text" id="bgcolor" size="6" maxlength="6" /></td>
    </tr>
  <tr>
    <td><div align="right">Màu chữ </div></td>
    <td>#
      <input name="color" type="text" id="color" size="6" maxlength="6" /></td>
    </tr>
  <tr>
    <td><div align="right">Màu chữ khi rê chuột </div></td>
    <td>#
      <input name="hovercolor" type="text" id="hovercolor" size="6" maxlength="6" /></td>
  </tr>
  <tr>
    <td><div align="right">Số thứ tự </div></td>
    <td>
	<select name="order" class="input-text" >
		<?php
order(1,50,$_POST['order'])?>
	</select></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>	  
      <input name="InsertAds" type="submit" id="InsertAds" value="Thêm category" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>
    </td>
    </tr>
  </form>
</table>
</div>
<?php
}?>

<?php
if(@$_GET['Edit']!='') {?>
<div style="float:left">
 <?php
$sqlstr=mysql_query("SELECT * FROM ".menu_product."  WHERE id='".intval(@$_GET['Edit'])."'");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      $row=mysql_fetch_array($sqlstr)
	
?>	 
<table border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EEEEEE"  align="left" cellpadding="3" cellspacing="0" width="800">
<form method="post" action=""  enctype="multipart/form-data">
   <tr>
    <td width="22%"><div align="right">Tên nhóm </div></td>
    <td width="28%">
      <input name="category" type="text" style="width:200px;" id="category" value="<?php echo $row['category']?>" />    </td>
    <td colspan="2" rowspan="7"><div id="pickerPanel" class="dragPanel">
            <div id="pickerDiv">
              <img id="pickerbg" src="img/pickerbg.png" alt="">
              <div id="selector"><img src="img/select.gif"></div>
            </div>

             <div id="hueBg">
              <div id="hueThumb"><img src="img/hline.png"></div>
            </div>

            <div id="pickervaldiv">
                
                <br />
                R <input name="pickerrval" id="pickerrval" type="text" value="0" size="3" maxlength="3" />
                H <input name="pickerhval" id="pickerhval" type="text" value="0" size="3" maxlength="3" />
                <br />
                G <input name="pickergval" id="pickergval" type="text" value="0" size="3" maxlength="3" />
                S <input name="pickergsal" id="pickersval" type="text" value="0" size="3" maxlength="3" />
                <br />
                B <input name="pickerbval" id="pickerbval" type="text" value="0" size="3" maxlength="3" />
                V <input name="pickervval" id="pickervval" type="text" value="0" size="3" maxlength="3" />
                <br />
                <br />
                # <input name="pickerhexval" id="pickerhexval" type="text" value="0" size="6" maxlength="6" />
            </div>

            <div id="pickerSwatch" ></div>
    </div></td>
    </tr>
  
   <tr>
     <td><div align="right">Thuộc nhóm </div></td>
     <td><select  name="select" class="input-text" id="select" >
       <option value="0">Không thuộc nhóm nào</option>
       <?php
CategoryNews($row['parent'],menu_product)?>
     </select></td>
     </tr>
   <tr>
     <td><div align="right">Màu nền </div></td>
     <td>#
       <input name="bgcolor" type="text" id="bgcolor" value="<?php echo $row['bgcolor']?>" size="6" maxlength="6" /></td>
     </tr>
   <tr>
     <td><div align="right">Màu chữ </div></td>
     <td>#
       <input name="color" type="text" id="color" value="<?php echo $row['color']?>" size="6" maxlength="6" /></td>
     </tr>
   <tr>
     <td><div align="right">Màu chữ khi rê chuột </div></td>
     <td>#
       <input name="hovercolor" type="text" id="hovercolor" value="<?php echo $row['hovercolor']?>" size="6" maxlength="6" /></td>
     </tr>
   <tr>
    <td><div align="right">Số thứ tự </div></td>
    <td>
	<select name="order" class="input-text" >
		<?php
order(1,50,$row['stt'])?>
	</select></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>	  
      <input type="submit" name="Ads" value="Sửa category" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>    </td>
    </tr>
  </form>
</table>
</div>
<?php
} }?>
<div style="float:left; padding-top:20px">

<form method="post" action="">
<table  border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800">
 <?php
$sqlstr=mysql_query("SELECT * FROM ".menu_product." WHERE parent='0' order by stt ASC");
	  if(mysql_num_rows($sqlstr)>0)   {
?>
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow1.png" border="0" /></td>
	    <td colspan="5" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa nhóm này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn nhóm này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện nhóm này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>		</td>
  </tr>		

<tr height="25px" style="background-color:#EEEEEE">
      <td width="5%" ><div align="center">#ID</div></td>
	    <td width="26%" >Tên nhóm</td>
      <td width="23%" ><div align="center">Tên loại</div></td>
      <td width="22%" ><div align="center">Tên loại 1 </div></td>
      <td width="12%" ><div align="center">Hiển thị </div></td>
      <td width="12%" nowrap="nowrap" ><div align="center">Trạng Thái</div></td>        
</tr>

<?php
while($row=mysql_fetch_array($sqlstr))	 {
	
?>	  
	  <tr style="cursor:pointer" onDblClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $row['id']?>'">
	    <td width="24" height="15"  align="center" bgcolor="#EEEEEE" >
		<input  type="checkbox" name="element[]"  value="<?php echo $row['id']?>" /></td>
		<td width="204"   bgcolor="#EEEEEE"><?php echo $row['category']?></td>
		<td width="178" align="center" >&nbsp;</td>
		<td width="166" align="center" >&nbsp;</td>
		<td width="91"  ><div align="center"><?php echo $row['stt']?></div></td>
		<td width="87" align="center"><?php echo $row['status']?></td>
	</tr>	  
            <?php
$sqlSub=mysql_query("SELECT * FROM ".menu_product." WHERE parent='".$row['id']."' order by stt ASC");
			  if(mysql_num_rows($sqlSub)>0)   {
			   
			  while($rowSub=mysql_fetch_array($sqlSub))	 {
			
			?>	  
		  <tr style="cursor:pointer" onDblClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $rowSub['id']?>'">
			<td width="24" height="15"  align="center" bgcolor="#EEEEEE" >
			<input  type="checkbox" name="element[]"  value="<?php echo $rowSub['id']?>" /></td>
			<td width="204"  >&nbsp;</td>
			<td width="178" align="left" >&nbsp;<?php echo $rowSub['category']?></td>
			<td width="166" align="left" >&nbsp;</td>
			<td width="91"  ><div align="center"><?php echo $rowSub['stt']?></div></td>
			<td width="87" align="center"><?php echo $rowSub['status']?></td>
		</tr>
		    
			  <?php
$sqlSub1=mysql_query("SELECT * FROM ".menu_product." WHERE parent='".$rowSub['id']."' order by stt ASC");
			  if(mysql_num_rows($sqlSub1)>0)   {
			   
			  while($rowSub1=mysql_fetch_array($sqlSub1))	 {
			
			?>	  
		  <tr style="cursor:pointer" onDblClick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Edit=<?php echo $rowSub1['id']?>'">
			<td width="24" height="15"  align="center" bgcolor="#EEEEEE" >
			<input  type="checkbox" name="element[]"  value="<?php echo $rowSub1['id']?>" /></td>
			<td width="204"  >&nbsp;</td>
			<td align="left" >&nbsp;</td>
			<td width="166" align="left" >&nbsp;<?php echo $rowSub1['category']?></td>
			<td width="91"  ><div align="center"><?php echo $rowSub1['stt']?></div></td>
			<td width="87" align="center"><?php echo $rowSub1['status']?></td>
		  </tr>	
			<?php
}}?>   
		 
		   
	   <?php
}}?> 
<?php
}}?> 
<tr>
	    <td height="32"  align="center" bgcolor="#EEEEEE"><img style="width:20px" src="../images/arrow.png" border="0" /></td>
	    <td colspan="5" >
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Xóa nhóm này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Ẩn nhóm này" name="ItemHid" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>> 
		<input type="submit"   onClick="return confirm('Bạn có chắc không ?');" value="Hiện nhóm này" name="ItemShow" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>		</td>
  </tr>		  
</table>
</form></div>

