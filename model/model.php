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
    $sql = "select user_id, username, user_typ.user_typ_cd, user_typ
			from user join user_typ on user.user_typ_cd=user_typ.user_typ_cd 
			where user_id = 1;";

    // Query db and return True if user_typ is Admin
}

// Returns True if user is a professional
function is_professional() {
	if ($user_id <= INVALID_USER) {
		return false;
	}
	// query db for user code
    $sql = "select user_id, username, user_typ.user_typ_cd, user_typ
			from user join user_typ on user.user_typ_cd=user_typ.user_typ_cd 
			where user_id = 1;";

    // Query db and return True if user_typ is Admin
}

function get_bids() {
	query();
}

function bid() {
	insert();
}

/*
	Takes registration details and validates
	If valid attempts to write to database and returns true
	If not valid or insert fails returns false
*/
function register($details) {
	$valid = validate_registration($details);

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

        $idSql =  "SELECT user_id FROM user WHERE username = " . $details['username'];
		$idSql .= " AND signup_tmstmp = " . $details['signup_tmstmp'];

        $userId = query($idSql);

        $pwordSql = "INSERT INTO pword ";
		$pwordSql .= "(user_id, pword) ";
		$pwordSql .= "VALUES ('" . $userID . "','" . $details['pword'] . "')";

        $success = insert($pwordSql);

        return success;
	}
	else {
		return false;
	}

}

function add_auction() {
	insert();
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
	else {
		return false;
	}

}

?>
