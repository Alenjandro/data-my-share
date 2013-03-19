<h3>Sorry, no posts matched your criteria.</h3>
<p><strong>Or, take a look at Archives and Categories</strong></p>

<div class="category">
	<h2 class="error_title"><?php _e('Category'); ?></h2>
	<ul>
		<?php wp_list_categories('orderby=name&title_li&depth=-1;'); ?>
	</ul>
</div>

<div class="category">
	<h2 class="error_title"><?php _e('Archives'); ?></h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</div>
