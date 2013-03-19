<?php get_header(); ?>

<?php if(is_category('news')): ?>
<div id="pageBody">
<div id="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">トップページ</a></li>
<li>お知らせ一覧</li>
</ul>
<!-- / class topicPath --></div>
<?php if(in_category('news')): ?>
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_url'); ?>/news/images/bh_new.gif" alt="お知らせ一覧 Information" /></h1>
<dl class="news">
<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
<?php if ( in_category( 'news' )) { ?>

<dt><?php the_time(get_option('date_format')); ?></dt>
<dd>
<?php
$days=14;
$today=date('U');
$entry=get_the_time('U');
$diff1=date('U',($today - $entry))/86400;
if ($days > $diff1) { ?>
<img src="<?php bloginfo('template_directory'); ?>/common/images/ico_new.gif" alt="New" /> <?php }?>
<?php if(get_post_meta($post->ID,PDFリンク,true)): ?>
<a href="<?php bloginfo('template_directory'); ?>/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><?php the_title(); ?><?php if(get_post_meta($post->ID,PDFサイズ,true)): ?><span class="pdfSize">(<?php echo (get_post_meta($post->ID,PDFサイズ,true)); ?>)</span><?php endif; ?></a>
<a href="<?php bloginfo('template_directory'); ?>/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/common/images/ico_pdf.gif" alt="" class="PDF" /></a>
<?php elseif(get_post_meta($post->ID,リンク,true)): ?>
<a href="<?php echo (get_post_meta($post->ID,リンク,true)); ?>"><?php the_title(); ?></a>
<?php else: ?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; ?>

</dd>
<?php } ?>
<?php endwhile; else: ?>
<dt>お知らせがありません。</dt>
<dd>&nbsp;</dd>
<?php endif; ?>
</dl>
</div>
</div>
<?php endif; ?>
<?php include(TEMPLATEPATH."/sidebar_news.php");?>
<?php endif; ?>
<?php get_footer(); ?>