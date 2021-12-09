<?php

$user_id = trim($_POST["user_id"]);
if ($user_id == "")
{
	echo "<p>Error: Input was blank.</p>";
	exit();
}

$mysqli = new mysqli("mysql.eecs.ku.edu", "l480s232", "ohW4abie", "l480s232");

/* check connection */
if ($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT user_id FROM Users WHERE user_id='" . $user_id . "';";

if ($result = $mysqli->query($query))
{
	/* fetch associative array */
	/*
	while ($row = $result->fetch_assoc()) 
	{
		echo "{$row['user_id']}" . " num rows" . mysqli_num_rows($result);
	}
	*/

	if (mysqli_num_rows($result) == 0)
	{
		$mysqli->query("INSERT INTO Users (user_id) VALUES ('{$user_id}');");
		echo "<p>User <b>{$user_id}</b> added.</p>";
	}
	else
	{
		echo "<p>Error: User <b>{$user_id}</b> already exists.</p>";
	}

	/* free result set */
	$result->free();
}

/* close connection */
$mysqli->close();
?>
