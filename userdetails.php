<?php
session_start();

if (isset($_GET['userid'])) {
    $useridDetailsSought = filter_var($_GET['userid'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pageTitle = "CPT375 A2 : USERNAME";
    include_once("php/components/shared/header.php");
    include_once("php/components/content/userdetails.php");
    if (isset($_SESSION["authenticated"])) {
        if ($_SESSION["authenticated"] == $useridDetailsSought) {
            include_once("php/components/content/useradmin.php");
        }
    }

    include_once("php/components/shared/footer.php");
} else {
    header("location: ./");
}