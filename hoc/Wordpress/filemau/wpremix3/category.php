<?php get_header(); ?>

<?php if(is_category('news')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li>お知らせ一覧</li>
</ul>
<!-- / class topicPath --></div>
<div id="pageBody">
<?php if(in_category('news')): ?>
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_url'); ?>/images/news/bh_newsList.gif" alt="お知らせ一覧" /></h1>
<dl class="news">
<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
<?php if ( in_category( 'news' )) { ?>

<dt><?php the_time(get_option('date_format')); ?></dt>
<dd>
<?php
$days=14;
$today=date('U');
$entry=get_the_time('U');
$diff1=date('U',($today - $entry))/86400;
if ($days > $diff1) { ?>
<img src="<?php bloginfo('template_directory'); ?>/images/common/ico_new.gif" alt="New" /> <?php }?>
<?php if(get_post_meta($post->ID,PDFリンク,true)): ?>
<a href="http://www.npd.nsc-eng.co.jp/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><?php the_title(); ?><?php if(get_post_meta($post->ID,PDFサイズ,true)): ?><span class="pdfSize">(<?php echo (get_post_meta($post->ID,PDFサイズ,true)); ?>)</span><?php endif; ?></a>
<a href="http://www.npd.nsc-eng.co.jp/pdf/<?php echo (get_post_meta($post->ID,PDFリンク,true)); ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf.gif" alt="" class="PDF" /></a>
<?php elseif(get_post_meta($post->ID,リンク,true)): ?>
<a href="<?php echo (get_post_meta($post->ID,リンク,true)); ?>"><?php the_title(); ?></a>
<?php else: ?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php endif; ?>

</dd>
<?php } ?>
<?php endwhile; else: ?>
<dt>お知らせがありません。</dt>
<dd>&nbsp;</dd>
<?php endif; ?>
</dl>
</div>
</div>
<?php endif; ?>
<?php include(TEMPLATEPATH."/sidebar_news.php");?>
<?php endif; ?>

<?php if(is_category('business')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li>事業情報</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/bh_project.gif" alt="事業情報 Project Information" /></h1>
<div id="flashOject">
<p id="businessFlash"></p>
<p class="businessImg"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_flash.jpg" alt="" /></p>
<p class="adobe"><a href="http://get.adobe.com/jp/flashplayer/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/img_adobe.gif" alt="" class="adobe" /></a></p>
</div>
<div class="listSection">
<div class="sectionInner">
<ul>
<li>
<h3><a href="<?php bloginfo('url'); ?>/business/steel_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/business/sh_ironmaking.gif" alt="製鉄プラントエンジニアリング" /></a></h3>
<div class="content">
<p class="cateText">製鉄プラントの基本計画からアフターケアまで先端テクノロジーを駆使したトータルエンジニアリングで21世紀の製鉄事業を支えます。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/business/steel_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_manufacture.jpg" alt="製鉄プラントエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/business/steel_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<h3><a href="<?php bloginfo('url'); ?>/business/environment_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/business/sh_environment.gif" alt="環境プラントエンジニアリング" /></a></h3>
<div class="content">
<p class="cateText">資源循環型社会への実現に向かって、私たちは長年にわたり培った溶融・エネルギー回収・排ガス処理などの環境分野独自技術を活かし、総合的なエンジニアリングを提供します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/business/environment_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_environment.jpg" alt="環境プラントエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/business/environment_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><a href="<?php bloginfo('url'); ?>/business/energy_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/business/sh_energy.gif" alt="エネルギープラントエンジニアリング" /></a></h3>
<div class="content">
<p class="cateText02">コークス炉ガス精製設備、液化天然ガス（LNG）プラント、新エネルギープラントの設計で培ってきた知見・技術を活用し、クリーンエネルギー社会の実現、エネルギー資源の開発に貢献します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/business/energy_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_energy.jpg" alt="エネルギープラントエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/business/energy_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<h3><a href="<?php bloginfo('url'); ?>/business/simulation/"><img src="<?php bloginfo('template_directory'); ?>/images/business/sh_simulation.gif" alt="シミュレーションエンジニアリング" /></a></h3>
<div class="content">
<p class="cateText02">製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/business/simulation/"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_simulation.jpg" alt="シミュレーションエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/business/simulation/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><a href="<?php bloginfo('url'); ?>/business/control/"><img src="<?php bloginfo('template_directory'); ?>/images/business/sh_control.gif" alt="制御システムエンジニアリング" /></a></h3>
<div class="content">
<p>制御システム分野は、製鉄・環境そしてエネルギー分野のプラントに欠かせない電気・計装機器の設計・エンジニアリングを担っています。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/business/control/"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_system.jpg" alt="制御システムエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/business/control/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<h3><a href="<?php bloginfo('url'); ?>/business/research/"><img src="<?php bloginfo('template_directory'); ?>/images/business/sh_construction.gif" alt="建築・鋼構造物エンジニアリング" /></a></h3>
<div class="content">
<p>高度な技術を駆使し、最高のパフォーマンスを引き出す各種建築物・構造物を提供します。<br />&nbsp;<br /></p>
<p class="image"><a href="<?php bloginfo('url'); ?>/business/research/"><img src="<?php bloginfo('template_directory'); ?>/images/business/img_construction.jpg" alt="建築・鋼構造物エンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/business/research/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_business.php");?>
<?php endif; ?>

<?php if(is_category('steel_plant')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li>製鉄プラントエンジニアリング</li>
</ul>
<!-- / class topicPath --></div>
<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/bh_ironmaking.gif" alt="製鉄プラントエンジニアリング" /></h1>
<div class="sectionInner">
<p class="headImage"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/img_ironmaking.jpg" alt="製鉄プラントの製銑・製鋼・電気炉設備から圧延・処理ラインに至るまで、あらゆる製鉄設備の基本プロセスから施工まで、一貫したエンジニアリングをおこないます。
国内はもとより欧州・北米・南米・アジア・アフリカ等、世界各地の製鉄事業をサポートします。
また、操業の自動化・無人化・製造プロセスの効率化および省エネルギーを実現するため、各種センサー・ロボット・コンピュータを利用したハイテク・システムを提案します。" /></p>

<ul class="styleList clearfix">
<li class="clearfix">
<p><a href="<?php bloginfo('url'); ?>/business/steel_plant/s_01/"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/img_iron.jpg" alt="上工程（製銑・製鋼）" /></a></p>
<p class="styleListTxt"><a href="<?php bloginfo('url'); ?>/business/steel_plant/s_01/"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/bu_iron.gif" alt="上工程（製銑・製鋼）" class="imgover" /></a></p>
</li>
<li class="right clearfix">
<p><a href="<?php bloginfo('url'); ?>/business/steel_plant/s_02/"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/img_surface.jpg" alt="下工程（表面処理・他）" /></a></p>
<p class="styleListTxt"><a href="<?php bloginfo('url'); ?>/business/steel_plant/s_02/"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/bu_surface.gif" alt="下工程（表面処理・他）" class="imgover" /></a></p>
</li>
<!-- / class styleList --></ul>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_steel.php");?>
<?php endif; ?>

<?php if(is_category('s_01')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/steel_plant/">製鉄プラントエンジニアリング</a></li>
<li>上工程</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/bh_ironmaking.gif" alt="製鉄プラントエンジニアリング" /></h1>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/sh_iron.gif" alt="上工程（製銑・製鋼）" /></h2>
<div class="sectionInner">
<ul class="productList">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_s01.php");?>
<?php endif; ?>

<?php if(is_category('s_02')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/steel_plant/">製鉄プラントエンジニアリング</a></li>
<li>下工程</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/bh_ironmaking.gif" alt="製鉄プラントエンジニアリング" /></h1>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/sh_surface.gif" alt="下工程（製銑・製鋼）" /></h2>
<div class="sectionInner">
<ul class="productList">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/steelplant/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_s02.php");?>
<?php endif; ?>

<?php if(is_category('environment_plant')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li>環境プラントエンジニアリング</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/environment/bh_environment.gif" alt="環境プラントエンジニアリング" /></h1>
<div class="sectionInner">
<p class="headImage"><img src="<?php bloginfo('template_directory'); ?>/images/business/environment/img_environment.jpg" alt="資源循環型社会への実現に向かって、私たちは長年にわたり培った溶融・エネルギー回収・排ガス処理などの環境分野独自技術を活かし、総合的なエンジニアリングを提供します。" /></p>
<ul class="productList">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/environment/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_environ.php");?>
<?php endif; ?>

<?php if(is_category('energy_plant')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li>エネルギープラントエンジニアリング</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/bh_energy.gif" alt="エネルギプラントエンジニアリング" /></h1>
<div class="sectionInner">
<p class="headImage"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/img_energy.jpg" alt="製鉄プラントや化学プラントにおける廃熱利用のエンジニアリングで蓄積したエネルギーの有効利用技術を活かし、各種廃熱ボイラー・循環流動床ボイラーおよびタービンなどの発電設備を含む広範なエネルギーシステムを提供します。" /></p>


<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/mh_gas.gif" alt="ガス精製" /></h2>
<ul class="productList">
<?php query_posts('tag=ガス精製'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>

<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/mh_lng.gif" alt="LNG・貯蔵" /></h2>
<ul class="productList">
<?php query_posts('tag=LNG・貯蔵'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>


<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/mh_geothermal.gif" alt="地電発電・天然ガス精製・石炭ガス化・CO2吸収分離プラント" /></h2>
<ul class="productList">
<?php query_posts('tag=地電発電・天然ガス精製・石炭ガス化・CO2吸収分離プラント'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/energy/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_energy.php");?>
<?php endif; ?>

<?php if(is_category('simulation')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li>シミュレーションエンジニアリング</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/bh_simulation.gif" alt="シミュレーションエンジニアリング" /></h1>
<div class="sectionInner">
<p class="headImage"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_simulation.jpg" alt="昭和63年、数値シミュレーション部門発足以来、20年以上の業務実績と、製鉄プラント設備、環境プラント設備を含め多分野の解析技術を担保してきました。現在、設計や研究開発等の種々の課題に対して、シミュレーション（構造・熱流体・電磁場・音響・化学プロセス等）を軸としつつ、システム開発（光ファイバーセンシング，可視化等）、および数値解析環境構築事業（MSC代理店）と連携させることで、総合シミュレーションエンジニアリングを提供します。" /></p>
<ul class="productList">
<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_structure.gif" alt="構造解析" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub01/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_structure.jpg" alt="構造解析" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub01/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_thermofluid.gif" alt="熱流体解析" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub02/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_thermofluid.jpg" alt="熱流体解析" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub02/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_magnetic.gif" alt="電磁場解析" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub03/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_magnetic.jpg" alt="電磁場解析" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub03/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_development.gif" alt="システム開発" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub04/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_development.jpg" alt="システム開発" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub04/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_technology.gif" alt="光ファイバーセンシング技術" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub05/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_technology.jpg" alt="光ファイバーセンシング技術" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub05/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_software.gif" alt="ソフトウェア販売" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub06/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_software.jpg" alt="ソフトウェア販売" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub06/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sh_numerical.gif" alt="数値解析技報" /></h3>
<div class="content">
<p><a href="<?php bloginfo('template_directory'); ?>/business/sub07/"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_numerical.jpg" alt="数値解析技報" /></a></p>
<p class="detail"><a href="<?php bloginfo('template_directory'); ?>/business/sub07/"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<!-- / class productList --></ul>
<!-- / class sectionInner --></div>
<!-- / class section --></div>
<!-- / id content --></div>
<?php include(TEMPLATEPATH."/sidebar_simulate.php");?>
<?php endif; ?>


<?php if(is_category(array('sub01','sub02','sub03','sub04','sub05','sub06','sub07'))): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/simulation">シミュレーションエンジニアリング</a></li>
<li><?php single_cat_title(); ?></li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/bh_simulation.gif" alt="シミュレーションエンジニアリング" /></h1>
<div class="sectionInner">
<div class="productSection">

<?php if(is_category('sub01')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub01/mh_structure.gif" alt="構造解析" /></h2>
<div class="productContent">
<p class="headText">複合非線形解析、熱伝導・熱応力解析、動的応答解析（振動・衝撃）、クリープ解析、コンクリートひび割れ解析、疲労亀裂進展解析、疲労強度検討全般（低サイクル、高サイクル）、粒子法（SPH,DEM)から数理最適化手法に至るまで幅広い解析技術を有しています。客先ニーズに応じて、最適なシミュレーションエンジニアリング・ソリューションを提供します。</p>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub01/mh_marc.gif" alt="MARC" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=MARC'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub01/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub01/mh_dyna.gif" alt="LS-DYNA" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=LS-DYNA'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub01/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate01.php");?>

<?php elseif(is_category('sub02')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/mh_thermo.gif" alt="熱流体解析" /></h2>
<div class="productContent">
<p class="headText">単純なガス流れから混相流や燃焼流、流体構造連成まで、さまざまな熱流動現象を数値解析で明らかにし、最適なエンジニアリングソリューションを提供します。</p>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/mh_fluent.gif" alt="FLUENT" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=FLUENT'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/mh_comm.gif" alt="F.S.Comm（FLUENT-Marc FSI 解析インターフェース）" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=F.S.Comm'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/mh_addin.gif" alt="F.S.Addin（FLUENT用FSI 解析モジュール）" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=F.S.Addin'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub02/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate02.php");?>

<?php elseif(is_category('sub03')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub03/mh_magnetic.gif" alt="電磁場解析" /></h2>
<div class="productContent">
<p class="headText">電磁場による電磁力や熱の発生、それらの構造体や流体への影響を含めた電磁場現象を数値解析で明らかにし、最適なエンジニアリングソリューションを提供します。</p>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub03/mh_jmag.gif" alt="JMAG" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=JMAG'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub03/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate03.php");?>

<?php elseif(is_category('sub04')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub04/mh_development.gif" alt="システム開発" /></h2>
<div class="productContent">
<p class="headText">3次元グラフィックスを用いた可視化技術により、実験・計測で得たデータを「見える視化するシムをはじめ自動計測制御シムステの開発や数値解析支援システムの開発など、様々なシステム化ソリューションを提供します。</p>
</div>
</div>

<div class="productSection">
<ul class="productList">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub04/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate04.php");?>

<?php elseif(is_category('sub05')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub05/mh_technology.gif" alt="光ファイバーセンシング技術" /></h2>
<div class="productContent">
<p class="headText">光ファイバセンシングとは、「光ファイバ自体をセンサとして使用」する新しい計測技術です。これまでの定点測定では困難であった構造物や地盤全体の変状または挙動（温度、歪など）を明らかにし、最適な防災監視ソリューションを提供します。</p>
<ul class="productList">
<li>
<h3>技術紹介</h3>
<div class="content">
<p><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub05/img_introduce.jpg" alt="技術紹介" /></p>
<p class="detail"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/ippangijyutusyoukai.pdf" target="_blank">【PDF 215KB】</a></p>
</div>
</li>

<li>
<h3>応用事例</h3>
<div class="content">
<p><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub05/img_case.jpg" alt="応用事例" /></p>
<p class="detail"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/ippanouyourei.pdf" target="_blank">【PDF 215KB】</a></p>
</div>
</li>
</ul>
<p class="adobeReader"><a href="http://www.adobe.com/go/getreader_jp" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_adobe.gif" alt="Get ADOBE READER" /></a><span>※PDFファイルをご覧いただくためには、Adobe&reg;Reader&reg;が必要です。<br />
アドビ社のサイトより無料でダウンロード可能です。</span></p>
</div>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate05.php");?>

<?php elseif(is_category('sub06')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub06/mh_software.gif" alt="ソフトウエア販売" /></h2>
<div class="productContent">
<p class="headText">エムエスシーソフトウェア株式会社の正規代理店として、ソフトウェアの販売と技術サポートサービスを提供するとともに、お客様のニーズに合った製品のご紹介とコンサルティングサービスを提供します。</p>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub06/mh_product.gif" alt="エムエスシーソフトウェア社製品" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=エムエスシーソフトウェア社製品'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub06/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="productSection">
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub06/mh_commodity.gif" alt="独自商品" /></h2>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag="独自商品'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub06/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="adobe">
<p class="linkPdf"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf.gif" alt="" /><a href="<?php bloginfo('url'); ?>/pdf/product_list.pdf" target="_blank">全ての取扱製品一覧はこちら【PDF 800KB】</a></p>
<p class="adobeReader"><a href="http://www.adobe.com/go/getreader_jp" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_adobe.gif" alt="Get ADOBE READER" /></a><span>※PDFファイルをご覧いただくためには、Adobe&reg;Reader&reg;が必要です。<br />
アドビ社のサイトより無料でダウンロード可能です。</span></p>
<!-- / class adobe --></div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate06.php");?>

<?php elseif(is_category('sub07')): ?>
<h2 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub07/mh_numeric.gif" alt="ソフトウェア販売" /></h2>
<div class="productContent">
<p class="headText">平成14年度より「数値解析技報」を発刊しています。最新号及びバックナンバーをダウンロードできます。</p>
<div class="numericSection">
<p class="image"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub07/img_numeric.jpg" alt="" /><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-08-NPD-2010.pdf" target="_blank">ダウンロードはこちら<br />
<img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf.gif" alt="" />【PDF 2.03MB】</a></span></p>
<div class="numericContent">
<div class="clearfix">
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub07/sh_current.gif" alt="最新号【目次】" /></h3>
<dl>
<dt>■巻頭言</dt>
<dd><ul>
<li>・数値解析技報第 8 号発刊のご挨拶</li>
<li>・NPD SiES'S 部のシミュレーション技術概要</li>
</ul></dd>
<dt>■技術論文</dt>
<dd><ul>
<li>・合成床版の輪荷重走行試験に対するシミュレーション手法の一提案</li>
<li>・プロセス配管系流体騒音問題に対するシミュレーション手法の一提案</li>
</ul></dd>
<dt>■技術レポート</dt>
<dd><ul>
<li>・MicroAVS ～可視化カスタマイズ技術～</li>
<li>・オープンソース CFD ツールボックス OpenFOAM のご紹介</li>
<li>・統合型ソルバーの非線形解析機能の検証</li>
<li>・FLUENT 燃焼解析モデルについて</li>
<li>・電磁界における電磁力表現について</li>
<li>・輻射問題における形態係数計算の MSC.Marc による精度検証</li>
<li>・疲労亀裂進展解析 3 次元モデル適応化のご紹介</li>
</ul></dd>
<dt>■製品紹介</dt>
<dd><ul>
<li>・Marc 2010</li>
</ul></dd>
<dt>■トピックス</dt>
<dd><ul>
<li>・KDK (九州デジタルエンジニアリング研究会) のご紹介</li>
<li>・上級アナリスト資格取得者のご紹介</li>
</ul></dd>
</dl>
</div>
<p class="adobeReader"><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/img_adobe.gif" alt="Get ADOBE READER" /><span>※PDFファイルをご覧いただくためには、Adobe&reg;Reader&reg;が必要です。<br />
アドビ社のサイトより無料でダウンロード可能です。</span></p>
<div class="clearfix">
<h3><img src="<?php bloginfo('template_directory'); ?>/images/business/simulation/sub07/sh_back.gif" alt="バックナンバー" /></h3>
<ul class="backList">
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-07-NPD-2009.pdf" target="_blank">No.7 2009年1月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-07-NPD-2009.pdf" target="_blank">【PDF 4.20MB】</a></span></li>
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-06-NPD-2006.pdf" target="_blank">No.6 2006年12月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-06-NPD-2006.pdf" target="_blank">【PDF 3.12MB】</a></span></li>
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-05-NPD-2005.pdf" target="_blank">No.5 2005年9月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-05-NPD-2005.pdf" target="_blank">【PDF 2.22MB】</a></span></li>
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-04-NPD-2004.pdf" target="_blank">No.4 2004年10月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-04-NPD-2004.pdf" target="_blank">【PDF 2.31MB】</a></span></li>
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-03-NPD-2003.pdf" target="_blank">No.3 2003年12月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-03-NPD-2003.pdf" target="_blank">【PDF 1.75MB】</a></span></li>
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-02-NPD-2003.pdf" target="_blank">No.2 2003年4月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-02-NPD-2003.pdf" target="_blank">【PDF 3.26MB】</a></span></li>
<li><span><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-01-NPD-2002.pdf" target="_blank">創刊号 2002年7月</a></span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="http://www.npd.nsc-eng.co.jp/pdf/Suuchi_Kaiseki_Gihou-01-NPD-2002.pdf" target="_blank">【PDF 1.12MB】</a></span></li>
<li><span>&nbsp;</span><span class="adobe"><img src="<?php bloginfo('template_directory'); ?>/images/common/ico_pdf2.gif" alt="" /><a href="<?php bloginfo('url'); ?>/pdf/Suuchi_Kaiseki_Gihou_01-08.pdf" target="_blank">全てのバックナンバーをダウンロード【PDF 20.1MB】</a></span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_simulate07.php");?>

<?php endif; ?>
<?php endif; ?>

<?php if(is_category('control')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li>制御システムエンジニアリング</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/control/bh_control.gif" alt="制御システムエンジニアリング" /></h1>
<div class="sectionInner">
<p class="headImage"><img src="<?php bloginfo('template_directory'); ?>/images/business/control/img_control.jpg" alt="制御システム分野は、製鉄・環境そしてエネルギー分野のプラントに欠かせない電気・計装機器の設計・エンジニアリングを担っています。
プラントの性能を引き出し、省エネルギーでクリーンな環境社会に貢献するため、「五感」を駆使して「手足」を操る「神経」と「頭脳」を構築します。" /></p>
<ul class="productList">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/control/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar_control.php");?>
<?php endif; ?>

<?php if(is_category('research')): ?>
<div class="topicPath">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">HOME</a></li>
<li><a href="<?php bloginfo('url'); ?>/business/">事業情報</a></li>
<li>建築・鋼構造物エンジニアリング</li>
</ul>
<!-- / class topicPath --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<h1 class="bHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/bh_construction.gif" alt="建築・鋼構造物エンジニアリング" /></h1>
<div class="sectionInner">
<p class="headImage"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/img_construction.jpg" alt="私たちは、製鉄、環境及びエネルギーの各分野のプラント設備に要求される厳しい条件を満たす大型鋼構造物のエンジニアリングを担う鋼構造技術の専門集団です。
各設備固有の設計条件を満たすために、高度な設計技術を駆使し、鋼構造や構造力学の観点より、設備支持架構の最適化を行ない、プラント機器の最高のパフォーマンスを引き出す、各種建築物・構造物を提供します。" /></p>
<div class="productSection">
<h3 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/mh_steel.gif" alt="製鉄プラント" /></h3>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=製鉄プラント'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="productSection">
<h3 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/mh_energy.gif" alt="エネルギープラント設備" /></h3>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=エネルギープラント設備'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>

<div class="productSection productLast">
<h3 class="mHead"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/mh_environment.gif" alt="環境プラント" /></h3>
<div class="productContent">
<ul class="productList">
<?php query_posts('tag=環境プラント'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
<h3><?php the_title(); ?><?php if(get_post_meta($post->ID,サブタイトル,true)): ?><span class="subTitle"><?php echo (get_post_meta($post->ID,サブタイトル,true)); ?></span><?php endif; ?></h3>
<div class="content">
<p><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/business/research/img_<?php the_name(); ?>.jpg" alt="<?php single_post_title(); ?>
" /></a></p>
<p class="detail"><a href="<?php the_permalink(); ?>?width=<?php echo (get_post_meta($post->ID,画像幅,true)); ?>&amp;height=<?php echo (get_post_meta($post->ID,画像高さ,true)); ?>" rel="AjaxGroup" class="thickbox" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/common/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
<?php endwhile; else: ?>
<?php endif; ?>
</ul>
</div>
</div>
</div>
</div>
</div>

<?php include(TEMPLATEPATH."/sidebar_research.php");?>
<?php endif; ?>

<?php get_footer(); ?>