<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/news.css
title=新着トピックス｜健康住宅&amp;注文住宅のグルービーホーム
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
<li><a href="../index.html">トップページ</a></li>
<li>新着トピックス</li>
<!-- / class topicPath --></ul>

<div id="content">
<div class="section">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>news/images/mh_news.gif" alt="NEWS 新着トピックス" /></h2>
<MTPageContents count="5">
<MTEntries>
<div class="sectionInner<MTEntriesFooter>Last</MTEntriesFooter>">
<h3 class="sHead"><img src="<$MTVar name="site_url"$>news/images/ico_news.gif" alt="" /><$MTEntryDate format="%m月%d日"$><strong><$MTEntryTitle$></strong></h3>
<div class="sectionInfo">
<p><$MTEntryExcerpt$></p>
<p class="linkMore"><a href="<$MTEntryPermalink$>"><img src="<$MTVar name="site_url"$>common/images/btn_more.gif" alt="" class="imgover" /></a></p>
<!-- / class sectionInfo --></div>
<!-- / class sectionInner --></div>
<$MTPageSeparator$>
</MTEntries>
</MTPageContents>
<!-- / class section --></div>

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