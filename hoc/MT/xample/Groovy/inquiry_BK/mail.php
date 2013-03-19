<?PHP

	//////初期設定
	//記入項目（上から順に。この項目名は送信メール内で使用）
	$e_list = array("資料請求に関して",
					"お問い合わせに関して",
					"その他内容",
					"お名前",
					"フリガナ",
					"住所　郵便番号",
					"住所　都道府県",
					"住所　市区町村以下",
					"住所　マンション名など",
					"お電話番号",
					"メールアドレス",
					"建築時期",
					"ご計画の建物",
					"その他内容",
					"ご建築の予定地1",
					"ご建築の予定地1　坪数",
					"ご建築の予定地2",
					"ご建築の予定地2　市・郡",
					"ご建築の予定地2　町",
					"ご建築の予定地2　坪",
					"ご建築の予定地3",
					"ご建築の予定地3　市・郡",
					"ご建築の予定地3　町",
					"ご建築の予定地3　坪位",
					"ご建築の予定地3　万円位",
					"建物のご予算　坪位",
					"建物のご予算　万円位",
					"建物のご予算　自己資金　万円位"
				);
	
	//必須項目　配列キー数字で指定
	$require = array(3,4,5,6,7,9,10);
	
	//メールアドレス　配列キー数字で指定
	$ismail = array(10);
	
	//改行が含まれる可能性のある項目
	$isbr = array(2);
	
	//チェックボックスの項目
	$is_checkbox = array(0,11,12,14,16,20);
	
	//電話番号・郵便番号の項目（ハイフンで結合する）
	$is_phone = array(5,9);
	
	//生年月日の項目（年、月、日で結合する）
	$is_date = array();
	
	//単純に結合
	$simplejoin = array(3,4);
	
	//パスワード項目（****で表示）
	$is_password = array();
	
	//単位を付加（万円）
	$is_manyen = array();
	
	//単位を付加（末尾に指定の単位を付加）
	$is_tani[''] = array();
	
	//パスワード・メールアドレスなどの複数による間違いチェック項目（同一か確認一つに丸める）
	$is_doublecheck = array();
	
	//アップロード画像
	$is_upimg = array();
	
	$backurl = "index.html";
	$thanxurl = "thanks.html";

	//メール送信先
	$mailto = "kubo@tribes20.com";
	$mailto = "atsushi@fuzz-graphics.com";
	
	//メールの送り元アドレス
	$mailfrom = "kubo@tribes20.com";
	$mailfrom = "atsushi@fuzz-graphics.com";
	
	//メールのサブジェクト
	$mailsubject = "Mail From Groovy Home";
	
	include("form_lib.php");
	
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>GROOVY HOME</title>
<meta name="description" content="健康住宅&amp;注文住宅のグルービーホーム" />
<meta name="keywords" content="健康住宅,注文住宅,株式会社 宝建,グルービーホーム,自然素材,分譲住宅" />
<link href="../common/css/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="css/inquiry.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="../common/css/print.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" src="../common/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="../common/js/script.js"></script>
<link rel="contents" href="/" title="ホーム" />
</head>

<body>
<div id="layout"><!-- #BeginLibraryItem "/Library/header.lbi" --><div id="header">
<div id="hSection">
<h1>グルービーホームは、デザイン性の高い注文住宅&amp;健康住宅を愛知県・三河を中心（岡崎・豊橋）に展開しています。</h1>
<ul id="hNav">
<li><a href="../profile/index.html"><img src="../common/images/hnav_company.gif" alt="会社情報" class="imgover" /></a></li>
<li><a href="../links/index.html"><img src="../common/images/hnav_link.gif" alt="リンク" class="imgover" /></a></li>
<li><a href="../sitemap/index.html"><img src="../common/images/hnav_sitemap.gif" alt="サイトマップ" class="imgover" /></a></li>
<li><a href="../index.html"><img src="../common/images/btn_toppage.gif" alt="トップページ" class="imgover" /></a></li>
</ul>
</div>

