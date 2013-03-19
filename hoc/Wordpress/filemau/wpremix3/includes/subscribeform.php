<?php
$wpr_feedburner_id = get_option('wpr_feedburner_id');
?>
<form action="http://www.feedburner.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open('http://www.feedburner.com/fb/a/mailverify?uri=<?php echo $wpr_feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
	<input name="email" type="text" value="Your Email Address" class="subtextfield" onFocus="if (this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}" />
	<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
	<input type="hidden" name="uri" value="<?php echo $wpr_feedburner_id; ?>" />
	<input type="hidden" name="loc" value="en_US"/>
	<input type="image" src="<?php bloginfo('template_url'); ?>/images/b_go.png"   value=""  />
</form>
