<html>

<head>
<title> Connect </title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body margin-left="10px">
<?php
include("library.php");
session_start();

//echo ($_SESSION['connected']);

if(!sessionCheck()){

?>
<h1> Welcome to Connect : Madison's Distribtued Chat System </h1>
<h3>Login</h3>
<form class="form-inline" action="login.php" method = "POST">
<input type ="text" class="input-small" placeholder="Username" name="handle"> </input> 
<input type = "password" class="input-small" placeholder="Pasword" name="password"> </input> 
<input class="btn" type="submit" name="login" value="Log In"> </input>
</form>
<h3>Register now</h3>
<form class="form-horizontal" name="signup" action="signup.php" method="post">
<div class="control-group">
<label class="control-label"><strong> First Name: </strong></label>
<div class ="controls">
<input type="text" name="fname"/>
</div>
</div>
<div class="control-group">
<label class="control-label"><strong> Last Name: </strong></label>
<div class="controls">
<input type="text" name="lname"/>
</div></div>
<div class="control-group">
<label class="control-label"> <strong> Connect Handle: </strong></label>
<div class="controls">
<input type="text" name="handle"/>
</div></div>
<div class="control-group">
<label class="control-label"><strong> Connect Password: </strong></label>
<div class="controls">
<input type="password" name="passwd"/>
</div></div>
<div class="control-group">
<label class="control-label"><strong> E-mail: </strong> </label>
<div class="controls">
<input clas="btn" type="text" name="email"/>
</div></div>
<div class="control-group">
<div class="controls">
<input class="btn btn-large btn-primary" type="submit" value="Sign Up!!">
</div></div>
</form>
</div>
<div>
<table border="1">
<tr>
</table>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
<?php
}
else
drawLogout();
?>
</html>