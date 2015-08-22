<?php require_once './model/model.php'; ?>
<div class="row content" id="searchresultscontent">
    <?php 
    if(isset($_GET['categoryId'])){
        $categoryId = $_GET['categoryId'];
        $allListingsByCategory = getJobListingByCategory($categoryId);
    
        foreach($allListingsByCategory as $count => $db_query){ 
           
            $db_array = getListingDetails($db_query[0][0]);
            if($db_array[0]['visible']) {?>
                    <div class="col-xs-6 center-xs col-sm-4 col-lg-3 listing">
                        <div class="inner">
                            <img src="http://placehold.it/200x150">

                            <p class="listing-title"><?php echo "Job Desc: " . $db_array[0]['shrt_descn'] ?></p>
                            <?php 
                                $currentb = getCurrentBid($db_array[0]['listing_id']);
                                if ($currentb == 0)
                                    $currentBid = 0;
                                else
                                    $currentBid = $currentb[0][0];
                            ?>
                            <p class="listing-bid">Current Bid: <span class="listing-bid-amount"><?php echo $currentBid ?></span></p>
                         
                            <p class="listing-ends-in">Ends in: <span class="listing-ends-in-amount"><?php
                            $date1 = new DateTime(date('Y-m-d G:i:s'));
                            $date2 = new DateTime($db_array[0]['list_end_tmstmp']);
                            $interval = $date1->diff($date2);
                            echo $interval->format("%d days %H:%I:%S"); ?></span></p>

                            <p class="listing-total-bids">Total Bids: <span class="listing-total-bids-amount">
                                 <?php 
                                $totalB = getTotalBids($db_array[0]['listing_id']);
                                if ($totalB[0][0] == NULL){
                                    $totalbid = 0;
                                }
                                else
                                    $totalbid= $totalB[0][0];
                                echo $totalbid;
                                ?>
                                <form method="GET" action="./job.php">
                                    <input type ="hidden" name = "listing_id" value = <?php echo $db_array[0]['listing_id']; ?> />
                                    <button type ="submot">Place bid</button>
                                </form>
                            </span></p>
                        </div>
                    </div>
            <?php }

        } 
    }?>
</div>