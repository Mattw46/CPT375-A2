<?php 
/* Model controlls all interactions with the database */
//require_once(); // databse connector goes here
/* Defining operation functions 
 * Used to perform functions of the web app*/
require_once 'validate.php';

// returns user id if found else return 0
function login($username, $password) {
	if (validate_login($username, $password) == True) {
		// query database
		return 1;
	}
	else {
		return 0;
	}
}

function get_bids() {
	query();
}

function bid() {
	insert();
}

function register() {
	insert();
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
	
}

function update($query_string) {
	
}

function delete($query_string) {
	
}

function insert($query_string) {
	
}

?>