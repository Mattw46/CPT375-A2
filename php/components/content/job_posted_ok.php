<?php require_once './model/model.php';
if (isset($_SESSION["posted_ok_details"])){ 
    $details = $_SESSION["posted_ok_details"];
}
else {
    $details = 0;
}
 ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <div id="job">
            <?php if ($details == 0) { ?>
                <h2 id="jobTitle"><?php echo "No job posted <br>"  ?></h2>
            <?php } else { ?>
                <h2 id="jobTitle"><?php echo "Job posted ok <br>"  ?></h2>
               
                <h3 id="jobTitle"><?php echo "Job Summary: " . $details['summary'] ?></h3>

                <p id="jobPostedBy">Posted by <a href="#"><span id="jobPoster"><?php echo $_SESSION["username"]; ?></span></a>
                </p>
                <img src="http://placehold.it/300x225">

                <p id="jobLongDescription"><?php echo "Job description:" . $details['description']?></p>


                <p id="jobEndsIn">Ends in: <span id="jobEndsInAmount"><?php echo $details['joblength'] . " days" ?> </span></p>
            <?php } ?>
         
        </div>
    </div>
</div>
<?php unset($_SESSION["posted_ok_details"]);  ?>