<?php require_once './model/model.php'; ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <div id="job">

            <?php if(isset($_GET['listing_id'])){
                $listingId = $_GET['listing_id'];
                $listing = getListingDetails($listingId);
                $username = get_userName($listing[0]["list_user_id"]);

                $currentb = getCurrentBid($_GET['listing_id']);
                if ($currentb == 0)
                    $currentBid = 0;
                else
                    $currentBid = $currentb[0][0];       
            }
            ?>
            <h2 id="jobTitle"><?php echo $listing[0]["shrt_descn"]; ?></h2>

            <p id="jobPostedBy">Posted by <a href="#"><span id="jobPoster"><?php echo $username[0][0]; ?></span></a>
            </p>
            <img src="http://placehold.it/300x225">

            <p id="jobLongDescription"><?php echo $listing[0]["lng_descn"]; ?></p>

            <p id="jobCurrentBid">Current Bid: $<span id="jobCurrentBidAmount"><?php echo $currentBid; ?></span></p>

             <p id="jobCurrentBid">Please place a bid less than current bid to win job</p>

            <form action="./controller/controller.php" method="POST">
                <label for="jobProposedBidSpinner">Bid: $</label>
                <input id="jobProposedBidSpinner" name="jobProposedBidSpinner" value="<?php echo ($currentBid + 1);?>">
                <input type ="hidden" name = "listing_id" value = "<?php echo $listing[0]['listing_id']; ?>" />
                 <input type ="hidden" name = "user_id" value = "<?php echo $_SESSION["authenticated"]; ?>"/>
                <br>
                <button>Place Bid</button>
            </form>
            <p id="jobEndsIn">Ends in: <span id="jobEndsInAmount"><?php
                        $date1 = new DateTime(date('Y-m-d G:i:s'));
                        $date2 = new DateTime($listing[0]['list_end_tmstmp']);
                        $interval = $date1->diff($date2);
                        echo $interval->format("%d days %H:%I:%S"); ?></span></p>

            <p id="jobTotalBids">Total Bids: <span id="jobTotalBidsAmount"> <?php 
                            $totalB = getTotalBids($listing[0]['listing_id']);
                            if ($totalB[0][0] == NULL)
                                $totalbid = 0;
                            else
                                echo $totalB[0][0];
                            ?></span></p>
        </div>
    </div>
</div>
