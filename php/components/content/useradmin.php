<?php 
   require_once './model/model.php'; 
   $userID = get_userID($_GET['user']);
?>
<div class="row content">
    <div class="col-xs-12 col-sm-3 leftMenu center-xs">
        <a href="./addjob.php">Post New Auction</a>
    </div>
    <div class="col-xs-12 col-sm-9" id="userAdminPanel">

        <h2 class="col-sm-12 center-xs">User Admin Panel</h2>

        <div class="col-xs-12">
            <p class="tableTitle">Current Job Listings</p>
            <table class="auctionTable striped">
                <thead>
                <tr>
                    <th>Summary</th>
                    <th>Time Remaining</th>
                    <th>Current Winning Bid</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   $listings = getUserListings($userID);
                   if($listings != 0){
                      foreach($listings as $row){
                         $dateNow = new DateTime(date('Y-m-d G:i:s'));
                         $dateEnd = new DateTime($row[3]);
                         $interval = $dateNow->diff($dateEnd);
                         $currentb = getCurrentBid($row[0]);
                         if ($currentb == 0)
                            $currentBid = 0;
                         else
                            $currentBid = $currentb[0][0];
                         if($interval->format("%d days %H:%I:%S") > 0){
                            echo '<tr>';
                            echo '<td><a href="./job.php?listing_id=' . $row[0] . '">' . $row[6] . '</a></td>';
                            echo '<td>' . $interval->format("%d days %H:%I:%S") . '</td>';
                            echo '<td>$' . $currentBid . '</td>';
                            echo '</tr>';
                         }
                      }
                      
                   }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-xs-12">
            <p class="tableTitle">Completed Job Listings</p>
            <table class="auctionTable striped">
                <thead>
                <tr>
                    <th>Summary</th>
                    <th>Auction Winner</th>
                    <th>Winning Bid</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   $listings = getUserListings($userID);
                   if($listings != 0){
                      foreach($listings as $row){
                         $dateNow = new DateTime(date('Y-m-d G:i:s'));
                         $dateEnd = new DateTime($row[3]);
                         $interval = $dateNow->diff($dateEnd);
                         $maxbid = getHighBid($row[0]);
                         if($maxbid != 0){
                            if($interval->format("%d days %H:%I:%S") < 0){
                               echo '<tr>';
                               echo '<td><a href="./job.php?listing_id=' . $row[0] . '">' . $row[6] . '</a></td>';
                               echo '<td><a href="./userdetails?user=' . $maxbid[1] . '">' . $maxbid[1] . '</a></td>';
                               echo '<td>$' . $maxbid[2] . '</td>';
                               echo '</tr>';
                            }
                         }else{
                            if($interval->format("%d days %H:%I:%S") < 0){
                               echo '<tr>';
                               echo '<td><a href="./job.php?listing_id=' . $row[0] . '">' . $row[6] . '</a></td>';
                               echo '<td>No bids</td>';
                               echo '<td></td>';
                               echo '</tr>';
                            }
                         }
                      }
                      
                   }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-xs-12">
            <p class="tableTitle">Current Auctions Bidding on</p>
            <table class="auctionTable striped">
                <thead>
                <tr>
                    <th>Summary</th>
                    <th>List User</th>
                    <th>Your Bid</th>
                    <th>Current Winning Bid</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                      $bidAuctions = getUserBidListings($userID);
                      if($bidAuctions != 0){
                         foreach($bidAuctions as $row){
                            echo '<td><a href="./job.php?listing_id=' . $row[0] . '">' . $row[1] . '</a></td>';
                            echo '<td><a href="./userdetails?user=' . $row[2] . '">' . $row[2] . '</a></td>';
                            echo '<td>$' . $row[3] .'</td>';
                            echo '<td>$' . $row[4] .'</td>';
                         }
                      }
                   ?>
                </tbody>
            </table>
        </div>

        
    </div>
</div>
