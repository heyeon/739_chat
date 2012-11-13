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
		<script type="text/javascript">  
			
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
						// process any output if any?
					}
				);
				
			}
			function update()
			{
				$.post("ajax.php", {chatBox:"chatbox"}, 
				function(data)
					{
						if (data!=null)
						{
							$("#chatTexts").val($("#chatTexts").val()+ "\n"+data);
						}
						
					}
				); 
				
				$.post("ajax.php", {friendList:"chatbox"}, 
				function(data)
					{
						$("#friendList").val(data);
						
					}
				); 
				setTimeout('update()', 1000);
			}
			$(document).ready
			(
				function()
				{
					update();
					/*	$("#button").click(   
						  function()
						  {        
						   $.post("server.php",
						{ message: $("#message").val()},
						function(data){ 
						$("#screen").val(data);
						$("#message").val("");
						}
						);
						  }
						 );*/
				});
 
		</script>
	</head>
	<body margin-left="10px">
		<?php
			include("library.php");
			session_start();
			if(!sessionCheck()){
		?>
		<div class="hero-unit">
			<h2> Welcome to Connect : Madison's Distributed Chat System </h2>
			<h3>Login</h3>
			<form class="form-horizontal" action="login.php" method = "POST">
				<div class="control-group">
					<label class="control-label"><strong> Username: </strong></label>
					<div class ="controls">
						<input type="text" name="handle"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> Password: </strong></label>
					<div class ="controls">
						<input type="text" name="password"/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input class="btn btn-large btn-primary" type="submit" value="Log In!!">
					</div>
				</div>
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
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"> <strong> Connect Handle: </strong></label>
					<div class="controls">
						<input type="text" name="handle"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> Connect Password: </strong></label>
					<div class="controls">
						<input type="password" name="passwd"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><strong> E-mail: </strong> </label>
					<div class="controls">
						<input clas="btn" type="text" name="email"/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input class="btn btn-large btn-primary" type="submit" value="Sign Up!!">
					</div>
				</div>
				<div id="fb-root"></div>
				
			
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
		<textarea id="chatTexts" rows="15" cols="100" name="chatTexts">
		Chat Area
		</textarea> 
		</div>
		</td>
		<td height="70%" width="75%" background-color="#ffffff">
		<div id="friendList">
		<table class="table table-hover">
		<tr>
		<th> Friend List </th>
		</tr>
		
		</div>
		</table>
		
		</td>
		</tr>
		<tr width="100%">
		<td >
		<div id="chatInput">
			<textarea id='inputTextArea' maxlength="5000" placeholder="Enter Your Text Here" display='block' width='100%' height='100%' position='absolute' autofocus="autofocus">
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
		</div>
		<?php 
			} 
		?>
		<div>
			<script>
					FB.init({
					appId:'278629895590946', cookie:true,
					status:true, xfbml:true
					});
				</script>
				<fb:login-button>Login with Facebook</fb:login-button>
			</div>
	</body>
</html>
