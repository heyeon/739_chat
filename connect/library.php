<?php
	include ("server_conn.php");
	
	function drawLoginStatus()
	{
		echo "<div id='header'> Welcome ". $_SESSION['connected']. " (Connected From -" .$_SERVER['REMOTE_ADDR'].") ". drawHref("Log Out", "login.php") ."<div>";	
	}
	
	function drawButton($name, $value, $target)
	{
	 echo "<input type='submit' id='enterChat' class='btn' name='".$name."' value ='".$value."' onClick='noname();' />";
	}
	
	function drawHref($name,$url)
	{
		return "<a href=".$url.">". $name ."</a>";
	}
	
	function pullFriendList()
	{
		$conn = connect();
		$handle = $_SESSION['connected'];
		$query = "SELECT * FROM users";
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result))
		{
			echo "<tr><td>". $row['Handle']. "</td></tr>";
		}
		disconnect($conn);
	}

	function drawLogout()
	{
		drawHref("Log Out", "login.php");
	}

	function sessionCheck()
	{
		if (!isset($_SESSION['connected']))
		{	
			return false;
		}
		return true;
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
		header("Location: index.php");
	}

	function onLogOutSuccess()
	{
		updateLoginStatus(0,$_SESSION['connected']);
		session_destroy();
	}
	
	function onNewMessage($handle, $message)
	{
		$query = "INSERT INTO messages (Handle,Message)	VALUES ('$handle','$message')";
		$conn = connect();
		mysql_query($query);
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
			$query = "INSERT INTO users (Handle,FName,LName,Password,EMail)
			VALUES ('$handle','$fname','$lname','$password','$email')";
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
