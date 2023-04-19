<?php
include("config.php");

session_start();

$username = $_GET['username'];

// get those parameters from database using $username
$sql1 = "SELECT * FROM radcheck WHERE username='$username' and attribute='Max-Hourly-Traffic'";
$sql2 = "SELECT * FROM radcheck WHERE username='$username' and attribute='Max-Daily-Session'";

$result1 = mysqli_query($db, $sql1);
$result2 = mysqli_query($db, $sql2);

$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

$currentMHF = $row1['value'];
$currentMDS = $row2['value'];


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if($_POST['delete'])
	{
		$sql = "DELETE FROM radcheck WHERE username='$username'";
		$dummy = mysqli_query($db, $sql);
	}
	else
	{
		$MHFLimit = mysqli_real_escape_string($db, $_POST['MHF']);
		$MDSLimit = mysqli_real_escape_string($db, $_POST['MDS']);
	
		$sql1 = "UPDATE radius.radcheck SET value='$MHFLimit' WHERE radcheck.username='$username' and attribute='Max-Hourly-Traffic'";
		$sql2 = "UPDATE radius.radcheck SET value='$MDSLimit' WHERE radcheck.username='$username' and attribute='Max-Daily-Session'";

		$dummy = mysqli_query($db, $sql1);
		$dummy = mysqli_query($db, $sql2);
	}
	header('location: real_admin.php');
}
?>

<html>
<head>
	<script language="javascript">
	</script>
</head>
<body>
<h1>You're Now Editting User <?php print "$username" ?></h1>
	<div>
		<FORM action="" method="POST">
		<label>Max Hourly Flow</label>
		<input type="text" name="MHF" value="<?php print $currentMHF ?>" />
		<br><br>
		<label>Max Daily Session</label>
		<input type="text" name="MDS" value="<?php print $currentMDS ?>" />
		<br><br>
		<input type="submit" value="Confirm" />
		</FORM>
	</div>
	<FORM action="" method="POST">
	<input type='submit' name='delete' value='Delete User'>
	</FORM>
</body>
</html>
