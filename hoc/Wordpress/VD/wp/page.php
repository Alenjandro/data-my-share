<?php get_header(); ?>

<div class="wrapBox">
<?php if(!is_page(array('twitter','sitemap','character','smileface'))): ?>
<?php get_breadcrumbs(); ?>
<?php endif; ?>
<?php if(is_page('smileface')): ?>
<ul class="topicPath">
<li><a href="<?php bloginfo('url'); ?>">Home</a>&gt;</li>
<li>スマイルフェイス</li>
</ul>
<?php endif; ?>

<div id="pageBody">
<?php if(!is_page(array('twitter','sitemap','character'))): ?>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php endif; ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>