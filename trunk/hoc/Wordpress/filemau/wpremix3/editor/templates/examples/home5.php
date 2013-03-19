<?php
/*
Ideal for Home 5 - Ex.  <!--remix_home5(showposts=1)-->
*/
global $more;
$more = false;
while ($wp_query->have_posts()) : $wp_query->the_post();
	$content .= "<p>Post on <strong>" . get_the_time('F jS, Y') . "</strong></p>";
	$content .= "<p><strong><a href='" . get_permalink() . "'>";
	$content .= the_title("<strong>", "</strong><br/>", false);
	$content .= "</a></strong></p>";
	$content .= apply_filters('the_content', get_the_content("<p>Read More &raquo;</p>"));
endwhile;
$more = true;
?>