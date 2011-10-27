<?php
include "check.php";?>
<SCRIPT type=text/javascript>
var hoso = document.hoso;

//***********************************************************************
function doAdd(osource, odes, imax){
	if(odes.options.length<imax) AddTo(osource, odes);
	if(odes.options.length>imax){
		for(i=odes.options.length-1; i>imax-1; i--)
		{
			odes.options[i].selected = true;
			RemoveFrom(odes);
		}//for
	}//if
}

function AddTo(_64,_65){
for(k=0;k<_64.length;k++){
IsExisted=false;
if(_64.options[k].selected==true){
stext=_64.options[k].text;
svalue=_64.options[k].value;

for(i=0;i<_65.length;i++){
if(svalue==_65.options[i].value)
{

IsExisted=true;
break;
}
}
if(IsExisted==false){
var _66=new Option(stext,svalue);
j=_65.length;

_65.options[j]=_66;
}
}
}
}
function RemoveFrom(_67){
for(k=_67.length-1;k>-1;k--){
if(_67.options[k].selected){
_67.options[k]=null;
}
}
}
function select_multi(_68)
 {
	   for(k=_68.length-1;k>-1;k--)
	   {
		_68.options[k].selected=true;
	   }
 }
 
</SCRIPT>
<BR /><div style="width:96%; vertical-align:top" align="left"><strong>THÊM THÀNH VIÊN QUẢN TRỊ:</strong></div>
<?php
if($_POST['Insert'])	  {	 
		 
		 if(is_array($_POST['mana_mod']))      {
		 
		
		   
		 }
	  
		  $sql           = " INSERT INTO ".admin." SET ";
		  $sql          .= "  username      = '".text($_POST['username'])."'";
		  $sql          .= " ,password      = '".md5(md5(text($_POST['password'])))."'";
		  $sql          .= " ,fullname      = '".text($_POST['fullname'])."'";
		  $sql          .= " ,category      = '". implode(",",$_POST['mana_mod'])."'";		
		  $sql          .= " ,user_mod      = '".$_POST['user_mod']."'";		
		  
		  mysql_query($sql);
			
		  echo "<script language=javascript>location.href='".$_SERVER['HTTP_REFERER']."'</script>";
	  }

if($_POST['Update'])	  {	 
		 
		  if(is_array($_POST['mana_mod']))      {
		 
		   $mana_mod=implode(",",$_POST['mana_mod']);
		   
		  } 
	  
		  $sql           = " UPDATE ".admin." SET ";
		  $sql          .= "  username      = '".text($_POST['username'])."'";		 
		  $sql          .= " ,fullname      = '".text($_POST['fullname'])."'";		
		  $sql          .= " ,user_mod      = '".$_POST['user_mod']."'";
		  $sql          .= " ,category      = '". implode(",",$_POST['mana_mod'])."'";			
		  $sql          .= " WHERE id       = '".intval(@$_GET['edit'])."'"; 
		  mysql_query($sql);
			
		  echo "<script language=javascript>location.href='".$_SERVER['HTTP_REFERER']."'</script>";
 }

if($_POST['ChangePass'])	  {	 		 
	  
		  $sql           = " UPDATE ".admin." SET ";
		  $sql          .= " password      = '".md5(md5(text($_POST['password'])))."'";	
		  $sql          .= " WHERE id       = '".intval(@$_GET['Pass'])."'"; 
		  
		  mysql_query($sql);
			
		  echo "<script language=javascript>alert('Thay đổi mật khẩu thành công');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
	  }	  
	  
if($_POST['ItemDel']) {
		      $action='';
			  if($_POST['element']=='') {
			  
			     echo '<script>alert(\'Mời bạn chọn ít nhất 1 bản tin\')</script>';
				 $action=true;
			  } 
			  if($action=='') {
		  
			  mysql_query("DELETE FROM ".admin." WHERE id in (".implode(",",$_POST['element']).")");
			 
			  }
		  }	
