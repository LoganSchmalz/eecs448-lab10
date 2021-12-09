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

$mysqli = new mysqli("mysql.eecs.ku.edu", "l480s232", "ohW4abie", "l480s232");

/* check connection */
if ($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT * FROM Users;";

if ($result = $mysqli->query($query))
{
	/* fetch associative array */
	echo "<table>";
	while ($row = $result->fetch_assoc()) 
	{
		echo "<tr><td>{$row['user_id']}</td></tr>";
	}
	echo "</table>";

	/* free result set */
	$result->free();
}

/* close connection */
$mysqli->close();
?>
</body>
</html>
