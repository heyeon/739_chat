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
drawLogout();
?>
</html>