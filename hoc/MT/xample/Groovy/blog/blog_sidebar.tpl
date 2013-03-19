<div id="sidebar">
<form action="<$MTCGIPath$><$MTSearchScript$>" method="get" id="formSearch" name="formSearch">
<input type="text" id="search" name="search" size="20" class="ti sizeB" value="" />
<MTIf name="search_results">
<input type="hidden" name="IncludeBlogs" value="<$MTSearchIncludeBlogs$>" />
<MTIgnore>
<!-- use these options only with MT:App::Search::Legacy -->
<ul class="search-options">
<li><input type="checkbox" name="CaseSearch" />大文字/小文字を区別する</li>
<li><input type="checkbox" name="RegexSearch" />正規表現</li>
</ul>
</MTIgnore>
<MTElse>
<input type="hidden" name="IncludeBlogs" value="<$MTBlogID$>" />
</MTIf>
<input type="hidden" name="limit" value="<$MTSearchMaxResults$>" />
<input type="image" src="<$MTBlogURL$>images/btn_retrieval.gif" id="retrieval" name="retrieval" alt="検索" />
</form>

<div class="dateSidebar">
<$MTInclude module="Ajaxカレンダー"$>
<!-- / id dateSidebar --></div>

<div class="section">
<h3><img src="<$MTBlogURL$>images/sh_staff.gif" alt="STAFF LIST" /></h3>
<MTArchiveList archive_type="Author">
<MTArchiveListHeader>
<ul>
</MTArchiveListHeader>
<li><a href="<$MTArchiveLink$>"><$MTArchiveTitle$></a></li>
<MTArchiveListFooter>
</ul>
</MTArchiveListFooter>
</MTArchiveList>
<!-- / class section --></div>

<div class="section">
<h3><img src="<$MTBlogURL$>images/sh_category.gif" alt="CATEGORY" /></h3>
<ul>
<MTTopLevelCategories>
<MTIfNonZero tag="categorycount">
<li><a href="<$MTCategoryArchiveLink$>"><$MTCategoryLabel$>（ <$MTCategoryCount$> ）</a></li>
</MTIfNonZero>
</MTTopLevelCategories>
</ul>
<!-- / class section --></div>

<$MTInclude file="recent_entries.html"$>

<div class="section">
<h3><img src="<$MTBlogURL$>images/sh_archive.gif" alt="ARCHIVES" /></h3>
<MTArchiveList type="Monthly" sort_order="descend">
<MTArchiveListHeader>
<ul class="day">
</MTArchiveListHeader>
<li><a href="<$MTArchiveLink type="Monthly"$>"><$MTArchiveDate format="%Y年%m月"$></a></li>
<MTArchiveListFooter>
</ul>
</MTArchiveListFooter>
</MTArchiveList>
<!-- / class section --></div>

<div class="section">
<h3><img src="<$MTBlogURL$>images/sh_feed.gif" alt="FEED" /></h3>
<ul>
<li><a href="<$MTBlogURL$>atom.xml">このブログを購読</a></li>
</ul>
<!-- / class section --></div>
<!-- / id sidebar --></div>