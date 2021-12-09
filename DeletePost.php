<html>
<head>
	<title>View Users</title>
	<style>
		table, th, td
		{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<?php
$checked = $_POST["checked"];
if (empty($checked))
{
	echo "<p>No posts selected.</p>";
	exit();
}

foreach ($checked as &$wrap)
{
	$wrap = "'{$wrap}'";
}
$checked = implode(', ', $checked);

$mysqli = new mysqli("mysql.eecs.ku.edu", "l480s232", "ohW4abie", "l480s232");

/* check connection */
if ($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "DELETE FROM Posts WHERE post_id IN ({$checked});";

if ($result = $mysqli->query($query))
{
	echo "<p>Deleted Post(s) with ID(s): {$checked}</p>";
	/* free result set */
	$result->free();
}

/* close connection */
$mysqli->close();
?>
</body>
</html>
