<?php get_header(); ?>

<div class="topicPath">
<?php get_breadcrumbs(); ?>
<!-- / class topicPath --></div>

<div id="pageBody">
<?php if(in_category('news')): ?>
<div id="content">
<div class="section">
<h2 class="bHead"><img src="<?php bloginfo('template_url'); ?>/images/news/bh_news.gif" alt="お知らせ詳細" /></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="sectionInner">
<p class="date"><?php the_time(get_option('date_format')); ?><span><?php bloginfo('name'); ?></span></p>
<div class="detail">
<h3 class="sHead"><?php the_title(); ?></h3>
<div class="content">
<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; ?>
<?php if(get_post_meta($post->ID,PDFリンク,true)): ?>
<a href="<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><?php the_title(); ?><?php if(get_post_meta($post->ID,PDFサイズ,true)): ?><span class="pdfSize">(<?php echo (get_post_meta($post->ID,PDFサイズ,true)); ?>)</span><?php else: ?><?php endif; ?></a>
<a href="<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf.gif" alt="" class="PDF" /></a>
<?php endif; ?>
</div>
</div>
</div>
<?php endif; ?>
<?php include(TEMPLATEPATH."/sidebar_news.php");?>
<?php get_footer(); ?>
