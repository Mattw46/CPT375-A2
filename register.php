<?php
session_start();
if (isset($_SESSION['authenticated'])) {
    header("location: ./");
} else {
    $pageTitle = "CPT375 A2 : Register";
    include_once("php/components/shared/header.php");
    include_once("php/components/content/register.php");
    include_once("php/components/shared/footer.php");
} 