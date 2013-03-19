<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>
<?php if(is_home()): ?>
<?php bloginfo('name'); ?>
<?php elseif(is_category()): ?>
<?php wp_title(''); ?> | <?php bloginfo('name'); ?>
<?php elseif(is_archive()): ?>
<?php wp_title(''); ?> | <?php bloginfo('name'); ?>
<?php elseif(is_single()): ?>
<?php wp_title(''); ?> | <?php bloginfo('name'); ?>
<?php else: ?>
<?php echo (get_post_meta($post->ID,ページタイトル,true)); ?> | <?php bloginfo('name'); ?>
<?php endif; ?>
</title>
<?php if(is_home()): ?>
<meta name="description" content="「グレープフルーツを食卓に。フロリダグレープフルーツ」のキャンペーンサイトです。 YOMEちゃんのレシピやコラム、グレープフルーツの情報が満載。みんな大好きグレープフルーツには、健康、美容に効能がありますよ。" />
<meta name="keywords" content="グレープフルーツ,フロリダ,かんきつ類,ホワイト,ルビー,フロリダ州柑橘局,旬,春,二日酔い,YOMEちゃん,ヨメちゃん,レシピ,グレフル,ぐれふる" />
<?php elseif(is_category()): ?>
<meta name="description" content="「グレープフルーツを食卓に。フロリダグレープフルーツ」のキャンペーンサイトです。 YOMEちゃんのレシピやコラム、グレープフルーツの情報が満載。こちらはフロリダグレープフルーツの【ニュース】のページです。" />
<meta name="keywords" content="グレープフルーツ,フロリダ,かんきつ類,ホワイト,ルビー,フロリダ州柑橘局,旬,春,二日酔い,YOMEちゃん,ヨメちゃん,レシピ,グレフル,ぐれふる" />
<?php else: ?>
<meta name="description" content="<?php echo nl2br(get_post_meta($post->ID,ディスクリプション,true)); ?>" />
<meta name="keywords" content="<?php echo nl2br(get_post_meta($post->ID,キーワード,true)); ?>" />
<?php endif; ?>
<link href="<?php bloginfo('template_directory'); ?>/common/css/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php if(is_home()): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/top.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_category()): ?>
<link href="<?php bloginfo('template_directory'); ?>/news/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_archive()): ?>
<link href="<?php bloginfo('template_directory'); ?>/news/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_single()): ?>
<link href="<?php bloginfo('template_directory'); ?>/news/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(get_post_meta($post->ID,スタイルシート,true)): ?>
<link href="<?php bloginfo('template_directory'); ?>/<?php if(!is_page(array('twitter','sitemap','character'))): ?><?php echo (get_post_meta($post->ID,スタイルシート,true)); ?>/<?php endif; ?>css/<?php echo (get_post_meta($post->ID,スタイルシート,true)); ?>.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php endif; ?>
<link href="<?php bloginfo('template_directory'); ?>/common/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="contents" href="/" title="ホーム" />
<?php if(!is_page(array('twitter','sitemap','character','smileface'))): ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/script.js"></script>
<?php endif; ?>
<?php if(is_page(array('twitter','smileface'))): ?>
<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>
<?php endif; ?>
<?php if(is_home()): ?>
<!--[if lte IE 6]><script language="JavaScript" type="text/javascript" src="http://florida-grapefruit.jp/wordpress/wp-content/themes/fdoc/common/js/unitpngfix.js" defer="defer"></script><![endif]-->
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/swfobject.js"></script>
<script language="javascript" type="text/javascript">
swfobject.embedSWF("http://florida-grapefruit.jp/wordpress/wp-content/themes/fdoc/swf/top.swf" , "visual" , "1024" , "253" , "9.0.0");
</script>
<?php endif; ?>
<?php if(is_page(array('recipe_01','recipe_02','recipe_03','recipe_04','recipe_05','recipe_06','recipe_07','recipe_08','recipe_09','recipe_10','recipe_11','recipe_12','recipe_13','recipe_14','recipe_15'))): ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/lib.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/common/js/carousel.js"></script>
<?php endif; ?>
</head>
<body<?php if(is_page(array('column','column02','column03'))): ?> id="column"<?php endif; ?>>
<div id="layout">
<div id="header">
<div id="headerInner">
<?php if(is_home()): ?>
<div id="visual">
<h1><img src="<?php bloginfo('template_directory'); ?>/images/img_visual.jpg" alt="グレープフルーツを食卓にFLORIDA フロリダグレープフルーツ" /></h1>
</div>
<?php else: ?>
<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/common/images/logo.gif" alt="FLORIDA さあ、グレープフルーツを食卓に。これからが旬。 フロリダ　グレープフルーツ" /></a></h1>
<?php endif; ?>
</div>
<!-- / id header --></div>
<div id="gNav">
<dl>
<dt>主なカテゴリ</dt>
<dd>
<ul>
<li id="gNavHome"><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_home.gif" alt="Home" /></a></li>
<li id="gNavFlorida"><a href="<?php bloginfo('url'); ?>/genki/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_florida.gif" alt="元気はフロリダから" /></a></li>
<li id="gNavTeiGi"><a href="<?php bloginfo('url'); ?>/tei_gi/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_tei_gi.gif" alt="低GIコンテンツ" /></a></li>
<li id="gNavRecipe"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_recipe.gif" alt="レシピ" /></a></li>
<li id="gNavColumn"><a href="<?php bloginfo('url'); ?>/recipe/column/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_column.gif" alt="コラム" /></a></li>
<li id="gNavSmileface"><a href="<?php bloginfo('url'); ?>/smileface/smileface/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_smileface.gif" alt="スマイルフェイス" /></a></li>
<li id="gNavDownload"><a href="<?php bloginfo('url'); ?>/download/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_download.gif" alt="ダウンロード" /></a></li>
<li id="gNavNews"><a href="<?php bloginfo('url'); ?>/category/news/"><img src="<?php bloginfo('template_directory'); ?>/common/images/gnav_news.gif" alt="News" /></a></li>
</ul>
</dd>
</dl>
</div>