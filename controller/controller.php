<?php
	/* Version 0.1 controller
	 * Dispatches requests to correct page after checking
	 * if user is authenticated. */
	session_start();

	require_once '../model/model.php';

echo "Controller<br />";

if (isset($_POST)) {
		$sender = strrchr($_SERVER['HTTP_REFERER'], '/');
		//echo $sender."<br />";

    if ($sender == "/login.php") {
			//echo "will now authenticate <br />";
			$username = $_POST["username"];
			$password = $_POST["password"];
			$id = login($username, $password);

        if ($id > 0) {
			$_SESSION["authenticated"] = $id;
            $_SESSION["username"] = $username;

				if(isset($_SESSION['loginHttpReferer'])) {
					header("location: ..".$_SESSION['loginHttpReferer']);
				} else {
					header("location: ./");
				}
			}
			else {
				//echo "Not Authorised<br/>";
				header("location: ../php/login.php");
			}
		}
		else if ($sender == "/main.php") {
			if ($_POST["action"] == "logout") {
				//echo "logout<br />";
				$_SESSION["authenticated"] = False;
				header("location: ../index.php");
			}
		}
		else if ($sender == "/register.php") {
			// get $_POST values

            //set a timestamp for signup_tmstmp field and pword salting
			$timestamp = date('Y-m-d G:i:s');
			// temporary values for testing
			$details = array(
				"username" => "user",
				"first" => "first",
				"last" => "last",
				"address1" => "1 some street",
				"address2" => "",
				"city" => "Somewhere",
				"state" => "NSW",
				"postcode" => "2000",
				"email" => "user@domain.com",
				"signup_tmstmp" => $timestamp,
				"user_typ_cd" => "10",
				"pword" => md5("Password" . $timestamp)
			);

            $result = register($details);
			// if $result true redirect to a success page
			// else redirect back to register with error
		}
		else {
			// redirect user back to form and indicate error
		}

}
?>


