<?php
session_start();
include("config.php");

// 使用する変数の初期化
@$inquiryType = $_SESSION["input_inquiryType"];
@$inquiryBody = $_SESSION["input_inquiryBody"];
@$name01 = $_SESSION["input_name01"];
@$name02 = $_SESSION["input_name02"];
@$kana01 = $_SESSION["input_kana01"];
@$kana02 = $_SESSION["input_kana02"];
@$company = $_SESSION["input_company"];
@$department = $_SESSION["input_department"];
@$position = $_SESSION["input_position"];
@$email = $_SESSION["input_email"];
@$address = $_SESSION["input_address"];
@$tel01 = $_SESSION["input_tel01"];
@$tel02 = $_SESSION["input_tel02"];
@$tel03 = $_SESSION["input_tel03"];

$errMsg = "";
$error_01 = "";
$error_02 = "";
$error_03 = "";
$error_04 = "";
$error_05 = "";
$error_06_07 = "";
$error_07 = "";
$error_08 = "";
$error_09 = "";

$error_inquiryType = "";
$error_inquiryBody = "";
$error_name01 = "";
$error_name02 = "";
$error_company = "";
$error_email = "";
$error_address = "";
$error_tell = "";

if(isset($_SESSION["err"])){
	$err = $_SESSION["err"];
	if(ereg("01", $err)){
		$error_inquiryType .= "<p><em>お問い合わせ項目を1つ選択してください。</em></p>";
		$error_01 .= "error";
	}
	if(ereg("02", $err)){
		$error_inquiryBody .= "<p><em>お問い合わせの内容を<br />
ご記入ください。</em></p>";
		$error_02 .= "error";
	}
	if(ereg("03", $err)){
		$error_name01 .= "<p><em>氏名を入力してください。</em></p>";
		$error_03 .= "error";
	}
	if(ereg("04", $err)){
		$error_name02 .= "<p><em>名前を入力してください。</em></p>";
		$error_04 .= "error";
	}
	if(ereg("05", $err)){
		$error_company .= "<p><em>会社名（もしくは学校名など）を1つ選択してください。</em></p>";
		$error_05 .= "error";
	}
	if(ereg("06", $err)){
		$error_email .= "<p><em>メールアドレスを入力してください。</em></p>";
		$error_06_07 .= "error";
	}
	if(ereg("07", $err)){
		$error_email .= "<p><em>メールアドレスをご確認ください。</em></p>";
		$error_06_07 .= "error";
	}
	if(ereg("08", $err)){
		$error_address .= "<p><em>住所を入力してください。</em></p>";
		$error_08 .= "error";
	}
	if(ereg("09", $err)){
		$error_tell .= "<p><em>電話番号を入力してください。</em></p>";
		$error_09 .= "error";
	}
	
	if(!empty($errMsg)){
		$errMsg = "<p class='error'>$errMsg</p>";
	}
	unset($_SESSION["err"]);
}
unset($_SESSION["input_inquiryType"]);
unset($_SESSION["input_inquiryBody"]);
unset($_SESSION["input_name01"]);
unset($_SESSION["input_name02"]);
unset($_SESSION["input_kana01"]);
unset($_SESSION["input_kana02"]);
unset($_SESSION["input_company"]);
unset($_SESSION["input_department"]);
unset($_SESSION["input_position"]);
unset($_SESSION["input_email"]);
unset($_SESSION["input_address"]);
unset($_SESSION["input_tel01"]);
unset($_SESSION["input_tel02"]);
unset($_SESSION["input_tel03"]);

$businessIqr = '';
$employmentIqr = '';
$otherIqr = '';

if(!empty($inquiryType)){
	switch ($inquiryType) {
	    case '事業情報' :  $businessIqr = ' checked="checked"';
		            break;
		case '採用情報' :  $employmentIqr = ' checked="checked"';
		            break;
		case 'その他' :  $otherIqr = ' checked="checked"';
		            break;
	}
}
$companyIqr = "";
$schoolIqr = "";
$excludeIqr = "";

