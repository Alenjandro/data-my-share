<?php get_header(); ?>

<div id="pageBody">
<div id="content">
<div class="section">
<div class="title">
<h2><img src="<?php bloginfo('template_directory'); ?>/images/top/mh_information.gif" alt="お知らせ Information" /></h2>
<p><a href="<?php bloginfo('url'); ?>/news/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_list.gif" alt="お知らせ一覧" class="imgover" /></a></p>
<p class="rss"><a href="<?php bloginfo('url'); ?>/news/feed/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_rss.gif" alt="RSS" class="imgover" /></a></p>
<!-- / class title --></div>
<dl class="news">
<?php 
if (have_posts()) :
	query_posts('&posts_per_page=5&cat=1&orderby=date');
?>
<?php while (have_posts()) : the_post(); ?>
		<?php if ( in_category(1)) { ?>

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
<!-- / class news --></dl>
<!-- / class section --></div>

<div class="section">
<div class="title">
<h2><img src="<?php bloginfo('template_directory'); ?>/images/top/mh_project.gif" alt="事業情報 Project Information" /></h2>
<p class="infoProject"><a href="<?php bloginfo('url'); ?>/business/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_list_business.gif" alt="お知らせ一覧" class="imgover" /></a></p>
<!-- / class title --></div>
<div class="project">
<div class="projectInner">
<ul>
<li>
<h3><a href="<?php bloginfo('url'); ?>/steel_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/sh_manufacture.gif" alt="製鉄プラントエンジニアリング" /></a></h3>
<div class="projectContent">
<p>製鉄プラントの基本計画からアフターケアまで先端テクノロジーを駆使したトータルエンジニアリングで21世紀の製鉄事業を支えます。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/steel_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_manufacture.jpg" alt="製鉄プラントエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/steel_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<h3><a href="<?php bloginfo('url'); ?>/environment_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/sh_environment.gif" alt="環境プラントエンジニアリング" /></a></h3>
<div class="projectContent">
<p>資源循環型社会への実現に向かって、私たちは長年にわたり培った溶融・エネルギー回収・排ガス処理などの環境分野独自技術を活かし、総合的なエンジニアリングを提供します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/environment_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_environment.jpg" alt="環境プラントエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/environment_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><a href="<?php bloginfo('url'); ?>/energy_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/sh_energy.gif" alt="エネルギープラントエンジニアリング" /></a></h3>
<div class="projectContent">
<p class="cateText">コークス炉ガス精製設備、液化天然ガス（LNG）プラント、新エネルギープラントの設計で培ってきた知見・技術を活用し、クリーンエネルギー社会の実現、エネルギー資源の開発に貢献します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/energy_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_energy.jpg" alt="エネルギープラントエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/energy_plant/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<h3><a href="<?php bloginfo('url'); ?>/simulation/"><img src="<?php bloginfo('template_directory'); ?>/images/top/sh_simulation.gif" alt="シミュレーションエンジニアリング" /></a></h3>
<div class="projectContent">
<p class="cateText">製鉄設備から化学プラントまで、コンピュータシミュレーションを利用したエンジニアリングにより高度なソリューションをご提供します。解析業務からシステム開発による解析支援、設備の可視化など、さまざまなサービスをご提案します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/simulation/"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_simulation.jpg" alt="シミュレーションエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/simulation/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li>
<h3><a href="<?php bloginfo('url'); ?>/control/"><img src="<?php bloginfo('template_directory'); ?>/images/top/sh_system.gif" alt="制御システムエンジニアリング" /></a></h3>
<div class="projectContent">
<p class="cateText02">制御システム分野は、製鉄・環境そしてエネルギー分野のプラントに欠かせない電気・計装機器の設計・エンジニアリングを担っています。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/control/"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_system.jpg" alt="制御システムエンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/control/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>

<li class="right">
<h3><a href="<?php bloginfo('url'); ?>/research/"><img src="<?php bloginfo('template_directory'); ?>/images/top/sh_construction.gif" alt="建築・鋼構造物エンジニアリング" /></a></h3>
<div class="projectContent">
<p class="cateText02">高度な技術を駆使し、最高のパフォーマンスを引き出す各種建築物・構造物を提供します。</p>
<p class="image"><a href="<?php bloginfo('url'); ?>/research/"><img src="<?php bloginfo('template_directory'); ?>/images/top/img_construction.jpg" alt="建築・鋼構造物エンジニアリング" /></a></p>
<p><a href="<?php bloginfo('url'); ?>/research/"><img src="<?php bloginfo('template_directory'); ?>/images/top/btn_detail.gif" alt="詳細はこちら" class="imgover" /></a></p>
</div>
</li>
</ul>
<!-- / class projectInner --></div>
<!-- / class project --></div>
<!-- / class section --></div>
<!-- / id content --></div>

<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php get_footer(); ?>