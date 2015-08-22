<?php require_once './model/model.php'; ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <h2>User details</h2>

        <h3 id="userDetailsUsername"><?php echo $_GET['user']; ?></h3>
        <?php /* If a professional, show their rating */
              if(is_professional(get_userID($_GET['user']))){
                 echo '<p><b>Professional rating:</b> <span id="userDetailsRating"></span>';
                 echo round(getProFeedback(get_userID($_GET['user'])),1) . ' / 5.0</p>';
                 }
              /* Show a user's listing rating */
              echo '<p><b>User rating:</b> <span id="userDetailsRating"></span>';
              echo round(getFeedback(get_userID($_GET['user'])),1) . ' / 5.0</p>';
              /* Show the number of auctions listed */
              echo '<p><b>Number of auctions posted:</b> ';
              echo '<span id="userDetailsAuctionsPostedCount"></span>' . sumPostedAuctions(get_userID($_GET['user'])) . '</p>';
              /* Show the number of bids made */
              echo '<p><b>Number of auction bids:</b> ';
              echo '<span id="userDetailsAuctionBidCount"></span>' . getBids(get_userID($_GET['user'])) . '</p>';
              /* If a professional, show their trades */
              if(is_professional(get_userID($_GET['user']))){
                 $trades = getProTrades(get_userID($_GET['user']));
                 if ($trades != 0){
                    $tradesCount = count($trades);
                    $count = 0;
                    echo '<p><b>Trades available:</b> ';
                    foreach($trades as $row){
                       echo $row[0];
                       $count++;
                       if($count < $tradesCount)
                          echo ', ';
                    }
                    echo '</p>';
                 }else{
                     echo '<p>No trades listed</p>';
                 }
              }
        ?>
    </div>
</div>
