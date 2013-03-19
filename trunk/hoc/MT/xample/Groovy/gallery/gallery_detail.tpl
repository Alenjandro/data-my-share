<MTSetvars>
site_url=http://groovy-home.jp/
css_path=<$MTBlogURL$>css/gallery.css
title=<$MTEntryTitle$>｜施工例ギャラリー｜健康住宅&amp;注文住宅のグルービーホーム
description=<$MTEntryTitle$>｜施工例ギャラリー｜健康住宅&amp;注文住宅のグルービーホーム
keywords=健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅
</MTSetVars>

<MTSetVarBlock name="galleryJS">
<script type="text/javascript" src="<$MTVar name="site_url"$>common/js/jquery.ad-gallery.js"></script>
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
<li><a href="<$MTVar name="site_url"$>gallery/index.html">施工例ギャラリー</a></li>
<li><$MTEntryTitle$></li>
<!-- / class topicPath --></ul>

<div id="content">
<h2 class="mHead"><img src="<$MTVar name="site_url"$>gallery/images/mh_gallery.gif" alt="GALLERY 施工例ギャラリー" /></h2>
<div class="section">
<h3 class="sHead"><$MTEntryTitle$></h3>
</div>

<div id="gallery" class="ad-gallery">
<div class="ad-image-wrapper"></div>
<div class="ad-nav">
<div class="ad-thumbs">
<ul class="ad-thumb-list">
<li><MTgalleryphoto01Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation01$>" class="image0" /></a></MTgalleryphoto01Asset></li>

<li><MTgalleryphoto02Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation02$>" class="image1" /></a></MTgalleryphoto02Asset></li>

<li><MTgalleryphoto03Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation03$>" class="image2" /></a></MTgalleryphoto03Asset></li>

<li><MTgalleryphoto04Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation04$>" class="image3" /></a></MTgalleryphoto04Asset></li>

<li><MTgalleryphoto05Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation05$>" class="image4" /></a></MTgalleryphoto05Asset></li>

<li><MTgalleryphoto06Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation06$>" class="image5" /></a></MTgalleryphoto06Asset></li>

<li><MTgalleryphoto07Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation07$>" class="image6" /></a></MTgalleryphoto07Asset></li>

<li><MTgalleryphoto08Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation08$>" class="image7" /></a></MTgalleryphoto08Asset></li>

<li><MTgalleryphoto09Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation09$>" class="image8" /></a></MTgalleryphoto09Asset></li>

<li><MTgalleryphoto10Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation10$>" class="image9" /></a></MTgalleryphoto10Asset></li>

<li><MTgalleryphoto11Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation11$>" class="image10" /></a></MTgalleryphoto11Asset></li>

<li><MTgalleryphoto12Asset><a href="<$MtAssetThumbnailURL height="440"$>"><img src="<$MtAssetThumbnailURL$>" height="56" alt="<$MTgallerycation12$>" class="image11" /></a></MTgalleryphoto12Asset></li>
</ul>
</div>
</div>
</div>
<div id="descriptions"></div>

<div class="detailBlock">
<dl class="comment">
<dt><img src="<$MTVar name="site_url"$>gallery/images/ttl_comment.gif" alt="COMMENT コメント" /></dt>
<dd><$MTEntryBody nl2br="xhtml"$></dd>
</dl>

<dl class="info">
<dt><img src="<$MTVar name="site_url"$>gallery/images/ttl_info.gif" alt="INFORMATION 基本情報" /></dt>
<dd>
<ul class="listButton">
<li id="full"<MTIfNonZero tag="informationFull"> class="active"</MTIfNonZero>><img src="<$MTVar name="site_url"$>gallery/images/btn_full_o.gif" alt="FULL ORDER" /></li>
<li id="semi"<MTIfNonZero tag="informationSemi"> class="active"</MTIfNonZero>><img src="<$MTVar name="site_url"$>gallery/images/btn_semi_o.gif" alt="SEMI ORDER" /></li>
</ul>

<ul>
<MTIfNonEmpty tag="costructionarea"><li>建築地域： <$MTcostructionarea$></li></MTIfNonEmpty>
<MTIfNonEmpty tag="squaremeasure"><li>敷地面積： <$MTsquaremeasure$></li></MTIfNonEmpty>
<MTIfNonEmpty tag="floorarea"><li>延床面積： <$MTfloorarea$></li></MTIfNonEmpty>
<MTIfNonEmpty tag="struction"><li>構造種別： <$MTstruction$></li></MTIfNonEmpty>

<MTIfNonEmpty tag="constructiondate">
<li>施工年月日： <$MTconstructiondate$></li>
</MTIfNonEmpty>
<MTIfNonEmpty tag="informationemptyname01">
<li><$MTinformationemptyname01$>： <$MTinformationemptynaiyo01$></li>
</MTIfNonEmpty>
<MTIfNonEmpty tag="informationemptyname02">
<li><$MTinformationemptyname02$>： <$MTinformationemptynaiyo02$></li>
</MTIfNonEmpty>
<MTIfNonEmpty tag="informationemptyname03">
<li class="lastList"><$MTinformationemptyname03$>： <$MTinformationemptynaiyo03$></li>
</MTIfNonEmpty>

</ul>
</dd>
</dl>
</div>

<ul class="link">
<MTEntryPrevious><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_previous.gif" alt="前の事例へ" class="imgover" /></a></li></MTEntryPrevious>
<li><a href="<$MTVar name="site_url"$>gallery/index.html"><img src="<$MTVar name="site_url"$>common/images/btn_return.gif" alt="一覧に戻る" class="imgover" /></a></li>
<MTEntryNext><li><a href="<MTEntryPermalink>"><img src="<$MTVar name="site_url"$>common/images/btn_follow.gif" alt="次の事例へ" class="imgover" /></a></li></MTEntryNext>
</ul>

<p class="construction"><a href="https://groovy-home.jp/inquiry/"><img src="<$MTVar name="site_url"$>common/images/btn_construction.gif" alt="施工事例集のご請求はこちらから" class="imgover" /></a></p>
<!-- / id content --></div>

<$MTInclude module="sidebar"$>

<$MTInclude module="footer"$>