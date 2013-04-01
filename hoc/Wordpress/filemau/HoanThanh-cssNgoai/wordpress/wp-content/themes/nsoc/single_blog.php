<?php get_header(); ?>

<div id="pageBody">
<div id="topicPath">
<?php get_breadcrumbs(); ?>
<!-- / class topicPath --></div>

<?php if(in_category('news')): ?>
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_url'); ?>/news/images/bh_new.gif" alt="お知らせ一覧 Information" /></h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="sectionInner">
<p class="date"><?php the_time(get_option('date_format')); ?><br /><span><?php bloginfo('name'); ?></span></p>
<div class="detail">
<h3 class="sHead"><?php the_title(); ?></h3>
<div class="content">
<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; ?>
<?php if(get_post_meta($post->ID,PDFリンク,true)): ?>
<a href="<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><?php the_title(); ?><?php if(get_post_meta($post->ID,PDFサイズ,true)): ?><span class="pdfSize">(<?php echo (get_post_meta($post->ID,PDFサイズ,true)); ?>)</span><?php else: ?><?php endif; ?></a>
<a href="<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/common/images/ico_pdf.gif" alt="" class="PDF" /></a>
<?php endif; ?>
</div>
</div>
</div>
<?php endif; ?>
<?php include(TEMPLATEPATH."/sidebar_news.php");?>
<?php get_footer(); ?>