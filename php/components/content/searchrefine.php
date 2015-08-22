    <div class="row" id="searchresultsrefine">
        <div class="col-xs-11">
            <div class="row">
                <div class="col-xs-11">
                    <form>
                        <div class="row">

                            <div class="col-xs-12">
                                <label for="ratingAmount">Accepts Rating of <span id="ratingDisplayAmount">0</span> or
                                    higher</label>
                                <div id="ratingAmountSlider"></div>
                            </div>
                            <div class="col-xs-12">
                                <label for="minBidAmountSpinner">Minimum bid:</label>
                                <input id="minBidAmountSpinner" name="minBidAmountSpinner" value="0.00">
                            </div>
                            <div class="col-xs-12">
                                <label for="maxBidAmountSpinner">Maximum bid:</label>
                                <input id="maxBidAmountSpinner" name="maxBidAmountSpinner" value="9999.00">
                            </div>
                            <div class="col-xs-12">
                                <label for="sortBy">Sort By:</label>
                                <select name="sortBy" id="sortBy">
                                    <option>Time Left: Ending Soonest</option>
                                    <option>Time Left: Ending Latest</option>
                                    <option>Age: Oldest</option>
                                    <option>Age: Newest</option>
                                    <option>Highest Bid</option>
                                    <option>Lowest Bid</option>
                                </select>
                            </div>

                            <div class="col-xs-12">
                                <label for="auctionsPerPage">Auctions per page:</label>
                                <select name="auctionsPerPage" id="auctionsPerPage">
                                    <option>12</option>
                                    <option>24</option>
                                    <option>36</option>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
//get results and put them into list for searchresultscontent.php to handle
$term = isset($_GET['term']) ? '%'.$_GET['term'].'%' : '';
$state = isset($_GET['state']) ? '%'.$_GET['state'].'%' : '';
$category = isset($_GET['categoryId']) ? $_GET['categoryId'] : '';
$minRating = isset($_GET['minRating']) ? $_GET['minRating'] : 0;//
$minBid = isset($_GET['minBidAmountSpinner']) ? $_GET['minBidAmountSpinner'] : 0;
$maxBid = isset($_GET['maxBidAmountSpinner']) ? $_GET['maxBidAmountSpinner'] : 9999;
$numOfResults = isset($_GET['auctionsPerPage']) ? $_GET['auctionsPerPage'] : 12;
$pageNumber = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1;
$sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : '';

$jobResults = getJobs($term, $state, $category, $minRating, $minBid, $maxBid, $numOfResults, $pageNumber, $sortBy);
?>