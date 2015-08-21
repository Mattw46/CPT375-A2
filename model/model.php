<?php
/* Model controls all interactions with the database */
require_once 'db_connect.php'; // databse connector goes here
/* Defining operation functions 
 * Used to perform functions of the web app*/
require_once 'validate.php';

define("INVALID_USER", 0);

// returns user id if found else return 0
function login($username, $password) {

	if (validate_login($username, $password) == True) {
		
		$sql = "SELECT username, pword, user.user_id, signup_tmstmp 
			FROM user JOIN pword on user.user_id=pword.user_id 
			WHERE username='".$username."';";
		
		$results = query($sql);

		if (!empty($results)) {
			if ($results[0]['username'] == $username) {
			
				// encode password
				$password = md5($password . $results[0]['signup_tmstmp']);

				if ($results[0]['pword'] ==  $password) {
					return $results[0]['user_id']; 
				}
			}
		}
		
	}
	
	// Default return if all of above checks fail
	return INVALID_USER;
	
}

// Returns True if user is a admin user
function is_admin($user_id) {
	// id of 0 and below indicates user is not authenticated
	if ($user_id <= INVALID_USER) {
		return false;
	}
	
	// query db for user code
    $sql = "SELECT * FROM user 
    			RIGHT JOIN user_typ 
    			ON user.user_typ_cd=user_typ.user_typ_cd 
    			WHERE user_id='".$user_id."';";
    
    // Query db and return True if user_typ is Admin
    $result = query($sql);

    if (!empty($result)) {
    	if ($result[0]["user_typ"] == "Admin") {
    		return true;
    	}
    }
    // Default value
    return false;
}

// Returns True if user is a professional
function is_professional($user_id) {
	if ($user_id <= INVALID_USER) {
		return false;
	}
	// query db for user code
    $sql = "SELECT user_typ FROM user
    		RIGHT JOIN user_typ
    		ON user.user_typ_cd=user_typ.user_typ_cd
    		WHERE user.user_id='".$user_id."';";

    // Query db and return True if user_typ is Professional
    $result = query($sql);
    
    if (!empty($result)) {
    	if ($result[0]["user_typ"] == "Professional") {
    		return true;
    	}
    }
    // Default value
    return false;
}

function get_bids() {
	query();
}

function bid() {
	insert();
}

function getJobs($term, $state, $category, $minRating, $minBid, $maxBid, $numOfResults, $pageNumber, $sortBy) {
	// returns an arrau of jobs jobID, shortDescription, currentBid, endsInTime, totalBids
	// all parameters should be allowed to be omitted.
	//defaults: numOfResults=12, sortBy=ending soonest
}
function getLatestetJobListing($numJobs){
	$lstid = "SELECT MAX(listing_id) FROM listing";

	$lastid = query($lstid);
	if (!empty($lastid)) {
		$startid = ($lastid[0][0] - $numJobs);

		if ($startid < 1)
			$startid = 1;

		$arrayquery = "SELECT * FROM listing
				   WHERE listing_id <= '". $lastid[0][0]."'
				   AND listing_id >= '".$startid ."'
				   ORDER BY listing_id DESC;";

		
		return query($arrayquery);
		
	}
	else
		return 0;
}

function getJobDetails($jobId) {
	/*returns array containing the job's: shortDescription, longDescription, posterPostCode, currentBid, 
	 * endsInTimeString, totalBids, posterUsername, posterId*/
}

function get_trades(){
   $sql = "SELECT trade_typ_cd, trade_typ FROM trade_typ";
   $trades = query($sql);
   return $trades;
}

function get_userID($username){
   $sql = "SELECT user_id FROM user WHERE username = '". $username."'";
   $userid = query_single($sql);
   return $userid;
}

