<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/gallery.css
title=施工例ギャラリー｜健康住宅&amp;注文住宅のグルービーホーム
description=健康住宅&amp;注文住宅のグルービーホーム
keywords=健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅
</MTSetVars>

<MTSetVarBlock name="headSection">
<div id="headSection">
<div id="headerInner">
<p id="logo"><a href="<$MTVar name="site_url"$>index.html"><img src="<$MTVar name="site_url"$>common/images/logo.gif" alt="For your satisfaction
GROOVY HOME" /></a></p>
<p><img src="<$MTVar name="site_url"$>common/images/txt_contact.gif" alt="0120-968-373" /></p>
<!-- / id headerInner --></div>
<!-- / id headerInner --></div>
</MTSetVarBlock>

<$MTInclude module="header"$>

<div id="pageBody">
<ul class="topicPath">
<li><a href="<$MTVar name="site_url"$>index.html">トップページ</a></li>
<li>施工例ギャラリー</li>
<!-- / class topicPath --></ul>

<div id="content">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>gallery/images/mh_gallery.gif" alt="GALLERY 施工例ギャラリー" /></h2>
<p><img src="images/ttl_gallery.gif" alt="あなたが思い描く理想の「我が家」はどんなイメージですか？
気持ちよく歳月を重ねるグルービーホームの建築事例をご覧ください。" /></p>
<p class="leadText">お客様の個性やライフスタイルに合わせて一邸一邸大切につくるのがグルービー流の家づくり。<br />
ご家族が長い時間を過ごす場所だからこそ、住まう程に心地良く、愛着が湧く家となりますよう、<br />
そんな想いを込めて家づくりをしております。<br />
グルービーホームが手掛けた建築事例の一部をどうぞじっくりご覧ください。</p>

<div class="gallery">
<ul>
<MTPageContents count="12">
<MTEntries>
<li>
<p><a href="<$MTEntryPermalink$>">
<MTgalleryphoto01Asset>

<!--<MTSetVarBlock name="photo_width"><$MTAssetProperty property="image_width"$></MTSetVarBlock>
<MTSetVarBlock name="photo_height"><$MTAssetProperty property="image_height"$></MTSetVarBlock>
<MTIf name="photo_width" gt="$photo_height"$>
<MTSetVar name="photo_height" op="/" value="$photo_width">
<MTSetVar name="photo_height" op="*" value="198">
<img src="<$MtAssetThumbnailURL width="198"$>" width="198" height="<$MTVar name="photo_height" op="+" value="0.5" sprintf="%d"$>"alt="<$MTEntryTitle$>" />
<MTElse>
<MTSetVar name="photo_width" op="/" value="$photo_height">
<MTSetVar name="photo_width" op="*" value="128">
<img src="<$MTAssetThumbnailURL height="128"$>" width="<$MTVar name="photo_width" op="+" value="0.5" sprintf="%d"$>" height="128" alt="" />
</MTIf>-->

<img src="<$MtAssetThumbnailURL width="198" height="128"$>" width="198" height="128"alt="<$MTEntryTitle$>" /></MTgalleryphoto01Asset></a></p>
<dl>
<dt><a href="<$MTEntryPermalink$>"><$MTEntryTitle$></a>

<!--<$MTSetvar name="counter" op="+" value="1"$>
<MTIf name="counter" le="3">
<MTElse>
</MTIf>-->

<MTIfNonZero tag="iconnew"><span class="new"><img src="<$MTVar name="site_url"$>common/images/img_new01.gif" alt="NEW!" /></span></MTIfNonZero>
<br />
<MTIfNonEmpty tag="galleryaddress"><span><$MTgalleryaddress$></span></MTIfNonEmpty></dt>
<MTIfNonEmpty tag="gallerycopy"><dd><$MTgallerycopy$></dd></MTIfNonEmpty>
</dl>
</li>
<$MTPageSeparator$>
</MTEntries>
</MTPageContents>
</ul>
<!-- / class gallery --></div>

<div class="pageLink">
<ul>
<MTIfPageBefore>
<$MTPageBefore delim="<img src="http://groovy-home.jp/common/images/ico_prev.gif" alt="" class="imgover" />"$>
</MTIfPageBefore>

<$MTPageLists link_start="<li>" link_close="</li>" show_always="0"$>

<MTIfPageNext>
<$MTPageNext delim="<img src="http://groovy-home.jp/common/images/ico_next.gif" alt="" class="imgover" />"$>
</MTIfPageNext>
</ul>
</div>
<!-- / id content --></div>

<$MTInclude module="sidebar"$>

<$MTInclude module="footer"$>