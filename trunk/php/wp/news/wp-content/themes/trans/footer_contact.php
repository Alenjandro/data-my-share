<?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/'; ?>

<div id="footer" class="clearfix">
<ul id="fNavi">
<li id="fNaviPrivacy"><a href="http://www.koutsu-navi.com/privacy_policy/index.html" target="_parent"><img src="http://www.koutsu-navi.com/common/images/fnavi_privacypolicy.gif" alt="個人情報保護方針" /></a></li>
<li id="fNaviCompany"><a href="http://www.koutsu-navi.com/corp_profile/index.html" target="_parent"><img src="http://www.koutsu-navi.com/common/images/fnavi_company.gif" alt="会社概要" /></a></li>
<li id="fNaviContact"><a href="https://e4010.secure.jp/~e4010003/contact/" target="_parent"><img src="http://www.koutsu-navi.com/common/images/fnavi_contact.gif" alt="お問い合わせ" /></a></li>
<li id="fNaviTop"><a href="http://www.koutsu-navi.com/">交通広告トップ</a></li>
<li id="fNaviMediaGuide"><img src="http://www.koutsu-navi.com/common/images/fnavi_mediaguide.gif" alt="メディアガイド" />
<ul>
<li class="stationLink"><a href="http://www.koutsu-navi.com/station/index.html" target="_parent">駅広告・駅看板</a></li>
<li class="trainLink"><a href="http://www.koutsu-navi.com/train/index.html" target="_parent">電車広告</a></li>
<li class="outdoorLink"><a href="http://www.koutsu-navi.com/outdoor/index.html" target="_parent">屋外広告</a></li>
<li class="bustaxiLink"><a href="http://www.koutsu-navi.com/bus_taxi/index.html" target="_parent">バス広告・タクシー広告</a></li>
</ul>
</li>
</ul>
<address>
<img src="http://www.koutsu-navi.com/common/images/copyright.gif" alt="All Copyrights Reserved. NEW-AD Inc." />
</address>

<ul class="bannerList clearfix">
<?php 
$pages = get_pages('sort_column=post_date'); 
foreach ($pages as $pagg) {
$content = $pagg->post_content;  
?>
<li><?php echo $content ; ?> </li>
<?php } ?>
</ul>
<!-- / id footer -->
</div>

