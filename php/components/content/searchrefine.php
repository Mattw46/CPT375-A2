<form>
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
</form>