<?php
session_start();

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> LOGIN </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">		
		<link rel="stylesheet" type="text/css" href="login.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script>
			$(document).ready(function()
			{
				var x=(($(window).width())-1024)/2;
				$('.wrap').css("left",x+"px");
			});
		</script>		
	</head>
	<body>
		<div class="header">
			<img src="images\irlogo.png" align="left" width="220" height="130">
<pre><font face="Lucida" size="20"><u><a href="home.php">INDIAN RAILWAYS</a>
</pre></font>
		
		</div>	
		<div class="navbar">
			<a href="home.php">Home</a>
			<a href="train.php">Search Train</a>
			<a href="login1.php">Reservation</a>
			<a href="login1.php">Booking History</a>
		</div>
		
		<div class="container">
			<img src="images\login.jpg" width="1349px" height="490px">
			<div class="centered">
				<div class="loginBox">
					<h2>Login</h2>
					<form method="post" class="minimal" action="login.php">
						<label for="username">
							Username
							<input type="text" name="user" id="user" required="required"/>
						</label>
						<label for="password">
							Password:
							<input type="password" name="psd" id="psd" required="required" />
						</label>
						<button type="submit" class="btn-minimal">Login</button>
					</form>	
					<br>
					<button onclick="window.location.href='signup.php?value=0'" class="btn-minimal">Not Registered ? Register</button>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
if(isset($_SESSION['error']))
{
if($_SESSION['error']==1)
echo "<script>document.getElementById(\"wrong\").style.visibility=\"\";</script>";
session_destroy();
}

?>	