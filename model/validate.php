<?php 
/**
 * validates form inputs
 * Should be used before adding inputs into the database
 */

function validate_login($username, $password) {
	
	if (valid_username($username) && valid_password($password)) {
		return True;
	}
	else {
		return False;
	}
}

function valid_username($username) {
	$regex = "/^[a-zA-Z0-9_-]{3,16}$/";
	if ($username != "" && preg_match($regex, $username) == 1) {
		return true;
	}
	else {
		return false;
	}
}

function valid_password($password) {
	$regex = "/^[a-zA-Z0-9_-]{6,18}$/";
	if ($password != "" && preg_match($regex, $password) == 1) {
		return true;
	}
	else {
		return false;
	}
}

// Checks values for a new registration and returns true if validated
function validate_registration($details) {
	if (valid_username($details["username"]) && valid_name($details["first"]) 
			&& valid_name($details["last"]) && valid_email($details["email"])
			&& valid_address($details)) {
			
		return true;
	}
	else {
		return false;
	}
}

// Checks values for a new auction and returns true if validated
function validate_auction() {
	
}

function valid_name($name) {
	$regex = "/^[A-Za-z-]{3,}$/";
	$result = preg_match($regex, $name);
	return $result;
}

function valid_email($email) {
	$regex = "/^[a-z0-9_-]{4,}@{1}[a-z-]{3,}\.{1}([a-z\.]{3,})?[a-z]{3}(.[a-z]{2})?$/";
	$result = preg_match($regex, $email);
	return $result;
}

function valid_address($details) {
	$regex_address = "/^[A-Za-z0-9 -]{9,}$/";
	$regex_postcode = "/^[1-9]{1}[0-9]{3}$/";
	$regex_state = "/^[A-Za-z\.]{2,}$/";
	
	$address1 = preg_match($regex_address, $details["address1"]);
	if ($details["address2"] == "" || preg_match($regex_address, $details["address2"]) {
		$address2 = true;
	}
	else {
		$address2 = false;
	}
	//$address2 = preg_match($regex_address, $details["address2"]);
	$postcode = preg_match($regex_postcode, $details["postcode"]);
	$state = preg_match($regex_state, $details["state"]);
	
	// If all pass return true
	if ($address1 && $address2 && $postcode && $state) {
		return true;
	}
	else {
		return false;
	}
}


// resource for common regex: http://code.tutsplus.com/tutorials/8-regular-expressions-you-should-know--net-6149

?>