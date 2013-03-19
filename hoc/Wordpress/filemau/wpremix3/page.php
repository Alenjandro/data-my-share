<?php get_header(); ?>

<div class="topicPath">
<?php get_breadcrumbs(); ?>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
<?php endif; ?>
<!-- / id content --></div>

<?php if(get_post_meta($post->ID,'サイドバー',true) == '企業情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_company.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '企業理念'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyIdeal.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'トップメッセージ'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyMessage.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '会社概要'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyAbout.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '役員'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyExecutive.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '組織図'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyChart.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '沿革'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyHistory.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '主な国家資格保有者'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyLicense.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'アクセス'): ?>
<?php include(TEMPLATEPATH."/sidebar_companyAccess.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'お問い合わせ'): ?>
<?php include(TEMPLATEPATH."/sidebar_contact.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'コーポレートリスク相談'): ?>
<?php include(TEMPLATEPATH."/sidebar_risk.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '個人情報保護方針'): ?>
<?php include(TEMPLATEPATH."/sidebar_privacy.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == 'ご利用にあたって'): ?>
<?php include(TEMPLATEPATH."/sidebar_guide.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '採用情報'): ?>
<?php include(TEMPLATEPATH."/sidebar_recruit.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '中途採用'): ?>
<?php include(TEMPLATEPATH."/sidebar_career.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '新卒採用'): ?>
<?php include(TEMPLATEPATH."/sidebar_fresh.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '2012年度募集要項'): ?>
<?php include(TEMPLATEPATH."/sidebar_guidelines.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '採用担当者より'): ?>
<?php include(TEMPLATEPATH."/sidebar_rep.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '採用の流れ'): ?>
<?php include(TEMPLATEPATH."/sidebar_flow.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '採用Q&A'): ?>
<?php include(TEMPLATEPATH."/sidebar_qa.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '研修制度'): ?>
<?php include(TEMPLATEPATH."/sidebar_training.php");?>
<?php elseif(get_post_meta($post->ID,'サイドバー',true) == '先輩の声'): ?>
<?php include(TEMPLATEPATH."/sidebar_voice.php");?>
<?php endif; ?>

<?php get_footer(); ?>