<div id="headSection">
<div id="headerInner">
<p id="logo"><a href="../index.html"><img src="../common/images/logo.gif" alt="For your satisfaction
GROOVY HOME" /></a></p>
<p><img src="../common/images/txt_contact.gif" alt="0120-968-373" /></p>
<!-- / id headerInner --></div>
</div>
<!-- / id header --></div><!-- #EndLibraryItem --><!-- #BeginLibraryItem "/Library/gnav.lbi" --><div id="gNav">
<dl>
<dt>主なカテゴリ</dt>
<dd>
<ul>
<li id="gNavQuality"><a href="../quality/index.html"><img src="../common/images/gnav_quality.gif" alt="家づくりへの想い
QUALITY" /></a></li>
<li id="gNavGallery"><a href="../gallery/list.html"><img src="../common/images/gnav_gallery.gif" alt="施工例ギャラリー
GALLERY" /></a></li>
<li id="gNavFlow"><a href="../flow/index.html"><img src="../common/images/gnav_flow.gif" alt="家づくりの流れ
FLOW" /></a></li>
<li id="gNavGuarantee"><a href="../guarantee/index.html"><img src="../common/images/gnav_guarantee.gif" alt="保証・メンテナンス
GUARANTEE" /></a></li>
<li id="gNavVoice"><a href="../voice/list.html"><img src="../common/images/gnav_voice.gif" alt="お客様の声
VOICE" /></a></li>
<li id="gNavAccess"><a href="../access/index.html"><img src="../common/images/gnav_access.gif" alt="アクセス
ACCESS" /></a></li>
<li id="gNavFaq"><a href="../faq/index.html"><img src="../common/images/gnav_faq.gif" alt="よくある質問
FAQ" /></a></li>
</ul>
</dd>
</dl>
<!-- / id gNav --></div><!-- #EndLibraryItem -->


<div id="pageBody">
<ul class="topicPath">
<li><a href="../index.html">トップページ</a></li>
<li>資料請求・お問い合わせ</li>
<!-- / class topicPath --></ul>

<div id="content">
<h2 class="mHead"><img src="images/mh_inquiry.gif" alt="INQUIRY 資料請求・お問い合わせ" /></h2>

