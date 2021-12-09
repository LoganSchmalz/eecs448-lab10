<?php

$user_id = trim($_POST["user_id"]);
$content = trim($_POST["content"]);
if ($user_id == "" || $content == "")
{
	echo "<p>Error: User or content was blank.</p>";
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
		echo "<p>Invalid user.</p>";
		$mysqli->close();
		exit();
	}
	else
	{
		$mysqli->query("INSERT INTO Posts (content, author_id) VALUES ('{$content}', '{$user_id}');");
		echo "<p>Post created.</p>";
	}

	/* free result set */
	$result->free();
}

/* close connection */
$mysqli->close();
?>
