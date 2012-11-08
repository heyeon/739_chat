<?php
	include ("server_conn.php");
	
	function drawLoginStatus()
	{
		echo "<div id='header'> Welcome ". $_SESSION['connected']."<div>";	
	}
	
	function drawButton($name, $value, $target)
	{
	 echo "<div> <form method='POST' action='".$target."'>
			<input type='submit' name='".$name."' value ='".$value."' />
		</form></div>";
	}
	
	function pullFriendList()
	{
		$conn = connect();
		$handle = $_SESSION['connected'];
		$query = "SELECT * FROM users";
		mysql_select_db($GLOBALS['db'], $conn);
		$result = mysql_query($query);
		
		while ($row = mysql_fetch_array($result))
		{
			echo $row;
			echo "test";
			echo "<tr><td>". $row['Handle']. "</td></tr>";
		}
		disconnect($conn);
	}
	function drawLogout()
	{
		drawButton("logout", "Log Out", "login.php");
	}
	function sessionCheck()
	{
		if (!isset($_SESSION['connected']))
		{	
			return false;
		}
		return true;
	}
	
	
	function onNewConnections()
	{
		$conn = connect();
		mysql_select_db($db, $conn);
		$tableName = $tables["load"];
		$query = "UPDATE '$tableName' SET NumConns = NumConns + 1 WHERE ServerIP = '$localIP'";
		mysql_query($query);
		disconnect($conn);
	}
	
	function disconnect($conn)
	{
		if ($conn)
		{
			mysql_close($conn);
		}
	}

	function onLoginSuccess($handle)
	{
		if (!isset($_SESSION['connected']))
		{
			$_SESSION['connected'] = $handle;
		}
		echo $_SESSION['connected'];
		updateLoginStatus(1,$handle);
		onNewConnections();
		header("Location: index.php");
	}

	function onLogOutSuccess()
	{
		updateLoginStatus(0,$_SESSION['connected']);
		onDisconnect($val);
		session_destroy();
		
	}
	
	function onDisconnect()
	{
		$conn = connect();
		mysql_select_db($db, $conn);
		$tableName = $tables["load"];
		$query = "UPDATE '$tableName' SET NumConns = NumConns - 1 WHERE ServerIP = '$localIP'";
		mysql_query($query);
		disconnect($conn);
	}
	
	function onNewMessage($handle, $message)
	{
		$tableName = $tables["messages"];
		$query = "INSERT INTO '$tableName' (Handle,Message)	VALUES ('$handle','$message')";
		$conn = connect();
		$mysql_select_db($db,$conn);
		$mysql_query($query);
		disconnect($conn);
	}
	function sanityCheck() //stub function for now we will implement it later to verify user input
	{
		return true;
	}
	
	
	
	
	function signup($conn, $vals)	
	{
	if (!$conn)
	{
		echo "Connection Error " . mysql_error();
	}
	else
	{
		$handle = $vals['handle'] ;
		$fname = $vals['fname'];
		$lname = $vals['lname'];
		$password =crypt($_POST['passwd'],0) ;
		$email = $vals['email'];
		if (sanityCheck()) 
		{
			$conn = connect();
			$tableName = $tables["users"];
			$query = "INSERT INTO '$tableName' (Handle,FName,LName,Password,EMail)
			VALUES ('$handle','$fname','$lname','$password','$email')";
			mysql_select_db($db,$conn);
			mysql_query($query);
			onLoginSuccess($handle);
			echo "Signup Successful" ;
			return true;
		}
		else
		{
			echo "Check Your Input";
			return false;
		}
	}
}

		function updateLoginStatus($loginStatus,$handle)
		{
			$conn = connect();
			mysql_select_db("connect", $conn);
			$query = "UPDATE users SET IsConnected='$loginStatus' WHERE Handle='$handle'";
			mysql_query($query);
			disconnect();
		}
		
function login($conn, $vals)
{
	if (!$conn)
	{
		echo "Connection Error " . mysql_error();
	}
	else
	{
		$handle = $vals['handle'] ;
		$password = crypt($_POST['password'],0) ;
		if (sanityCheck()) 
		{
			mysql_select_db("connect", $conn);
			$query = "SELECT * FROM users WHERE Handle='$handle'";
			$result = mysql_query($query, $conn);
			if (!$result)
			{
				die('Die :'.mysql_error());
				return false;
			}
			$row = mysql_fetch_array($result);
			if (!$row)
			{
				echo "User does not exist, Please sign up!!";
				return false;
			}
			else
			{	
				if ($row['Password']==$password)
				{
					onLoginSuccess($handle);
				}
				else
				{
					echo "Log in Failed!! Reason: Incorrect Password";
					return false;
				}
			}
			
			return true;
		}
		else
		{
			echo "Check Your Input";
			return false;
		}
	}
}


?>