if(!empty($company)){
	switch ($company) {
	    case '会社名' :  $companyIqr = ' checked="checked"';
		            break;
		case '学校名' :  $schoolIqr = ' checked="checked"';
		            break;
		case '左記以外' :  $excludeIqr = ' checked="checked"';
		            break;
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<title>日鉄オフショアコンストラクション株式会社｜お問い合わせ</title>
<meta name="description" content="事業に関する内容から、採用の内容までお気軽にお問い合わせください。" />
<meta name="keywords" content="お問い合わせ,日鉄オフショアコンストラクション株式会社,くろしお,くろしお2" />
<link href="../common/css/import.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="css/contact.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="../common/css/print.css" rel="stylesheet" type="text/css" media="print" />
<link rel="contents" href="/" title="ホーム" />
<script type="text/javascript" src="../common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../common/js/script.js"></script>
<script type="text/javascript" src="../common/js/doctextsizer.js"></script>
</head>

<body>
<div id="layout">
<div id="header">
<div class="headerInner">
<p><a href="../index.html"><img src="../common/images/logo.gif" alt="NIPPON STEEL ENGINEERING
日鉄オフショアコンストラクション株式会社
Nippon Steel Offshore Construction Co., Ltd." /></a></p>
<div class="hSection">
<div id="fontSwitch">
<p><img src="../common/images/txt_switchfont.gif" alt="文字サイズ" /></p>
<ul>
<li id="fontSmall"><a href="javascript:;" class="texttoggler" rel="smallview">小</a></li>
<li id="fontNormal"><a href="javascript:;" class="texttoggler" rel="normalview">中</a></li>
<li id="fontLarge"><a href="javascript:;" class="texttoggler" rel="largeview">大</a></li>
</ul>
</div>
<p><a href="#" target="_blank"><img src="../common/images/btn_nippon.gif" alt="新日鉄エンジニアリング" class="imgover" /></a></p>
<!-- / class hSection --></div>
<!-- / class headerInner --></div>
<!-- / id header --></div>

<div id="gNav">
<dl>
<dt>主なカテゴリ</dt>
<dd>
<ul>
<li id="gNavHome"><a href="../index.html"><img src="../common/images/gnav_home.gif" alt="HOME" /></a></li>
<li id="gNavCompany"><a href="../company/index.html"><img src="../common/images/gnav_company.gif" alt="企業情報 Company Information" /></a></li>
<li id="gNavProject"><a href="../business/index.html"><img src="../common/images/gnav_project.gif" alt="事業情報 Project Information" /></a></li>
<li id="gNavRecruit"><a href="../recruit/index.html"><img src="../common/images/gnav_recruit.gif" alt="採用情報 Recruit Information" /></a></li>
<li id="gNavInquiry"><a href="../contact/index.html"><img src="../common/images/gnav_inquiry.gif" alt="お問い合わせ Inquiry" /></a></li>
</ul>
</dd>
</dl>
<!-- / id gNav --></div>

<div id="pageBody">
<ul id="topicPath">
<li><a href="../index.html">トップページ</a></li>
<li>お問い合わせ</li>
<!-- / id topicPath --></ul>

<div id="content">
<div class="section">
<h1 class="bHead"><img src="images/bh_contact.gif" alt="お問い合わせ" /></h1>
<p>弊社へのお問い合わせは、下記のフォームをご利用ください（<em>※</em>印は必須項目となります）。<br />
なお、お寄せいただいた個人情報の取り扱いにつきましては、<a href="../privacy/index.html">個人情報保護方針</a>をご覧ください。</p>
<form action="confirm.php" method="post" id="inquiryForm">
<table class="contact">
<tr>
<th class="colFirst">&#9632;お問い合わせ項目を<br />
1つ選択してください。<em>※</em></th>
<td>
<ul class="radioList">
<li><input type="radio" name="inquiry" id="business" value="事業情報"<?php echo $businessIqr; ?> /><label for="business">事業情報</label></li>
<li><input type="radio" name="inquiry" id="employment" value="採用情報"<?php echo $employmentIqr; ?> /><label for="employment">採用情報</label></li>
<li><input type="radio" name="inquiry" id="other" value="その他"<?php echo $otherIqr; ?> /><label for="other">その他</label></li>
</ul>
<?php echo $error_inquiryType; ?>
</td>
</tr>

<tr>
<th>&#9632;<label for="message">お問い合わせの内容を<br />
ご記入ください。</label><em>※</em></th>
<td><textarea name="message" id="message" cols="35" rows="5" class="<?php echo $error_02; ?>"><?php echo $inquiryBody; ?></textarea><?php echo $error_inquiryBody; ?></td>
</tr>

<tr>
<th>&#9632;名前<em>※</em></th>
<td>
<ul class="inputList">
<li><label for="name01">姓</label><input type="text" name="name01" id="name01" value="<?php echo $name01; ?>" class="sizeS <?php echo $error_03; ?>" size="15" /><?php echo $error_name01; ?></li>
<li><label for="name02">名</label><input type="text" name="name02" id="name02" value="<?php echo $name02; ?>" class="sizeS <?php echo $error_04; ?>" size="15" /><?php echo $error_name02; ?></li>
</ul></td>
</tr>

<tr>
<th>&#9632;ふりがな</th>
<td><ul class="inputList">
<li><label for="kana01">姓</label><input type="text" name="kana01" id="kana01" value="<?php echo $kana01; ?>" class="sizeS" size="15" /></li>
<li><label for="kana02">名</label><input type="text" name="kana02" id="kana02" value="<?php echo $kana02; ?>" class="sizeS" size="15" /></li>
</ul></td>
</tr>

<tr>
<th>&#9632;会社名<span>（もしくは学校名など）</span><em>※</em></th>
<td><ul class="radioStyle">
<li><input type="radio" name="company" id="company" value="会社名"<?php echo $companyIqr; ?> /><label for="company">会社名</label></li>
<li><input type="radio" name="company" id="school" value="学校名"<?php echo $schoolIqr; ?> /><label for="school">学校名</label></li>
<li><input type="radio" name="company" id="exclude" value="左記以外"<?php echo $excludeIqr; ?> /><label for="exclude">左記以外</label></li>
</ul>
<?php echo $error_company; ?>
</td>
</tr>

<tr>
<th>&#9632;<label for="depart">部署名</label></th>
<td><input type="text" name="department" id="department" value="<?php echo $department; ?>" class="sizeL" size="50" /></td>
</tr>

<tr>
<th>&#9632;<label for="post">役職名</label></th>
<td><input type="text" name="position" id="position" value="<?php echo $position; ?>" class="sizeL" size="50" /></td>
</tr>

<tr>
<th>&#9632;<label for="email">メールアドレス</label><em>※</em></th>
<td><input type="text" name="email" id="email" value="<?php echo $email; ?>" class="sizeM <?php echo $error_06_07; ?>" size="25" /><?php echo $error_email; ?></td>
</tr>

<tr>
<th>&#9632;<label for="address">勤務先所在地（住所）</label><em>※</em></th>
<td><input type="text" name="address" id="address" value="<?php echo $address; ?>" class="sizeM <?php echo $error_08; ?>" size="25" /><?php echo $error_address; ?></td>
</tr>

<tr>
<th>&#9632;<label for="phone01">電話番号</label><em>※</em></th>
<td>
<ul class="phoneList">
<li class="phoneFirst"><input type="text" name="phone01" id="phone01" value="<?php echo $tel01; ?>" class="sizeSs <?php echo $error_09; ?>" size="10" /></li>
<li><input type="text" name="phone02" id="phone02" value="<?php echo $tel02; ?>" class="sizeSs <?php echo $error_09; ?>" size="10" /></li>
<li><input type="text" name="phone03" id="phone03" value="<?php echo $tel03; ?>" class="sizeSs <?php echo $error_09; ?>" size="10" /></li>
</ul>
<?php echo $error_tell; ?>
</td>
</tr>
</table>

<p class="confirm"><input type="image" src="images/btn_confirm.gif" alt="確認" title="確認" name="confirm" id="confirm" onclick="formSubmit('inquiryForm');" /></p>
</form>
<!-- / class section --></div>
<!-- / id content --></div>

<div id="sidebar">
<ul class="bannerList">
<li><a href="../business/index.html"><img src="../common/images/bnr_project.jpg" alt="事業情報
大型海洋作業船のくろしおをご紹介します" class="imgover" /></a></li>
<li><a href="../company/index.html"><img src="../common/images/bnr_company.jpg" alt="企業情報
海外での石油・ガス生産を支える日本でただ一つの会社" class="imgover" /></a></li>
<li><a href="../recruit/index.html"><img src="../common/images/bnr_recruit.jpg" alt="即戦力募集中！
世界で活躍できる方募集中！" class="imgover" /></a></li>
<!-- / class bannerList --></ul>
<p class="contact"><a href="../contact/index.html"><img src="../common/images/img_contact.gif" alt="お問い合わせ
資料のご請求や、事業内容などお気軽にお問い合わせ下さい。" class="imgover" /></a></p>
<!-- / id sidebar --></div>

<p class="pageTop"><a href="#layout"><img src="../common/images/txt_pagetop.gif" alt="ページトップへ戻る" /></a></p>
<!-- / id pageBody --></div>

<div id="footer">
<div class="footerInner">
<ul>
<li><a href="../guide/index.html"><img src="../common/images/fnav_guide.gif" alt="ご利用にあたって" class="imgover" /></a></li>
<li><a href="../privacy/index.html"><img src="../common/images/fnav_privacy.gif" alt="個人情報保護方針" class="imgover" /></a></li>
<li><a href="../sitemap/index.html"><img src="../common/images/fnav_sitemap.gif" alt="サイトマップ" class="imgover" /></a></li>
</ul>
<p><img src="../common/images/txt_copyright.gif" alt="Copyright &copy; 2011 Nippon Steel Offshore Construction Co.,LTD. All Rights Reserved." /></p>
<!-- / class footerInner --></div>
<!-- / id footer --></div>
<!-- / id layout --></div>
</body>
</html>