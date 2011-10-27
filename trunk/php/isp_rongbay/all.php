<?php
ob_start();
session_start();
unset(@$_SESSION['province']);
header('location:'.$_SERVER['HTTP_REFERER'].'');
?>