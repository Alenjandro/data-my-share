<?php
/*
Ideal for Home 6 - Ex.  
<!--remix_home6left(showposts=1&offset=1)--><!--remix_home6left2(showposts=1&offset=2)--><!--remix_home6right(showposts=1&offset=3)-->
Ideal image width (in custom fields is width of 270, height 66
*/
while ($wp_query->have_posts()) : $wp_query->the_post();
	$values = get_post_custom_values("Image");
	if (isset($values[0])) {		
		$image = "<a href='";
		$image .= get_permalink();
		$image .= "' rel='bookmark'><img src='";
		$image .= get_bloginfo('wpurl') . "/" . $values[0];
		$image .= "' alt='" . the_title('','', false) . "' /></a>";
	}
	$content = '<div class="mainboxes alignleft">';
	$content .= $image;
	$content .= "<a href='";
	$content .= get_permalink();
	$content .= "'>";
	$content .= the_title("<h2>", "</h2>", false);
	$content .= "</a>";
	$content .= apply_filters('the_content', get_the_content("<p>Read More &raquo;</p>"));
	$content .= "</div>";
	break;
endwhile;
?>