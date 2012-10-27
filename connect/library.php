<?php

	function drawLogout()
	{
		echo "<div> <form method='POST' action='login.php'>
			<input type='submit' name='logout' value='Log Out'/>
			</form></div>";
	}
	function sessionCheck()
	{
		if (!isset($_SESSION['connected']))
		{	
			return false;
		}
		return true;
	}
	function connect()
	{
		$conn = mysql_connect("localhost", "root");
		if (!$conn)
		{
			die("Could not connect to database". mysql_error());
		}
		return $conn;
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
		updateLoginStatus(connect(),1,$handle);
	}

	function onLogOut()
	{
		updateLoginStatus(connect(),0,$_SESSION['connected']);
		session_destroy();
		
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
			mysql_select_db("connect", $conn);
			$query = "INSERT INTO users (Handle,FName,LName,Password,EMail)
			VALUES ('$handle','$fname','$lname','$password','$email')";
			if (!mysql_query($query, $conn))
			{
				die('Die :'.mysql_error());
				return false;
			}
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

function updateLoginStatus($conn,$loginStatus,$handle)
{
	if (!$conn)
	{
		echo "Connection Error " . mysql_error();
	}
	else
	{
		mysql_select_db("connect", $conn);
		$query = "UPDATE users SET IsConnected='$loginStatus' WHERE Handle='$handle'";
		mysql_query($query);
	}
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
					echo "Logged In As " . $row['FName']. " ". $row['LName'];
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