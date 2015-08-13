<?php
	session_start();
	if (isset($_SESSION["authenticated"])) {
		if ($_SESSION["authenticated"] == 0) {
			header("location: login.php");
		}
		else {
			echo "is authenticated <br />";
		}
	}
?>

<html>
	<header>
		<title>Main Page</title>
	</header>
	<body>
		<h3>Main Page</h3>
		<br />

		<form action="../../../controller/controller.php" method="post">
			<input type="hidden" name="action" value="logout">
			<input type="submit" value="Logout">
		</form>
	</body>
</html>