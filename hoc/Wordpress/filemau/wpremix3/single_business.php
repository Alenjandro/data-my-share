<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr">
<head>
<script>
$(function(){
	// rollover
	$('#TB_window .imgover').each(function(){
		this.osrc = $(this).attr('src');
		this.rollover = new Image();
		this.rollover.src = this.osrc.replace(/(\.gif|\.jpg|\.png)/, "_o$1");
	}).hover(function(){
		$(this).attr('src',this.rollover.src);
	},function(){
		$(this).attr('src',this.osrc);
	});
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body id="thickbox">
<div class="section">
<h2><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h2>
<div class="sectionInner">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="text"><?php the_content(); ?>
<?php if(get_post_meta($post->ID,PDFリンク,true)): ?>
<a href="http://www.npd.nsc-eng.co.jp/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><img src="http://www.npd.nsc-eng.co.jp/wp/wp-content/themes/wpremix3/images/common/ico_pdf.gif" alt="">【PDF <?php echo (get_post_meta($post->ID,PDFサイズ,true)); ?>】</a></div>
<?php endif; ?>
<?php endwhile; else: ?>
<?php endif; ?>
</div>
</div>
</body>
</html>