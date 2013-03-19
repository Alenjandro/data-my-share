<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/event.css
title=<$MTEntryTitle$>｜見学会・イベント｜健康住宅&amp;注文住宅のグルービーホーム
description=健康住宅&amp;注文住宅のグルービーホーム
keywords=健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅
page_id=event
</MTSetVars>

<MTSetVarBlock name="maplink">
<script type="text/javascript">
function mapLink(address){
encAddress = encodeURI(address);
url = "http://maps.google.co.jp/maps?f=q&source=s_q&hl=ja&geocode=&q="+encAddress+"&sll=1.289436,103.84998&sspn=0.870438,1.256561&brcurrent=3,0x60188b6254cc464f:0x99773132a4b583e6,0&ie=UTF8&hq=&hnear="+encAddress+"&z=15";
window.open(url);
}
</script>
</MTSetVarBlock>

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
<li><a href="<$MTVar name="site_url"$>event/index.html">見学会・イベント</a></li>
<li><$MTEntryTitle$></li>
</ul>

<div id="content">
<div class="section">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>event/images/mh_event.gif" alt="EVENT 見学会・イベント" /></h2>

<div class="sectionInnerLast">
<p class="photo"><MTentryphotoAsset><img src="<$MtAssetThumbnailURL width="144" height="144"$>" alt="<$MTEntryTitle$>" /></MTentryphotoAsset></p>
<div class="sectionRight">
<h3 class="sHead"><img src="<$MTVar name="site_url"$>common/images/ico_event.gif" alt="" /><$MTEntryDate format="%m月%d日"$><strong><$MTEntryTitle$></strong></h3>
<dl>
<dt>開催日時</dt>
<dd><MTIf tag="MTentryholddate"><$MTentryholddate$><MTElse>&nbsp;</MTIf></dd>
<dt>開催場所</dt>
<dd><MTIf tag="MTentryholdplace"><$MTentryholdplace$><MTElse>&nbsp;</MTIf></dd>
<dt>アクセス</dt>
<dd class="listLast">
<p><MTIf tag="MTentryholdaccess"><$MTentryholdaccess$></p>
<p class="map"><a href="javascript:;" onclick="mapLink('<$MTentryholdaccess$>')"><img src="<$MTVar name="site_url"$>common/images/btn_map.gif" alt="地図はこちら" class="imgover" /></a></p>
<MTElse>&nbsp;</MTIf></dd>
</dl>
</div>
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

<p class="inquiry"><a href="https://groovy-home.jp/inquiry/"><img src="<$MTVar name="site_url"$>event/images/btn_inquiry.gif" alt="イベントに関するお問い合わせ" class="imgover" /></a></p>

<ul class="link">
<MTEntryPrevious><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_previous.gif" alt="前の事例へ" class="imgover" /></a></li></MTEntryPrevious>
<li><a href="<$MTVar name="site_url"$>event/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_return.gif" alt="一覧に戻る" class="imgover" /></a></li>
<MTEntryNext><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_follow.gif" alt="次の事例へ" class="imgover" /></a></li></MTEntryNext>
</ul>
<!-- / class section --></div>
<!-- / class sectionInner --></div>
<!-- / id content --></div>

<$MTInclude module="sidebar"$>

<$MTInclude module="footer"$>