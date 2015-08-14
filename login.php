<?php
session_start();
$_SESSION['loginHttpReferer'] = $_SERVER["HTTP_REFERER"];
include_once("php/components/shared/header.php");
include_once("php/components/content/login.php");
include_once("php/components/shared/footer.php");