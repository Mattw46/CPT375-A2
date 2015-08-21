<?php
session_start();

if (isset($_GET['user'])) {
    $useridDetailsSought = filter_var($_GET['user'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pageTitle = $useridDetailsSought . " User Details";
    include_once("php/components/shared/header.php");
    include_once("php/components/content/userdetails.php");
    if (isset($_SESSION["username"])) {
        if ($_SESSION["username"] == $useridDetailsSought) {
            include_once("php/components/content/useradmin.php");
        }
    }

    include_once("php/components/shared/footer.php");
} else {
    header("location: ./");
}

