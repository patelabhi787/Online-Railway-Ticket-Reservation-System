<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> INDIAN RAILWAYS TICKET RESERVATION </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">	
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
			<img src="images\home.jpg" width="1349px" height="490px">
			<div class="centered">
				<font face="arial black" size="5">
				<a href="login1.php">Login</a>&nbsp;&nbsp;&nbsp;
				<a href="signup.php?value=0">Sign in</a>
				</font>
			</div>
		</div>
	</body>
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>