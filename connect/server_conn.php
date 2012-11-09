<?php

function connect()
{
	$servers = array("54.242.184.151","184.72.85.188");
	$db = "connect";
	$user ="root";
	$password = "root";
	$tables = array(
		"users" => "users",
		"friends" => "friends",
		"messages" => "messages",
		"load" => "loadinfo"
	);
	$serverCount = count($servers);
	for($i = 0; $i < $serverCount; $i++)
	{
		$conn= mysql_connect($servers[$i], $user, $password);
		if (!$conn)
		{
			echo "Could not connect to database". mysql_error();
		}
		else
		{
			mysql_select_db($db,$conn);
			return $conn;
		}
	}
}












/*
if (!mysql_query($query, $conn))
		{
				die('Die :'.mysql_error());
				return false;
			}
*/


?>