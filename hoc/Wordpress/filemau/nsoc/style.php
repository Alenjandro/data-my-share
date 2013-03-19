<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");

$wpr_body_color = get_option('wpr_body_color');
if($wpr_body_color == '') die('/* Default style loaded already */');
?>
/*Everything should be below this*/
@import url("css/color-<?php echo $wpr_body_color; ?>.css");
