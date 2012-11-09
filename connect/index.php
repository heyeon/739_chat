<html>
<head>
<title> Connect </title>
<<<<<<< HEAD
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
=======
<link rel="stylesheet" type="text/css" href="styles/connect.css" >

>>>>>>> b5a61d25fb0f9f935edadbc03bda9b10d574e634
</head>

<body margin-left="10px">
<?php
include("library.php");
session_start();
if(!sessionCheck()){

?>
<<<<<<< HEAD
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
=======
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
>>>>>>> b5a61d25fb0f9f935edadbc03bda9b10d574e634
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
{
drawLoginStatus();
if (isset($_POST['submitChat']))
{
	//onNewMessage($_SESSION['connected'], $text);
}
?>
<div id="upperPanel">
<table border="1" width="100%" height="80%">
<tr>
<td height="70%" width="75%">
<div id="chatArea">
<textarea id="chatTexts" rows="15" cols="100" name="chatBox" readonly="readonly" wrap="hard">
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
<script type="text/javascript" src="scripts/ajax.js"></script>
<textarea id='inputTextArea' maxlength="5000" placeholder="Enter Your Text Here" wrap="hard" autofocus="autofocus">
</textArea>
	<?php
		drawButton("submitChat", "Enter", "index.php");
	?>

</div>
</td>
</tr>
</table>
</div>

<?php 

} ?>
</html>
