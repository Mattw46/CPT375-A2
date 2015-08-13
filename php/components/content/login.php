<form action="./controller/controller.php" method="post">
    <div class="row content" id="loginContent">
        <div class="col-xs-8 end-xs" id="login">
            <div class="row">
                <div class="col-xs-12">
                    <label for="usernameField">Username:</label>
                    <input id="usernameField" name="username" type="text">
                </div>
                <div class="col-xs-12">
                    <label for="passwordField">Password:</label>
                    <input id="passwordField" name="password" type="password">
                </div>
            </div>

        </div>
        <div class="col-xs-4">
            <button id="logInButton">Login</button>
        </div>
        <div class="col-xs-12 center-xs">
            <p id="forgotPassword">Forgot password? Enter your username and click here.</p>
        </div>
        <div class="col-xs-12 center-xs">
            <h1>OR</h1>
        </div>
        <div class="col-xs-12 center-xs">
            <h2><a href="#">Register here</a></h2>
        </div>
    </div>
</form>