<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php
if ( is_home() ) {
	bloginfo('name');
} elseif ( is_category() ) {
	single_cat_title(); echo ' - ' ; bloginfo('name');
} elseif ( is_single() ) {
	single_post_title();
} elseif ( is_page() ) {
	single_post_title();
} else { wp_title('', true); }
?>
</title>
<?php
if(get_option('wpr_seo_enable') && is_home()) {
	$description = get_settings('wpr_seo_home_desc');
	$keywords = get_settings('wpr_seo_home_key');
} else {
	if(is_single()) {
		$description = trim(wp_title('', false));
		$keywords = trim(wp_title('', false));
	} else {
		$description = get_bloginfo('description');
		$keywords = get_bloginfo('description');
	}
}
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/print.css" type="text/css" media="print" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_directory'); ?>/js/hmenu.js"> </script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>

<div id="wrapper" class="clearfix">

