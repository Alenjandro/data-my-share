<?php get_header(); ?>

<div id="pageBody">
<div id="content">
<div class="section">
<div class="mhSection">
<h2><img src="<?php bloginfo('template_directory'); ?>/images/mh_news.gif" alt="お知らせ Information" /></h2>
<p><a href="<?php bloginfo('url'); ?>/news/"><img src="<?php bloginfo('template_directory'); ?>/images/btn_news.gif" alt="お知らせ一覧" class="imgover" /></a></p>
<!-- / class mhSection --></div>
<div class="sectionInner">
<dl class="news">
<?php 
if (have_posts()) :
	query_posts('&posts_per_page=5&cat=1&orderby=date');
?>
<?php while (have_posts()) : the_post(); ?>

<dt><?php the_date('Y年n月j日'); ?></dt>
<dd>
<?php
$days=14;
$today=date('U');
$entry=get_the_time('U');
$diff1=date('U',($today - $entry))/86400;
if ($days > $diff1) { ?>
<img src="<?php bloginfo('template_directory'); ?>/common/images/ico_new.gif" alt="NEW" /><?php }?>
<?php if(get_post_meta($post->ID,PDFリンク,true)): ?>
<a href="<?php bloginfo('template_directory'); ?>/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><?php the_title(); ?><?php if(get_post_meta($post->ID,PDFサイズ,true)): ?><span class="pdfSize">(<?php echo (get_post_meta($post->ID,PDFサイズ,true)); ?>)</span><?php endif; ?></a>
<a href="<?php bloginfo('template_directory'); ?>/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/common/images/ico_pdf.gif" alt="" class="PDF" /></a>
<?php elseif(get_post_meta($post->ID,リンク,true)): ?>
<a href="<?php echo (get_post_meta($post->ID,リンク,true)); ?>"><?php the_title(); ?></a>
<?php else: ?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; ?>

</dd>
<?php endwhile; else: ?>
<dt>お知らせがありません。</dt>
<dd>&nbsp;</dd>
<?php endif; ?>
<!-- / class news --></dl>
<!-- / class sectionInner --></div>
<!-- / class section --></div>

<div class="section">
<div class="mhSection">
<h2><img src="<?php bloginfo('template_directory'); ?>/images/mh_project.gif" alt="事業情報 Project Information" /></h2>
<p><a href="<?php bloginfo('url'); ?>/business/"><img src="<?php bloginfo('template_directory'); ?>/images/btn_business.gif" alt="事業情報一覧" class="imgover" /></a></p>
<!-- / class mhSection --></div>
<div class="sectionInner">
<div class="boxList">
<div class="listContent">
<ul>
<li>
<p class="image"><img src="<?php bloginfo('template_directory'); ?>/images/img_kuroshio01.jpg" alt="くろしお" /></p>
<div>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/sh_kuroshio01.gif" alt="くろしお" /></h3>
<p class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
<p><a href="<?php bloginfo('url'); ?>/business/"><img src="<?php bloginfo('template_directory'); ?>/common/images/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<p class="image"><img src="<?php bloginfo('template_directory'); ?>/images/img_kuroshio02.jpg" alt="くろしお2" /></p>
<div>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/sh_kuroshio02.gif" alt="くろしお2" /></h3>
<p class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
<p><a href="<?php bloginfo('url'); ?>/business/"><img src="<?php bloginfo('template_directory'); ?>/common/images/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
</ul>
<!-- / class listContent --></div>
<!-- / class boxList --></div>
<!-- / class sectionInner --></div>
<!-- / class section --></div>
<!-- / id content --></div>

<?php include(TEMPLATEPATH."/sidebar_home.php");?>
<?php get_footer(); ?>