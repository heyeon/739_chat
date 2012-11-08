<?php
include('library.php');
session_start();

if(isset($_POST['login']))
{
	if (!sessionCheck())
	{
		$conn = connect();
		$result = login($conn,$_POST);
		
	}
	else
	{
		echo "<div> <p> You are already connected. Please Logout first and try again </p></div>";
		drawLogout();
	}
	return 0;
}


if (isset($_POST['logout']))
{
	onLogOutSuccess();
	header("Location: index.php");
	return 0;
}




?>


