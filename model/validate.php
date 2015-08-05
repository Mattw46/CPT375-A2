<?php 
/**
 * validates form inputs
 * Should be used before adding inputs into the database
 */

function validate_login($username, $password) {
	if ($username == "" || $password = "") {
		return false;
	}
	else {
		return true;
	}
}

function validate_registration() {
	
}

function validate_auction() {
	
}

?>