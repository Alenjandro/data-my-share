<?php get_header(); ?>

<div class="wrapBox">
<div id="pageBody">
<p class="pickup"><img src="<?php bloginfo('template_directory'); ?>/images/bh_pickup.png" alt="Pick up" /></p>

<div class="pickupSection">
<div class="pickupInner">
<div>
<h2><img src="<?php bloginfo('template_directory'); ?>/images/mh_grapefruit.gif" alt="YOMEちゃんの
グレープフルーツレシピ" /></h2>
<p><img src="<?php bloginfo('template_directory'); ?>/images/txt_grapefruit.gif" alt="美味しいのはジュースだけじゃない！
グレープフルーツを使った楽しくて健康にも役立つメニューを、カリスマ料理ブロガーのYOMEちゃんがご紹介します。" /></p>
<p class="more"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/images/txt_more.gif" alt="詳しくは" /></a></p>
</div>
<p class="pickupImage"><img src="<?php bloginfo('template_directory'); ?>/images/img_grapefruit.jpg" alt="YOMEちゃんの
グレープフルーツレシピ" /></p>
</div>

<div class="pickupInner">
<div>
<h2><img src="<?php bloginfo('template_directory'); ?>/images/mh_smileface.gif" alt="グレープフルーツで
スマイルフェイス" /></h2>
<p><img src="<?php bloginfo('template_directory'); ?>/images/txt_smileface.gif" alt="あなたの元気な笑顔を見せてください！
グレープフルーツ大好きなみんなの「輪」
をどんどん広げていくコーナーです。
次はあなたの街で会えるかも？！" /></p>
<p class="more"><a href="<?php bloginfo('url'); ?>/smileface/smileface/"><img src="<?php bloginfo('template_directory'); ?>/images/txt_more.gif" alt="詳しくは" /></a></p>
</div>
<p class="pickupImage"><img src="<?php bloginfo('template_directory'); ?>/images/img_smileface.jpg" alt="グレープフルーツで
スマイルフェイス" /></p>
</div>
<!-- / class pickupSection --></div>
<div class="newsSection">
<div class="news">
<h2><img src="<?php bloginfo('template_directory'); ?>/images/mh_news.gif" alt="News" /></h2>
<dl>
<?php 
if (have_posts()) : query_posts('posts_per_page=5&orderby=date');
?>
<?php while (have_posts()) : the_post(); ?>
<dt><?php the_time('Y.m.d'); ?></dt>
<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
<?php endwhile; else: ?>
<dt>お知らせがありません。</dt>
<dd>&nbsp;</dd>
<?php endif; ?>
</dl>
<!-- / class news --></div>

<div class="bannerSection">
<ul class="bannerList">
<li><a href="<?php bloginfo('url'); ?>/smileface/smileface/"><img src="<?php bloginfo('template_directory'); ?>/images/bnr_facebook.gif" alt="Facebook" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/twitter/"><img src="<?php bloginfo('template_directory'); ?>/images/bnr_twitter.gif" alt="Twitter" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/character/"><img src="<?php bloginfo('template_directory'); ?>/images/bnr_character.gif" alt="キャラクター紹介" /></a></li>
</ul>

<p class="usdaBanner"><a href="http://www.fas.usda.gov/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/bnr_usda.gif" alt="米国農務省海外農業局
USDA United States Department of Agriculture
Foreign Agricultural Service" /></a></p>
<!-- / class bannerSection --></div>
<!-- / class newsSection --></div>
<!-- / id pageBody --></div>

<?php get_footer(); ?>