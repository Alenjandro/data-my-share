<?php
$wpr_feedburner_id = get_option('wpr_feedburner_id');
$wpr_exclude_news = get_option('wpr_exclude_news');
?>

<!--sidebar #start-->
<div id="sidebar">

	<!-- subscribe #start -->
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

	<h5>Featured Area</h5>
	<p>You can edit this area from sidebar1.php and place whatever info you wish to write here. This could be a great idea to place custom message as per your requirement in all the pages.</p>

	<h5>Latest News</h5>
	<ul>
	<?php $recent = new WP_Query("cat=$wpr_exclude_news&showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
		<li><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?> </strong></a><br />
		<span class="date"> <?php the_time('j F, Y') ?>,  <?php the_time('g:i a') ?></span></li>
	<?php endwhile; ?>
	</ul>
</div>
<!--sidebar #end-->
