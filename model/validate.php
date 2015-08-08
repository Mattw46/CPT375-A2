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

function validate_registration() {
	
}

function validate_auction() {
	
}

// resource for common regex: http://code.tutsplus.com/tutorials/8-regular-expressions-you-should-know--net-6149

?>