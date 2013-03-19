<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/news.css
title=<$MTEntryTitle$>｜新着トピックス｜健康住宅&amp;注文住宅のグルービーホーム
description=健康住宅&amp;注文住宅のグルービーホーム
keywords=健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅
page_id=news
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
<li><a href="<$MTVar name="site_url"$>news/index.html">新着トピックス</a></li>
<li><$MTEntryTitle$></li>
<!-- / class topicPath --></ul>

<div id="content">
<div class="section">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>news/images/mh_news.gif" alt="NEWS 新着トピックス" /></h2>
<div class="sectionInnerLast">
<h3 class="sHead"><img src="<$MTVar name="site_url"$>news/images/ico_news.gif" alt="" /><$MTEntryDate format="%m月%d日"$><strong><$MTEntryTitle$></strong></h3>
<div class="sectionInfo">
<p class="title"><MTIfNonEmpty tag="entrysubtitle"><$MTentrysubtitle$></MTIfNonEmpty></p>
<p class="entryBody"><$MTEntryBody nl2br="xhtml"$></p>
<!-- / class sectionInfo --></div>
<ul class="detailLink">
<MTIfNonEmpty tag="entryrelativelinkurl01">
<li>
<a href="<$MTentryrelativelinkurl01$>"<MTIf tag="targetblank01" eq="blank"> target="_blank"<MTElseIf tag="targetblank"eq="self"></MTIf>>
<MTIf tag="entryrelativelinkname01">
<$MTentryrelativelinkname01$>
<MTElse>
<$MTentryrelativelinkurl01$>
</MTIf>
</a></li>
</MTIfNonEmpty>

<MTIfNonEmpty tag="entryrelativelinkurl02">
<li><a href="<$MTentryrelativelinkurl02$>"<MTIf tag="targetblank02" eq="blank"> target="_blank"<MTElseIf tag="targetblank"eq="self"></MTIf>>
<MTIf tag="entryrelativelinkname02">
<$MTentryrelativelinkname02$>
<MTElse>
<$MTentryrelativelinkurl02$>
</MTIf>
</a></li>
</MTIfNonEmpty>

<MTIfNonEmpty tag="entryrelativelinkurl03">
<li><a href="<$MTentryrelativelinkurl03$>"<MTIf tag="targetblank03" eq="blank"> target="_blank"<MTElseIf tag="targetblank"eq="self"></MTIf>>
<MTIf tag="entryrelativelinkname03">
<$MTentryrelativelinkname03$>
<MTElse>
<$MTentryrelativelinkurl03$>
</MTIf>
</a></li>
</MTIfNonEmpty>

</ul>
<ul class="link">
<MTEntryPrevious><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_previous.gif" alt="前の記事へ" class="imgover" /></a></li></MTEntryPrevious>
<li><a href="<$MTVar name="site_url"$>news/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_return.gif" alt="一覧に戻る" class="imgover" /></a></li>
<MTEntryNext><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_follow.gif" alt="次の記事へ" class="imgover" /></a></li></MTEntryNext>
</ul>
<!-- / class infoSection --></div>
<!-- / class section --></div>
<!-- / id content --></div>

<$MTInclude module="sidebar"$>

<$MTInclude module="footer"$>
