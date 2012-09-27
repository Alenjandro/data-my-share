<?php if (!is_paged()) {  ?>

<dl class="clearfix">
<?php  if (have_posts()): while (have_posts()) : the_post(); ?>
<dt><?php the_time ("Y年m月d日") ?></dt>
<dd class="clearfix">
<?php foreach((get_the_category()) as $cat) { $catname = $cat->category_nicename; $catname1 = $cat->name; if ($catname!='information'&&$catname!='media_information') { ?><img src="<?php bloginfo('template_directory'); ?>/images/ico_<?php echo $catname; ?>.gif" alt="<?php echo $catname1; ?>"  /><?php } } ?>
<span class="link"><a href="<?php the_permalink () ?>"><?php the_title () ?></a></span>
</dd>
<?php endwhile; else: ?>
<dt class="notFound">「<?php single_cat_title(); ?>」に投稿された記事はありません。</dt>
<?php endif; ?>
</dl>

<ul class="clearfix naviPage">
<li class="back"><?php previous_posts_link(__('前の10件を見る')); ?>&nbsp;</li>
<li class="new"><?php if (is_paged()) { ?><a href="<?php 
if(is_category('新着媒体情報')) { echo bloginfo('url').'/#remode-tab-1'; }
if(is_category('駅広告')) { echo bloginfo('url').'/#remote-tab-2'; }
if(is_category('電車広告')) { echo bloginfo('url').'/#remote-tab-3'; }
if(is_category('屋外広告')) { echo bloginfo('url').'/#remote-tab-4'; }
if(is_category('バス・タクシー広告')) { echo bloginfo('url').'/#remote-tab-5'; }
?>">最新の一覧に戻る</a><?php } ?>&nbsp;</li>
<li class="next"><?php next_posts_link(__('次の10件を見る')); ?></li>
</ul>

<div class="clearfix viewArchive">
<p class="rss"><a href="<?php bloginfo('url'); $category_id = get_cat_ID( '新着媒体情報' ); echo '/?feed=rss&amp;cat='.$category_id; ?>">RSS</a></p>
<p class="archive"><a href="<?php 
if(is_category('新着媒体情報')) { echo bloginfo('url').'/#remode-tab-1'; }
if(is_category('駅広告')) { echo bloginfo('url').'/#remote-tab-2'; }
if(is_category('電車広告')) { echo bloginfo('url').'/#remote-tab-3'; }
if(is_category('屋外広告')) { echo bloginfo('url').'/#remote-tab-4'; }
if(is_category('バス・タクシー広告')) { echo bloginfo('url').'/#remote-tab-5'; }
?>">バックナンバー一覧</a></p>
</div>

<?php } elseif (is_paged()&&is_category()) { ?>

<?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/'; ?>
<?php get_header();?>
<div id="infoTabs">
<ul class="clearfix tabs-nav">
<?php if(is_year()&&is_category('新着媒体情報')) { ?>
<li id="mediaTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-1'; ?>" id="tab1"><span>&nbsp;</span></a></li>
<?php } elseif(is_year()&&!is_category('新着媒体情報')) { ?>
<li id="mediaTabs"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-1'; ?>" id="tab1"><span>&nbsp;</span></a></li>
<?php } elseif (!is_year()&&is_category('新着媒体情報')) { ?>
<li id="mediaTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/#remote-tab-1'; ?>" id="tab1"><span>&nbsp;</span></a></li>
<?php } else { ?>
<li id="mediaTabs"><a href="<?php echo bloginfo('url').'/#remote-tab-1'; ?>" id="tab1"><span>&nbsp;</span></a></li>
<?php } if(is_year()&&is_category('駅広告')) { ?>
<li id="stationTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-2'; ?>" id="tab2"><span>&nbsp;</span></a></li>
<?php } elseif(is_year()&&!is_category('駅広告')) { ?>
<li id="stationTabs"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-2'; ?>" id="tab2"><span>&nbsp;</span></a></li>
<?php } elseif (!is_year()&&is_category('駅広告')) { ?>
<li id="stationTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/#remote-tab-2'; ?>" id="tab2"><span>&nbsp;</span></a></li>
<?php } else { ?>
<li id="stationTabs"><a href="<?php echo bloginfo('url').'/#remote-tab-2'; ?>" id="tab2"><span>&nbsp;</span></a></li>
<?php } if(is_year()&&is_category('電車広告')) { ?>
<li id="trainTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-3'; ?>" id="tab3"><span>&nbsp;</span></a></li>
<?php } elseif(is_year()&&!is_category('電車広告')) { ?>
<li id="trainTabs"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-3'; ?>" id="tab3"><span>&nbsp;</span></a></li>
<?php } elseif (!is_year()&&is_category('電車広告')) { ?>
<li id="trainTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/#remote-tab-3'; ?>" id="tab3"><span>&nbsp;</span></a></li>
<?php } else { ?>
<li id="trainTabs"><a href="<?php echo bloginfo('url').'/#remote-tab-3'; ?>" id="tab3"><span>&nbsp;</span></a></li>
<?php } if(is_year()&&is_category('屋外広告')) { ?>
<li id="outdoorTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-4'; ?>" id="tab4"><span>&nbsp;</span></a></li>
<?php } elseif(is_year()&&!is_category('屋外広告')) { ?>
<li id="outdoorTabs"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-4'; ?>" id="tab4"><span>&nbsp;</span></a></li>
<?php } elseif(!is_year()&&is_category('屋外広告')) { ?>
<li id="outdoorTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/#remote-tab-4'; ?>" id="tab4"><span>&nbsp;</span></a></li>
<?php } else { ?>
<li id="outdoorTabs"><a href="<?php echo bloginfo('url').'/#remote-tab-4'; ?>" id="tab4"><span>&nbsp;</span></a></li>
<?php } if(is_year()&&is_category('バス・タクシー広告')) { ?>
<li id="trafficTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-5'; ?>" id="tab5"><span>&nbsp;</span></a></li>
<?php } elseif(is_year()&&!is_category('バス・タクシー広告')) { ?>
<li id="trafficTabs"><a href="<?php echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-5'; ?>" id="tab5"><span>&nbsp;</span></a></li>
<?php } elseif(!is_year()&&is_category('バス・タクシー広告')) { ?>
<li id="trafficTabs" class="<?php echo 'tabs-selected' ?>"><a href="<?php echo bloginfo('url').'/#remote-tab-5'; ?>" id="tab5"><span>&nbsp;</span></a></li>
<?php } else { ?>
<li id="trafficTabs"><a href="<?php echo bloginfo('url').'/#remote-tab-5'; ?>" id="tab5"><span>&nbsp;</span></a></li>
<?php } ?>
</ul>

</div>
<div id="remote-tab-1" class="tabs-container" style="">
<dl class="clearfix">
<?php
$categories= get_categories();
foreach ($categories as $cat) { $option = $cat->cat_name;  }
$i=10;
$my_query = new WP_query ('showposts=10&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
 ?>
<dt><?php the_time ("Y年m月d日") ?></dt>
<dd class="clearfix">
<?php 
foreach((get_the_category()) as $cat) {
$catname = $cat->category_nicename;
$catname1 = $cat->name;
if ($catname!='information'&&$catname!='media_information') {
?>
<img src="<?php bloginfo('template_directory'); ?>/images/ico_<?php echo $catname; ?>.gif" alt="<?php echo $catname1; ?>"  />
<?php } } ?>
<span class="link"><a href="<?php the_permalink () ?>"><?php the_title () ?></a></span>
</dd>
<?php endwhile; endif; ?>
</dl>

<ul class="clearfix naviPage">
<li class="back"><?php if (!is_year()&&is_category()&&$paged > 2) { ?>
<?php previous_posts_link(__('前の10件を見る')); ?>
<?php } elseif (is_year()&&is_category()&&$paged == 2) { ?>
<a href="<?php 
if(is_category('新着媒体情報')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remode-tab-1';}
if(is_category('駅広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-2'; } 
if(is_category('電車広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-3'; }
if(is_category('屋外広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-4'; }
if(is_category('バス・タクシー広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-5'; }
?>">前の10件を見る</a>
<?php } elseif (is_year()&&is_category()&&$paged > 2) { ?>
<?php previous_posts_link(__('前の10件を見る')); ?>
<?php } else { ?>
<a href="<?php 
if(is_category('新着媒体情報')) { echo bloginfo('url').'/#remode-tab-1';}
if(is_category('駅広告')) { echo bloginfo('url').'/#remote-tab-2'; } 
if(is_category('電車広告')) { echo bloginfo('url').'/#remote-tab-3'; }
if(is_category('屋外広告')) { echo bloginfo('url').'/#remote-tab-4'; }
if(is_category('バス・タクシー広告')) { echo bloginfo('url').'/#remote-tab-5'; }
?>">前の10件を見る</a><?php } ?>
</li>

<li class="new"><?php if (!is_year()&&is_category()&&$paged > 2) { ?>
<a href="<?php 
if(is_category('新着媒体情報')) { echo bloginfo('url').'/#remode-tab-1'; }
if(is_category('駅広告')) { echo bloginfo('url').'/#remote-tab-2'; }
if(is_category('電車広告')) { echo bloginfo('url').'/#remote-tab-3'; }
if(is_category('屋外広告')) { echo bloginfo('url').'/#remote-tab-4'; }
if(is_category('バス・タクシー広告')) { echo bloginfo('url').'/#remote-tab-5'; }
?>">最新の一覧に戻る</a>
<?php } elseif (is_year()&&is_category()&&$paged > 2) { ?>
<a href="<?php 
if(is_category('新着媒体情報')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remode-tab-1';}
if(is_category('駅広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '//#remote-tab-2'; } 
if(is_category('電車広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-3'; }
if(is_category('屋外広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-4'; }
if(is_category('バス・タクシー広告')) { echo bloginfo('url').'/?m=';the_time('Y');echo '/#remote-tab-5'; }
?>">前の10件を見る</a>
<?php } ?>&nbsp;</li>

<li class="next"><?php next_posts_link(__('次の10件を見る')); ?></li>
</ul>
</div>

<p class="pageTop"><a href="#layout"><img src="<?php echo $url; ?>common/images/bu_pagetop.jpg" alt="このページの先頭に戻る" border="0" /></a></p>
<!-- / id content --></div>

<?php get_sidebar('media'); ?>
<?php get_footer(); ?>

<?php } ?>