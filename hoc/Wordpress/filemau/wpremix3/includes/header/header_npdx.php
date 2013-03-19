<?php
$dir = dirname(__FILE__);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>
<?php
if (is_home() ) {
	bloginfo('name');
} elseif ( is_category() ) { 
	single_cat_title(); echo ' | ' ; bloginfo('name');
} elseif (is_single() ) {
	single_post_title(); echo ' | ' ; bloginfo('name');
} elseif (is_page() ) {
	single_post_title(); echo ' | ' ; bloginfo('name');
} else {
	wp_title('',true);
}
?>
</title>
<meta name="description" content="<?php echo (get_post_meta($post->ID,ディスクリプション,true)); ?>" />
<meta name="keywords" content="<?php echo (get_post_meta($post->ID,キーワード,true)); ?>" />
<link href="<?php bloginfo('template_directory'); ?>/css/common/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php if(is_home()): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/top.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('news')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('business')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/business.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('steel_plant')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/steel_plant.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category(array(25,26))): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/s_01.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('5')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/environment.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('6')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/energy.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('simulation')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub01.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub01')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub01.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub02')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub02.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub03')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub03.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub04')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub04.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub05')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub05.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub06')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub06.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('sub07')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/sub07.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('control')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/control.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category('research')): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/research.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(get_post_meta($post->ID,スタイルシート,true)): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/<?php echo (get_post_meta($post->ID,スタイルシート,true)); ?>.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php endif; ?>
<link href="<?php bloginfo('template_directory'); ?>/css/common/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="contents" href="/" title="ホーム" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/doctextsizer.js"></script>
<?php if(is_category()): ?>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/thickbox.js"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/reflection.js"></script>
<?php endif; ?>
</head>

<body>
<div id="layout">
<div id="header">
<div class="headerInner">
<h1 id="logo"><a href="<?php echo get_settings('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/common/logo.gif" alt="日鐵プラント設計株式会社" /></a></h1>
<div class="fontSwitch">
<dl>
<dt><img src="<?php bloginfo('template_directory'); ?>/images/common/ttl_fontswitch.gif" alt="文字サイズ" /></dt>
<dd><ul>
<li id="fontSmall"><a href="#" class="texttoggler" rel="smallview">小</a></li>
<li id="fontNormal"><a href="#" class="texttoggler" rel="normalview">中</a></li>
<li id="fontLarge" class="last"><a href="#" class="texttoggler" rel="largeview">大</a></li>
</ul></dd>
</dl>
<script type="text/javascript">documenttextsizer.setup("texttoggler")</script>
<p><a href="http://www.nsc-eng.co.jp/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_engineer.gif" alt="新日鉄エンジニアリング" class="imgover" /></a></p>
<!-- / class fontSwitch --></div>
<!-- / class headerInner --></div>
<!-- / id header --></div>

<div id="gNav">
<dl>
<dt>主なカテゴリ</dt>
<dd>
<ul>
<li id="gNavHome"><a href="<?php echo get_settings('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/common/gnav_home.gif" alt="HOME" /></a></li>
<li id="gNavCompany"><a href="<?php bloginfo('url'); ?>/company/"><img src="<?php bloginfo('template_directory'); ?>/images/common/gnav_company.gif" alt="企業情報  Company Information" /></a></li>
<li id="gNavProject"><a href="<?php bloginfo('url'); ?>/business/"><img src="<?php bloginfo('template_directory'); ?>/images/common/gnav_project.gif" alt="事業情報  Project Information" /></a></li>
<li id="gNavRecruit"><a href="<?php bloginfo('url'); ?>/recruit/"><img src="<?php bloginfo('template_directory'); ?>/images/common/gnav_recruit.gif" alt="採用情報  Recruit Information" /></a></li>
<li id="gNavInquiry"><a href="<?php bloginfo('url'); ?>/contact/"><img src="<?php bloginfo('template_directory'); ?>/images/common/gnav_inquiry.gif" alt="お問い合わせ  Inquiry" /></a></li>
</ul>
</dd>
</dl>
<!-- / id gNav --></div>

<?php if(is_home()): ?>
<div id="visual">
<p><embed src='<?php bloginfo('template_directory'); ?>/swf/top_a.swf' width=1200 height=380 quality=high ></embed></p>
<!-- / id visual --></div>
<?php endif; ?>
