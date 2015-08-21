<?php require_once './model/model.php'; ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <div id="job">
            <h2 id="jobTitle">Dig this hole</h2>

            <p id="jobPostedBy">Posted by <a href="#"><span id="jobPoster"><?php echo $_SESSION["username"]; ?></span></a>
            </p>
            <img src="http://placehold.it/300x225">

            <p id="jobLongDescription">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores
                aut distinctio error illum itaque libero, maiores neque, non obcaecati officiis pariatur possimus,
                similique ut velit veritatis vero voluptas voluptate.</p>

            <p id="jobCurrentBid">Current Bid: $<span id="jobCurrentBidAmount">125.00</span></p>

            <form>
                <label for="jobProposedBidSpinner">Bid: $</label>
                <input id="jobProposedBidSpinner" name="jobProposedBidSpinner" value="124.00">
                <br>
                <button>Place Job</button>
            </form>
            <p id="jobEndsIn">Ends in: <span id="jobEndsInAmount">1 day, 4 hours</span></p>

            <p id="jobTotalBids">Total Bids: <span id="jobTotalBidsAmount">4</span></p>
        </div>
    </div>
</div>