?>
<?php
if(@$_GET['edit']=='') {?>
<div style="float:left">
<form  method="post" action="" enctype="multipart/form-data" name="hoso">
<table width="800px" border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EFEFEF"  align="left" cellpadding="3" cellspacing="0">
  <TR>
   <TD width="160" style="padding-left:5px; padding-top:10px "  ><div align="right">Tên đăng nhập:</div></TD>
   <TD colspan="3" style="padding-top:10px " ><label>
     <input type="text" name="username" id="username" class="input_text" >
   </label></TD>
  </TR>
  <TR>
    <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Mật khẩu:</div></TD>
    <TD colspan="3" style="padding-top:10px " ><input type="password" name="password" id="password" class="input_text" ></TD>
  </TR>  
  <TR>
    <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Tên hiển thị:</div></TD>
    <TD colspan="3" style="padding-top:10px " ><input type="text" name="fullname" id="fullname" class="input_text" ></TD>
  </TR>
  <TR>
    <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Danh mục quản lý:</div></TD>
    <TD width="170" style="padding-top:10px " >
    <SELECT ondblclick="doAdd(this, hoso.cityid, 100);select_multi(cityid);"  style="WIDTH: 170px; height:100"  multiple="multiple" size=3 name=cityid_s> 
     <?php
$sql=mysql_query("SELECT * FROM ".manaCategory."  ORDER BY id ASC"); 
	 
	 while($row=mysql_fetch_array($sql)) {	 
	  ?>
         <option value="<?php echo $row['categoryLink']?>"><?php echo $row['categoryName']?></option>
     <?php
} ?>	
	</select>
    </TD>
    <TD width="34" style="padding-top:10px " >
    <input  type="button" onclick="doAdd(cityid_s, hoso.cityid, 100);select_multi(cityid);" value="&gt;&gt;" />
      <br />
      <input type="button" onclick="RemoveFrom(cityid);" value="&lt;&lt;" />
    </TD>
    <TD width="302" style="padding-top:10px " >
      <select   onmouseout="select_multi(cityid);"   id="cityid"  ondblclick="RemoveFrom(this);" style="WIDTH: 140px; height:100"  multiple="multiple" size="3" name="mana_mod[]">
      </select></TD>
  </TR>
  <TR>
    <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Quyền quản lý:</div></TD>
    <TD colspan="3" style="padding-top:10px " ><label>
      <select name="user_mod" id="user_mod"  class="input_text">
      <option value="1">ADMIN</option>
      <option value="2">USER</option>
      </select>
    </label></TD>
  </TR>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><label>	
      <input type="submit" name="Insert" value="Thêm thành viên" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
     
    </label></td>
  </tr>
</table>
</form>
</div>
<?php
}?>

<?php
if(@$_GET['edit']!='') {?>
<?php
$sql=mysql_query("SELECT * FROM ".admin." WHERE id = ".intval(@$_GET['edit'])."");
	    $row=mysql_fetch_array($sql);
?>
<div style="float:left">
<form  method="post" action="" enctype="multipart/form-data" name="hoso">
<table width="800px" border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EFEFEF"  align="left" cellpadding="3" cellspacing="0">
  <TR>
   <TD width="195" style="padding-left:5px; padding-top:10px "  ><div align="right">Tên đăng nhập:</div></TD>
   <TD colspan="3" style="padding-top:10px " ><label>
     <input type="text" name="username" id="username" class="input_text" value="<?php echo $row['username']?>" >
   </label></TD>
   </TR> 
  <TR>
    <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Tên hiển thị:</div></TD>
    <TD colspan="3" style="padding-top:10px " ><input type="text" name="fullname" id="fullname" class="input_text"  value="<?php echo $row['fullname']?>"></TD>
	</TR>  
   <TR>
    <TD style="padding-left:5px; padding-top:10px "><div align="right">Danh mục quản lý:</div></TD>
    <TD width="193" style="padding-top:10px " >
    <SELECT ondblclick="doAdd(this, hoso.cityid, 100);select_multi(cityid);"  style="WIDTH: 170px; height:100"  multiple="multiple" size=3 name=cityid_s> 
     <?php
$sqlstr=mysql_query("SELECT * FROM ".manaCategory."  ORDER BY id ASC"); 
	 
	 while($rowstr=mysql_fetch_array($sqlstr)) {	 
	  ?>
         <option value="<?php echo $rowstr['categoryLink']?>"><?php echo $rowstr['categoryName']?></option>
     <?php
} ?>	
	</select>    </TD>
    <TD width="35" style="padding-top:10px " >
    <input  type="button" onclick="doAdd(cityid_s, hoso.cityid, 100);select_multi(cityid);" value="&gt;&gt;" />
      <br />
      <input type="button" onclick="RemoveFrom(cityid);" value="&lt;&lt;" />    </TD>
    <TD width="343" style="padding-top:10px ">
      <select   onmouseout="select_multi(cityid);"   id="cityid"  ondblclick="RemoveFrom(this);" style="WIDTH: 140px; height:100"  multiple="multiple" size="3" name="mana_mod[]">
       <?php
$category = explode(",",$row['category']);
		 for($i = 0;$i < count($category);$i++) {
	   ?>
           <option value="<?php echo $category[$i]?>">
		      <?php
$sqlstr1=mysql_query("SELECT * FROM ".manaCategory."  WHERE categoryLink = '".$category[$i]."'"); 
	 
				 while($rowstr1=mysql_fetch_array($sqlstr1)) {	
				 
				 echo $rowstr1['categoryName'];
			  ?>
              <?php
}?>		   
           </option>
       <?php
}?>
      </select>      </TD>
  </TR>
  <TR>
    <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Quyền quản lý:</div></TD>
    <TD colspan="3" style="padding-top:10px " >
      <select name="user_mod" id="user_mod"  class="input_text">
      <option value="1" <?php
echo $row['user_mod'] == '1'?'Selected':''?>>ADMIN</option>
      <option value="2" <?php
echo $row['user_mod'] == '2'?'Selected':''?>>USER</option>
      </select>    </TD>
	  </TR>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><label>	
      <input type="submit" name="Update" value="Cập nhật thành viên" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>  onmouseout="select_multi(cityid);">
      <input type="reset" name="Submit2" value="Nhập lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
    </label></td>
	</tr>
</table>
</form>
</div>
<?php
}?>

