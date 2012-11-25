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
		<script src="chat_post_msg.js"></script>
		<script type="text/javascript">  
			FB.init
			({
				appId:'278629895590946', cookie:true,
				status:true, xfbml:true
			});
			
		</script>
	</head>
	<body >
		<?php
			include("library.php");
			include_once("fbconnect.php");
			//session_start();
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
						<h4> TEST-OR </h4>
						<a href="<?php echo $loginUrl;?>"><img src="images/f-connect.png" alt="Connect to your Facebook Account"></a>
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
		<div id="footer">
			<div class="headerDiv">
				<p class="muted credit" align='center'> Connect Service brought to you by Irtiza Ahmed Akhtar and Zainab Ghadiyali	</p>
			</div>
		</div>
		<?php
		}
		else
		{
			if (isset($_POST['handleName']))
			{
				echo $_SESSION['connected'];
			}
			drawLoginStatus();
		?>
		<div id="contentWrap" class="contentWrap">
			<div id="upperPanel" class="hero-unit">
				<textarea id="chatTexts"  name="chatTexts" readOnly="readOnly"></textarea> 
			</div>
			<div id="rightPanel">
				<label> Online Friends</label>
				<table id="friendList" name="friendList" class="table table-hover">
					
				</table>
			</div>
		</div>
		
		<div id="bottomPanel" class="contentWrap">
			<div id="bottomLeftPanel" class="hero-unit">
				<textarea id="inputTextArea" name="inputTextArea" placeholder="Enter Your Text Here"></textArea>
			</div>
			<div id="bottomRightPanel">
				<?php
					drawButton("submitChat", "Enter", "submitChat()");
				?>
			</div>
		</div>
			
		
		<div id="footer">
			<div class="headerDiv">
				<p class="muted credit" align='center'> Connect Service brought to you by Irtiza Ahmed Akhtar and Zainab Ghadiyali	</p>
			</div>
		</div>
	
		<?php 
			} 
		?>
		
	</body>
</html>
