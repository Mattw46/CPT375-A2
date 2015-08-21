<?php
//$jobid = getJobById(filter_var($_GET['job'],FILTER_SANITIZE_NUMBER_INT));
session_start();
if (isset($_SESSION['authenticated'])) {
	$pageTitle = "CPT375 A2 : add_job_error";
	include_once("php/components/shared/header.php");
	include_once("php/components/content/add_job_error.php");
	include_once("php/components/shared/footer.php");
} else {
    header("location: ./login.php");
}