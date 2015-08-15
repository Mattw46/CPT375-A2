<?php
session_start();
$keywords = "TODO";
$pageTitle = "CPT375 A2 : Search" . $keywords;
include_once("php/components/shared/header.php");
include_once("php/components/shared/searchform.php");
include_once("php/components/content/searchrefine.php");
include_once("php/components/content/searchresultscontent.php");
include_once("php/components/shared/footer.php");