<?php
if(@$_GET['Pass']!='') {?>

<div style="float:left">
<form  method="post" action="" enctype="multipart/form-data">
<table width="800px" border="1" bordercolor="#CCCCCC" bordercolorlight="#CCCCCC" bgcolor="#EFEFEF"  align="left" cellpadding="3" cellspacing="0">
  <TR>
   <TD style="padding-left:5px; padding-top:10px "  ><div align="right">Mật khẩu mới:</div></TD>
   <TD style="padding-top:10px " ><label>
     <input type="password" name="password" id="password" class="input_text" value="<?php echo $_POST['password']?>" >
   </label></TD>
  </TR>  
  <tr>
    <td>&nbsp;</td>
    <td><label>	
      <input type="submit" name="ChangePass" value="Thay đổi mật khẩu" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
      <input type="reset" name="Submit2" value="Nhập lại" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>>
    </label></td>
  </tr>
</table>
</form>
</div>
<?php
}?>

<div style="float:left; ">
<form method="post" name="check_form" action="">
<table border="1" bordercolor="#DDDDDD" bordercolorlight="#CCCCCC" bgcolor="#FFFFFF"  align="left" cellpadding="3" cellspacing="0" width="800px"> 
  <tr bgcolor="#EFEFEF">
    <td width="5%"  ><div align="center"><strong>#ID</strong></div></td>
    <td width="26%" height="21"  style="padding-left:20px"><strong>Họ tên</strong></td>
    <td width="20%" ><strong>Tên truy cập</strong></td>    
    <td width="20%" ><div align="left"><b>Cấp độ</b></div></td>    
    <td width="29%" ><strong>Đổi mật khẩu</strong></td>
  </tr>
<?php
$sqlstr = mysql_query("SELECT * FROM ".admin."");		  
	  
	  if(mysql_affected_rows()>0)  {  
	   
	  while($row=mysql_fetch_array($sqlstr))  {  
?> 
  <tr style="cursor:pointer" ondblclick="location.href='index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&edit=<?php echo $row['id']?>'">
    <td   align="center" bgcolor="#EFEFEF">
    <input  type="checkbox" name="element[]"  value="<?php echo $row['id']?>" />    </td>
    <td height="20" style="padding-left:20px" ><?php echo $row['fullname']?></td>    
    <td  ><?php echo $row['username']?></td> 
   <td  ><?php
echo $row['user_mod'] == '1'?'ADMIN':'USER'?></td>      
   <td  ><a href="index.php?menu=<?php echo @$_GET['menu']?>&site=<?php echo @$_GET['site']?>&Pass=<?php echo $row['id']?>">Đổi mật khẩu</a></td>
  </tr>
  
<?php
} }?>  
<tr bgcolor="#EFEFEF">
    <td   align="center"><img src="../images/arrow.png" border="0" /></td>
    <td height="20" colspan="4" >
    <input type="submit"   onclick="return confirm('Bạn có chắc không ?');" value="Xóa thành viên này" name="ItemDel" style="border:0px; background-color:#DDDDDD; cursor:pointer" <?php
echo @$_SESSION['modmana'] == '2'?'disabled':''?>/>    
    </td>
    </tr>
</table>
</form>
</div>
