<?php require_once './model/model.php'; 
?>

<form action="./controller/controller.php" method="POST">
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
                        <label for="usernameField">Username:</label>
                        <input id="usernameField" name="username" type="text" value="<?php if(isset($_POST["username"])){echo trim($_POST["username"]);} ?>">

                    </div>
                    <div class="col-xs-12">
                        <label for="firstNameField">First Name:</label>
                        <input id="firstNameField" name="firstName" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="lastNameField">Last Name:</label>
                        <input id="lastNameField" name="lastName" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="address1Field">Address 1:</label>
                        <input id="address1Field" name="address1" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="address2Field">Address 2:</label>
                        <input id="address2Field" name="address2" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="cityField">City:</label>
                        <input id="cityField" name="city" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="stateField">State:</label>
                        <select id="stateField" name="state" type="text">
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
                        <label for="postCodeField">Post Code:</label>
                        <input id="postCodeField" name="postCode" type="text">
                    </div>

                    <div class="col-xs-12">
                        <label for="emailField">Email:</label>
                        <input id="emailField" name="email" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="confirmEmailField">Confirm Email:</label>
                        <input id="confirmEmailField" name="confirmEmail" type="text">
                    </div>
                    <div class="col-xs-12">
                        <label for="passwordField">Password:</label>
                        <input id="passwordField" name="password" type="password">
                    </div>
                    <div class="col-xs-12">
                        <label for="confirmPasswordField">Confirm Password:</label>
                        <input id="confirmPasswordField" name="confirmPassword" type="password">
                    </div>
                    <div class="col-xs-12">
                        <label for="userTypeField">User Type:</label>
                        <input id="userTypeField" name="userType" type="radio" value="10">Basic User
                        <input id="userTypeField" name="userType" type="radio" value="20">Professional
                    </div>
                    <div class="col-xs-12">
                        <label for="professionField">Professions:</label><br>
                        <?php
                           $tradesList = get_trades();
                           foreach($tradesList as $row){
                              echo $row[1] . ': <input id="professionField" type="checkbox" name="profession[';
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