/*
	Takes registration details and validates
	If valid attempts to write to database and returns true
	If not valid or insert fails returns false
*/
function register($details) {
	$_SESSION["reg_array_of_errs"] = '';
	$_SESSION["reg_num_of_errs"] = 0;
	$valid = validate_registration($details);
	if($valid)
	{
		if(!(prevent_duplicate_username($details)))
			$valid = false;
	}
	
    if ($valid) {
		// form query
		$userSql =  "INSERT INTO user ";
		$userSql .= "(username, first_name, last_name, address1, address2, city, state";
		$userSql .= ", postcode, email, signup_tmstmp, user_typ_cd) ";
		$userSql .= "VALUES ('" . $details['username'] . "','" . $details['first'] . "',";
		$userSql .= "'" . $details['last'] . "','" . $details['address1'] . "',";
		$userSql .= "'" . $details['address2'] . "','" . $details['city'] . "',";
		$userSql .= "'" . $details['state'] . "','" . $details['postcode'] . "',";
		$userSql .= "'" . $details['email'] . "','" . $details['signup_tmstmp'] . "',";
		$userSql .= "'" . $details['user_typ_cd'] . "')";

        $success = insert($userSql);

        $idSql =  "SELECT user_id FROM user WHERE username = '" . $details['username'] . "';";

		$id = query($idSql);
	
        $pwordSql = "INSERT INTO pword ";
		$pwordSql .= "(user_id, pword) ";
		$pwordSql .= "VALUES ('" . $id[0]["user_id"] . "','" . $details['pword']. "')";
        $success = insert($pwordSql);

        return true;
	}
	else {
			
		return false;
	}

}
function prevent_duplicate_username($details) {
	$query_string = "SELECT user.username
						FROM user
						WHERE username =";
	$query_string .= "'" . $details['username'] ."';";
	$result = query($query_string); 
	if ($result){
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"] + 1 .") Username already exists in Database. Please chose another";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
		return false;
	}
	return true;
}

function add_auction($details) {
   $auctionSQL  = "INSERT INTO listing ";
   $auctionSQL .= "(list_user_id, list_strt_tmstmp, list_end_tmstmp";
   $auctionSQL .= ", list_typ_cd, list_addr_id, shrt_descn, lng_descn";
   $auctionSQL .= ", job_len, strt_bid, photo_url, visible) ";
   $auctionSQL .= "VALUES (" . $details['userID'] . ",'" . $details['start'];
   $auctionSQL .= "', DATE_ADD('" . $details['start'] . "', INTERVAL ";
   $auctionSQL .= $details['auctionLength'] . " DAY), " . $details['auctionType'];
   $auctionSQL .= ", NULL, '" . $details['summary'] . "','" . $details['description'];
   $auctionSQL .= "'," . $details['joblength'] . "," . $details['startbid'];
   $auctionSQL .= ", NULL, TRUE)";
	
   if(insert($auctionSQL)){
         return true;
   }else{
      return false;
   }
}

function activate_auction() {
	update();
}

function deactivate_auction() {
	update();
}

function remove_auction() {
	delete();
}

function remove_user() {
	delete();
}

function update_password($userID, $newPassword) {
	$getTimestampSql = "SELECT signup_tmstmp
						FROM user
						WHERE user_id='".$userID."';";

	$timestamp = query($getTimestampSql)[0]['signup_tmstmp'];
	$newPassword = md5($newPassword . $timestamp);

	$updatePasswordSql = "UPDATE pword
	 					  SET pword='".$newPassword."'
						  WHERE user_id='".$userID."';";

	query($updatePasswordSql);

}

/* Defining basic functions to interact with database 
 * To be used with Database connector*/
function query($query_string) {
	try {
		$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
		$stmt = $conn->prepare($query_string);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$stmt = null;
	}
	catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
		return null;
	}

    return $results;
}

function query_single($query_string) {
	try {
		$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
		$stmt = $conn->prepare($query_string);
		$stmt->execute();
		$results = $stmt->fetchColumn();
		$stmt = null;
	}
	catch (PDOException $e) {
		echo "Error: ".$e->getMessage();
		return null;
	}

    return $results;
}

function update($query_string) {
	$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
	$stmt = $conn->prepare($query_string);
	$stmt->execute();
	if ($stmt->errorCode() == 0) {
		return true;
	}
	else {
		return false;
	}
}

function delete($query_string) {
$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
	$stmt = $conn->prepare($query_string);
	$stmt->execute();
	if ($stmt->errorCode() == 0) {
		return true;
	}
	else {
		return false;
	}
}

function insert($query_string) {
	$conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);
	$stmt = $conn->prepare($query_string);
	$stmt->execute();
	if ($stmt->errorCode() == 0) {
		return true;
	}
	else {  echo'<script language="javascript">alert("error code:'. print_r($stmt->errorInfo()) .'")</script>';
		return false;
	}

}

?>
