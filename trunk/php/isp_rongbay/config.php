<?php
include 'connect.php';	

$sqlstr=mysql_query("SELECT * FROM ".config."  ");
	  if(mysql_num_rows($sqlstr)>0)   {
	   
      while($row=mysql_fetch_array($sqlstr)){
	  
	  define($row['config'],$row['define'],true);
	  
	  }}mysql_free_result($sqlstr);
	  
function format_date()
  {
    $str_1=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	$str_2=array("Chủ nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy");
	$str=str_replace($str_1,$str_2,date("l",time()));
	return $str;
  }
//Thong ke truy cap
$sql=mysql_query("SELECT * FROM ".statis."");
    if(mysql_num_rows($sql)>0){
    $rs=mysql_fetch_array($sql);
		if(@$online > ($rs['thanhvien']+$rs['khach'])){
			mysql_query("update ".statis." set thanhvien='".NumRow(id,members,"online='true'")."',
			khach='".($online - NumRow(id,members,"online='true'"))."',ngay='".time()."'");
		}
		if(@$all>$rs['luottruycap']){
			$visited = $all;
		}else{
			$visited = $rs['luottruycap'];
		}
		if($visited>$rs['luottruycap']){
			mysql_query("update ".statis." set luottruycap='".intval($visited)."'");
		}
	}
//#################################
function CategorySesion($table,$id_2)  {  
      global $id_product,$id_menu;
      $sqlstr = mysql_query("SELECT id FROM  ".$table." WHERE parent = '".intval($id_2)."' ");	
	  if(mysql_num_rows($sqlstr) > 0) { 	
		  while($row = mysql_fetch_array($sqlstr))	   {   
		  
								  if($id_menu == '') {
										$id_menu = $row['id'].','.intval($id_2);
								  } else {
										$id_menu .= ','.$row['id'];   
								  }	   	
			  
								 CategorySesion($table,$row['id']);
		   }}
	  
	   $id_menu = $id_menu?$id_menu:$id_2;
	  
	   return $id_product = $id_menu;
  }   
function NumRow($field,$table,$clause) {
    return  mysql_num_rows(mysql_query("SELECT $field FROM $table WHERE $clause"))  ;

}
function NumRow1($field,$table) {
    return  mysql_num_rows(mysql_query("SELECT $field FROM $table"))  ;

}

function MaxRow($field,$table,$clause) {
    return  mysql_query("SELECT MAX($field) FROM $table WHERE $clause")  ;

} 
function headerTop($table,$id) {

       $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status=true AND id = '".intval($id)."' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	   $row=mysql_fetch_array($sqlstr);
	   echo $row['category'];
	   }mysql_free_result($sqlstr);
}
function headerCat($table,$id) {

       $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status=true AND id = '".intval($id)."' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	   $row=mysql_fetch_array($sqlstr);
	   return $row['category'];
	   }mysql_free_result($sqlstr);
}
function headerTopDetail($table,$table1,$id) {

       $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status = 'true' AND id = '".intval($id)."' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	   
	   while($row=mysql_fetch_array($sqlstr)) {
	      
			   $sqlsub=mysql_query("SELECT * FROM ".$table1." WHERE status = 'true' AND id = '".intval($row['category'])."' ");
			  
			   if(mysql_num_rows($sqlsub)>0)   {
			   
			   $rowsub=mysql_fetch_array($sqlsub);
			   echo $rowsub['category'];
			   }mysql_free_result($sqlsub);
			}
			  
		}  mysql_free_result($sqlstr); 
		
} 
function order($m,$j,$k) {   

		for($i=$m;$i<$j;$i++)  {
		  
		 echo "<option value=".$i." ".($i==$k?'Selected':'').">".$i."</option>";
		 }	
 }
 /*Category news*/
