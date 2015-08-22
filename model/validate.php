<?php 
/**
 * validates form inputs
 * Should be used before adding inputs into the database
 */


function validate_login($username, $password) {
	$_SESSION["reg_array_of_errs"] = '';
	$_SESSION["reg_num_of_errs"] = 0;
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
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"] + 1 .") Invalid username - allowed letter A-Z or a-z and must be greater the 3 letters total </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
		return false;
	}
}

function valid_password($password) {
	$regex = "/^[a-zA-Z0-9_-]{6,18}$/";
	if ($password != "" && preg_match($regex, $password) == 1) {
		return true;
	}
	else {
	$_SESSION["reg_array_of_errs"] .= ++$_SESSION["reg_num_of_errs"] .") Invalid password - allowed letter A-Z or a-z, numbers 1 -9 and greater the 6 and less than 18 letters total </br>";
	return false;
	}
}

// Checks values for a new registration and returns true if validated
function validate_registration($details) {
	
	if (valid_username($details["username"]) && valid_name($details["first"]) 
			&& valid_name($details["last"]) && valid_email($details["email"])
			&& valid_address($details)) {
		//echo "all ok";
		return true;
	}
	else {

		return false;
	}
}

// Checks values for a new auction and returns true if validated
function validate_auction($job) {
	$valid = true;
	if(0 >= strlen($job['summary'])) {
		$valid = false;
		$_SESSION["reg_array_of_errs"] .= ++$_SESSION["reg_num_of_errs"] .
			") Invalid job summary - must be 1 or more characters. </br>";
	}
	if(0 >= strlen($job['description'])) {
		$valid = false;
		$_SESSION["reg_array_of_errs"] .= ++$_SESSION["reg_num_of_errs"] .
			") Invalid description - must be 1 or more characters. </br>";
	}
	if(1 > $job['jobtype'] || 55 < $job['jobtype']) {
		$valid = false;
		$_SESSION["reg_array_of_errs"] .= ++$_SESSION["reg_num_of_errs"] .
			") Invalid jobtype - must be 1 to 55 character(s). </br>";
	}
	if(0 <= $job['startbid']) {
		$valid = false;
		$_SESSION["reg_array_of_errs"] .= ++$_SESSION["reg_num_of_errs"] .
			") Invalid startbid - must be 1 or more. </br>";
	}
	if(1 > $job['joblength'] || 7 < $job['joblength']) {
		$valid = false;
		$_SESSION["reg_array_of_errs"] .= ++$_SESSION["reg_num_of_errs"] .
			") Invalid joblength - must be 1 to 7. </br>";
	}
	return $valid;
}

function valid_name($name) {
	$regex = "/^[A-Za-z-]{3,}$/";
	$result = preg_match($regex, $name);
	if(!$result)
	{
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"] + 1 .") Invalid first/last Name - allowed letter A-Z or a-z and greater the 3 letters total </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
	}
	return $result;
}

function valid_email($email) {
	$regex = "/^[a-z0-9_-]{4,}@{1}[a-z-]{3,}\.{1}([a-z\.]{3,})?[a-z]{3}(.[a-z]{2})?$/";
	$result = preg_match($regex, $email);
	if(!$result)
	{
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"] + 1 .") Not a valid e-mail address </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
	}
	return $result;
}

function valid_address($details) {
	$regex_address = "/^[A-Za-z0-9 -]{9,}$/";
	$regex_postcode = "/^[1-9]{1}[0-9]{3}$/";
	$regex_state = "/^[A-Za-z\.]{2,}$/";
	
	$address1 = preg_match($regex_address, $details["address1"]);
	if(!$address1)
	{
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"]  + 1 .") Address can only have letters A-Z, a-z and numbers 0-9 with total letters and numbers greater than 9 </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
	}
	if ($details["address2"] == "" || preg_match($regex_address, $details["address2"])) {
		$address2 = true;
	}
	else {
		$address2 = false;
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] .  $_SESSION["reg_num_of_errs"] + 1 .") Address2 can only have letters A-Z, a-z and numbers 0-9 with total letters and numbers greater than 9 </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
	}
	
	$postcode = preg_match($regex_postcode, $details["postcode"]);
	if(!$postcode)
	{
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"] + 1 .") Invalid postcode number </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
	}
	$state = preg_match($regex_state, $details["state"]);
	if(!$state)
	{
		$_SESSION["reg_array_of_errs"] = $_SESSION["reg_num_of_errs"] + 1 .") Invalid state </br>";
		$_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
	}
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