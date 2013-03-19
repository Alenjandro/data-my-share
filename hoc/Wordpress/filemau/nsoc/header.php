<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><?php hierarchical_title('|'); ?></title>
<?php if(is_home()): ?>
<meta name="description" content="日鉄オフショアコンストラクション株式会社" />
<meta name="keywords" content="日鉄オフショアコンストラクション株式会社" />
<?php elseif(is_category('news')): ?>
<meta name="description" content="日鉄オフショアコンストラクション株式会社の各事業に関する最新情報をお届けします。" />
<meta name="keywords" content="お知らせ一覧,日鉄オフショアコンストラクション株式会社" />

<?php else: ?>
<meta name="description" content="<?php echo (get_post_meta($post->ID,ディスクリプション,true)); ?>" />
<meta name="keywords" content="<?php echo (get_post_meta($post->ID,キーワード,true)); ?>" />
<?php endif; ?>


<link href="<?php bloginfo('template_directory'); ?>/common/css/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php if(is_home()): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/top.css" rel="stylesheet" type="text/css" media="screen,print" />

<?php elseif(is_category('news')): ?>
<link href="<?php bloginfo('template_directory'); ?>/news/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />

<?php elseif(is_archive()): ?>
<link href="<?php bloginfo('template_directory'); ?>/news/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_single()): ?>
<link href="<?php bloginfo('template_directory'); ?>/news/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(get_post_meta($post->ID,スタイルシート,true)): ?>
<link href="<?php bloginfo('template_directory'); ?>/<?php echo (get_post_meta($post->ID,スタイルシート,true)); ?>/css/<?php echo (get_post_meta($post->ID,スタイルシート,true)); ?>.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(get_post_meta($post->ID,parentStyle,true) && get_post_meta($post->ID,childStyle,true)): ?>
<link href="<?php bloginfo('template_directory'); ?>/<?php echo (get_post_meta($post->ID,parentStyle,true)); ?>/<?php echo (get_post_meta($post->ID,childStyle,true)); ?>/css/<?php echo (get_post_meta($post->ID,childStyle,true)); ?>.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php endif; ?>
<link href="<?php bloginfo('template_directory'); ?>/common/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('url'); ?>/favicon.ico" />
<link rel="contents" href="/" title="ホーム" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/script.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/doctextsizer.js"></script>
<?php if(get_post_meta($post->ID,'サイドバー',true) == '事業情報'): ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/thickbox.js"></script>
<?php endif; ?>
</head>

<body>
<div id="layout">
<div id="header">
<div class="headerInner">
<h1><a href="<?php echo get_settings('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/common/images/logo.gif" alt="NIPPON STEEL ENGINEERING
日鉄オフショアコンストラクション株式会社
Nippon Steel Offshore Construction Co., Ltd." /></a></h1>
<div class="hSection">
<div id="fontSwitch">
<p><img src="<?php bloginfo('template_directory'); ?>/common/images/txt_switchfont.gif" alt="文字サイズ" /></p>
<ul>
<li id="fontSmall"><a href="javascript:;" class="texttoggler" rel="smallview">小</a></li>
<li id="fontNormal"><a href="javascript:;" class="texttoggler" rel="normalview">中</a></li>
<li id="fontLarge"><a href="javascript:;" class="texttoggler" rel="largeview">大</a></li>
</ul>
</div>
<p><a href="#" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/common/images/btn_nippon.gif" alt="新日鉄エンジニアリング" class="imgover" /></a></p>
<!-- / class hSection --></div>
<!-- / class headerInner --></div>
<!-- / id header --></div>

<div id="gNav">
<dl>
<dt>主なカテゴリ</dt>
<dd>
<ul>
<li id="gNavHome"><a href="<?php echo get_settings('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_home.gif" alt="HOME" /></a></li>
<li id="gNavCompany"><a href="<?php bloginfo('url'); ?>/company/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_company.gif" alt="企業情報 Company Information" /></a></li>
<li id="gNavProject"><a href="<?php bloginfo('url'); ?>/business/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_project.gif" alt="事業情報 Project Information" /></a></li>
<li id="gNavRecruit"><a href="<?php bloginfo('url'); ?>/recruit/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_recruit.gif" alt="採用情報 Recruit Information" /></a></li>
<li id="gNavInquiry"><a href="https://www.nsc-eng.co.jp/ask/nsoc/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_inquiry.gif" alt="お問い合わせ Inquiry" /></a></li>
</ul>
</dd>
</dl>
<!-- / id gNav --></div>

<?php if(is_home()): ?>
<div id="visual">
<p><img src="<?php bloginfo('template_directory'); ?>/images/img_visual.jpg" alt="石油・天然ガス開発を推進する世界有数のマリンコントラクターである新日鉄エンジニアリングの中核会社です。" /></p>
<!-- / id visual --></div>
<?php endif; ?>