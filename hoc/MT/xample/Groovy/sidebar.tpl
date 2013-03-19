<div id="sidebar">
<MTUnless name="sidebar" eq="top">
<ul class="bannerList">
<li>
<p><a href="https://groovy-home.jp/inquiry/"><img src="<$MTVar name="site_url"$>common/images/bnr_inquiry.gif" alt="資料請求お問い合わせ" class="imgover" /></a></p>
<p class="bannerText"><a href="https://groovy-home.jp/inquiry/">資料請求・お問い合わせはこちら</a></p></li>
<li class="banner">
<p><a href="<$MTVar name="site_url"$>exhibition/index.html"><img src="<$MTVar name="site_url"$>common/images/bnr_exhibition.jpg" alt="展示場のご案内" /></a></p>
<p class="bannerText"><a href="<$MTVar name="site_url"$>exhibition/index.html">グルービーホームの展示場案内はこちら</a></p></li>
<li class="banner last">
<p><a href="<$MTVar name="site_url"$>blog/index.html" target="_blank"><img src="<$MTVar name="site_url"$>common/images/bnr_blog.jpg" alt="グルービースタッフのまごころブログ" /></a></p>
<p class="bannerText"><a href="<$MTVar name="site_url"$>blog/index.html" target="_blank">グルービーホームスタッフのまごころブログ</a></p></li>
</ul>
</MTUnless>

<MTIf name="page_id" eq="event">
<MTElse>
<div class="section">
<h2><img src="<$MTVar name="site_url"$>common/images/mh_event.gif" alt="EVENT 見学会・イベント" />
<MTIf name="sidebar" eq="top">
<span><a href="<$MTVar name="site_url"$>event/index.html"><img src="common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></span>
</MTIf></h2>

<ul class="eventList">
<MTBlogs include_blogs="3">
<MTEntries lastn="5">
<li>
<p><a href="<$MTEntryPermalink$>"><MTentryphotoAsset><img src="<$MtAssetThumbnailURL width="40" height="40"$>" alt="<$MTEntryTitle$>" /></MTentryphotoAsset></a></p>
<dl>
<dt><$MTEntryDate format="%m月%d日"$><MTEntriesHeader><span><img src="<$MTVar name="site_url"$>common/images/img_new02.gif" alt="NEW" /></span></MTEntriesHeader></dt>
<dd><a href="<$MTEntryPermalink$>"><$MTentrygaiyou$></a></dd>
</dl>
</li>
</MTEntries>
</MTBlogs>
</ul>
<MTUnless name="sidebar" eq="top">
<p class="list"><a href="<$MTVar name="site_url"$>event/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></p></MTUnless>
<!-- / class section --></div>
</MTIf>

<MTIf name="page_id" eq="news">
<MTElse>
<div class="section">
<h2><img src="<$MTVar name="site_url"$>common/images/mh_news.gif" alt="NEWS 新着トピックス" />
<MTIf name="sidebar" eq="top">
<span><a href="<$MTVar name="site_url"$>news/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></span>
</MTIf></h2>

<dl class="news">
<MTBlogs include_blogs="2">
<MTEntries lastn="3">
<dt><$MTEntryDate format="%m月%d日"$><MTEntriesHeader><span><img src="<$MTVar name="site_url"$>common/images/img_new02.gif" alt="NEW" /></span></MTEntriesHeader></dt>
<dd><a href="<$MTEntryPermalink$>"><$MTEntryTitle$></a></dd>
</MTEntries>
</MTBlogs>
</dl>
<MTUnless name="sidebar" eq="top">
<p class="list"><a href="<$MTVar name="site_url"$>news/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></p></MTUnless>
<!-- / class section --></div>
</MTIf>

<MTIf name="sidebar" eq="top">
<ul class="bannerList">
<li class="banner">
<p><a href="<$MTWebsiteURL$>blog/index.html" target="_blank"><img src="<$MTWebsiteURL$>images/bnr_blog.jpg" alt="グルービースタッフのまごころブログ" /></a></p>
<p class="bannerText"><a href="<$MTWebsiteURL$>blog/index.html" target="_blank">グルービーホームスタッフのまごころブログ</a></p></li>
</ul>
</MTIf>

<!-- / id sidebar --></div>

