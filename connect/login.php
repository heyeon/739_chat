<?php
include('library.php');
session_start();

if(isset($_POST['login']))
{
	if (!sessionCheck())
	{
		$conn = connect();
		$result = login($conn,$_POST);
		disconnect($conn);
		header("Location: index.php");
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
	onLogOut();
	header("Location: index.php");
}

?>


