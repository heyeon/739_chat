<html>
	<head>
		<title> Connect </title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/connect.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-transition.js"></script>
		<script src="js/bootstrap-alert.js"></script>
		<script src="js/bootstrap-modal.js"></script>
		<script src="js/bootstrap-dropdown.js"></script>
		<script src="js/bootstrap-scrollspy.js"></script>
		<script src="js/bootstrap-tab.js"></script>
		<script src="js/bootstrap-tooltip.js"></script>
		<script src="js/bootstrap-popover.js"></script>
		<script src="js/bootstrap-button.js"></script>
		<script src="js/bootstrap-collapse.js"></script>
		<script src="js/bootstrap-carousel.js"></script>
		<script src="js/bootstrap-typeahead.js"></script>
		<script src="http://connect.facebook.net/en_US/all.js"></script>
		<script src="js/jquery-1.8.2.js"> </script>
		<script src="js/jquery.validate.js"> </script>
		<script type="text/javascript">  
			FB.init
			({
				appId:'278629895590946', cookie:true,
				status:true, xfbml:true
			});
			
			
			
			function scrollBox()
			{
				var elem = document.getElementById('chatTexts');
				elem.scrollTop = 1;
			}
			
			function submitChat()
			{
				$.post("ajax.php", {newMessage:$("#inputTextArea").val()}, 
					function(data)
					{
						$("#inputTextArea").val("");
						scrollBox();
					}
				);
			}
			function update()
			{
				$.post("ajax.php", {chatBox:"chatbox"}, 
				function(data)
					{
						if (data != "")
						{
							$("#chatTexts").val($("#chatTexts").val()+ "\n"+data);
						}
						
					}
				); 
				
				$.post("ajax.php", {friendList:"friendList"}, 
				function(data)
					{
						$('#friendList').empty();
						var row = $("<tr><td>" + data +"</td><td> <img src = 'img/online.png' width='10px' height='10px' /></td></tr>");
						$('#friendList').append(row);
					}
				); 
				setTimeout('update()', 1000);
			}
			function checkUserName()
			{	
				if (!$("#handle").val())
				{
					$("#error2").text("");
				}
				else
				{
					$.post("ajax.php", {handle:$("#handle").val()}, 
					function(data)
						{
							if (data == "false")
							{
								$("#error2").text("User name not available");
							}
						}		
					);
				}				
			}
			
			$(document).ready
			(
				function()
				{$("#error").text("");
					update();
					$("#loginForm").validate({ 
					rules: { 
						loginHandle: "required",
						loginPassword: "required"
					}}); 
					$("#signup").validate({ 
						rules: { 
						fname: "required",
						lname: "required",
						email: {
							required: true, 
							email: true 
					},
					handle: "required",
					passwd: "required"
					}}); 
	     
				});
		</script>
	</head>
	<body >
		<?php
			include("library.php");
			session_start();
			if(!sessionCheck()){
		?>
		<div id="body" class="hero-unit">
			<h2> Welcome to Connect : Madison's Distributed Chat System </h2>
			<h3>Login</h3>
			<?php
				if (isset($_SESSION['error']))
				{
					echo "<h4 id='loginerror'>".$_SESSION['error']. "</h4></br>";
					unset($_SESSION['error']);
				}
			?>	
			<form class="form-horizontal" id="loginForm" method="POST" name="loginForm" action="login.php">
				<div class="control-group">
					<label class="control-label"><strong> Username: </strong></label>
					<div class ="controls">
						<input type="text" id="loginHandle" name="loginHandle"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> Password: </strong></label>
					<div class ="controls">
						<input type="password" id="loginPassword" name="loginPassword"/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input class="btn btn-large btn-primary" type="submit" value="Log In!!" ">
						<h4> OR </h4>
						<fb:login-button>Login with Facebook</fb:login-button>
					</div>
				</div>
			</form>
			
			<h3>Register now</h3>
			<form class="form-horizontal" id="signup" name="signup" action="signup.php" method="post">
				<div class="control-group">
					<label class="control-label"><strong> First Name: </strong></label>
					<div class ="controls">
						<input type="text" name="fname"/>
						<em>*</em>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> Last Name: </strong></label>
					<div class="controls">
						<input type="text" name="lname"/>
						<em>*</em>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"> <strong> Connect Handle: </strong></label>
					<div class="controls">
						<input type="text" id="handle" name="handle" onchange="checkUserName();"/> 
						<label class="error" id="error2">  </label>
						<em>*</em>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> Connect Password: </strong></label>
					<div class="controls">
						<input type="password" name="passwd"/>
						<em>*</em>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> E-mail: </strong> </label>
					<div class="controls">
						<input clas="btn" type="text" name="email"/>
						<em>*</em>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input class="btn btn-large btn-primary" type="submit" value="Sign Up!!">
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<div class="container">
				<p class="muted credit">
					&#64 2012. Connect Service brought to you by Irtiza Ahmed Akhtar and Zainab Ghadiyali.
				</p>
			</div>
		</div>
		<?php
		}
		else
		{
			drawLoginStatus();
		?>
		<div id="upperPanel" class="hero-unit">
		<table border="1" width="100%" height="80%">
		<tr>
			<td height="70%" width="75%">
				<div id="chatArea">
				<textarea id="chatTexts" rows="15" cols="100" name="chatTexts" readOnly="readOnly">
				</textarea> 
				</div>
			</td>
			<td height="70%" width="25%" background-color="#ffffff">
				<table id="friendList" name="friendList" class="table table-hover" height="100%" width="100%">
						<tr>
							<th> Friend List </th> 
							<th> Status </th>
						</tr>
				</table>
			</td>
		</tr>
		<tr width="100%">
		<td >
		<div id="chatInput">
		<textarea id="inputTextArea" maxlength="5000" placeholder="Enter Your Text Here"  width="100%" height="100%" autofocus="autofocus">
		</textArea>
			<?php
				drawButton("submitChat", "Enter", "submitChat()");
			?>
		</div>
		</td>
		</tr>
		</table>
		</div>
		<div id="footer">
			<div class="container">
				<p class="muted credit"> Connect Service brought to you by Irtiza Ahmed Akhtar and Zainab Ghadiyali	</p>
			</div>
		</div>
	
		<?php 
			} 
		?>
		
	</body>
</html>
