<!--sidebar #start-->
<div id="sidebar">
	<h5>Testimonials </h5>
	<!-- dyanamic testimonials-->  
		<?php include (TEMPLATEPATH . "/includes/testimonials.php"); ?>
	<!--dyanamic testimonials #end-->  
	 
	<!-- advertisement : your ads here -->
	<?php include (TEMPLATEPATH . '/includes/ad/sidebar5_ad.php'); ?>

	<h5>Sponsors Links</h5>
	<ul>
		<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
	</ul>
</div>
<!--sidebar #end-->

