<?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/'; ?>
<?php if ($_GET["c"]!='1') { ?>
<?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/'; ?>
<?php get_header();?>
<?php $address="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
<div id="infoTabs">
<ul class="clearfix tabs-nav">
<li id="mediaTabs"><a href="<?php $category_id = get_cat_ID( '新着媒体情報' ); echo $address.'&amp;cat='.$category_id.'&amp;paged='.$paged; ?>" id="tab1"><span>&nbsp;</span></a></li>
<li id="stationTabs"><a href="<?php $category_id = get_cat_ID( '駅広告' ); echo $address.'&amp;cat='.$category_id; ?>" id="tab2"><span>&nbsp;</span></a></li>
<li id="trainTabs"><a href="<?php $category_id = get_cat_ID( '電車広告' ); echo $address.'&amp;cat='.$category_id; ?>" id="tab3"><span>&nbsp;</span></a></li>
<li id="outdoorTabs"><a href="<?php $category_id = get_cat_ID( '屋外広告' ); echo $address.'&amp;&cat='.$category_id; ?>" id="tab4"><span>&nbsp;</span></a></li>
<li id="trafficTabs"><a href="<?php $category_id = get_cat_ID( 'バス・タクシー広告' );
echo $address.'&amp;cat='.$category_id; ?>" id="tab5"><span>&nbsp;</span></a></li>
</ul>
</div>

<p class="pageTop"><a href="#layout"><img src="<?php echo $url; ?>common/images/bu_pagetop.jpg" alt="このページの先頭に戻る" border="0" /></a></p>
<!-- / id content --></div>

<?php get_sidebar('media'); ?>
<?php get_footer(); ?>
<?php } ?>