function CategoryNews($id,$table)  {

	   $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status=true AND parent = '0' ORDER BY stt ASC");
	   if(mysql_num_rows($sqlstr)>0)   {
	   while($row=mysql_fetch_array($sqlstr))	    { 
		
		echo  "<option value=".$row['id']." ".($row['id']==$id?'Selected':'')." >".$row['category']."</option>";		
		    $sqlsub=mysql_query("SELECT * FROM ".$table." WHERE parent='".$row['id']."' ORDER BY stt ASC");
			 if(mysql_num_rows($sqlsub)>0)   {			
			 while($rowsub=mysql_fetch_array($sqlsub)) {
			 
			   echo  "<option value=".$rowsub['id']." ".($rowsub['id']==$id?'Selected':'').">&nbsp;&nbsp;&nbsp;&nbsp;".$rowsub['category']."</option>";
			   
				 $sqlsub1=mysql_query("SELECT * FROM ".$table." WHERE parent='".$rowsub['id']."' ORDER BY stt ASC");
				 if(mysql_num_rows($sqlsub1)>0)   {			
				 while($rowsub1=mysql_fetch_array($sqlsub1)) {
			 
			     echo  "<option value=".$rowsub1['id']." ".($rowsub1['id']==$id?'Selected':'').">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;".$rowsub1['category']."</option>";
			} }mysql_free_result($sqlsub1);
			
			} }mysql_free_result($sqlsub);
		}
	 }mysql_free_result($sqlstr);
}
 /*Parent Category*/
function CategoryParent($id,$table)  {

	   $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status=true AND parent='0' ORDER BY stt ASC");
	   if(mysql_num_rows($sqlstr)>0)   {
	   while($row=mysql_fetch_array($sqlstr))	    { 
		
		echo  "<option value=".$row['id']." ".($row['id']==$id?'Selected':'').">".$row['category']."</option>";		
		}
	 }mysql_free_result($sqlstr);
}
//------------
function CategoryMenu($id,$table)  {

	   $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status=true ORDER BY stt ASC");
	   if(mysql_num_rows($sqlstr)>0)   {
	   while($row=mysql_fetch_array($sqlstr))	    { 
		
		echo  "<option value=".$row['id']." ".($row['id']==$id?'Selected':'').">".$row['category']."</option>";		
		}
	 }mysql_free_result($sqlstr);
}

function Province($id,$table)  {

	   $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE tid='".intval($id)."' AND status='true' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	  $row=mysql_fetch_array($sqlstr); 
		
		echo  $row['name'];		

	 }mysql_free_result($sqlstr);
}

function Typecategory($id,$table)  {

	   $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE id='".intval($id)."' AND status='true' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	  $row=mysql_fetch_array($sqlstr); 
		
		echo  $row['category'];		

	 }mysql_free_result($sqlstr);
}

function Members($id,$table)  {

	   $sqlstr=mysql_query("SELECT username FROM ".$table." WHERE id='".intval($id)."' AND status='true' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	  $row=mysql_fetch_array($sqlstr); 
		
		echo  $row['username'];		

	 }mysql_free_result($sqlstr);
}
function anhthanhvien($id,$table) {

       $sqlstr=mysql_query("SELECT picture FROM ".$table." WHERE status='true' AND id = '".intval($id)."' ");
	   if(mysql_num_rows($sqlstr)>0)   {
	   $row=mysql_fetch_array($sqlstr);
	   echo $row['picture'];
	   }mysql_free_result($sqlstr);
}
 /*Category*/
