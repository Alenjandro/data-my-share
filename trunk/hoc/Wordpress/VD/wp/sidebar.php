<div id="sidebar">
<?php if(get_post_meta($post->ID,'スタイルシート',true) == 'genki'): ?>
<h2><img src="<?php bloginfo('template_directory'); ?>/genki/images/mh_genki.gif" alt="元気はフロリダから" /></h2>
<ul class="lNav">
<li><a href="<?php bloginfo('url'); ?>/genki/"><img src="<?php bloginfo('template_directory'); ?>/genki/images/lnav_genki<?php if(is_page('genki')): ?>_o<?php endif; ?>.gif" alt="グレープフルーツは、春が旬です。" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/genki/florida/"><img src="<?php bloginfo('template_directory'); ?>/genki/images/lnav_florida<?php if(is_page('florida')): ?>_o<?php endif; ?>.gif" alt="フロリダって、どんなところ？" class="imgover" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/genki/trivia/"><img src="<?php bloginfo('template_directory'); ?>/genki/images/lnav_trivia<?php if(is_page('trivia')): ?>_o<?php endif; ?>.gif" alt="グレープフルーツトリビア" class="imgover" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/genki/beauty/"><img src="<?php bloginfo('template_directory'); ?>/genki/images/lnav_beauty<?php if(is_page('beauty')): ?>_o<?php endif; ?>.gif" alt="女性の「美」のために" class="imgover" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/genki/health/"><img src="<?php bloginfo('template_directory'); ?>/genki/images/lnav_health<?php if(is_page('health')): ?>_o<?php endif; ?>.gif" alt="みんなの「健康」のために" class="imgover" /></a></li>
</ul>
<ul class="bannerList">
<li><a href="<?php bloginfo('url'); ?>/tei_gi/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_gi.gif" alt="低GIコンテンツ" /></a></li>
<li class="lastBanner"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_recipe.gif" alt="グレープフルーツレシピ" /></a></li>
</ul>
<?php elseif(get_post_meta($post->ID,'スタイルシート',true) == 'tei_gi'): ?>
<h2><img src="<?php bloginfo('template_directory'); ?>/tei_gi/images/mh_gi.gif" alt="低GIについて" /></h2>
<ul class="bannerList">
<li class="lastBanner"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_recipe.gif" alt="グレープフルーツレシピ" /></a></li>
</ul>
<?php elseif(get_post_meta($post->ID,'スタイルシート',true) == 'recipe'): ?>
<?php if(is_page(array('column','column02','column03'))): ?>
<h2><img src="<?php bloginfo('template_directory'); ?>/common/images/mh_column.gif" alt="よめちゃんコラム" /></h2>
<ul class="lNav">
<!--<li><a href="<?php bloginfo('url'); ?>/column03/"><img src="<?php bloginfo('template_directory'); ?>/common/images/lnav_festival<?php if(is_page('column03')): ?>_o<?php endif; ?>.gif" alt="家族みんなで春を探しに行こう！" <?php if(!is_page('column03')): ?>class="imgover"<?php endif; ?>  /></a></li>-->
<li><a href="<?php bloginfo('url'); ?>/column02/"><img src="<?php bloginfo('template_directory'); ?>/common/images/lnav_grapefruit<?php if(is_page('column02')): ?>_o<?php endif; ?>.gif" alt="お肌にもいいグレープフルーツで自分の節句もきちんと" <?php if(!is_page('column02')): ?>class="imgover"<?php endif; ?> /></a></li>
<li><a href="<?php bloginfo('url'); ?>/column/"><img src="<?php bloginfo('template_directory'); ?>/common/images/lnav_taste<?php if(is_page('column')): ?>_o<?php endif; ?>.gif" alt="バレンタインはパパに感謝" <?php if(!is_page('column')): ?>class="imgover"<?php endif; ?> /></a></li>
</ul>

<ul class="bannerList">
<li class="lastBanner"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_recipe.gif" alt="グレープフルーツレシピ" /></a></li>
</ul>
<?php else: ?>
<h2><img src="<?php bloginfo('template_directory'); ?>/common/images/mh_recipe.gif" alt="グレープフルーツレシピ" /></h2>
<ul class="lNav">
<li><a href="<?php bloginfo('url'); ?>/recipe/#recipe01"><img src="<?php bloginfo('template_directory'); ?>/common/images/lnav_food.gif" alt="主食" class="imgover" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/recipe/#recipe02"><img src="<?php bloginfo('template_directory'); ?>/common/images/lnav_dish.gif" alt="おかず" class="imgover" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/recipe/#recipe03"><img src="<?php bloginfo('template_directory'); ?>/common/images/lnav_cake.gif" alt="お菓子・デザート" class="imgover" /></a></li>
</ul>

<ul class="bannerList">
<li><a href="<?php bloginfo('url'); ?>/tei_gi/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_gi.gif" alt="低GIコンテンツ" /></a></li>
</ul>
<?php endif; ?>
<?php elseif(get_post_meta($post->ID,'スタイルシート',true) == 'download'): ?>
<h2><img src="<?php bloginfo('template_directory'); ?>/download/images/mh_download.gif" alt="ダウンロード" /></h2>
<ul class="bannerList">
<li><a href="<?php bloginfo('url'); ?>/tei_gi/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_gi.gif" alt="低GIコンテンツ" /></a></li>
<li class="lastBanner"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_recipe.gif" alt="グレープフルーツレシピ" /></a></li>
</ul>
<?php elseif(get_post_meta($post->ID,'スタイルシート',true) == 'smileface'): ?>
<h2><img src="<?php bloginfo('template_directory'); ?>/smileface/images/mh_smileface.gif" alt="スマイルフェイス" /></h2>

<ul class="bannerList">
<li><a href="<?php bloginfo('url'); ?>/tei_gi/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_gi.gif" alt="低GIコンテンツ" /></a></li>
<li class="lastBanner"><a href="<?php bloginfo('url'); ?>/recipe/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_recipe.gif" alt="グレープフルーツレシピ" /></a></li>
</ul>

<div class="linkList">
<p>
<script type="text/javascript">
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 10,
  interval: 6000,
  width: 240,
  height: 300,
  theme: {
    shell: {
      background: '#316331',
	  color: '#ffffff'
    },
    tweets: {
	  background: '#fcf7fc',
      color: '#333333',
      links: '#0000ff'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('Snoboy_fdoc').start();
</script></p>
</div>
<?php endif; ?>
<?php if(!is_page('smileface')): ?>
<ul class="linkList">
<li><a href="<?php bloginfo('url'); ?>/smileface/smileface/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_facebook.gif" alt="Facebook" /></a></li>
<li><a href="<?php bloginfo('url'); ?>/twitter/"><img src="<?php bloginfo('template_directory'); ?>/common/images/bnr_twitter.gif" alt="Twitter" /></a></li>
</ul>
<?php endif; ?>
</div>