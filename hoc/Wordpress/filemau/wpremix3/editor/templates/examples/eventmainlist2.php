<?php
/* 
Ideal for Events 2
*/
$looptime = 1;
while ($wp_query->have_posts()) : $wp_query->the_post();
	$values = get_post_custom_values("Image");
	if (isset($values[0])) {		
		$image = "<a href='";
		$image .= get_permalink();
		$image .= "' rel='bookmark'><img src='";
		$image .= get_bloginfo('wpurl') . "/" . $values[0];
		$image .= "' alt='" . the_title('','', false) . "' class='alignright' /></a>";
	}
	if ($looptime%2) { 
		$content .= "<div class='mainlist'>";
		$class = 'alignleft'; 
	} else { 
		$class = 'alignright';
	}
	$content .= "<div class='mainlist_twopart $class'>";
	//$content .= $image;
	$content .= "<a href='";
	$content .= get_permalink();
	$content .= "'>";
	$content .= the_title("<h5>", "</h5>", false);
	$content .= "</a>";
	$content .= apply_filters('the_excerpt', get_the_excerpt());
	$content .= "</div>";
	$looptime += 1;
	if ($looptime%2)
		$content .= "</div>";
endwhile;
if ($looptime%2==0)
		$content .= "</div>";
		$content .= '<div class="clear aright">';
		$content .= '<div class="alignleft">' . $this->next_posts_link('&laquo; Older Events') . '</div>';
		$content .= '<div class="alignright">' . $this->previous_posts_link('Newer Events  &raquo;') . '</div>';
		$content .= '</div>';
?>