<?php require_once '../model/model.php'; ?>
<div class="row content" id="main">
    <div class="col-sm-3 leftMenu" id="categories">
        <h3>Categories</h3>
        <ul>
            <?php
            $tradesList = get_trades();
            foreach($tradesList as $row){
               echo '<li><a href="./search.php?categoryId=' . $row[0] . '">' . $row[1] . '</a></li>';
            }
            ?>
            <!--
            <li><a href="./search.php?categoryId=1">Bricklaying</a></li>
            <li><a href="./search.php?categoryId=2">Carpentry</a></li>
            <li><a href="./search.php?categoryId=3">Carpentry and Joinery</a></li>
            <li><a href="./search.php?categoryId=4">Civil Construction</a></li>
            <li><a href="./search.php?categoryId=5">Civil Construction - Designman jobs</a></li>
            <li><a href="./search.php?categoryId=6">Civil Construction - Management</a></li>
            <li><a href="./search.php?categoryId=7">Civil Construction - Operations</a></li>
            <li><a href="./search.php?categoryId=8">Civil Construction - Supervision</a></li>
            <li><a href="./search.php?categoryId=9">Construction Carpentry</a></li>
            <li><a href="./search.php?categoryId=10">Fire Protection</a></li>
            <li><a href="./search.php?categoryId=11">Joinery</a></li>
            <li><a href="./search.php?categoryId=12">Joinery (Stairs)man jobs</a></li>
            <li><a href="./search.php?categoryId=13">Roof Plumbing</a></li>
            <li><a href="./search.php?categoryId=14">Painting & Decorating</a></li>
            <li><a href="./search.php?categoryId=15">Plastering (Solid)</a></li>
            <li><a href="./search.php?categoryId=16">Plumbing</a></li>
            <li><a href="./search.php?categoryId=17">Roof Tiling</a></li>
            <li><a href="./search.php?categoryId=18">Shopfitting</a></li>
            <li><a href="./search.php?categoryId=19">Signcraftman jobs</a></li>
            <li><a href="./search.php?categoryId=20">Stonemasonry</a></li>
            <li><a href="./search.php?categoryId=21">Wall & Ceiling Lining</a></li>
            <li><a href="./search.php?categoryId=22">Wall & Floor Tiling</a></li>
            <li><a href="./search.php?categoryId=23">Cabinet Making (Furniture)</a></li>
            <li><a href="./search.php?categoryId=24">Cabinet Making (Kitchens & Bathrooms)</a></li>
            <li><a href="./search.php?categoryId=25">Furnishing - Floor Technology</a></li>
            <li><a href="./search.php?categoryId=26">Furniture Polishingman jobs</a></li>
            <li><a href="./search.php?categoryId=27">Glass Cutting and Glazing</a></li>
            <li><a href="./search.php?categoryId=28">Upholstery</a></li>
            <li><a href="./search.php?categoryId=29">Wood Machining</a></li>
            <li><a href="./search.php?categoryId=30">Engineering (Electrical/Electronic)</a></li>
            -->
         </ul>
    </div>
    <div class="col-sm-9" id="site-description">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi corporis debitis esse officia
            voluptatibus. Dolorum eaque et exercitationem incidunt magni nostrum numquam repudiandae sit. Dolore
            illum ipsam molestias nostrum officiis.</p>
    </div>
</div>