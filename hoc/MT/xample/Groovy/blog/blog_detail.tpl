<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/blog.css
title=<$MTEntryTitle$>｜グルービースタッフのまごころブログ
description=健康住宅&amp;注文住宅のグルービーホーム
keywords=健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅
</MTSetVars>

<$MTInclude module="ブログヘッダー"$>

<div id="pageBody">
<div id="content">
<div class="section">
<div class="sectionInner">
<div class="calendar">
<p class="month"><$MTEntryDate format="%Y/%m"$></p>
<p class="day"><strong><$MTEntryDate format="%d"$></strong><br />
<$MTEntryDate format="%a" language="en"$></p>
</div>
<div class="sectionBlock">
<h2><$MTEntryTitle$></h2>
<ul class="blockList">
<li>執筆スタッフ ：<strong><a href="<$MTEntryLink archive_type="Author"$>"><$MTAuthorDisplayName$></a></strong></li>
<li class="last">カテゴリー ：<MTEntryCategories><strong><a href="<$MTCategoryArchiveLink$>"><$MTCategoryLabel$></a></strong></MTEntryCategories></li>
</ul>
<p class="text"><$MTEntryBody nl2br="xhtml"$></p>

<MTEntryIfTagged>
<div class="tag">
<dl>
<dt>TAGS ：</dt>
<dd>
<ul class="tagList">
<li><mt:EntryTags glue=',</li>
<li>'><a href="javascript:void(0)" onclick="location.href='<$mt:TagSearchLink encode_js="1"$>';return false;" rel="tag"><$MTTagName$></a></MTEntryTags></li>
</ul>
</dd>
</dl>
<!-- / class tag --></div>
</MTEntryIfTagged>

<!-- / class sectionBlock --></div>
<!-- / class sectionInner --></div>
<!-- / class section --></div>
<!-- / id content --></div>

<$MTInclude module="ブログサイドバー"$>

<$MTInclude module="ブログフッター"$>