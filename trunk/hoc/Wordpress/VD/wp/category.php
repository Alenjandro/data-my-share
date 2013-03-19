<?php get_header(); ?>

<div class="wrapBox">
<ul class="topicPath">
<li><a href="<?php bloginfo('url'); ?>">Home</a>&gt;</li>
<li>News</li>
</ul>

<div id="pageBody">
<?php include(TEMPLATEPATH."/sidebar_cate.php");?>

<div id="content">
<div class="section">
<h2><img src="<?php bloginfo('template_directory'); ?>/news/images/mh_news.gif" alt="News" /></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="sectionInner" id="i<?php the_time('Ymds'); ?>">
<h3><?php the_title(); ?></h3>
<div class="info">
<dl>
<dt><?php the_time('Y.m.d'); ?></dt>
<dd>
<p><?php 
foreach((get_the_category()) as $cat){
echo $cat->cat_name.'';
}
?>
</p>

<ul>
<?php
$socialIcons = get_post_meta($post->ID,'ソーシャルサービス', false);
sort($socialIcons);
foreach ($socialIcons as $socialIcon) : ?>
<?php if ($socialIcon=='facebook') : ?>
<li><a href="http://www.facebook.com/pages/Florida-Grapefruit-JPN/156383941081088?v=wall" target="_blank" ><img src="<?php bloginfo('template_directory'); ?>/common/images/ico_facebook.gif" alt="f" /></a></li>	
<?php elseif ($socialIcon=="twitter") : ?>
<li><a href="http://twitter.com/Snoboy_fdoc" target="_blank" ><img src="<?php bloginfo('template_directory'); ?>/common/images/ico_twitter.gif" alt="t" /></a></li>
<?php endif; ?>
<?php endforeach; ?>	
</ul>
</dd>
</dl>

<?php the_content(); ?>
</div>
<!-- / class sectionInner --></div>
<?php endwhile; else: ?>
<p>お知らせがありません。</p>
<?php endif; ?>
<!-- / class section --></div>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
<!-- / id content --></div>
<!-- / id pageBody --></div>

<?php get_footer(); ?>

