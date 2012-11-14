<?php
	include('library.php');
	if (isset($_POST['chatBox']))
	{
		pullNewMessage();
	}
	else if (isset($_POST['friendList']))
	{
		pullFriendList();
	}
	else if  (isset($_POST['newMessage']))
	{
		submitNewMessage("borno",$_POST['newMessage']);
	}
	else if  (isset($_POST['handle']))
	{
		checkUsername($_POST['handle']);
	}
?>