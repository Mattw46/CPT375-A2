<form action="./controller/controller.php" method="POST">
    <div class="row content" id="registrationContent">
        <div class="col-xs-12 center-xs">
            <h2>Registration</h2>
        </div>
        <div class="row">
            <div class="col-xs-6 end-xs">
                <div class="row">
                    <div class="col-xs-12">
                        <label for="usernameField">Username:</label>
                        <input id="usernameField" name="username" type="text">
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
                        <label for="professionField">Professions:</label><br>
                        Bricklaying: <input id=professionField type="checkbox" name="profession[1]" value="1"><br>
                        Carpentry: <input id=professionField type="checkbox" name="profession[2]" value="1"><br>
                        Carpentry and Joinery: <input id=professionField type="checkbox" name="profession[3]" value="1"><br>
                        Civil Construction: <input id=professionField type="checkbox" name="profession[4]" value="1"><br>
                        Civil Construction - Design: <input id=professionField type="checkbox" name="profession[5]" value="1"><br>
                        Civil Construction - Management: <input id=professionField type="checkbox" name="profession[6]" value="1"><br>
                        Civil Construction - Operations: <input id=professionField type="checkbox" name="profession[7]" value="1"><br>
                        Civil Construction - Supervision: <input id=professionField type="checkbox" name="profession[8]" value="1"><br>
                        Construction Carpentry: <input id=professionField type="checkbox" name="profession[9]" value="1"><br>
                        Fire Protection: <input id=professionField type="checkbox" name="profession[10]" value="1"><br>
                        Joinery: <input id=professionField type="checkbox" name="profession[11]" value="1"><br>
                        Joinery (Stairs): <input id=professionField type="checkbox" name="profession[12]" value="1"><br>
                        Roof Plumbing: <input id=professionField type="checkbox" name="profession[13]" value="1"><br>
                        Painting & Decorating: <input id=professionField type="checkbox" name="profession[14]" value="1"><br>
                        Plastering (Solid): <input id=professionField type="checkbox" name="profession[15]" value="1"><br>
                        Plumbing: <input id=professionField type="checkbox" name="profession[16]" value="1"><br>
                        Roof Tiling: <input id=professionField type="checkbox" name="profession[17]" value="1"><br>
                        Shopfitting: <input id=professionField type="checkbox" name="profession[18]" value="1"><br>
                        Signcraft: <input id=professionField type="checkbox" name="profession[19]" value="1"><br>
                        Stonemasonry: <input id=professionField type="checkbox" name="profession[20]" value="1"><br>
                        Wall & Ceiling Lining: <input id=professionField type="checkbox" name="profession[21]" value="1"><br>
                        Wall & Floor Tiling: <input id=professionField type="checkbox" name="profession[22]" value="1"><br>
                        Cabinet Making (Furniture): <input id=professionField type="checkbox" name="profession[23]" value="1"><br>
                        Cabinet Making (Kitchens & Bathrooms): <input id=professionField type="checkbox" name="profession[24]" value="1"><br>
                        Furnishing - Floor Technology: <input id=professionField type="checkbox" name="profession[25]" value="1"><br>
                        Furniture Polishing: <input id=professionField type="checkbox" name="profession[26]" value="1"><br>
                        Glass Cutting and Glazing: <input id=professionField type="checkbox" name="profession[27]" value="1"><br>
                        Upholstery: <input id=professionField type="checkbox" name="profession[28]" value="1"><br>
                        Wood Machining: <input id=professionField type="checkbox" name="profession[29]" value="1"><br>
                        Engineering (Electrical/Electronic): <input id=professionField type="checkbox" name="profession[30]" value="1"><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
        <div class="col-xs-12 center-xs">
            <button id="signUpButton">Sign up!</button>
        </div>
    </div>
</form>