<?php
/*
Ideal for Subpage 8 - Ex.  
Assumes author data was present already in post.
Just spits out individual code for blog authors as needed - Gravatar, name, and description.
Ex.  
<div class="tabber">
<!--remix_subpage8(tabtitle=My Tab Title&cat=n)-->
</div>
Assumes it is wrapped in a <div class="tabbeer"> tag.
*/
if (!array_key_exists("tabtitle", $this->qa)) {
	$this->qa['tabtitle'] = "Tab";
}			
$content = '';
while ($wp_query->have_posts()) : $wp_query->the_post();
	$content .= "<div class='tabbertab'>";
	$content .= "<h2>" . $this->qa['tabtitle'] . "</h2>";
	$content .= apply_filters('the_content', get_the_content());
	$content .= "</div>";
	break;
endwhile;
?>