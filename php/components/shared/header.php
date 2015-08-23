<?php
require_once './model/model.php';
if(isset($_SESSION['authenticated'])) {
    $userHeader1 = "./userdetails.php?user=" . $_SESSION['username'] ."'>" . $_SESSION['username'];
    $userHeader2 = "./logout.php'>Log Out";
    $admin = is_admin(get_userID($_SESSION['username'])); 
} else {
    $userHeader1 = "./login.php'>Log in";
    $userHeader2 = "./register.php'>Sign up";
    $admin = 0; 
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo($pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="javascript/jquery-ui.min.js"></script>
    <script src="javascript/javascript.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row center-xs start-sm" id="masthead">
        <div class="col-xs-12 col-sm-5" id="logo">
            <a href="./"><img src="./images/logo.png"></a>
        </div>
        <div class="col-xs-12 col-sm-3 end-sm" id="place-job">
            <a href="./addjob.php">
                <button>Place Job</button>
            </a>
        </div>
        <div class="col-xs-6 col-sm-2 end-sm log-in-sign-up">
            <p>
                <a href='<?php echo $userHeader1 ?></a>
            </p>
        </div>
        <div class="col-xs-6 col-sm-2 end-sm log-in-sign-up">
            <p><a href='<?php echo $userHeader2 ?></a></p>
        </div>
    
    </div>
    <?php 
       if($admin){
          echo'<div class="col-xs-6 col-sm-2 end-sm log-in-sign-up">';
          echo '<a href="./admin.php"><button>Admin</button></a>';
          echo '</div>';
       }
    ?>
    
