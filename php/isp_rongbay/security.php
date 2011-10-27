
<?php
function createImage(){
// Delete Old File
		if (is_file(@$_SESSION['stringcode']."gif")) @unlink(@$_SESSION['old_file_code']."gif");
		
// Creates the images, writes the file       
	   $fileRand = $_REQUEST["PHPSESSID"];
       $string_a = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","p","q","r","s","t","u","v","w","x","y","x","0","1","2","3","4","5","6","7","8","9");
       $keys = array_rand($string_a,6);
       foreach($keys as $n=>$v)
	    {
           $string .= $string_a[$v];
         }
		session_register("stringcode");
		@$_SESSION['stringcode'] = $string;		
		//$backgroundimage = "security/bg_im.gif";
		//$im=imagecreatefromgif($backgroundimage);
		//$colour = imagecolorallocate($im, rand(0,0), rand(0,0), rand(0,0));
		//$font = 'security/arial.ttf';
		//$angle = rand(0,0);
// Add the text
		//imagefttext(
		//imagettftext($im, 11, $angle,14, 17, $colour, $font, $string);
		//$outfile= "security/$fileRand.gif";
		//imagegif($im,$outfile);
		return $string;
}
?>
