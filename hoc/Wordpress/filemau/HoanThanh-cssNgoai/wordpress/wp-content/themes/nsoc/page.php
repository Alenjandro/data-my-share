<?php if(get_post_meta($post->ID,'thickbox',true) == 'くろしお'): ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php else: ?>
<?php get_header(); ?>
<div id="pageBody">
<div id="topicPath">
<?php get_breadcrumbs(); ?>
<!-- / class topicPath --></div>
<div id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<!-- / id content --></div>
<?php if(get_post_meta($post->ID,'サイドバー',true) == '企業情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '事業情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_business.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '採用情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_recruit.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'その他のページ'): ?>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php endif; ?>
<?php get_footer(); ?>
<?php endif; ?>