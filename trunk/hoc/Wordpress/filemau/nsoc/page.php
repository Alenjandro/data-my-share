<?php if(get_post_meta($post->ID,'thickbox',true) == 'くろしお'): ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>

<?php else: ?>
<?php get_header(); ?>

<div id="pageBody">
<div id="topicPath">
<?php get_breadcrumbs(); ?>
<!-- / class topicPath --></div>
<div id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<!-- / id content --></div>

<?php if(get_post_meta($post->ID,'サイドバー',true) == '企業情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '企業理念'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'トップメッセージ'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '会社概要'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '沿革'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '組織図'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'アクセス'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>

<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '事業情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_business.php");?>

<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '採用情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_recruit.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '中途採用情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_recruit.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '先輩の声'): ?>
<?php include(TEMPLATEPATH."/sidebar_recruit.php");?>

<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'ご利用にあたって'): ?>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '個人情報保護方針'): ?>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '「個人情報の保護に関する法律」に基づく公表事項'): ?>
<?php include(TEMPLATEPATH."/sidebar.php");?>


<?php endif; ?>


<?php get_footer(); ?>
<?php endif; ?>