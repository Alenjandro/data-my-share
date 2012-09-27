<?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><?php if($_GET['cat']!=10) {  echo '新着媒体情報'; } else { echo '新着情報'; } ?> | 交通広告・屋外広告の情報サイト　交通広告ナビ</title>
<meta name="description" content="広告展開は消費者の生活行動（習慣）の導線を取り込むことが必要不可欠。都市生活者の変わらない習慣は公共交通機関での通勤通学。この生活動線上に接触するメディア「交通広告」をご紹介します。｜交通広告、屋外広告ならニューアド社" />
<meta name="keywords" content="交通広告代理店,交通広告,station,電車広告,屋外広告,バス広告,タクシー広告,広告料金," />
<link rel="shortcut icon" href="<?php echo $url; ?>favicon.ico" />
<link href="<?php echo $url; ?>common/css/no-style.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen,print" />
<link href="<?php echo $url; ?>common/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="contents" href="/" title="ホーム" />
<script type="text/javascript" src="<?php echo $url; ?>common/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>common/js/script.js"></script>
<?php if(!is_paged()) { ?>
<script type="text/javascript" src="<?php echo $url; ?>common/js/jquery.tabs.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>common/js/tabs.js"></script>
<?php } ?>
</head>

<body <?php if(is_category('新着情報') || $_GET["c"]=='1'){ echo 'id="'.info.'"'; } ?>>
<div class="naviHidden">
<p>以下のリンクより、本文、メニューまたは共通メニューへジャンプができます。</p>
<p><a href="#content">本文へジャンプ</a>
<a href="#gNavi">メニューへジャンプ</a> 
<a href="#fNavi">共通メニューへジャンプ</a></p>
<!-- / class naviHidden --></div>

<hr />

<div id="layout">

<div id="header" class="clearfix">
<div class="hTop clearfix">
<h1 class="hText">交通広告・屋外広告・クロスメディア広告の総合情報サイト交通広告ナビ</h1>
<ul class="clearfix">
<li><a href="<?php echo $url; ?>sitemap/index.html"><img src="<?php echo $url; ?>common/images/hnavi_sitemap.gif" alt="サイトマップ" /></a></li>
<li><a href="<?php echo $url; ?>faq/index.html"><img src="<?php echo $url; ?>common/images/hnavi_faq.gif" alt="よくあるご質問" /></a></li>
</ul>
</div>

<p id="logo"><a href="<?php echo $url; ?>index.html"><img src="<?php echo $url; ?>common/images/img_logo.gif" alt="交通広告・屋外広告の情報サイト　交通広告ナビ" /></a></p>
<div class="hBlock clearfix">
<form action="http://www.koutsu-navi.com/search_result/" id="cse-search-box" class="clearfix">
<label for="key"><img src="<?php echo $url; ?>common/images/title_search.gif" alt="サイト内検索" /></label>
<p>
<input type="hidden" name="cof" value="FORID:11" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="hidden" name="cx" value="015027263579745409207:mhxon-mfu78" />
<input type="text" id="key" name="q" value="" />
<span>
<input type="image" name="sa" value="検索" src="<?php echo $url; ?>common/images/btn_submit.gif" alt="検索" />
</span></p>
</form>

<p class="contact"> <img src="<?php echo $url; ?>common/images/img_telnumber.gif" alt="創業60年以上！業界最大級の情報と実績があります！ ご相談・お問い合わせはお気軽にどうぞ 03-5305-4802" class="telNumber" /> <span><a href="https://e4010.secure.jp/~e4010003/contact/"><img src="<?php echo $url; ?>common/images/bu_contact.gif" alt="お問い合わせはこちら" /></a></span> </p>
</div>
<dl id="gNavi">
<dt>主なカテゴリ</dt>
<dd>
<ul>
<li id="gNaviHome"><a href="<?php echo $url; ?>index.html">ホーム</a></li>
<li id="gNaviStation"><a href="<?php echo $url; ?>station/index.html">station</a></li>
<li id="gNaviTrain"><a href="<?php echo $url; ?>train/index.html">電車広告</a></li>
<li id="gNaviOutdoor"><a href="<?php echo $url; ?>outdoor/index.html">屋外広告</a></li>
<li id="gNaviBusTaxi"><a href="<?php echo $url; ?>bus_taxi/index.html">バス広告・タクシー広告</a></li>
<li id="gNaviPrice"><a href="<?php echo $url; ?>search/index.html">料金検索</a></li>
</ul>
</dd>
</dl>
<!-- / id header -->

<div id="pageBody">
<div class="naviHidden">ここから本文です<!-- / class naviHidden --></div>
<div id="content">
<div id="topicPath">
<ol>
<li><a href="<?php echo $url; ?>index.html">ホーム</a></li>
<li class="here"><strong><?php if($_GET['cat']!=10) {  echo '新着媒体情報'; } else { echo '新着情報'; } ?></strong></li>
</ol>
<!-- / id topicPath --></div>
<?php if($_GET['cat']!=10) {  ?>
<h1><img src="<?php bloginfo('template_directory'); ?>/images/bh_news.jpg" alt="新着媒体情報" />
<a href="<?php bloginfo('url'); $category_id = get_cat_ID( '新着媒体情報' ); echo '/?feed=rss&amp;cat='.$category_id; ?>"><img src="<?php echo $url; ?>common/images/ico_rss.gif" alt="" /></a>
</h1>
<?php } else { ?>
<h1><img src="<?php bloginfo('template_directory'); ?>/images/bh_info_list.jpg" alt="新着情報" />
<a href="<?php bloginfo('url'); $category_id = get_cat_ID( '新着情報' ); echo '/?feed=rss2&amp;cat='.$category_id; ?>"><img src="<?php echo $url; ?>common/images/ico_rss.gif" alt="" /></a>
</h1>
<?php } ?>