<form action="" id="inquiryForm" name="inquiryForm" method="post">
			<?PHP
				if ( $errstr != "" ){
					echo "<div class=\"wrap-error\">\n";
					echo "$errstr";
					echo "<p class=\"n-err\"><a href=\"javascript:history.back();\">前のページに戻る</a></p>\n";
					echo "</div>\n";
				}else{
			?>
<p>以下の内容をご確認いただき、問題なければ「送信する」ボタンを押してください。</p>
<div class="sHeadSection">
<h3><img src="images/sh_document.gif" alt="資料請求に関して" /></h3>
<p class="answer"><?=$_POST['f'][0];?><?=isSetWrite($_POST['f'][1],"（","）");?></p>
<!-- / class sHeadSection --></div>

<div class="sHeadSection">
<h3><img src="images/sh_inquiry.gif" alt="お問い合わせに関して" /></h3>
<p class="answer"><?=$_POST['f'][2];?></p>
<!-- / class sHeadSection --></div>

<div class="sHeadSection">
<h3><img src="images/sh_info.gif" alt="お客様情報のご入力" /></h3>
<p>以下の入力欄にお客様情報をご入力ください。</p>
<p class="inquiryText">の項目は必ず入力してください。</p>

<table class="inquiryTable">
<tr>
<th><span>お名前</span></th>
<td><?=$_POST['f'][3];?>
</td>
</tr>

<tr>
<th><span>フリガナ</span></th>
<td><?=$_POST['f'][4];?>
</td>
</tr>

<tr>
<th>ご住所</th>
<td>
<ul>
<li><?=$_POST['f'][5];?></li>
<li><?=$_POST['f'][6];?></li>
<li><?=$_POST['f'][7];?></li>
<li><?=$_POST['f'][8];?></li>
</ul>

</td>
</tr>

<tr>
<th><label for="phone01"><span>お電話番号</span></label></th>
<td><?=$_POST['f'][9];?></td>
</tr>

<tr>
<th><label for="mail"><span>メールアドレス</span></label></th>
<td><?=$_POST['f'][10];?></td>

</tr>
</table>

<!-- / class sHeadSection --></div>

<div class="sHeadSection">
<h3><img src="images/sh_plan.gif" alt="建築計画についてお尋ねします" /></h3>
<p>もしよろしければ、以下のアンケートにお答えください。</p>
<dl class="plan">
<dt>建築時期はいつ頃とお考えですか？</dt>
<dd><?=$_POST['f'][11];?></dd>
<dt>ご計画の建物は？</dt>
<dd><?=$_POST['f'][12];?><?=isSetWrite($_POST['f'][13],"（","）");?></dd>
<dt>ご建築の予定地は？</dt>
<dd>
<ul class="groundList">
<li>
<ul>
<li><?=$_POST['f'][14];?></li>
<li><?=isSetWrite($_POST['f'][15],"現在地","坪");?></li>
</ul>
</li>

<li>
<ul>
<li><?=$_POST['f'][16];?></li>
<li><?=isSetWrite($_POST['f'][17],"","市・郡");?></li>
<li><?=isSetWrite($_POST['f'][18],"","町");?></li>
<li><?=isSetWrite($_POST['f'][19],"","坪");?></li>
</ul>
</li>

<li class="groundListLast">
<ul>
<li><?=$_POST['f'][20];?></li>
<li><?=isSetWrite($_POST['f'][21],"","市・郡");?></li>
<li><?=isSetWrite($_POST['f'][22],"","町");?></li>
<li><?=isSetWrite($_POST['f'][23],"","坪位");?></li>
<li><?=isSetWrite($_POST['f'][24],"","万円位で探している");?></li>
</ul>
</li>

</ul>
</dd>
<dt>建物のご予算はどれくらいで予定していますか？</dt>
<dd>
<ul>
<li><?=isSetWrite($_POST['f'][25],"","坪位");?></li>
<li><?=isSetWrite($_POST['f'][26],"","万円位で予定している");?></li>
</ul>
<p class="text"><?=isSetWrite($_POST['f'][27],"自己資金","万円位で予定している");?></p>
</dd>
</dl>

<div class="confirm">
<p><input type="image" src="images/btn_transmit.gif" alt="入力内容を確認する" title="送信する" class="imgover" /></p>
<!--
<p class="reset"><a href="javascript:history.back();"><img src="images/btn_back.gif" alt="入力し直す" class="imgover" /></a></p>
-->
</div>
<!-- / class sHeadSection --></div>
<input type="hidden" name="mode" value="fin" />
				<?php
					//HIDDENデータ生成
					foreach( $_POST['f'] as $key=>$val ){
						echo "<input type=\"hidden\" name=\"f[$key]\" value=\"".ereg_replace("\n|\r\n|\r","",$val)."\" />\n";
					}
				}
				?>
                
</form>

<!--
<ul class="listContent">
<li>●いただいた質問に関しては、社内担当部門にて迅速に回答を差し上げられるよう努めますが、回答を差し上げるまでにお時間をいただく場合もございます。また、年末年始ほか当社休業日にいただいたお問い合わせについては、翌営業日 以降の対応になりますので、ご了承ください。</li>
<li>●お問い合わせの内容によっては、書面や電話・FAXによりご回答を差し上げる場合がございます。その際、お客様にご入力いただきました質問内容などの情報を転載・利用させていただく場合がございます。</li>
<li>●当社はお客様に関わる個人情報を正しく扱うことが、当社にとって重要な責務であると考えております。<br />
ご入力いただきましたお名前、ご住所などの個人情報は「お問い合わせに対する回答」および「請求いただいた資料の送付」 以外の目的では使用いたしません。</li>
<li>●当社では、お送りいただきましたお名前、ご住所などの個人情報は、法令で定められた場合を除き、個人の同意なく第三者に開示することはありません。当社では第三者がお客様の個人情報に不当に触れることがないよう、合理的な範囲内で厳重に管理いたします。</li>
</ul>
-->

