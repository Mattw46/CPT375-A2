<?php require_once './model/model.php'; ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <h2>User details</h2>

        <h3 id="userDetailsUsername"><?php echo $_GET['user']; ?></h3>
        <?php /* If a professional, show their rating */
              if(is_professional(get_userID($_GET['user']))){
                 echo '<p>Professional rating: <span id="userDetailsRating"></span>';
                 echo round(getProFeedback(get_userID($_GET['user'])),1) . ' / 5.0</p>';
                 }
              /* Show a user's listing rating */
              echo '<p>User rating: <span id="userDetailsRating"></span>';
              echo round(getFeedback(get_userID($_GET['user'])),1) . ' / 5.0</p>';
              /* Show the number of auctions listed */
              echo '<p>Number of auctions posted: ';
              echo '<span id="userDetailsAuctionsPostedCount"></span>' . sumPostedAuctions(get_userID($_GET['user'])) . '</p>';
              /* Show the number of bids made */
              echo '<p>Number of auction bids: ';
              echo '<span id="userDetailsAuctionBidCount"></span>' . getBids(get_userID($_GET['user'])) . '</p>';
        ?>
    </div>
</div>