function Category($id,$k,$table)  {

	   $sqlstr=mysql_query("SELECT * FROM ".$table." WHERE status = true AND parent = '".intval($k)."' ORDER BY stt ASC");
	   if(mysql_num_rows($sqlstr)>0)   {
	   while($row=mysql_fetch_array($sqlstr))	    { 
		
		echo  "<option value=".$row['id']." ".($row['id']==$id?'Selected':'').">".$row['category']."</option>";		
		}
	 }mysql_free_result($sqlstr);
}
/*Upload picture*/
function uploads($file='picture',$folder = '../images/')
{
 global $picture;
            $picture = time()."_".$_FILES[$file]['name'];	  
		
			if(@copy($_FILES[$file]['tmp_name'],$folder.$picture))	{
			
			   $check=@getimagesize($folder.$picture);
			
		         if($check[0]!='') {	
				 
				    return $picture;
				 }	
				 			
				 else {	
					  @unlink($folder.$picture);
					  echo "<script>alert('Ảnh không đúng định dạng. Mời bạn đăng lại ảnh');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
					  
	            }			
	        }
			else {
			return $picture='';
			}
	  
}
function upload_pic($file='file',$folder = 'images/')
{
 global $fileimage;
            $fileimage = time()."_".$_FILES[$file]['name'];	  
		
			if(@copy($_FILES[$file]['tmp_name'],$folder.$fileimage))	{
			
			   $check=@getimagesize($folder.$fileimage);
			
		         if($check[0]!='') {	
				 
				    return $fileimage;
				 }	
				 			
				 else {	
					  @unlink($folder.$fileimage);
					  echo "<script>alert('Ảnh không đúng định dạng. Mời bạn đăng lại ảnh');location.href='".$_SERVER['HTTP_REFERER']."'</script>";
					  
	            }			
	        }
			else {
			return $fileimage='';
			}
	  
}
function text(&$string) {	
    $string = trim($string);
	$string = str_replace("\\'","'",$string);
	$string = str_replace("'","''",$string);
	$string = str_replace('\"',"&quot;",$string);
	$string = str_replace("<", "&lt;", $string);
	$string = str_replace(">", "&gt;", $string);
	return $string;
}
function textContent($string) {   
	$string = trim($string);
	$string = str_replace("\\'","'",$string);
	$string = str_replace("'","''",$string);
	return $string;
}
function sub_str($string,$length)    {		
 		
		$substr=explode(" ",$string);
		 for($i=0;$i<$length;$i++)	   {
		 
			$str.=" ".$substr[$i];					
		 }
		  return $str;
}
function convertSpace($string){

		$a=array("%",")","(","ễ",";",",","&","&quot;","“","”","/","Á","À","Ả","Ã","Ạ","Ó","Ò","Ỏ","Õ","Ọ","Ă","Ắ","Ằ","Ẳ","Ẵ","Ặ","Ô","Ố","Ồ","Ổ","Ỗ","Ộ","Â","Ã","Á","À","Ả","Ẫ","Ậ","Ơ","Ớ","Ờ","Ở","Ỡ","Ợ","É","È","Ẻ","Ẽ","Ẹ","Ú","Ù","Ủ","Ũ","Ụ","Ê","Ễ","Ề","Ể","Ệ","Ế","Ư","Ứ","Ừ","Ử","Ữ","Ự","Í","Ì","Ỉ","Ĩ","Ị","Ý","Ỳ","Ỷ","Ỹ","Ỵ","Đ","á","à","ả","ã","ạ","ó","ò","ỏ","õ","ọ","ă","ắ","ằ","ẳ","ẵ","ặ","ô","ố","ồ","ổ","ỗ","ộ","â","ã","ấ","ầ","ẩ","ẫ","ậ","ơ","ớ","ờ","ở","ỡ","ợ","é","è","ẻ","ê","ế","ề","ệ","ẽ","ẹ","ú","ù","ủ","ũ","ụ","ê","ẽ","ề","ể","ệ","ư","ứ","ừ","ử","ữ","ự","í","ì","ỉ","ĩ","ị","ý","ỳ","ỷ","ỹ","ỵ","đ","---","--","'","Ấ","Ầ","\\","?",".","̀","̣","̃","́","̉","\"",":");
		$b=array("","","","e","","","","","","","-","a","a","a","a","a","o","o","o","o","o","a","a","a","a","a","a","o","o","o","o","o","o","a","a","a","a","a","a","a","o","o","o","o","o","o","e","e","e","e","e","e","u","u","u","u","u","e","e","e","e","e","u","u","u","u","u","u","i","i","i","i","i","y","y","y","y","y","d","a","a","a","a","a","o","o","o","o","o","a","a","a","a","a","a","o","o","o","o","o","o","a","a","a","a","a","a","a","o","o","o","o","o","o","e","e","e","e","e","e","e","e","e","u","u","u","u","u","e","e","e","e","e","u","u","u","u","u","u","i","i","i","i","i","y","y","y","y","y","d","-","-","","","","","","","","","","","","","");
		return strtolower(str_replace($a,$b,str_replace(" ", "-",$string)));
}
function crop($path_src,$path_desc,$thumb_width,$thumb_height){
	$PathImgOld = $path_src;
	$PathImgNew = $path_desc;
	$NewWidth = $thumb_width;
	$NewHeight = $thumb_height;

	list( $w, $h, $source_image_type ) = getimagesize( $PathImgOld );
	
	$NewWidth=($NewWidth<$w)?$NewWidth:$w;
	$NewHeight=($NewHeight<$h)?$NewHeight:$h;

	switch ( $source_image_type )
	{
		case IMAGETYPE_GIF:
			$simg = imagecreatefromgif( $PathImgOld );
		break;
		
		case IMAGETYPE_JPEG:
			$simg = imagecreatefromjpeg( $PathImgOld );
		break;
		
		case IMAGETYPE_PNG:
			$simg = imagecreatefrompng( $PathImgOld );
	
		break;
	}
	
	$dimg = imagecreatetruecolor($NewWidth, $NewHeight);
	$wm = $w/$NewWidth;
	$hm = $h/$NewHeight;
	$h_height = $NewHeight/2;
	$w_height = $NewWidth/2;
	if($w> $h) {
		$adjusted_width = $w / $hm;
		$half_width = $adjusted_width / 2;
		$int_width = $half_width - $w_height;
		$imagecopyresampled=1;
		//imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$NewHeight,$w,$h);
	} elseif(($w <$h) || ($w == $h)) {
		$adjusted_height = $h / $wm;
		$half_height = $adjusted_height / 2;
		$int_height = $half_height - $h_height;
		$imagecopyresampled=2;
		//imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$NewWidth,$adjusted_height,$w,$h);
	} else {
		$imagecopyresampled=3;
		//imagecopyresampled($dimg,$simg,0,0,0,0,$NewWidth,$NewHeight,$w,$h);
	}
	
	switch ( $source_image_type )
	{
		case IMAGETYPE_GIF:
			$colorTransparent = imagecolortransparent($simg);
			imagepalettecopy($dimg, $dimg);
		   	imagefill($dimg, 0, 0, $colorTransparent);
		   	imagecolortransparent($dimg, $colorTransparent);
		   	switch ($imagecopyresampled){
		   		case 1:
		   			imagecopyresized($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$NewHeight,$w,$h);
		   			break;
		   		case 2:
		   			imagecopyresized($dimg,$simg,0,-$int_height,0,0,$NewWidth,$adjusted_height,$w,$h);
		   			break;
		   		case 3:
		   			imagecopyresized($dimg,$simg,0,0,0,0,$NewWidth,$NewHeight,$w,$h);
		   			break;	
		   	}
		   	//imagecopyresized($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
			imagejpeg( $dimg, $PathImgNew, 90 );
		break;
		
		case IMAGETYPE_JPEG:
		    $colorTransparent = imagecolortransparent($simg);
			imagepalettecopy($dimg, $dimg);
		   	imagefill($dimg, 0, 0, $colorTransparent);
		   	imagecolortransparent($dimg, $colorTransparent);
			switch ($imagecopyresampled){
		   		case 1:
		   			imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$NewHeight,$w,$h);
		   			break;
		   		case 2:
		   			imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$NewWidth,$adjusted_height,$w,$h);
		   			break;
		   		case 3:
		   			imagecopyresampled($dimg,$simg,0,0,0,0,$NewWidth,$NewHeight,$w,$h);
		   			break;	
		   	}
			//imagecopyresampled( $thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height );
			imagejpeg( $dimg, $PathImgNew, 90 );
		break;
		
		case IMAGETYPE_PNG:
			$colorTransparent = imagecolortransparent($simg);
			imagepalettecopy($dimg, $dimg);
		   	imagefill($dimg, 0, 0, $colorTransparent);
		   	imagecolortransparent($dimg, $colorTransparent);
			switch ($imagecopyresampled){
		   		case 1:
		   			imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$NewHeight,$w,$h);
		   			break;
		   		case 2:
		   			imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$NewWidth,$adjusted_height,$w,$h);
		   			break;
		   		case 3:
		   			imagecopyresampled($dimg,$simg,0,0,0,0,$NewWidth,$NewHeight,$w,$h);
		   			break;	
		   	}
			//imagecopyresampled( $thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height );
			imagejpeg( $dimg, $PathImgNew, 90 );
		break;
	}
	
	imagedestroy($dimg);
}
?>