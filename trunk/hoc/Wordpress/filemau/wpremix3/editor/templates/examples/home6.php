<?php
/*
Ideal for Home 6 - Ex.  
<!--remix_home6(showposts=3&cat=n)-->
Ideal image width (in custom fields is width of 270, height 66
*/
$looptime = 1;
$content = '';
while ($wp_query->have_posts()) : $wp_query->the_post();
	$values = get_post_custom_values("Image");
	if (isset($values[0])) {		
		$image = "<a href='";
		$image .= get_permalink();
		$image .= "' rel='bookmark'><img src='";
		$image .= get_bloginfo('wpurl') . "/" . $values[0];
		$image .= "' alt='" . the_title('','', false) . "' /></a>";
	}
	if ($looptime == 1) {
		$class = 'mainboxes alignleft';
	} elseif ($looptime == 2) {
		$class = 'mainboxes alignleft mspacer';
	} else {
		$class = 'mainboxes alignright mspacer';
	}	
	$looptime += 1;
	$content .= "<div class='$class'>";
	$content .= $image;
	$content .= "<a href='";
	$content .= get_permalink();
	$content .= "'>";
	$content .= the_title("<h2>", "</h2>", false);
	$content .= "</a>";
	$content .= apply_filters('the_content', get_the_content("<p>Read More &raquo;</p>"));
	$content .= "</div>";
endwhile;
?>