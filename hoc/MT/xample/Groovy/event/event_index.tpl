<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/event.css
title=見学会・イベント｜健康住宅&amp;注文住宅のグルービーホーム
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
<li><a href="../index.html">トップページ</a></li>
<li>見学会・イベント</li>
<!-- / class topicPath --></ul>

<div id="content">
<div class="section">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>event/images/mh_event.gif" alt="EVENT 見学会・イベント" /></h2>
<MTPageContents count="5">
<MTEntries>
<div class="sectionInner<MTEntriesFooter>Last</MTEntriesFooter>">
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
<!-- / class sectionRight --></div>

<p class="sectionContent"><$MTEntryExcerpt$></p>
<p class="linkMore"><a href="<$MTEntryPermalink$>"><img src="<$MTVar name="site_url"$>common/images/btn_more.gif" alt="more" class="imgover" /></a></p>
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