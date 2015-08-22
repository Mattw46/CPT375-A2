<?php require_once './model/model.php'; ?>
<form action="./search.php" method="get">
    <div class="row" id="search">
        <div class="col-xs-9">
            <input name="term" id="search-field" type="text" placeholder="Search for a job to bid on">
        </div>
        <div class="col-xs-3">
            <button id="search-button">Search</button>
        </div>
        <div class="col-xs-6">
            <p>Scope by Area</p>
            <select name="state" id="area">
                <option value="all">All Australia</option>
                <option value="act">Australian Capital Territory</option>
                <option value="nsw">New South Wales</option>
                <option value="nt">Northern Territory</option>
                <option value="qld">Queensland</option>
                <option value="sa">South Australia</option>
                <option value="tas">Tasmania</option>
                <option value="vic">Victoria</option>
                <option value="wa">Western Australia</option>
            </select>
        </div>
        <div class="col-xs-6">
            <p>Scope by Category</p>
            <select name="category" id="categoryId">
                <option value="all">All Categories</option>
                <?php
                   $tradesList = get_trades();
                   foreach($tradesList as $row){
                      echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
                   }
                ?>
            </select>
        </div>
    </div>