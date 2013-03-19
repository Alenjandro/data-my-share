<?php
$wpr_feedburner_id = get_option('wpr_feedburner_id');
?> 

<!--sidebar #start-->
<div id="sidebar">
	
	<!-- advertisement : your ads here -->
	<?php include (TEMPLATEPATH . '/includes/ad/sidebar3_ad.php'); ?>
 
	<!--subscribe #start -->
	<div class="subscribe">
		<h5 class="sidebartitle"><?php _e('Subscribe'); ?></h5>
		<p class="i_rss"><strong ><a href="<?php bloginfo('rss2_url'); ?>">Subscribe via Rss</a></strong></p>
		<p class="i_email"><strong >Subscribe via Email</strong></p>

		<div class="subscribetextbg">
			<form action="http://www.feedburner.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open('http://www.feedburner.com/fb/a/mailverify?uri=<?php echo $wpr_feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<input name="email" type="text" value="Your Email Address" class="subscribe_textfield" onFocus="if (this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}" />
				<input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
				<input type="hidden" name="uri" value="<?php echo $wpr_feedburner_id; ?>" />
				<input type="hidden" name="loc" value="en_US"/>
				<input type="image" src="<?php bloginfo('template_url'); ?>/images/b_subscribe.png"  class="subscribe_b"  value="Subscribe"  />
			</form>
		</div>
	</div>
	<!--subscribe #end -->

	<div class="tabber">
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/taber.js"></script>
		<script type="text/javascript">
		/* Optional: Temporarily hide the "tabber" class so it does not "flash"
		   on the page as plain HTML. After tabber runs, the class is changed
		   to "tabberlive" and it will appear. */
		document.write('<style type="text/css">.tabber{display:none;}<\/style>');
		</script>

		<div class="tabbertab">
			<h5>Recent Comments</h5>
			<ul class="tabslist">
				<?php include (TEMPLATEPATH . '/includes/simple_recent_comments.php'); ?>
				<?php if (function_exists('src_simple_recent_comments')) { src_simple_recent_comments(5, 60, '', ''); } ?>
			</ul>
		</div>

		<div class="tabbertab">
 			<h5>Most Commented</h5>
			<?php 
			$result = $wpdb->get_results("SELECT comment_count,ID,post_title,post_author FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 4");
			foreach ($result as $topten) {
				$postid = $topten->ID;
				$title = $topten->post_title; 
				$commentcount = $topten->comment_count;
				if ($commentcount != 0) {
				?>
	 		 <div class="comments2"  ><a href="<?php echo get_permalink($postid); ?>"><?php echo $title; ?> (<?php echo $commentcount; ?>)</a></div>
			<?php } } ?>
		</div>
	</div><!--tabber end-->

</div>
<!--sidebar #end-->
