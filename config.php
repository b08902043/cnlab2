<html>
<body>
<?php
$uamsecret = "testing123";
$userpassword=1;
$host = "localhost";
$user = "radius";
$passward = "radpass";
$database = "radius";
$db = mysqli_connect("$host", "$user","$passward", "$database");
if (mysqli_connect_errno())
{
echo "FAILED TO CONNECT TO MySQL: " . mysqli_connect_error();
}
?>
<body>
</html>
