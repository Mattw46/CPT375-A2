<?php
   session_start();
   require_once '../../model/model.php';
   if(!isset($_SESSION['authenticated']))
      header("location: ../../index.php");
   if(!is_admin(get_userID($_SESSION['username'])))
      header("location: ../../index.php");
   $deleteID = $_GET['userid'];
   
   remove_user($deleteID);
   header("location: ../../admin.php");
?>

<html>
	<header>
		<title></title>
	</header>
	<body>
	</body>
</html>
