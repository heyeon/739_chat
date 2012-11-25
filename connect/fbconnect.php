<?php
/**
Objective : To connect with FB Connect App, draw user information and connect user. 
If user does not exist in  local db, the user's information should be added

Author : Zainab Ghadiyali (zainab@cs.wisc.edu)
**/

if(!isset($_SESSION['connected']))
{
	$app_id = "278629895590946";
	$app_secret = "cd64d661e1e777814bd6c2ffd2b25c50";
	$site_url = "http://connect.microwebpla.net";

	try{
		include_once "src/facebook.php";
		include_once "library.php";
	}catch(Exception $e){
		error_log($e);
	}
	$facebook = new Facebook(array(
				'appId' =>$app_id,
				'secret' =>$app_secret,
				));
	$user = $facebook->getUser();
	if($user){
		$logoutUrl=$facebook->getLogoutUrl();
	}else{
		$loginUrl=$facebook->getLoginUrl(array(
					'scope'=>'user_about_me,email',
					'redirect_uri'=>$site_url,));
	}
	if($user){
		try{
				$user_profile=$facebook->api('/me');

			$con = connect();
			$FName = "'".$user_profile['first_name']."'";
			$LName = "'".$user_profile['last_name']."'";
			$Handle = $FName;
			$Password = "'".crypt('739',0)."'";
			$EMail = "'".$user_profile['email']."'";
			$query=sprintf("SELECT * from users WHERE Handle = %s", $Handle);
			$res=mysql_query($query) or die('Query failed: '.mysql_error()."<br>\n$query");
			if(mysql_num_rows($res) == 0)
			{
				$conn=connect();
				$query = "INSERT INTO users (Handle,FName,LName,Password,EMail) VALUES ($Handle,$FName,$LName,$Password,$EMail)";
				$res=mysql_query($query) or die('Query failed: '.mysql_error()."<br>\n$query");
				onLoginSuccess($Handle);
				return true;
			}
			else{
				$row=mysql_fetch_array($res);
				$_SESSION['connected']=$row['Handle'];
			}
		}
		catch(Exception $e){
			error_log($e);
		}
	}
}
?>
