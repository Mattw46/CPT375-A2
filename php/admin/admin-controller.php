<?php
   /* Checks if user is authenticated and if they have admin access*/
   session_start();
   require_once '../../model/model.php';
   if(!isset($_SESSION['authenticated']))
      header("location: ../../index.php");
   if(!is_admin(get_userID($_SESSION['username'])))
      header("location: ../../index.php");
   
   
   if($_GET['action'] == 'delete'){
      $deleteID = $_GET['userid'];
      remove_user($deleteID);
      header("location: ../../admin.php");
   }
   elseif($_GET['action'] == 'suspend'){
      $listingId = $_GET['listing_id'];
      deactivate_auction($listingId);
      header("location: ../../admin.php");
   }
   elseif($_GET['action'] == 'allow'){
      $listingId = $_GET['listing_id'];
      activate_auction($listingId);
      header("location: ../../admin.php");
   }
?>

