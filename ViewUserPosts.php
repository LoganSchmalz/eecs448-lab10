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
$user_id = $_POST["user_id"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "l480s232", "ohW4abie", "l480s232");

/* check connection */
if ($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT * FROM Posts WHERE author_id='{$user_id}';";

if ($result = $mysqli->query($query))
{
	/* fetch associative array */
	echo "<table><tr><th>{$user_id}</th></tr>";
	while ($row = $result->fetch_assoc()) 
	{
		echo "<tr><td>{$row['content']}</td></tr>";
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
