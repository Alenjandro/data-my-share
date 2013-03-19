<?php
session_start();
include("config.php");

// 使用する変数の初期化
@$inquiryType = htmlspecialchars(strip_tags($_SESSION["input_inquiryType"]));
@$inquiryBody = htmlspecialchars(strip_tags($_SESSION["input_inquiryBody"]));
@$name01 = htmlspecialchars(strip_tags($_SESSION["input_name01"]));
@$name02 = htmlspecialchars(strip_tags($_SESSION["input_name02"]));
@$kana01 = htmlspecialchars(strip_tags($_SESSION["input_kana01"]));
@$kana02 = htmlspecialchars(strip_tags($_SESSION["input_kana02"]));
@$company = htmlspecialchars(strip_tags($_SESSION["input_company"]));
@$department = htmlspecialchars(strip_tags($_SESSION["input_department"]));
@$position = htmlspecialchars(strip_tags($_SESSION["input_position"]));
@$email = htmlspecialchars(strip_tags($_SESSION["input_email"]));
@$address = htmlspecialchars(strip_tags($_SESSION["input_address"]));
@$tel01 = htmlspecialchars(strip_tags($_SESSION["input_tel01"]));
@$tel02 = htmlspecialchars(strip_tags($_SESSION["input_tel02"]));
@$tel03 = htmlspecialchars(strip_tags($_SESSION["input_tel03"]));

$err = "";

if(empty($inquiryType)){
	$err .= "+01";
}
if(empty($inquiryBody)){
	$err .= "+02";
}
if(empty($name01)){
	$err .= "+03";
}
if(empty($name02)){
	$err .= "+04";
}
if(empty($company)){
	$err .= "+05";
}
if(empty($email)){
	$err .= "+06";
}else{
	if(!eregi("^([a-z0-9_\.-])+@(([a-z0-9_-])+\\.)+[a-z]{2,6}$", $email)){
		$err .= "+07";
	}
}
if(empty($address)){
	$err .= "+08";
}
if(empty($tel01) || empty($tel02) || empty($tel03)){
	$err .= "+09";
}

if(!empty($err)){
	$_SESSION["err"] = $err;
	header("Location: index.php");
	exit();
}

$usermailData = file_get_contents("usermail.dat");
$adminmailData = file_get_contents("adminmail.dat");

$res = date("w");
$day = array("日", "月", "火", "水", "木", "金", "土");
$date = $day[$res];

$telephone = $tel01 . '-' . $tel02 . '-' . $tel03;

$usermailData = str_replace("#お問い合わせ項目#", $inquiryType, $usermailData);
$usermailData = str_replace("#お問い合わせの内容#", $inquiryBody, $usermailData);
$usermailData = str_replace("#氏名#", $name01, $usermailData);
$usermailData = str_replace("#名前#", $name02, $usermailData);
$usermailData = str_replace("#氏名ふりがな#", $kana01, $usermailData);
$usermailData = str_replace("#名前ふりがな#", $kana02, $usermailData);
$usermailData = str_replace("#会社名#", $company, $usermailData);
$usermailData = str_replace("#部署名#", $department, $usermailData);
$usermailData = str_replace("#役職名#", $position, $usermailData);
$usermailData = str_replace("#メールアドレス#", $email, $usermailData);
$usermailData = str_replace("#勤務先所在地#", $address, $usermailData);
$usermailData = str_replace("#電話番号#", $telephone, $usermailData);
$usermailData = str_replace("#YYYY#", date("Y"), $usermailData);
$usermailData = str_replace("#MM#", date("m"), $usermailData);
$usermailData = str_replace("#DD#", date("d"), $usermailData);
$usermailData = str_replace("#KWE#", $date, $usermailData);
$usermailData = str_replace("#HH#", date("H"), $usermailData);
$usermailData = str_replace("#MI#", date("i"), $usermailData);
$usermailData = str_replace("#SS#", date("s"), $usermailData);

$adminmailData = str_replace("#お問い合わせ項目#", $inquiryType, $adminmailData);
$adminmailData = str_replace("#お問い合わせの内容#", $inquiryBody, $adminmailData);
$adminmailData = str_replace("#氏名#", $name01, $adminmailData);
$adminmailData = str_replace("#名前#", $name02, $adminmailData);
$adminmailData = str_replace("#氏名ふりがな#", $kana01, $adminmailData);
$adminmailData = str_replace("#名前ふりがな#", $kana02, $adminmailData);
$adminmailData = str_replace("#会社名#", $company, $adminmailData);
$adminmailData = str_replace("#部署名#", $department, $adminmailData);
$adminmailData = str_replace("#役職名#", $position, $adminmailData);
$adminmailData = str_replace("#メールアドレス#", $email, $adminmailData);
$adminmailData = str_replace("#勤務先所在地#", $address, $adminmailData);
$adminmailData = str_replace("#電話番号#", $telephone, $adminmailData);
$adminmailData = str_replace("#YYYY#", date("Y"), $adminmailData);
$adminmailData = str_replace("#MM#", date("m"), $adminmailData);
$adminmailData = str_replace("#DD#", date("d"), $adminmailData);
$adminmailData = str_replace("#KWE#", $date, $adminmailData);
$adminmailData = str_replace("#HH#", date("H"), $adminmailData);
$adminmailData = str_replace("#MI#", date("i"), $adminmailData);
$adminmailData = str_replace("#SS#", date("s"), $adminmailData);


// 入力者へのメール送信時
$header = "From: " . $mainSender . "\r\n" . "Reply-To: " . $mainSender . "\r\n" . "Return-path: " . $mainSender . "\r\n";
// 管理者へのメール送信時
$header2 = "From: " . $email . "\r\n" . "Reply-To: " . $email . "\r\n" . "Return-path: " . $mainSender . "\r\n";

mb_language("Japanese");
mb_internal_encoding("UTF-8");

// 入力者へメール送信
mb_send_mail($email, $mailTilte4User, $usermailData, $header);

// 管理者へメール送信
mb_send_mail($mainSender, $mailTilte4Admin, $adminmailData, $header2);

session_destroy();
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
<p>送信完了</p>
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