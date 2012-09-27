<?php
$url = 'http://'.$_SERVER['HTTP_HOST'].'/';
$category_id = get_cat_ID( '新着情報' );
$category_link = get_category_link( $category_id );
if (in_category('新着情報')) {
if ($_GET['page']!=1) { ?>
<?php get_header();?>
<div id="infoTabs">

<dl class="clearfix info">
<?php
$categories= get_categories();
foreach ($categories as $cat) { $option = $cat->cat_name;}
$i=10;
$my_query = new WP_query ('showposts=10&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
?>
<dt><?php the_time ("Y年m月d日"); ?></dt>
<dd class="clearfix"><a href="<?php the_permalink (); ?><?php $category_id=get_cat_id('新着情報');echo '&amp;cat='.$category_id; ?>"><?php the_title () ?></a></dd>
<?php endwhile; endif; ?>
</dl>
</div>
<ul class="clearfix naviPage">
<li class="back"><?php previous_posts_link(__('前の10件を見る')); ?>&nbsp;</li>
<li class="new">
<?php if ($paged>2) { if (!is_year()&&is_category()) { ?>
<a href="<?php echo $category_link; ?>">最新の一覧に戻る</a>
<?php } elseif (is_year()&&is_category()) { ?>
<a href="<?php echo bloginfo('url').'/?m='; echo the_time('Y'); echo '&cat='.$category_id;?>">最新の一覧に戻る</a>
<?php } } ?>&nbsp;</li>
<li class="next"><?php next_posts_link(__('次の10件を見る')); ?>&nbsp;</li>
</ul>

<p class="pageTop"><a href="#layout"><img src="<?php echo $url; ?>common/images/bu_pagetop.jpg" alt="このページの先頭に戻る" border="0" /></a></p>
<!-- / id content --></div>

<?php get_sidebar('information'); ?>
<?php get_footer(); ?>


<?php } else { ?>
<h2><span><img src="<?php bloginfo('template_url'); ?>/images/mh_information_top.gif" alt="新着情報" /></span>
<span class="rss"><a href="<?php bloginfo('url'); $category_id=get_cat_id('新着情報');echo '/?feed=rss2&amp;cat='.$category_id; ?>"><img src="<?php echo $url; ?>images/ico_rss.gif" alt="RSS" /></a></span></h2>
<dl class="clearfix infoList">
<?php
$my_query = new WP_query ('cat=10&showposts=5&order=DESC');
if (have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
?>
<dt><?php the_time ("Y年m月d日") ?></dt>
<dd class="clearfix"><a href="<?php the_permalink (); ?><?php $category_id=get_cat_id('新着情報');echo '&amp;cat='.$category_id; ?>"><?php the_title () ?></a>
</dd>
<?php endwhile; endif; ?>
</dl>
<p class="backnumber"><a href="<?php echo $category_link; ?>">バックナンバー一覧</a></p>
<?php } } ?>