<?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/'; ?>
<?php get_header(); ?>
<?php
if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2 class="title"><?php the_title(); ?></h2>
<dl class="clearfix detail">
<dt><?php the_time ('Y年m月d日'); ?></dt>
<dd class="clearfix"><?php the_content(); ?></dd>
</dl>

<?php
$postids = get_the_ID();
$custom_fields = get_post_custom();
$my_custom_field_kb = $custom_fields['pdf_file'];
if ( !empty ($my_custom_field_kb) ) {
foreach ( $my_custom_field_kb as $key => $value1 )
?>
<p class="buPdf"><a href="<?php echo $value1 ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/bu_pdf_a.gif" alt="PDFをダウンロードする" /></a></p>
<?php } ?>

<?php endwhile; endif; ?>
<?php if($_GET['cat']!=10) {  ?>
<ul class="clearfix naviPage single">
<li class="back"><?php previous_post_link('%link','前の1件を見る ',FALSE, '10'); ?>&nbsp;</li>
<li class="next"><?php next_post_link('%link','次の1件を見る ' ,FALSE, '10'); ?>&nbsp;</li>
<?php $my_query = new WP_query ('cat=-10&showposts=1&order=DESC');
if (have_posts()) : $my_query->the_post(); ?>
<?php $postid = get_the_ID(); if ($postid!=$postids) { ?>
<li class="new"><a href="<?php bloginfo('url'); ?>">最新の一覧に戻る</a></li>
<?php } endif; ?>
</ul>
<?php } else { ?>
<?php 
function adjacent_post_link_cat($format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true) {
if ( $previous && is_attachment() )
$post = & get_post($GLOBALS['post']->post_parent);
else
$post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

if ( !$post )
return;

$title = $post->post_title;

if ( empty($post->post_title) )
$title = $previous ? __('Previous Post') : __('Next Post');

$title = apply_filters('the_title', $title, $post);
$date = mysql2date(get_option('date_format'), $post->post_date);

$string = '<a href="'.get_permalink($post).'&amp;cat=10">';
$link = str_replace('%title', $title, $link);
$link = str_replace('%date', $date, $link);
$link = $string . $link . '</a>';

$format = str_replace('%link', $link, $format);

$adjacent = $previous ? 'previous' : 'next';
echo apply_filters( "{$adjacent}_post_link", $format, $link );
}
function previous_post_link_cat($format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
adjacent_post_link_cat($format, $link, $in_same_cat, $excluded_categories, true);
}
function next_post_link_cat($format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
adjacent_post_link_cat($format, $link, $in_same_cat, $excluded_categories, false);
}
?>
<ul class="clearfix naviPage single">
<li class="back"><?php previous_post_link_cat('%link','前の1件を見る ',TRUE,'11,12,13,14,15'); ?>&nbsp;</li>
<li class="next"><?php next_post_link_cat('%link','次の1件を見る ',TRUE, '11,12,13,14,15'); ?>&nbsp;</li>
<?php 
$my_query = new WP_query ('cat=10&showposts=1&order=DESC');
if (have_posts()) : $my_query->the_post();
$postid = get_the_id(); if ($postid!=$postids) {
$category_id = get_cat_ID( '新着情報' );
$category_link = get_category_link( $category_id ); ?>
<li class="new"><a href="<?php echo $category_link; ?>">最新の一覧に戻る</a></li>
<?php } endif; ?>
</ul>
<?php } ?>
<p class="pageTop"><a href="#layout"><img src="<?php echo $url; ?>common/images/bu_pagetop.jpg" alt="このページの先頭に戻る" /></a></p>
<!-- / id content --></div>
<?php if($_GET['cat']!=10) {  ?>
<?php get_sidebar('media'); ?>
<?php } else { ?>
<?php get_sidebar('information'); ?>
<?php } ?>
<?php get_footer(); ?>