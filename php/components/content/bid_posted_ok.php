<?php require_once './model/model.php';
if (isset($_SESSION["bid_ok_details"])){ 
    $details = $_SESSION["bid_ok_details"];
}
else {
    $details = 0;
}
 ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <div id="job">
            <?php if ($details == 0) { ?>
                <h2 id="jobTitle"><?php echo "No bid <br>"  ?></h2>
            <?php } else { ?>
                <h2 id="jobTitle"><?php echo "Bid posted ok <br>"  ?></h2>
               
                <h3 id="jobTitle"><?php echo "Bid Amount: " . $details['bid_amnt'] ?></h3>

            <?php } ?>
         
        </div>
    </div>
</div>
<?php unset($_SESSION["bid_ok_details"]);  ?>