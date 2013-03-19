<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/voice.css
title=お客様の声｜健康住宅&amp;注文住宅のグルービーホーム
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
<li>お客様の声</li>
<!-- / class topicPath --></ul>

<div id="content">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>voice/images/mh_voice.gif" alt="VOICE お客様の声" /></h2>
<MTEntries lastn="1">
<p class="visual"><a href="<$MTEntryPermalink$>"><MTvoiceviusual01Asset>
<img src="<$MtAssetThumbnailURL width="673" height="500"$>" alt="<$MTmainviusualalt$>" /></MTvoiceviusual01Asset></a></p>
</MTEntries>
<ul class="voiceContent">

<MTPageContents count="6">
<MTEntries offset="1">
<li>
<p><a href="<$MTEntryPermalink$>">
<MTvoicethumbnailAsset>
<img src="<$MtAssetThumbnailURL width="198" height="126"$>" alt="<$MTCategoryLabel$>" />
</MTvoicethumbnailAsset></a></p>
<p class="voiceText"><img src="<$MTVar name="site_url"$>voice/images/ico_<$MTCategoryBasename$>.gif" alt="<$MTCategoryLabel$>" /><strong><a href="<$MTEntryPermalink$>"><$MTEntryTitle$></a></strong>
<MTIfNonEmpty tag="voiceaddress"><$MTvoiceaddress$></MTIfNonEmpty>
<MTIfNonEmpty tag="voiceownername"><span><$MTvoiceownername$></span></MTIfNonEmpty></p>
</li>
<$MTPageSeparator$>
</MTEntries>
</MTPageContents>
</ul>

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