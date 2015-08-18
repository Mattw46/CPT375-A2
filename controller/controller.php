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
					header("location: ../".$_SESSION['loginHttpReferer']);
				} else {
					header("location: ../");
				}
			}
			else {
				//echo "Not Authorised<br/>";
				header("location: ../login.php");
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
			echo trim($_POST["username"]) . "<br />";
			$details = array(
				"username" => trim($_POST["username"]),
				"first" => trim($_POST["firstName"]),
				"last" => trim($_POST["lastName"]),
				"address1" => trim($_POST["address1"]),
				"address2" => trim($_POST["address2"]),
				"city" => trim($_POST["city"]),
				"state" => trim($_POST["state"]),
				"postcode" => trim($_POST["postCode"]),
				"email" => trim($_POST["email"]),
				"signup_tmstmp" => $timestamp,
				"user_typ_cd" => "1",
				"pword" => md5(trim($_POST["password"]) . $timestamp)
			);

            $result = register($details);
            if($result){
            	header("location: ../login.php");
    		}else
    		{
    			
    			header("location: ../register.php");
    		}

			
		}
		else {
			// redirect user back to form and indicate error
		}

}
?>


