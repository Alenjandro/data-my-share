<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<$MTPublishCharset$>" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title><MTIfStraightSearch>「<$MTSearchString$>」の検索結果</MTIfStraightSearch><MTIfTagSearch>タグ「<$MTSearchString$>」の検索結果</MTIfTagSearch>｜グルービースタッフのまごころブログ</title>
<meta name="description" content="<$MTVar name="description"$>" />
<meta name="keywords" content="<$MTVar name="keywords"$>" />
<link href="http://groovy-home.jp/common/css/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="<$MTBlogURL$>css/blog.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="http://groovy-home.jp/common/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="alternate" type="application/atom+xml" title="Recent Entries" href="<$MTLink template="feed_recent"$>" />
<script type="text/javascript" src="http://groovy-home.jp/common/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="http://groovy-home.jp/>common/js/script.js"></script>
<script type="text/javascript" src="<$MTBlogURL$>prototype.js"></script>
<script type="text/javascript" src="<$MTBlogURL$>ajaxCalendar.js"></script>
<script type="text/javascript" src="<$MTBlogURL$>dayChecker.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
var user = <$MTUserSessionState$>;
/* ]]> */
</script>
<script type="text/javascript" src="<$MTLink template="javascript"$>"></script>
<script type="text/javascript">
/* <![CDATA[ */
<MTIfMoreResults>
function getResults(page) {
page = parseInt(page);
if (timer) window.clearTimeout(timer);
var xh = mtGetXmlHttp();
if (!xh) return false;
var res = results[page];
if (!res) return;
var url = res['next_url'];
if (!url) return;

xh.open('GET', url + '&format=js', true);
xh.onreadystatechange = function() {
if ( xh.readyState == 4 ) {
if ( xh.status && ( xh.status != 200 ) ) {
// error - ignore
} else {
try {
var page_results = eval("(" + xh.responseText + ")");
if ( page_results['error'] == null )
results[page + 1] = page_results['result'];
} catch (e) {
}
}
}
};
xh.send(null);
}

function swapContent(direction) {
if ( direction == undefined ) direction = 1;
var page_span = document.getElementById('current-page');
if (!page_span) return true;
var next_page = direction + parseInt(page_span.innerHTML);
var res = results[next_page];
if (!res) return true;
var content = res['content'];
if (!content) return true;
var div = document.getElementById('search-results');
if (!div) return true;
div.innerHTML = content;
timer = window.setTimeout("getResults(" + next_page + ")", 1*1000);
window.scroll(0, 0);
return false;
}
<MTElse><MTIfPreviousResults>
function swapContent(direction) {
return true;
}</MTIfPreviousResults>
</MTIfMoreResults>
/* ]]> */
</script>
</head>
<body>
<div id="layout">
<div id="header">
<div id="hSection">
<h1>グルービーホームは、デザイン性の高い注文住宅&amp;健康住宅を愛知県・三河を中心（岡崎・豊橋）に展開しています。</h1>
<p class="home"><a href="<$MTVar name="site_url"$>"><img src="<$MTBlogURL$>images/btn_home.gif" alt="グルービーホームオフィシャルサイトへ" class="imgover" /></a></p>
</div>

<div id="headSection">
<div id="headerInner">
<p id="logo"><a href="<$MTBlogURL$>"><img src="<$MTBlogURL$>images/logo.jpg" alt="グルービースタッフの真心 blog" /></a></p>
<p><img src="<$MTBlogURL$>images/txt_contact.gif" alt="For your satisfaction
GROOVY HOME
0120-968-373" /></p>
</div>
</div>
<!-- / id header --></div>

<div id="pageBody">
<div id="content">
<div class="section">
<MTSetVarTemplate id="search_results" name="search_results">  
<MTSearchResults>
<MTSearchResultsHeader>
<div id="search-results">
<!--<span id="current-page" class="hidden"><$MTCurrentPage$></span>-->
<div class="searchResultsStyle">
<p class="searchText">
<MTIfStraightSearch>
検索キーワード「<strong><$MTSearchString$></strong>」と一致するもの
</MTIfStraightSearch>

<MTIfTagSearch>
タグ「<strong><$MTSearchString$></strong>」が付けられているもの
</MTIfTagSearch>
</p>
<!-- / class searchResultsStyle --></div>

<div class="search-results-container autopagerize_page_element">
</MTSearchResultsHeader>
<$MTInclude module="ブログ記事の概要" hide_counts="1"$>
<MTSearchResultsFooter>
</div>
</div>
</MTSearchResultsFooter>
</MTSearchResults>
</MTSetVarTemplate>

<$MTVar name="search_results"$>


<MTNoSearchResults>
<div class="searchResultsStyle">
<!--<p class="searchText">
<MTIfStraightSearch>
「<strong><$MTSearchString$></strong>」と一致するもの
</MTIfStraightSearch>
<MTIfTagSearch>
タグ「<strong><$MTSearchString$></strong>」が付けられているもの
</MTIfTagSearch>
</p>-->
<p class="searchText">「<strong><$MTSearchString$></strong>」と一致する結果は見つかりませんでした。</p>
<!-- / class searchResultsStyle --></div>
</MTNoSearchResults>



<MTNoSearch>
<div class="searchResultsStyle">
<p>検索機能が正常に動作しませんでした。以下を参照して再検索を行ってください。<p>
<ul>
<li>
<p>すべての単語が順序に関係なく検索されます。フレーズで検索したいときは引用符で囲んでください。</p>
<blockquote>
<p><code>"movable type"</code></p>
</blockquote>
</li>
<li>
<p>AND、OR、NOTを入れることで論理検索を行うこともできます。</p>
<blockquote>
<p><code>個人 OR 出版</code></p>
<p><code>個人 NOT 出版</code></p>
</blockquote>
</li>
</ul>
<!-- / class searchResultsStyle --></div>
</MTNoSearch>


<MTIfMoreResults>
<script type="text/javascript">
<!--
var div = document.getElementById('search-results');
var results = {
'<$MTCurrentPage$>': {
'content': div.innerHTML,
'next_url': '<$MTNextLink$>'
}
};
var timer = window.setTimeout("getResults(" + <$MTCurrentPage$> + ")", 1*1000);
//-->
</script>
</MTIfMoreResults>
<!-- / class section --></div>
<!-- / id content --></div>

<$MTInclude module="ブログサイドバー"$>

<$MTInclude module="ブログフッター"$>