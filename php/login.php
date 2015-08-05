<?php
	session_start();
?>

<html>
	<header>
		<title>Login</title>
	</header>
	<body>
		<h3>Login</h3>
		<form action="../controller/controller.php" method="post">
			Username: <input type="text" name="username"><br />
			Password: <input type="text" name="password"><br />
			<input type="submit" value="Submit">
		</form>
	</body>
</html>