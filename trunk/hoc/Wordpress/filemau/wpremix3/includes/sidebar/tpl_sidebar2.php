<?php
$wpr_exclude_news = get_option('wpr_exclude_news');
?>

<!--sidebar #start-->
<div id="sidebar">

	<div class="sfeatures">
		<h5>About Me</h5>
		<img src="<?php bloginfo('template_url'); ?>/images/t6.png" alt="" class="imgright"   />
		<p>&ldquo; Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam   &rdquo; </p>
		<p class="italic bold ">- Roger thomas </p>
	</div><!--sfeature #end-->
	
	<?php
	$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
	if ($children) { ?>
		<h5><?php the_title(); ?></h5>
		<ul >
			<?php echo $children; ?>
		</ul>
	<?php } ?>

	<h5>Latest Posts</h5>
	<ul>
	<?php $recent = new WP_Query("cat=$wpr_exclude_news&showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
		<li><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?> </strong></a><br /> 
		<span class="date"> <?php the_time('j F, Y') ?>,  <?php the_time('g:i a') ?></span></li>
	<?php endwhile; ?>
	</ul>
 
<?php include (TEMPLATEPATH . '/includes/contact_form.php'); ?>
</div>
<!--sidebar #end-->
