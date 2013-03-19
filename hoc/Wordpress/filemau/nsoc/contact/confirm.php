<?php
session_start();
include("config.php");

// 使用する変数の初期化
@$inquiryType = htmlspecialchars(strip_tags($_POST["inquiry"]));
@$inquiryBody = htmlspecialchars(strip_tags($_POST["message"]));
@$name01 = htmlspecialchars(strip_tags($_POST["name01"]));
@$name02 = htmlspecialchars(strip_tags($_POST["name02"]));
@$kana01 = htmlspecialchars(strip_tags($_POST["kana01"]));
@$kana02 = htmlspecialchars(strip_tags($_POST["kana02"]));
@$company = htmlspecialchars(strip_tags($_POST["company"]));
@$department = htmlspecialchars(strip_tags($_POST["department"]));
@$position = htmlspecialchars(strip_tags($_POST["position"]));
@$email = htmlspecialchars(strip_tags($_POST["email"]));
@$address = htmlspecialchars(strip_tags($_POST["address"]));
@$tel01 = htmlspecialchars(strip_tags($_POST["phone01"]));
@$tel02 = htmlspecialchars(strip_tags($_POST["phone02"]));
@$tel03 = htmlspecialchars(strip_tags($_POST["phone03"]));

$email = mb_convert_kana($email, "a");
$tel01 = mb_convert_kana($tel01, "a");
$tel02 = mb_convert_kana($tel02, "a");
$tel03 = mb_convert_kana($tel03, "a");

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

$_SESSION["input_inquiryType"] = $inquiryType;
$_SESSION["input_inquiryBody"] = $inquiryBody;
$_SESSION["input_name01"] = $name01;
$_SESSION["input_name02"] = $name02;
$_SESSION["input_kana01"] = $kana01;
$_SESSION["input_kana02"] = $kana02;
$_SESSION["input_company"] = $company;
$_SESSION["input_department"] = $department;
$_SESSION["input_position"] = $position;
$_SESSION["input_email"] = $email;
$_SESSION["input_address"] = $address;
$_SESSION["input_tel01"] = $tel01;
$_SESSION["input_tel02"] = $tel02;
$_SESSION["input_tel03"] = $tel03;

if(!empty($err)){
	$_SESSION["err"] = $err;
	header("Location: index.php");
	exit();
}

$inquiryBodyView = str_replace("\r\n", "<br />", $inquiryBody);

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
<form action="thanks.php" method="post" id="inquiryForm">
<table class="contact">
<tr>
<th class="colFirst">&#9632;お問い合わせ項目を<br />
1つ選択してください。<em>※</em></th>
<td><?php echo $inquiryType; ?></td>
</tr>

<tr>
<th>&#9632;お問い合わせの内容を<br />
ご記入ください。<em>※</em></th>
<td><?php echo $inquiryBody; ?></td>
</tr>

<tr>
<th>&#9632;名前<em>※</em></th>
<td><?php echo $name01 . ' ' . $name02; ?></td>
</tr>

<tr>
<th>&#9632;ふりがな</th>
<td><?php echo $kana01 . ' ' . $kana02; ?></td>
</tr>

<tr>
<th>&#9632;会社名<span>（もしくは学校名など）</span><em>※</em></th>
<td><?php echo $company; ?></td>
</tr>

<tr>
<th>&#9632;部署名</th>
<td><?php echo $department; ?></td>
</tr>

<tr>
<th>&#9632;役職名</th>
<td><?php echo $position; ?></td>
</tr>

<tr>
<th>&#9632;メールアドレス<em>※</em></th>
<td><?php echo $email; ?></td>
</tr>

<tr>
<th>&#9632;勤務先所在地（住所）<em>※</em></th>
<td><?php echo $address; ?></td>
</tr>

<tr>
<th>&#9632;電話番号<em>※</em></th>
<td>
<ul class="phoneList">
<li class="phoneFirst"><?php echo $tel01; ?></li>
<li><?php echo $tel02; ?></li>
<li><?php echo $tel03; ?></li>
</ul>
</td>
</tr>
</table>

<p class="confirm"><a href="javascript:history.go(-1)"><img src="images/btn_back.gif" alt="戻る" class="back" /></a><input type="image" src="images/btn_confirm.gif" alt="確認" title="確認" name="confirm" id="confirm" onclick="formSubmit('inquiryForm');" /></p>
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