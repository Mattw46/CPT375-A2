<div class="row content">
    <div class="col-xs-12 col-sm-3 leftMenu center-xs">
        <a href="#">User Admin Panel</a>
    </div>

    <div class="col-xs-12 col-sm-9" id="addJob">

        <div class="row center-xs">
            <h2 class="col-xs-12 center-xs">Add job!</h2>

            <form>
                <div class="col-xs-12">
                    <label for="addJobSummary">Job Summary:</label>
                    <input id="addJobSummary" type="text">
                </div>
                <div class="col-xs-12">
                    <label for="addJobDescription">Job Description:</label>
                    <textarea id="addJobDescription" rows="3"></textarea>
                </div>
                <div class="col-xs-12">
                    <label for="addJobCategory">Category of work:</label>
                    <select id="addJobCategory">
                        <option value="gardening">Gardening</option>
                        <option value="electrical">Electrical</option>
                        <option value="plumbing">Plumbing</option>
                        <option value="construction">Construction</option>
                        <option value="handy man jobs">Handy man jobs</option>
                        <option value="tiling">Tiling</option>
                        <option value="cleaner">Cleaner</option>
                    </select>
                </div>
                <div class="col-xs-12">
                    <label for="startBidAmountSpinner">Starting bid:</label>
                    <input id="startBidAmountSpinner" name="startBidAmountSpinner" value="100.00">
                </div>
                <div class="col-xs-12">
                    <label for="addJobDurationSpinner">Job Duration: <span id="addJobDurationDisplayAmount">3</span>
                        days</label>

                    <div id="addJobDurationSpinner"></div>
                </div>
                <div class="col-xs-12" id="addJobButton">
                    <button>Place Job</button>
                </div>
            </form>
        </div>

    </div>


</div>


