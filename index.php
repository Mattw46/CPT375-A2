<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WDA A2 Front</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="javascript/jquery-ui.min.js"></script>
    <script src="javascript/javascript.js"></script>
</head>
<body>
<div class="container-fluid">

    <?php
    session_start();
    $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
    getPage($page);
    ?>

    <?php
    function getPage($pageType)
    {
        include_once("./php/components/shared/masthead.php");
        if ("search" == $pageType) {
            include_once("./php/search.php");
        } else if ("job" == $pageType) {
            include_once("./php/job.php");
        } else if ("addjob" == $pageType) {
            include_once("./php/addjob.php");
        } else if ("useradmin" == $pageType) {
            include_once("./php/useradmin.php");
        } else if ("userdetails" == $pageType) {
            include_once("./php/userdetails.php");
        } else if ("auctionrules" == $pageType) {
            include_once("./php/auctionrules.php");
        } else if ("login" == $pageType) {
            include_once("./php/login.php");
        } else if ("register" == $pageType) {
            include_once("./php/register.php");
        } else if ("admin" == $pageType) {
            include_once("./php/admin.php");
        } else {
            include_once("./php/home.php");
        }
        include_once("./php/components/shared/footer.php");
    }
    ?>

</div>
</body>
</html>