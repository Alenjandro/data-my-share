<?php
/* 
Ideal for Subpage7
<!--remix_subpage7(showposts=5&offset=1)-->
*/
$looptime = 1;
$class = '';
$content = '<ul class="services">';
while ($wp_query->have_posts()) : $wp_query->the_post();
	if ($looptime%2) { 
		$class = 'clear'; 
	} else { 
		$class = '';
	}
	$looptime += 1;
	$content .= "<li class='$class'>";
	$content .= "<a href='";
	$content .= get_permalink();
	$content .= "'>";
	$content .= the_title("", "", false);
	$content .= "</a><br />";
	$content .= apply_filters('the_excerpt', get_the_excerpt());
	$content .= "<p><a href='";
	$content .= get_permalink();
	$content .= "'>";
	$content .= "Read More...";
	$content .= "</a></p>";
	$content .= "</li>";
endwhile;
$content .= '<div class="clear aright">';
$content .= '<div class="alignleft">' . $this->next_posts_link('&laquo; Earlier Posts') . '</div>';
$content .= '<div class="alignright">' . $this->previous_posts_link('Later Posts &raquo;') . '</div>';
$content .= '</div>';
$content .= '</ul>';
?>