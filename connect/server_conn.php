<?php


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
$localIP = $_SERVER['SERVER_ADDR'];

function connect()
{
	for($i = 0; $i < $GLOBALS['serverCount']; $i++)
	{
		$conn= mysql_connect($GLOBALS['servers'][$i], $GLOBALS['user'], $GLOBALS['password']);
		if (!$conn)
		{
			echo "Could not connect to database". mysql_error();
		}
		else
		{
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