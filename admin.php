<?php
/* loading admin page components */
include_once('./model/model.php');
session_start();
$pageTitle = "CPT375 A2 : Admin";
if (is_admin($_SESSION['authenticated'])) {
include_once("php/components/shared/header.php");
include_once("php/components/content/admin.php");
include_once("php/components/shared/footer.php");
} else {
    header("location: ./");
}