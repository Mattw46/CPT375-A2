
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <div id="job">

                <h2 id="jobTitle"><?php echo "Error Posting job. Please try again. <br>"  ?></h2>

                 <h2 id="jobTitle"><?php if (isset($_SESSION["Bid_amount_error"])){ 
   					 echo $_SESSION["Bid_amount_error"];
   					 unset($_SESSION["Bid_amount_error"]);
				} ?></h2>       
        </div>
    </div>
</div>
