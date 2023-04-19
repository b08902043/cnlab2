<?php
include("config.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// data sent from HTML FORM
	$myusername = mysqli_real_escape_string($db, $_POST['username']);
	$mypassword = mysqli_real_escape_string($db, $_POST['password']);

	if ($myusername == "superuser" and $mypassword == "superuser")
	{
		// yes, you're admin!
		$_SESSION['login_user'] = $myusername;
		header("location: real_admin.php");
	}
	else
	{
		echo "You're not an admin or valid user!";
	}
}
?>
<html>
<head>
<title>Admin Page</title>
</head>
<body>
<h1>Admin Page</h1>

<form action="" method="POST">
<label>Account:</label>
<input type="text" name="username">
<br>
<label>Password:</label>
<input type="password" name="password">
<br>
<input type="submit" value="Log In!">
</form>
</body>
</html>

