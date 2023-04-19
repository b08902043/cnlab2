<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$myusername = mysqli_real_escape_string($db, $_POST['username']);
$mypassword = mysqli_real_escape_string($db, $_POST['password']);
$sql = "SELECT * FROM radcheck WHERE username='$myusername' and value='$mypassword'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count >=  1)
{
$_SESSION['login_user'] = $myusername;
echo "login sucess!";
}
else
{
$error = "Your Login Name or Password is invalid";
echo $error;
}
}
?>
<h1>Login Here</h1>
<form action="" method="POST">
<label>Account:</label>
<input type="text" name="username">
<br>
<label>Password:</label>
<input type="password" name="password">
<br>
<input type="submit" value="Submit">
<br>
<br>
<font size = "2">New user?</font>
<br>
<input type ="button" onclick="javascript:location.href='register.php'" value='Register'></input>
</form>
