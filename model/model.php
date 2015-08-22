<?php
/* Model controls all interactions with the database */
require_once 'db_connect.php'; // databse connector goes here
/* Defining operation functions 
 * Used to perform functions of the web app*/
require_once 'validate.php';

define("INVALID_USER", 0);

// returns user id if found else return 0
function login($username, $password)
{

    if (validate_login($username, $password) == True) {

        $sql = "SELECT username, pword, user.user_id, signup_tmstmp
			FROM user JOIN pword on user.user_id=pword.user_id 
			WHERE username='" . $username . "';";

        $results = query($sql);

        if (!empty($results)) {
            if ($results[0]['username'] == $username) {

                // encode password
                $password = md5($password . $results[0]['signup_tmstmp']);

                if ($results[0]['pword'] == $password) {
                    return $results[0]['user_id'];
                }
            }
        }

    }

    // Default return if all of above checks fail
    return INVALID_USER;

}

// Returns True if user is a admin user
function is_admin($user_id)
{
    // id of 0 and below indicates user is not authenticated
    if ($user_id <= INVALID_USER) {
        return false;
    }

    // query db for user code
    $sql = "SELECT * FROM user 
    			RIGHT JOIN user_typ 
    			ON user.user_typ_cd=user_typ.user_typ_cd 
    			WHERE user_id='" . $user_id . "';";

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
function is_professional($user_id)
{
    if ($user_id <= INVALID_USER) {
        return false;
    }
    // query db for user code
    $sql = "SELECT user_typ FROM user
    		RIGHT JOIN user_typ
    		ON user.user_typ_cd=user_typ.user_typ_cd
    		WHERE user.user_id='" . $user_id . "';";

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

function get_bids()
{
    query();
}

function bid($details)
{

    if ($details['bid_amnt'] >= getCurrentBid($details['listing_id'])) {
        $_SESSION["Bid_amount_error"] = "Need to bid less the the previous bid! Please bid again.";
        return false;
    }
    $bidSQL = "INSERT INTO bids ";
    $bidSQL .= "(bid_user_id, listing_id, bid_amnt)";
    $bidSQL .= "VALUES (" . $details['bid_user_id'] . ",'" . $details['listing_id'];
    $bidSQL .= "'," . $details['bid_amnt'] . ")";
    insert($bidSQL);
    return true;
}

function getJobs($term, $state, $category, $minRating, $minBid, $maxBid, $numOfResults, $pageNumber, $sortBy)
{
    $startResult = ($pageNumber - 1) * $numOfResults;

    $arrayQuery = "SELECT *
                   FROM listing";
    $wheres = 0;
    if ($term != '') {
        $arrayQuery .= ($wheres++ == 0) ? " WHERE" : "";
        $arrayQuery .= " shrt_descn LIKE '" . $term . "'";
    }
    if ($category != '') {
        $arrayQuery .= ($wheres++ == 0) ? " WHERE" : "";
        $arrayQuery .= " list_typ_cd=" . $category;
    }


    if(true){
        $arrayQuery.= " ORDER BY listing_id DESC";
    }

//				   LIMIT " . $numOfResults . " OFFSET " . $startResult;

    return query($arrayQuery);
}

function getLatestJobListing($numJobs)
{
    $lstid = "SELECT MAX(listing_id) FROM listing";

    $lastid = query($lstid);
    if (!empty($lastid)) {
        $startid = ($lastid[0][0] - $numJobs);

        if ($startid < 1)
            $startid = 1;

        $arrayquery = "SELECT * FROM listing
				   WHERE listing_id <= '" . $lastid[0][0] . "'
				   AND listing_id >= '" . $startid . "'
				   ORDER BY listing_id DESC;";
        return query($arrayquery);
    } else
        return 0;
}

function getJobListingByCategory($categoryId)
{

    $listTypeCdquery = "SELECT listing_id FROM listing
				   WHERE list_typ_cd = '" . $categoryId . "'
				   ORDER BY listing_id DESC;";
    return query($listTypeCdquery);
}

function getListingDetails($listingId)
{
    $listDetail = "SELECT * from listing
				WHERE listing_id = '" . $listingId . "';";
    $result = query($listDetail);
    return $result;

}

function getJobDetails($jobId)
{
    /*returns array containing the job's: shortDescription, longDescription, posterPostCode, currentBid,
     * endsInTimeString, totalBids, posterUsername, posterId*/

    $sql = "SELECT shrt_descn AS shortDescription, lng_descn AS longDescription,
			 max(bid_amnt) AS currentBid, user.postcode AS posterPostCode,list_end_tmstmp AS endsInTimeString, 
			 sum(bid_id) AS totalBids, username AS posterUsername, user_id AS posterId
			FROM user LEFT JOIN listing ON list_user_id=user_id 
			RIGHT JOIN bids 
			ON listing.listing_id=bids.listing_id 
			WHERE listing.listing_id='" . $jobId . "';";

    return query($sql);
}

/* Get a list of the trade options */
function get_trades()
{
    $sql = "SELECT trade_typ_cd, trade_typ FROM trade_typ";
    $trades = query($sql);
    return $trades;
}

/* Get the userid from username */
function get_userID($username)
{
    $sql = "SELECT user_id FROM user WHERE username = '" . $username . "'";
    $userid = query_single($sql);
    return $userid;
}

function get_userName($userId)
{
    $sql = "SELECT username FROM user WHERE user_id = '" . $userId . "'";
    $userid = query($sql);
    return $userid;
}

/* Get a user's professional feedback rating */
function getProFeedback($userID)
{
    $sql = "SELECT AVG(IFNULL(rating,0)) FROM user ";
    $sql .= "LEFT JOIN feedback ON user.user_id = feedback.pro_user_id ";
    $sql .= "WHERE user.user_id= '" . $userID . "' GROUP BY user.user_id";
    $fb = query_single($sql);
    return $fb;
}

/* Get a user's listing feedback rating */
function getFeedback($userID)
{
    $sql = "SELECT AVG(IFNULL(rating,0)) FROM user ";
    $sql .= "LEFT JOIN feedback ON user.user_id = feedback.list_user_id ";
    $sql .= "WHERE user.user_id= '" . $userID . "' GROUP BY user.user_id";
    $fb = query_single($sql);
    return $fb;
}

/* Get the number of auctions a user has posted */
function sumPostedAuctions($userID)
{
    $sql = "SELECT COUNT(*) AS cnt FROM listing ";
    $sql .= "WHERE list_user_id= '" . $userID . "' GROUP BY list_user_id";
    $count = query_single($sql);
    if ($count) {
        return $count;
    } else {
        return 0;
    }
}

/* Get the number of bids a user has made */
function getBids($userID)
{
    $sql = "SELECT COUNT(*) AS cnt FROM bids ";
    $sql .= "WHERE bid_user_id= '" . $userID . "' GROUP BY bid_user_id";
    $count = query_single($sql);
    if ($count) {
        return $count;
    } else {
        return 0;
    }
}

/* Get a professional's trades */
function getProTrades($userID)
{
    $sql = "SELECT typ.trade_typ FROM trade_typ_lnk AS lnk INNER JOIN trade_typ AS typ ";
    $sql .= "ON lnk.trade_typ_cd = typ.trade_typ_cd WHERE lnk.user_id ='" . $userID . "'";
    $result = query($sql);
    if ($result)
        return $result;
    else
        return 0;
}

/* Get the listings that a user has created */
function getUserListings($userID)
{
    $sql = "SELECT * FROM listing WHERE list_user_id = '" . $userID . "'";
    $result = query($sql);
    if ($result)
        return $result;
    else
        return 0;
}

/*  Get the listings that a user has bid on */
function getUserBidListings($userID)
{
    $sql = "SELECT b.listing_id, l.shrt_descn, u.username,MIN(bid_amnt) AS mymaxbid, mx.maxbid ";
    $sql .= "FROM bids AS b INNER JOIN listing AS l ON b.listing_id = l.listing_id ";
    $sql .= "INNER JOIN user AS u ON l.list_user_id = u.user_id ";
    $sql .= "INNER JOIN (SELECT listing_id, MIN(bid_amnt) AS maxbid FROM bids GROUP BY 1) mx ";
    $sql .= "ON b.listing_id = mx.listing_id WHERE bid_user_id = '" . $userID . "' ";
    $sql .= "GROUP BY b.listing_id,l.shrt_descn,u.username,mx.maxbid";
    $result = query($sql);
    if ($result)
        return $result;
    else
        return 0;
}

/* Get highest bid and bidder */
function getHighBid($listingId)
{
    $sql = "SELECT b.listing_id, u.username, mn.minbid FROM bids AS b INNER JOIN ( ";
    $sql .= "SELECT listing_id, MIN(bid_amnt) AS minbid from bids GROUP BY listing_id) AS mn ";
    $sql .= "ON b.listing_id = mn.listing_id AND mn.minbid = b.bid_amnt";
    $sql .= "INNER JOIN user AS u ON b.bid_user_id = u.user_id";
    $sql .= "INNER JOIN listing l ON l.listing_id = b.listing_id";
    $sql .= "WHERE b.listing_id = '" . $listingId . "'";
    $result = query_single($sql);
    if ($result)
        return $result;
    else
        return 0;
}

/* get all auctions for admin */
function getAdminListings()
{
    $sql = "SELECT l.listing_id, l.shrt_descn, u.username, coalesce(cnt, 0) AS cnt, coalesce(bd.mnbid, l.strt_bid) AS crnt, l.visible ";
    $sql .= "FROM listing l INNER JOIN user AS u ON l.list_user_id = u.user_id ";
    $sql .= "LEFT JOIN (SELECT listing_id, COUNT(*) cnt, MIN(bid_amnt) mnbid FROM bids GROUP by listing_id) bd ";
    $sql .= "ON l.listing_id = bd.listing_id ";
    $result = query($sql);
    if ($result)
        return $result;
    else
        return 0;
}

/* get user details for admin */
function getAdminUsers()
{
    $sql = "SELECT u.user_id, username, CONCAT(first_name, ' ', last_name) AS nm, email, date_format(signup_tmstmp,'%d/%m/%y') AS dt, user_typ ";
    $sql .= "FROM user AS u INNER JOIN user_typ AS typ ON u.user_typ_cd = typ.user_typ_cd";
    $result = query($sql);
    if ($result)
        return $result;
    else
        return 0;
}


function getCurrentBid($listingId)
{
    $bidQry = "SELECT bids.bid_amnt AS bid
				FROM bids
				where bids.listing_id ='" . $listingId . "'
				ORDER BY bid_id DESC;";
    $result = query($bidQry);
    if (empty($result))
        return 0;
    else
        return $result;
}

function getTotalBids($listingId)
{

    $bidQry = "SELECT COUNT(bids.bid_id)
				FROM bids
				where bids.listing_id ='" . $listingId . "';";
    $result = query($bidQry);

    return $result;
}

/*
	Takes registration details and validates
	If valid attempts to write to database and returns true
	If not valid or insert fails returns false
*/
function register($details)
{
    $_SESSION["reg_array_of_errs"] = '';
    $_SESSION["reg_num_of_errs"] = 0;
    $valid = validate_registration($details);
    if ($valid) {
        if (!(prevent_duplicate_username($details)))
            $valid = false;
    }

    if ($valid) {
        // form query
        $userSql = "INSERT INTO user ";
        $userSql .= "(username, first_name, last_name, address1, address2, city, state";
        $userSql .= ", postcode, email, signup_tmstmp, user_typ_cd) ";
        $userSql .= "VALUES ('" . $details['username'] . "','" . $details['first'] . "',";
        $userSql .= "'" . $details['last'] . "','" . $details['address1'] . "',";
        $userSql .= "'" . $details['address2'] . "','" . $details['city'] . "',";
        $userSql .= "'" . $details['state'] . "','" . $details['postcode'] . "',";
        $userSql .= "'" . $details['email'] . "','" . $details['signup_tmstmp'] . "',";
        $userSql .= "'" . $details['user_typ_cd'] . "')";

        $success = insert($userSql);

        $idSql = "SELECT user_id FROM user WHERE username = '" . $details['username'] . "';";

        $id = query($idSql);

        $pwordSql = "INSERT INTO pword ";
        $pwordSql .= "(user_id, pword) ";
        $pwordSql .= "VALUES ('" . $id[0]["user_id"] . "','" . $details['pword'] . "')";
        $success = insert($pwordSql);

        return true;
    } else {

        return false;
    }

}

function prevent_duplicate_username($details)
{
    $query_string = "SELECT user.username
						FROM user
						WHERE username =";
    $query_string .= "'" . $details['username'] . "';";
    $result = query($query_string);
    if ($result) {
        $_SESSION["reg_array_of_errs"] = $_SESSION["reg_array_of_errs"] . $_SESSION["reg_num_of_errs"] + 1 . ") Username already exists in Database. Please chose another";
        $_SESSION["reg_num_of_errs"] = $_SESSION["reg_num_of_errs"] + 1;
        return false;
    }
    return true;
}

function addUserProfession($username, $profnumber)
{
    $userID = get_userID($username);
    $query = "INSERT INTO trade_typ_lnk (user_id, trade_typ_cd) ";
    $query .= "VALUES ('" . $userID . "','" . $profnumber . "')";
    insert($query);
}

function add_auction($details)
{
    $auctionSQL = "INSERT INTO listing ";
    $auctionSQL .= "(list_user_id, list_strt_tmstmp, list_end_tmstmp";
    $auctionSQL .= ", list_typ_cd, list_addr_id, shrt_descn, lng_descn";
    $auctionSQL .= ", job_len, strt_bid, photo_url, visible) ";
    $auctionSQL .= "VALUES (" . $details['userID'] . ",'" . $details['start'];
    $auctionSQL .= "', DATE_ADD('" . $details['start'] . "', INTERVAL ";
    $auctionSQL .= $details['auctionLength'] . " DAY), " . $details['auctionType'];
    $auctionSQL .= ", NULL, '" . $details['summary'] . "','" . $details['description'];
    $auctionSQL .= "'," . $details['joblength'] . "," . $details['startbid'];
    $auctionSQL .= ", NULL, TRUE)";

    if (insert($auctionSQL)) {
        return true;
    } else {
        return false;
    }
}

function activate_auction($listingId)
{
    $sql = "UPDATE listing SET visible = 1 WHERE listing_id = " . $listingId;
    update($sql);
}

function deactivate_auction($listingId)
{
    $sql = "UPDATE listing SET visible = 0 WHERE listing_id = " . $listingId;
    update($sql);
}

function remove_auction()
{
    delete();
}

/*  Admin only function to delete user*/
function remove_user($userID)
{
    $bidsRemove = "DELETE FROM bids WHERE bid_id = " . $userID;
    $tradesRemove = "DELETE FROM trade_typ_lnk WHERE user_id = " . $userID;
    $pwordRemove = "DELETE FROM pword WHERE user_id = " . $userID;
    $userRemove = "DELETE FROM user WHERE user_id = " . $userID;

    $delete = delete($bidsRemove);
    $delete = delete($tradesRemove);
    $delete = delete($pwordRemove);
    $delete = delete($userRemove);
}

function update_password($userID, $newPassword)
{
    $getTimestampSql = "SELECT signup_tmstmp
						FROM user
						WHERE user_id='" . $userID . "';";

    $timestamp = query($getTimestampSql)[0]['signup_tmstmp'];
    $newPassword = md5($newPassword . $timestamp);

    $updatePasswordSql = "UPDATE pword
	 					  SET pword='" . $newPassword . "'
						  WHERE user_id='" . $userID . "';";

    query($updatePasswordSql);

}

/* Defining basic functions to interact with database 
 * To be used with Database connector*/
function query($query_string)
{
    try {
        $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
        $stmt = $conn->prepare($query_string);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $stmt = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }

    return $results;
}

function query_single($query_string)
{
    try {
        $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
        $stmt = $conn->prepare($query_string);
        $stmt->execute();
        $results = $stmt->fetchColumn();
        $stmt = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }

    return $results;
}

function update($query_string)
{
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
    $stmt = $conn->prepare($query_string);
    $stmt->execute();
    if ($stmt->errorCode() == 0) {
        return true;
    } else {
        return false;
    }
}

function delete($query_string)
{
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
    $stmt = $conn->prepare($query_string);
    $stmt->execute();
    if ($stmt->errorCode() == 0) {
        return true;
    } else {
        return false;
    }
}

function insert($query_string)
{
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
    $stmt = $conn->prepare($query_string);
    $stmt->execute();
    if ($stmt->errorCode() == 0) {
        return true;
    } else {
        echo '<script language="javascript">alert("error code:' . print_r($stmt->errorInfo()) . '")</script>';
        return false;
    }

}

?>
