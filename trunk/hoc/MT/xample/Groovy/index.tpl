<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTWebsiteURL$>css/top.css
title=健康住宅&amp;注文住宅のグルービーホーム
description=健康住宅&amp;注文住宅のグルービーホーム
keywords=健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅
sidebar=top
</MTSetVars>

<MTSetVarBlock name="script">
<script type="text/javascript" src="<$MTVar name="site_url"$>common/js/swfobject.js"></script>

<!--以下、flash表示用java script-->
<script type="text/javascript">
var flashvars = {};
var params = {};
var attributes = {};
params.allowScriptAccess = "sameDomain";
params.quality = "best";
params.menu = "false";
params.allowFullScreen = "true";
params.bgcolor = "#FFFFFF";
swfobject.embedSWF("fla/main.swf", "flash", "100%", "486", "9.0.0", "", flashvars, params, attributes);
</script>
<!--以上、flash表示用java script-->
</MTSetVarBlock>

<MTSetVarBlock name="flash">
<div id="flash">
</div>
</MTSetVarBlock>

<$MTInclude module="header"$>

<div id="pageBody">
<div class="gallerySection">
<h2><img src="<$MTVar name="site_url"$>images/mh_gallerry.gif" alt="GALLERY
新着施工例ギャラリー" /><span><a href="<$MTVar name="site_url"$>gallery/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></span></h2>
<MTBlogs include_blogs="4">
<MTEntries lastn="4">
<MTEntriesHeader>
<ul>
</MTEntriesHeader>
<li>
<p><a href="<$MTEntryPermalink$>">
<MTgalleryphoto01Asset>
<img src="<$MtAssetThumbnailURL width="198" height="128"$>" width="198" height="128"alt="<$MTEntryTitle$>" /></MTgalleryphoto01Asset></a></p>
<dl>
<dt><a href="<$MTEntryPermalink$>"><$MTEntryTitle$></a><MTIfNonZero tag="iconnew"><span class="new"><img src="<$MTVar name="site_url"$>common/images/img_new01.gif" alt="NEW!" /></span></MTIfNonZero><br />
<MTIfNonEmpty tag="galleryaddress"><span><$MTgalleryaddress$></span></MTIfNonEmpty></dt>
<MTIfNonEmpty tag="gallerycopy"><dd><$MTgallerycopy$></dd></MTIfNonEmpty>
</dl>
</li>
<MTEntriesFooter>
</ul>
</MTEntriesFooter>
</MTEntries>
</MTBlogs>
<!-- / class gallery --></div>

<div id="content">
<div class="section">
<h2><img src="<$MTVar name="site_url"$>images/mh_pickup.gif" alt="PICK UP
ピックアップコンテンツ" /></h2>
<ul class="pickup">
<li>
<p><img src="<$MTVar name="site_url"$>images/img_house.jpg" alt="PURE MIND" /></p>
<dl>
<dt><img src="<$MTVar name="site_url"$>images/ttl_house.gif" alt="家づくりにかける私たちの想い" /></dt>
<dd>
<p>私たちのコンセプトは「PURE MIND」。家に住まう人のことを一番に考え、デザイン・素材・構造・価格など、100％納得のいく家づくりにこだわります。心も体も健やかな真に健康な住まいをお届け致します。</p>
<p class="list"><a href="<$MTVar name="site_url"$>quality/index.html"><img src="common/images/btn_detail.gif" alt="詳しく見る" class="imgover" /></a></p>
</dd>
</dl>
</li>

<li>
<p><img src="<$MTVar name="site_url"$>images/img_safety.jpg" alt="GUARANTEE" /></p>
<dl>
<dt><img src="<$MTVar name="site_url"$>images/ttl_safety.gif" alt="家が完成しても、ずーっと、安心。" /></dt>
<dd>
<p>丈夫で長持ちする家を安心して建てて頂くために、保証制度や定期点検、アフターメンテナンスサービスにも力を入れています。家の完成は、お客様との本当のお付き合いのはじまりです。</p>
<p class="list"><a href="<$MTVar name="site_url"$>guarantee/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_detail.gif" alt="詳しく見る" class="imgover" /></a></p>
</dd>
</dl>
</li>

<li class="listLast">
<p><img src="<$MTVar name="site_url"$>images/img_reason.jpg" alt="VOICE" /></p>
<dl>
<dt><img src="<$MTVar name="site_url"$>images/ttl_reason.gif" alt="グルービーホームが愛される理由" /></dt>
<dd>
<p>お施主様がグルービーホームを選んで下さった理由って何でしょう？デザイン性？価格？技術力？etc.　家づくりを通じて、そして実際に暮らしてみてお施主様が感じた生の声をご覧ください。</p>
<p class="list"><a href="<$MTVar name="site_url"$>voice/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_detail.gif" alt="詳しく見る" class="imgover" /></a></p>
</dd>
</dl>
</li>
</ul>

<ul class="bannerList">
<li>
<p><a href="https://groovy-home.jp/inquiry/"><img src="<$MTVar name="site_url"$>images/bnr_inquiry.gif" alt="資料請求お問い合わせ" class="imgover" /></a></p>
<p class="bannerText"><a href="https://groovy-home.jp/inquiry/">資料請求・お問い合わせはこちら</a></p>
</li>

<li class="banner">
<p><a href="<$MTVar name="site_url"$>exhibition/index.html"><img src="<$MTVar name="site_url"$>images/bnr_exhibition.jpg" alt="展示場のご案内" /></a></p>
<p class="bannerText"><a href="<$MTVar name="site_url"$>exhibition/index.html">グルービーホームの展示場案内はこちら</a></p>
</li>
</ul>

<p><a href="http://www.mlit.go.jp/jutakukentiku/house/jutakukentiku_house_tk4_000017.html" target="_blank"><img src="<$MTVar name="site_url"$>images/bnr_system.gif" alt="真・健康住宅のグルービーホームは、長期優良住宅・エコポイント制度 に対応しています。詳しくは、国土交通省HPをご覧ください" class="imgover" /></a></p>
<!-- / class section --></div>
<!-- / id content --></div>

<$MTInclude module="sidebar"$>

<$MTInclude module="footer"$>
