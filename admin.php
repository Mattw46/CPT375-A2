<?php
session_start();
//TODO: add logic to check if admin
if (true) {
include_once("php/components/shared/header.php");
include_once("php/components/content/admin.php");
include_once("php/components/shared/footer.php");
} else {
    header("location: ./");
}