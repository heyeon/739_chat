<html>

<head>
<title> Connect </title>
</head>

<body>
<?php
include("library.php");
session_start();

//echo ($_SESSION['connected']);

if(!sessionCheck()){

?>
<div>

</div>
</br>

<div>
<form name="signup" action="signup.php" method="post">
<table>
<tr><td>
<label> First Name: </label>
<input type="text" name="fname"/>
</td></tr>
<tr><td>
<label> Last Name: </label>
<input type="text" name="lname"/>
</td> </tr>
<tr><td>
<label> Connect Handle: 
</label>
<input type="text" name="handle"/>
</td></tr>
<tr><td>
<label> Connect Password: </label>
<input type="password" name="passwd"/>
</td></tr>
<tr><td>
<label> E-mail: </label>
<input type="text" name="email"/>
</td></tr>
<tr><td>
<input type="submit" value="Sign Up!!"> </input>
</td></tr>
</table>
</form>
</div>
<div>
<table border="1">
<tr>
<form action="login.php" method = "POST">
<label>Username: </label>
<input type ="text" name="handle"> </input> 
</br>
</br>
</br>
<label>Password: </label>
<input type = "password" name="password"> </input> </br>
</br>
<input type="submit" name="login" value="Log In"> </input>
</form>
</table>
</div>
</body>
<?php
}
else
{
drawLoginStatus();
if (isset($_POST['submitChat']))
{
	$text =  $_POST['chatInputArea'] ;
	echo $text;
	onNewMessage($_SESSION['connected'], $text);
}
?>
<div id="chat">
<table border="1" width="100%" height="80%">
<tr>
<td height="70%" width="75%">
<div id="chatArea">
<textarea rows="15" cols="100" name="chatBox" readonly="readonly">
Chat Area
</textarea> 
</div>
</td>
<td height="70%" width="75%"	>
<div id="frindList">

<table name="friendList">
<tr>
<th> Friend List </th	>
</tr>
<?php pullFriendList(); ?>
</table>
</div>
</td>
</tr>
<tr width="100%">
<td >
<div id="chatInput">
<form id="chatBox" method="POST" action="index.php">
	<input id="chatInputArea" name="chatInputArea"/>
	<?php
		drawButton("submitChat", "Enter", "index.php");
	?>
</form>
</div>
</td>
</tr>
<tr >
<td align="right">
<?php 
drawLogout(); 
?>
</td>
</tr>
</table>
</div>

<?php 

} ?>
</html>