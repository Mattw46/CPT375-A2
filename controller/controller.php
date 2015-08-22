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

		if(preg_match("/\/job.php/",$sender))
		{
			$isJobphp = true;
		}
		else 
			$isJobphp = false;

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
				"user_typ_cd" => trim($_POST["userType"]),
				"pword" => md5(trim($_POST["password"]) . $timestamp)
			);

            $result = register($details);
            if($result){
                if($_POST["userType"] == 10)
            	   header("location: ../login.php");
                else {
                   for($i=0;$i<=key(array_slice( $_POST["profession"], -1, 1, TRUE));$i++) {
                      if(isset($_POST["profession"][$i]) && $_POST["profession"][$i] == 1){
                         addUserProfession($_POST["username"], $i);
                      }
                   header("location: ../login.php");
                   }
                }
    	    }else
    		{
    			
    			header("location: ../register.php");
    		}	
		}   


		else if ($sender == "/addjob.php") {
			   $jobDetails = array(
			      "userID" => get_userID($_SESSION["username"]),
			      "start" => date('Y-m-d G:i:s'),
			      "auctionLength" => 7,
			      "auctionType" => $_POST["jobtype"],
			      "summary" => $_POST["summary"],
			      "description" => $_POST["description"],
			      "joblength" => $_POST["joblength"],
			      "startbid" => $_POST["startbid"]
			      );
			   $result = add_auction($jobDetails);
			   if($result){
			   	   $_SESSION["posted_ok_details"] = $jobDetails;
			       header("location: ../job_posted_ok.php");       
			   }else{
			       header("location: ../add_job_error.php");  
			   }	      
		   }
		else if ($isJobphp) {
			$bidDetails = array(
				"bid_user_id" => $_POST["user_id"], 
				"listing_id" => $_POST["listing_id"], 
				"bid_amnt" => $_POST["jobProposedBidSpinner"]
				);
			$result = bid($bidDetails);

			 if($result){
			 	   $_SESSION["bid_ok_details"] = $bidDetails;
			       header("location: ../bid_posted_ok.php");       
			   }else{
			       header("location: ../bid_job_error.php");  
			   }
		}
		   
		}
		else {
			// redirect user back to form and indicate error
		}


?>


