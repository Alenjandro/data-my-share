<?php 
if ( in_category(array('s_01','s_02','environment_plant',6,'sub01','sub02','sub03','sub04','sub05','sub06','sub07','control','research'))) {
	include(TEMPLATEPATH."/single_business.php");
} else {
	include(TEMPLATEPATH . "/single_blog.php");
}
?>