<div id="sidebar">
<h2><img src="<?php bloginfo('template_directory'); ?>/news/images/mh_contribution.gif" alt="最近の投稿" /></h2>
<ul class="category">
<?php wp_get_archives('type=postbypost&limit=3'); ?>
</ul>

<h2><img src="<?php bloginfo('template_directory'); ?>/news/images/mh_pastpost.gif" alt="過去の投稿" /></h2>
<ul class="category">
<?php wp_get_archives('show_post_count=1'); ?>
</ul>

<h2><img src="<?php bloginfo('template_directory'); ?>/news/images/mh_category.gif" alt="カテゴリー" /></h2>
<ul class="category">
<?php wp_list_categories('title_li=&orderby=id'); ?>  
</ul>

<ul class="bannerList">
<li><a href="<?php bloginfo('url'); ?>/tei_gi/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_gi.gif" alt="低GIコンテンツ" /></a></li>
<li class="lastBanner"><a href="http://florida-grapefruit.jp/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_recipe.gif" alt="グレープフルーツレシピ" /></a></li>
</ul>

<ul class="linkList">
<li><a href="<?php bloginfo('url'); ?>/smileface/smileface/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_facebook.gif" alt="Facebook" /></a></li>
<li><a href="http://florida-grapefruit.jp/twitter/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_twitter.gif" alt="Twitter" /></a></li>
</ul>
<!-- / id sidebar --></div>
