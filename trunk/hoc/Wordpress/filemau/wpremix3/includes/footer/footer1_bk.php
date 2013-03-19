<?php $wpr_feedburner_id = get_option('wpr_feedburner_id'); ?>

<div id="footer1">
	<div class="fblock alignleft" >
		<h2>About Us</h2>
		<p>Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, justo convallis luctus rutrum, at nonummy quam ante ac quam. Maecenas urna purus. <a href="#">Read more &raquo;</a> </p>
	</div><!--fblock end -->

	<div class="fblock alignleft fblock_spacer" >
		<h2>Subscribe </h2>
		<p class="rss" ><strong><a href="<?php bloginfo('rss2_url'); ?>" >Subsribe via RSS Feed Reader</a></strong>  </p>
		<p class="clear email">or Subscribe via Email</p>
				
		<div class="clear subfield">
			<form action="http://www.feedburner.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open('http://www.feedburner.com/fb/a/mailverify?uri=<?php echo $wpr_feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<input name="email" type="text" value="Your Email Address" class="subscribefield" onFocus="if (this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}" />
				<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
				<input type="hidden" name="uri" value="<?php echo $wpr_feedburner_id; ?>" />
				<input type="hidden" name="loc" value="en_US"/>
				<input type="submit" class="subscribe_b"	value="subscribe"  />
			</form>
		</div>
		   
	</div><!--fblock end -->

	<div class="fblock alignleft fblock_spacer" >
		<h2>Contact Us </h2>
		<p> Lorem ipsum dolor sit amet <br />
		consectetuer, adipiscing elit, NY - 395002. </p>
		<p class="i_phone">Tel : 111 - 111 -  11111</p>
		<p class="i_mail"> <a href="#">companyname@yahoo.com</a> </p>
	</div><!--fblock end -->
</div><!--footer1 end-->

