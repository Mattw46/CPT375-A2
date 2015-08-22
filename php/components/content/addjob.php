<?php require_once './model/model.php';
?>

<div class="row content">
    <div class="col-xs-12 col-sm-3 leftMenu center-xs">
        <a href="./userdetails.php?username='<?php ?>'">User Admin Panel</a>
    </div>

    <div class="col-xs-12 col-sm-9" id="addJob">

        <div class="row center-xs">
            <h2 class="col-xs-12 center-xs">Add job!</h2>

            <form id="addJobForm" name="addJobForm" action="./controller/controller.php" method="post">
                <div class="col-xs-12">
                    <label for="summary">Job Summary:</label>
                    <input id="summary" type="text" name="summary">
                </div>
                <div class="col-xs-12">
                    <label for="description">Job Description:</label>
                    <textarea id="description" rows="3" name="description"></textarea>
                </div>
                <div class="col-xs-12">
                    <label for="jobtype">Category of work:</label>
                    <select id="jobtype" name="jobtype">
                        <?php
                        $tradesList = get_trades();
                        foreach ($tradesList as $row) {
                            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12">
                    <label for="startBidAmountSpinner">Starting bid:</label>
                    <input id="startBidAmountSpinner" name="startbid" value="100.00">
                </div>
                <div class="col-xs-12">
                    <label for="addJobDurationSpinner">Job Duration: <span id="addJobDurationDisplayAmount">3</span>
                        days</label>

                    <div id="addJobDurationSpinner"></div>
                    <input type="hidden" name="joblength" value="3">
                </div>
                <div class="col-xs-12" id="addJobButton">
                    <button>Place Job</button>
                </div>
            </form>
        </div>
    </div>
</div>