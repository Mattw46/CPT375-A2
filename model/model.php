<?php 
/* Model controlls all interactions with the database */
require_once 'db_connect.php'; // databse connector goes here
/* Defining operation functions 
 * Used to perform functions of the web app*/
require_once 'validate.php';

define("INVALID_USER", 100);

// returns user id if found else return 0
function login($username, $password) {
	if (validate_login($username, $password) == True) {
		// query database
		$sql = "SELECT * FROM USER 
		WHERE username = $username;"; // add join to pword once populated
		
		// return $user_id if sql query successful
		return 1;
	}
	else {
		return INVALID_USER;
	}
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

/* Defining basic functions to interact with database 
 * To be used with Database connector*/
function query($query_string) {
	// returns query result
}

function update($query_string) {
	return true;
}

function delete($query_string) {
	return true;
}

function insert($query_string) {
	return true;
}

?>
