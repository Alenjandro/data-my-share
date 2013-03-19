<?php
/* 
Ideal for Events 1
*/
while ($wp_query->have_posts()) : $wp_query->the_post();
	$values = get_post_custom_values("Image");
	if (isset($values[0])) {		
		$image = "<a href='";
		$image .= get_permalink();
		$image .= "' rel='bookmark'><img src='";
		$image .= get_bloginfo('wpurl') . "/" . $values[0];
		$image .= "' alt='" . the_title('','', false) . "' class='alignleft' /></a>";
	}
	$content = '<div class="listings">';
	$content .= $image;
	$content .= "<a href='";
	$content .= get_permalink();
	$content .= "'>";
	$content .= the_title("<h5>", "</h5>", false);
	$content .= "</a>";
	$content .= apply_filters('the_excerpt', get_the_excerpt());
	$content .= "</div>";
	break;
endwhile;
?>
