<?php require_once './model/model.php';
 ?>
<div class="row content" id="userDetailsContent">
    <div class="col-xs-12 center-xs" id="userDetails">
        <div id="job">
            <h2 id="jobTitle">Failed to post job. Please try again</h2>

            <p id="jobPostedBy">Username:  <a href="#"><span id="jobPoster"><?php echo $_SESSION["username"]; ?></span></a>
            </p>
        </div>
    </div>
</div>