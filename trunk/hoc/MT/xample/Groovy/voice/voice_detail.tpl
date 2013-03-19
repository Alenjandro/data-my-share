<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/voice.css
title=<$MTEntryTitle$>｜お客様の声｜健康住宅&amp;注文住宅のグルービーホーム
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
<li><a href="<$MTVar name="site_url"$>voice/index.html">お客様の声</a></li>
<li><$MTEntryTitle$></li>
<!-- / class topicPath --></ul>

<MTSetVarBlock name="cName"><$MTCategoryLabel$></MTSetVarBlock>
<div id="content">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>voice/images/mh_voice.gif" alt="VOICE お客様の声" /></h2>
<p class="visual">
<MTEntries blog_ids="4">
<MTIfCategory name="$cName">
<a href="<$MTEntryPermalink$>">
</MTIfCategory>
</MTEntries>
<img src="<MTvoiceusual02Asset><$MtAssetThumbnailURL width="673" height="500"$></MTvoiceusual02Asset>" alt="<$MTmainviusualalt$>" /></a></</p>

<div class="voiceDetail clearBoth">
<p class="title"<MTIfNonEmpty tag="titlecolor"> style="color:<$MTtitlecolor$>;"</MTIfNonEmpty>><strong><$MTEntryTitle$></strong>
<MTIfNonEmpty tag="entrysubtitle"><$MTentrysubtitle$></MTIfNonEmpty></p>
<p class="entryBody"><$MTEntryBody nl2br="xhtml"$></p>
</div>
<ul class="linkVoice">
<MTIfNonEmpty tag="entryrelativelinkurl01">
<li>
<a href="<$MTentryrelativelinkurl01$>" target="_blank">
<MTIf tag="entryrelativelinkname01">
<$MTentryrelativelinkname01$>
<MTElse>
<$MTentryrelativelinkurl01$>
</MTIf>
</a></li>
</MTIfNonEmpty>

<MTIfNonEmpty tag="entryrelativelinkurl02">
<li><a href="<$MTentryrelativelinkurl02$>" target="_blank">
<MTIf tag="entryrelativelinkname02">
<$MTentryrelativelinkname02$>
<MTElse>
<$MTentryrelativelinkurl02$>
</MTIf>
</a></li>
</MTIfNonEmpty>

<MTIfNonEmpty tag="entryrelativelinkurl03">
<li><a href="<$MTentryrelativelinkurl03$>" target="_blank">
<MTIf tag="entryrelativelinkname03">
<$MTentryrelativelinkname03$>
<MTElse>
<$MTentryrelativelinkurl03$>
</MTIf>
</a></li>
</MTIfNonEmpty>
</ul>

<MTEntries blog_ids="4">
<MTIfCategory name="$cName">
<div class="contruction clearBoth">
<dl>
<dt><img src="<$MTVar name="site_url"$>voice/images/ttl_construction.gif" alt="このお施主様の施工例ギャラリーを見る" /></dt>
<dd>
<p class="constructionImage"><MTgalleryphoto01Asset><img src="<$MtAssetThumbnailURL width="162" height="92"$>" width="162" height="92"alt="<$MTEntryTitle$>" /></MTgalleryphoto01Asset></p>
<ul class="linkVoice">
<li><a href="<$MTEntryPermalink$>"><$MTEntryTitle$></a><span><$MTgalleryaddress$></span></li>
</ul>
</dd>
</dl>
</div>
</MTIfCategory>
</MTEntries>

<ul class="link clearBoth">
<MTEntryPrevious><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_previous.gif" alt="前の記事へ" class="imgover" /></a></li></MTEntryPrevious>
<li><a href="<$MTVar name="site_url"$>voice/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_return.gif" alt="一覧に戻る" class="imgover" /></a></li>
<MTEntryNext><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_follow.gif" alt="次の記事へ" class="imgover" /></a></li></MTEntryNext>
</ul>
<!-- / id content --></div>

<$MTInclude module="sidebar"$>

<$MTInclude module="footer"$>