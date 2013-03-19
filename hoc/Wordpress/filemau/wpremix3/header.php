<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><?php hierarchical_title('|'); ?></title>
<?php if(is_home()): ?>
<meta name="description" content="日鐵プラント設計株式会社は、製鉄プラント、環境プラント、エネルギープラントを中心としたプラントのエンジニアリングを行う分野と、設計機能の高度化を支援したシミュレーション・ソリューションを提供する分野とで、事業展開をしています。" />
<meta name="keywords" content="日鐵プラント設計,製鉄プラント,プラント設計,環境プラント設計,エネルギープラント設計,解析ソフトウェア,制御システム,建築・鋼構造エンジニアリング" />
<?php elseif(is_category('news')): ?>
<meta name="description" content="日鐵プラント設計株式会社の各事業に関する最新情報をお届けします。" />
<meta name="keywords" content="お知らせ一覧,日鐵プラント設計,製鉄プラント,プラント設計,環境プラント設計,エネルギープラント設計,解析ソフトウェア,制御システム,建築・鋼構造エンジニアリング" />
<?php elseif(is_category('business')): ?>
<meta name="description" content="日鐵プラント設計株式会社の事業分野についてのご紹介です。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,プラント設計,環境プラント設計,エネルギープラント設計,解析ソフトウェア,制御システム,建築・鋼構造エンジニアリング" />
<?php elseif(is_category('steel_plant')): ?>
<meta name="description" content="製鉄プラントの基本プロセスから施工まで先端テクノロジーを駆使したトータルエンジニアリングで２１世紀の製鉄事業を支えます。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,上行程,下行程,設備" />
<?php elseif(is_category('s_01')): ?>
<meta name="description" content="製鉄プラントの基本プロセスから施工まで先端テクノロジーを駆使したトータルエンジニアリングで２１世紀の製鉄事業を支えます。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,上行程,高炉,コークス乾式消火設備,転炉,RH-MFB, 回転炉床炉, 電気炉,電気炉排ガス対策設備" />
<?php elseif(is_category('s_02')): ?>
<meta name="description" content="製鉄プラントの基本プロセスから施工まで先端テクノロジーを駆使したトータルエンジニアリングで２１世紀の製鉄事業を支えます。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,下行程,加熱炉設備,連続鋳造設備,形鋼圧延設備, 連続焼鈍設備,連続溶融亜鉛メッキライン,連続塗装ライン,電気メッキライン" />
<?php elseif(is_category('environment_plant')): ?>
<meta name="description" content="資源循環型社会への実現に向かって、私たちは長年にわたり培った溶融・エネルギー回収・排ガス処理などの環境分野独自技術を活かし、総合的なエンジニアリングを提供します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,プラント設計,環境プラント設計,直接溶融・資源化システム,食品エタノール化プラント,PCB廃棄物適正処理システム" />
<?php elseif(is_category('energy_plant')): ?>
<meta name="description" content="プラントや化学プラントにおける廃熱利用のエンジニアリングで蓄積したエネルギーの有効利用技術を活かし、広範なエネルギーシステムを提供します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,プラント設計,エネルギープラント設計,ガス精製,LNG・貯蔵,地熱発電" />
<?php elseif(is_category('simulation')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,構造解析,熱流体解析,電磁場解析,システム開発,ソフトウェア販売,数値解析技報,光ファイバーセンシング技術" />
<?php elseif(is_category('sub01')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,構造解析,Marc,LS-DYNA" />
<?php elseif(is_category('sub02')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,熱流体解析,FLUENT,N.CAS-FSComm" />
<?php elseif(is_category('sub03')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,電磁場解析,JMAG" />
<?php elseif(is_category('sub04')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,システム開発,MicroAVS" />
<?php elseif(is_category('sub05')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。
" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,光ファイバーセンシング技術" />
<?php elseif(is_category('sub06')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,ソフトウェア販売,エムエスシーソフトウェア社,独自商品" />
<?php elseif(is_category('sub07')): ?>
<meta name="description" content="製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,解析ソフトウェア,数値解析技報" />
<?php elseif(is_category('control')): ?>
<meta name="description" content="制御システム分野は、製鉄・環境そしてエネルギー分野のプラントに欠かせない電気・計装機器の設計・エンジニアリングを担っています" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,プラント設計,制御システム,コントローラ,ネットワーク,センサー,アクチュエータ" />
<?php elseif(is_category('research')): ?>
<meta name="description" content="私たちは、製鉄、環境及びエネルギーの各分野のプラント設備に要求される厳しい条件を満たす大型鋼構造物のエンジニアリングを担う鋼構造技術の専門集団です。" />
<meta name="keywords" content="事業情報,日鐵プラント設計,製鉄プラント,プラント設計,建築・鋼構造エンジニアリング,高炉設備,CDQ設備,鋼板処理設備,エネルギープラント設備" />
<?php else: ?>
<meta name="description" content="<?php echo (get_post_meta($post->ID,ディスクリプション,true)); ?>" />
<meta name="keywords" content="<?php echo (get_post_meta($post->ID,キーワード,true)); ?>" />
<?php endif; ?>


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
<?php elseif(is_archive()): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/news.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(is_single()): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/news_single.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php elseif(get_post_meta($post->ID,スタイルシート,true)): ?>
<link href="<?php bloginfo('template_directory'); ?>/css/<?php echo (get_post_meta($post->ID,スタイルシート,true)); ?>.css" rel="stylesheet" type="text/css" media="screen,print" />
<?php endif; ?>
<link href="<?php bloginfo('template_directory'); ?>/css/common/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('url'); ?>/favicon.ico" />
<link rel="contents" href="/" title="ホーム" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script language="javascript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/doctextsizer.js"></script>
<?php if(is_home() || is_category('business') || is_page('ideal')): ?>
<script language="javascript" type="text/javascript">AC_FL_RunContent = 0;</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/swfobject.js"></script>
<script type="text/javascript">
swfobject.embedSWF("swf/top_a", "visualFlash", "1105", "373", "9.0.0", "swf/cns_loader.swf");
swfobject.embedSWF("http://www.npd.nsc-eng.co.jp/swf/circle.swf", "businessFlash", "668", "243", "9.0.0", "swf/cns_loader.swf");
</script>
<?php endif; ?>
<?php if(is_category(array('s_01','s_02','environment_plant',6,'sub01','sub02','sub03','sub04','sub05','sub06','sub07','control','research'))): ?>
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
<p id="visualFlash"></p>
<p class="visualImg"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_flash.jpg" alt="" /></p>
<p class="adobe"><a href="http://get.adobe.com/jp/flashplayer/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/img_adobe.gif" alt="" class="adobe" /></a></p>
<!-- / id visual --></div>
<?php endif; ?>
