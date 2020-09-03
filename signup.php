<?php
	$val=$_GET['value'];
	if($val==1){
	?>
	<h3>USer already exists</h3
	<?php
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> REGISTRATION </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="register.css">
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
			<img src="images\register.jpg" width="1349px" height="850px">
			<div class="centered">
				<div class="loginBox">
					<h2>Registration</h2>
						<form method="post" class="minimal" action="register.php" onsubmit="return valid12()">
							<label for="first name">
							First Name:
								<input type="text" name="fname" id="fn" required="required"/>
							</label>
							<br>
							<label for="last name">
							Last name:
								<input type="text" name="lname" id="ln" required="required"/>
							</label>
							<br>
							<label for="email id">
							Email id:
								<input type="text" name="eid" placeholder="Ex: abc@gmail.com" pattern="(\W|^)[\w.+\-]*@gmail\.com(\W|$)" required="required"/>
							</label>
							<br>
							<label for="dob">
							Date of Birth:
								<input type="date" name="dob" min="2000-01-01" max="2018-12-31" required="required">
							</label>
							<br>
							<label for="password">
							Password:
								<input type="password" name="psd" id="ps" required="required">
							</label>
							<br>
							<label for="gender">
							Gender:
								<input type="radio" value="male" name="gnd"/>Male<input type="radio" value="female" name="gnd"/>Female
							</label>
							<br>
							<label for="phone">
							Mobile number:
								<input type="text" name="mobile" id="mn" placeholder="Enter a 10 digit mobile number" pattern="[789][0-9]{9}" required="required"/>
							</label>
							<br>
							<button type="submit" class="btn-minimal" id="subb">Register</button>
						</form>	
				</div>
			</div>
		</div>
	</body>
</html>