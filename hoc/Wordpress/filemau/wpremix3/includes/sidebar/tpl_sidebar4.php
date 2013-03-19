<?php
$wpr_feedburner_id = get_option('wpr_feedburner_id');
?>

<!--sidebar #start-->
<div id="sidebar">
	<script type="text/javascript" language="javascript" src="<?php bloginfo('template_directory'); ?>/js/vmenu.js"> </script>
	<ul id="navmenu-v" >
		<?php wp_list_pages('sort_column=menu_order&depth=5&title_li=');?>
	</ul>

	<div class="sfeatures">
 		<h5>See in action</h5>
		<ul>
			<li>Lorem ipsum dolor sit amet, consecte dolor site adipig elit.</li>
			<li>Lorem ipsum dolor sit amet, consecte adiping elit.</li>
			<li>Lorem ipsum dolor sit amet, consecter iscing elit.</li>
		</ul>
	</div><!--sfeature #end-->
	
	<div class="sfeatures">
   		<h5>Newsletter</h5>
		<form action="http://www.feedburner.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open('http://www.feedburner.com/fb/a/mailverify?uri=<?php echo $wpr_feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<div class="newsletter"> <div class="nfield">Email : </div><input name="email" type="text" value="Your Email Address" class="ntextfield"  onFocus="if (this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}" />
			<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
			<input type="hidden" name="uri" value="<?php echo $wpr_feedburner_id; ?>" />
			<input type="hidden" name="loc" value="en_US"/> </div>
			<input type="submit"  value="Sign Up" class="submit" style="margin-left:45px;"  />
		</form>
	</div><!--sfeature #end-->

</div>
<!--sidebar #end-->
