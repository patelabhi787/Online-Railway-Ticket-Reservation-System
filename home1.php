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
<pre><font face="Lucida" size="20"><u><a href="home1.php">INDIAN RAILWAYS</a>
</pre></font>
		<div style="float:right; position:absolute; top:15px; right:0; font-size:20px; margin-top:20px; background-color: #f44336; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block; border: 2px solid lightcyan;">
			<?php
			 if(isset($_SESSION['name']))	
			 {
			 echo "Welcome,".$_SESSION['name']."-&nbsp;&nbsp;&nbsp;<a href=\"logout.php\">Logout</a>";
			 }
			 ?>
		</div>
		</div>	
		<div class="navbar">
			<a href="home1.php">Home</a>
			<a href="train.php">Search Train</a>
			<a href="reservation.php">Reservation</a>
			<a href="display.php">Booking History</a>
		</div>
		<div class="container">
			<img src="images\home.jpg" width="1349px" height="490px">
		</div>
	</body>
</html>

<?php

if(isset($_SESSION['error']))
{
session_destroy();
}

?>