<!-- / id content --></div>

<div id="sidebar">
<ul class="bannerList">
<li>
<p><a href="index.html"><img src="../common/images/bnr_inquiry.gif" alt="資料請求お問い合わせ" class="imgover" /></a></p>
<p class="bannerText"><a href="index.html">資料請求・お問い合わせはこちら</a></p></li>
<li class="banner">
<p><a href="../exhibition/index.html"><img src="../common/images/bnr_exhibition.jpg" alt="展示場のご案内" /></a></p>
<p class="bannerText"><a href="../exhibition/index.html">グルービーホームの展示場案内はこちら</a></p></li>
<li class="banner last">
<p><a href="../blog/index.html" target="_blank"><img src="../common/images/bnr_blog.jpg" alt="グルービースタッフの真心blog" /></a></p>
<p class="bannerText"><a href="../blog/index.html" target="_blank">グルービーホームスタッフの真心ブログ</a></p></li>
</ul>

<div class="section">
<h2><img src="../common/images/mh_event.gif" alt="EVENT 見学会・イベント" /></h2>
<ul class="eventList">
<li>
<p><a href="#"><img src="../common/images/img_event01.jpg" alt="" /></a></p>
<dl>
<dt>2010.09.15<span><img src="../common/images/img_new02.gif" alt="NEW" /></span></dt>
<dd><a href="#">ダミーイベントテキストダミーイベントテキストダミーイベントテキストダミー。</a></dd>
</dl>
</li>

<li>
<p><a href="#"><img src="../common/images/img_event02.jpg" alt="" /></a></p>
<dl>
<dt>2010.09.15<span><img src="../common/images/img_new02.gif" alt="NEW" /></span></dt>
<dd><a href="#">ダミーイベントテキストダミーイベントテキストダミーイベントテキストダミー。</a></dd>
</dl>
</li>

<li>
<p><a href="#"><img src="../common/images/img_event03.jpg" alt="" /></a></p>
<dl>
<dt>2010.09.15<span><img src="../common/images/img_new02.gif" alt="NEW" /></span></dt>
<dd><a href="#">ダミーイベントテキストダミーイベントテキストダミーイベントテキストダミー。</a></dd>
</dl>
</li>

<li>
<p><a href="#"><img src="../common/images/img_event04.jpg" alt="" /></a></p>
<dl>
<dt>2010.09.15<span><img src="../common/images/img_new02.gif" alt="NEW" /></span></dt>
<dd><a href="#">ダミーイベントテキストダミーイベントテキストダミーイベントテキストダミー。</a></dd>
</dl>
</li>

<li class="lastList">
<p><a href="#"><img src="../common/images/img_event05.jpg" alt="" /></a></p>
<dl>
<dt>2010.09.15<span><img src="../common/images/img_new02.gif" alt="NEW" /></span></dt>
<dd><a href="#">ダミーイベントテキストダミーイベントテキストダミーイベントテキストダミー。</a></dd>
</dl>
</li>
</ul>
<p class="list"><a href="../event/list.html"><img src="../common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></p>
<!-- / class section --></div>

<div class="section">
<h2><img src="../common/images/mh_news.gif" alt="NEWS 新着トピックス" /></h2>
<dl class="news">
<dt>2010.09.15<span><img src="../common/images/img_new02.gif" alt="NEW" /></span></dt>
<dd><a href="#">ダミートピックステキストダミートピックステキス。</a></dd>
<dt>2010.09.15</dt>
<dd><a href="#">ダミートピックステキストダミートピックステキス。</a></dd>
<dt>2010.09.15</dt>
<dd><a href="#">ダミートピックステキストダミートピックステキス。</a></dd>
</dl>
<p class="list"><a href="../news/list.html"><img src="../common/images/btn_list.gif" alt="一覧を見る" class="imgover" /></a></p>
<!-- / class section --></div>
<!-- / id sidebar --></div>
<!-- / id pageBody --></div>
<!-- / id layout --></div>
<!-- #BeginLibraryItem "/Library/footer.lbi" --><div id="footer">
<p class="pagetop"><a href="#layout"><img src="../common/images/btn_pagetop.gif" alt="このページの先頭へ" class="imgover" /></a></p>
<div id="footerInner">
<ul id="fNav">
<li class="fNavFirst">
<p><a href="../index.html">トップページ</a></p></li>

