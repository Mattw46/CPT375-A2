<?php require_once './model/model.php'; ?>
<div class="row content" id="main">
    <div class="col-sm-3 leftMenu" id="categories">
        <h3>Categories</h3>
        <ul>
            <?php
            $tradesList = get_trades();
            foreach($tradesList as $row){
               echo '<li><a href="./search.php?categoryId=' . $row[0] . '">' . $row[1] . '</a></li>';
            }
            ?>
           
         </ul>
    </div>
   
        <div class="col-sm-9" id="site-description">
            <div class="row content" id="searchresultscontent">
                 <?php 
    $latestJobs = getLatestetJobListing(4);
    foreach($latestJobs as $count => $db_array){ ?>
                <div class="col-xs-6 center-xs col-sm-4 col-lg-3 listing">
                    <div class="inner">
                        <img src="http://placehold.it/200x150">

                        <p class="listing-title"><?php echo $db_array['shrt_descn'] ?></p>

                        <p class="listing-bid">Current Bid: <span class="listing-bid-amount">$125.00</span></p>

                        <p class="listing-ends-in">Ends in: <span class="listing-ends-in-amount">1 day, 4 hours</span></p>

                        <p class="listing-total-bids">Total Bids: <span class="listing-total-bids-amount">4</span></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    
</div>