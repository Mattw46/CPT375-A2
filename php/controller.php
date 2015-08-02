<?php 
	/* Version 0.1 controller
	 * Dispatches requestes to correct page after checking
	 * if user is authenticated. */

	session_start();
	
	require_once 'model.php';
	
	echo "Controller<br />";
	
	if (isset($_POST)) {
		$sender = strrchr($_SERVER['HTTP_REFERER'], '/');
		//echo $sender."<br />";
		
		if ($sender == "/login.php") {
			//echo "will now authenticate <br />";
			$username = $_POST["username"];
			$password = $_POST["password"];
			if (login($username, $password)) {
				$_SESSION["authenticated"] = True;
				header("location: main.php");
			}
			else {
				//echo "Not Authorised<br/>";
				header("location: login.php");
			}
		}
		else if ($sender == "/main.php") {
			if ($_POST["action"] == "logout") {
				//echo "logout<br />";
				$_SESSION["authenticated"] = False;
				header("location: ../index.php");
			}
		}
		else {
			echo "another request!<br />";
		}
		
	}

?>