<li class="fNavBlock fNavSizeB">
<p><a href="../quality/index.html">家づくりへの想い</a></p>
<ul>
<li><a href="../quality/quality01.html">&quot;ピュア&quot;な家づくりをしていただくために</a></li>
<li><a href="../quality/quality02.html">居住空間のデザインクオリティ</a></li>
<li><a href="../quality/quality03.html">健康素材へのこだわり</a></li>
<li><a href="../quality/quality04.html">家の要は安全な基本構造</a></li>
<li><a href="../quality/quality05.html">適性価格の追求</a></li>
</ul>
</li>

<li class="fNavBlock">
<ul>
<li><p><a href="../gallery/list.html">施工例ギャラリー</a></p></li>
<li><p><a href="../flow/index.html">家づくりの流れ</a></p></li>
<li><p><a href="../guarantee/index.html">保証・メンテナンス</a></p></li>
<li><p><a href="../voice/list.html">お客様の声</a></p></li>
</ul>
</li>

<li class="fNavBlock">
<ul>
<li><p><a href="../access/index.html">アクセス</a></p>
<ul>
<li><a href="../exhibition/index.html">展示場案内</a></li>
</ul>
</li>
<li><p><a href="../faq/index.html">よくある質問</a></p></li>
<li><p><a href="../quality/semiorder.html">セミオーダーハウス</a></p></li>
</ul>
</li>

<li class="fNavBlock fNavSizeM">
<ul>
<li><a href="../news/list.html">新着トピックス</a></li>
<li><a href="../event/list.html">見学会・イベント</a></li>
<li><a href="../blog/index.html" target="_blank">グルービースタッフの真心blog</a></li>
<li><a href="index.html">資料請求・お問い合わせ</a></li>
</ul>
</li>

<li class="fNavBlock fNavLast">
<ul>
<li><a href="../profile/index.html">会社情報</a></li>
<li><a href="../links/index.html">リンク</a></li>
<li><a href="../sitemap/index.html">サイトマップ</a></li>
</ul>
</li>
</ul>
<!-- / id footerInner --></div>

<div class="innerBlock">
<div class="contact">
<dl>
<dt>株式会社宝建　グルービーホーム</dt>
<dd>
<ul>
<li>[ 岡崎ショールーム ]<br />
〒444-0815<br />
愛知県岡崎市羽根町字陣場300<br />
TEL：0564-59-0234<br />
FAX：0564-59-0235</li>
<li class="listRight">[ 豊橋営業所 ]<br />
〒440-0832<br />
愛知県豊橋市中岩田五丁目1番地16<br />
TEL：0532-69-3678<br />
FAX：0532-69-3679<br />
</li>
</ul>
</dd>
</dl>

<ul class="contactRight">
<li>
<p>会社情報はこちらから</p>
<p><a href="../profile/index.html"><img src="../common/images/btn_info.gif" alt="会社情報" class="imgover" /></a></p>
</li>

<li>
<p>お問い合わせはこちらから</p>
<p><a href="index.html"><img src="../common/images/btn_inquiry.gif" alt="お問い合わせ" class="imgover" /></a></p>
</li>
</ul>
</div>

<div class="footerBlock">
<p id="copyright"><img src="../common/images/txt_copyright.gif" alt="Copyright (C) Groovy Home. All Rights Reserved." /></p>
<p><a href="#"><img src="../common/images/bnr_footer.gif" alt="グルービーホーム株式会社宝建" /></a></p>
</div>
</div>
<!-- / id footer --></div><!-- #EndLibraryItem --></body>
</html>