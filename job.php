<?php
//$jobid = getJobById(filter_var($_GET['job'],FILTER_SANITIZE_NUMBER_INT));
session_start();
if (isset($_SESSION['authenticated'])) {
	$pageTitle = "CPT375 A2 : jobShortDescription";
	include_once("php/components/shared/header.php");
	include_once("php/components/content/job.php");
	include_once("php/components/shared/footer.php");
} else {
    header("location: ./login.php");
}