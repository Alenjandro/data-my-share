<blockquote>
<?php
$quotes = file(get_bloginfo('template_url').'/includes/quotes.txt');
	echo $quotes[array_rand($quotes)];
?></small>
</blockquote>
 
