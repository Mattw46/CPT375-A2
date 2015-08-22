<?php require_once './model/model.php';
?>

<form id="registerForm" name="registerForm" action="./controller/controller.php" method="POST">
    <div class="row content" id="registrationContent">
        <div class="col-xs-12 center-xs">
            <h2>Registration</h2>
            <?php
                if(isset($_SESSION["reg_num_of_errs"]))
                {
                    if ($_SESSION["reg_num_of_errs"] > 0)
                    {
                        echo "The following error/s occured <br>" ;
                        echo $_SESSION["reg_array_of_errs"] ."<br>";
                        unset($_SESSION["reg_num_of_errs"]);
                        unset($_SESSION["reg_array_of_errs"]);
                    }
                }
            ?>
        </div>
        <div class="row">
            <div class="col-xs-6 end-xs">
                <div class="row">
                    <div class="col-xs-12">
                        <label for="username">Username:</label>
                        <input id="username" name="username" type="text" value="<?php if(isset($_POST["username"])){echo trim($_POST["username"]);} ?>">

                    </div>
                    <div class="col-xs-12">
                        <label for="firstName">First Name:</label>
                        <input id="firstName" name="firstName" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="lastName">Last Name:</label>
                        <input id="lastName" name="lastName" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="address1">Address 1:</label>
                        <input id="address1" name="address1" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="address2">Address 2:</label>
                        <input id="address2" name="address2" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="suburb">City:</label>
                        <input id="suburb" name="suburb" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="state">State:</label>
                        <select id="state" name="state" type="text">
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
                    <div class="col-xs-12">
                        <label for="postCode">Post Code:</label>
                        <input id="postCode" name="postCode" type="text">
                    </div>

                    <div class="col-xs-12">
                        <label for="email">Email:</label>
                        <input id="email" name="email" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="confirmEmail">Confirm Email:</label>
                        <input id="confirmEmail" name="confirmEmail" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="password">Password:</label>
                        <input id="password" name="password" type="password">
                    </div>
                    <div class="col-xs-12">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input id="confirmPassword" name="confirmPassword" type="password">
                    </div>
                    <div class="col-xs-12">
                        <label for="userType">User Type:</label>
                        <input id="userType" name="userType" type="radio" value="10" checked>Basic User
                        <input id="userType" name="userType" type="radio" value="20">Professional
                    </div>
                    <div class="col-xs-12">
                        <label for="profession">Professions:</label><br>
                        <?php
                           $tradesList = get_trades();
                           foreach($tradesList as $row){
                              echo $row[1] . ': <input id="profession" type="checkbox" name="profession[';
                              echo $row[0] . ']" value="1"><br>';
                           }
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
        <div class="col-xs-12 center-xs">
            <button id="signUpButton">Sign up!</button>
        </div>
        <div class="col-xs-12 center-xs">
        </div>
    </div>
</form>
