<?php
include('library.php');
session_start();

if(isset($_POST['login']))
{
	if (!sessionCheck())
	{
		$conn = connect();
		$result = login($conn,$_POST);
		drawLogout();
		disconnect($conn);
		
	}
	else
	{
		echo "<div> <p> You are already connected. Please Logout first and try again </p></div>";
		drawLogout();
	}
}
if (isset($_POST['logout']))
{
	onLogOut();
	header("Location: index.php");
}

?>


