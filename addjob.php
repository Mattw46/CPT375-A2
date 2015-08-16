<?php
session_start();
if (isset($_SESSION['authenticated'])) {
    $pageTitle = "CPT375 A2 : Add Job";
    include_once("php/components/shared/header.php");
    include_once("php/components/content/addjob.php");
    include_once("php/components/shared/footer.php");
} else {
    header("location: ./login.php");
}