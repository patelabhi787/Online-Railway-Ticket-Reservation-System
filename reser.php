<?php
session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");		
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> PASSENGER INFO </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="register.css">	
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
			<img src="images\reser.jpg" width="1349px" height="650px">
			<div class="centered">	
			<div class="loginBox" id="boxh">
			<form method="get" action="booking.php">
				<table cellpadding="5px" cellspacing="5px" align="center" style="border-style:dashed;">
				<col width="120">
				<col width="70">
				<col width="70">
				<col width="80">
				<col width="80">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="90">
				<tr>
					<th style="border-top:0px;">Journey date:</th>
					<th style="border-top:0px;"> Train No./Name:</th>
					<th style="border-top:0px;">From Station:</th>
					<th style="border-top:0px;">To Station:</th>
					<th style="border-top:0px;"> 1A</th>
					<th style="border-top:0px;"> 2A </th>
					<th style="border-top:0px;"> 3A </th>
					<th style="border-top:0px;"> SL </th>
				</tr>
				<tr>
					<td style="border-top:0px;"> <?php echo $_GET['doj'];?> </td>
					<input name="doj" style="display:none;" type="text" value="<?php echo $_GET['doj'];?>">
					<input name="dob" style="display:none;" type="text" value="<?php echo date("Y-m-d");?>">
					<td style="border-top:0px;"> <?php echo $_GET['tno'];?> </td>
					<input name="tno" style="display:none;" type="text" value="<?php echo $_GET['tno'];?>"> </td>
					
					<td style="border-top:0px;"><?php echo $_GET['fromstn'];?></td>
					<input name="fromstn" style="display:none;" type="text" value="<?php echo $_GET['fromstn'];?>"> </td>
					
					<td style="border-top:0px;"><?php echo $_GET['tostn'];?></td>
					<input name="tostn" style="display:none;" type="text" value="<?php echo $_GET['tostn'];?>"> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="1A" onclick="return false;" <?php if($_GET['class']=='1A') {echo 'checked';}?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="2A" onclick="return false;" <?php if($_GET['class']=='2A') echo 'checked';?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="3A" onclick="return false;" <?php if($_GET['class']=='3A') echo 'checked';?>> </td>
					
					<td style="border-top:0px;"> <input type="radio" name="selct" value="SL" onclick="return false;" <?php if($_GET['class']=='SL') echo 'checked';?>> </td>
				</tr>
				</table>
		<br/><br/>			
		<div style="margin-top:0px;height:415px;">
		<h2><font face="comic sans ms"><b><u>Passenger Info</u></b></font></h2>
			<table align="center">
				<tr>
					<th style="width:100px;height:50px;border-top:0px;"> S.No.</th>
					<th style="width:200px;height:50px;border-top:0px;"> Passenger Name</th>
					<th style="width:100px;height:50px;border-top:0px;"> Age </th>
					<th style="width:200px;height:50px;border-top:0px;"> Gender </th>
				</tr>
				<tr>
					<td>1</td>
					<td><input type="text" name="name1"></td>
					<td><input type="text" size="3" name="age1"></td>
					<td><input type="radio" value="male" name="sex1"/>Male&nbsp;&nbsp;<input type="radio" value="female" name="sex1"/>Female
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><input type="text" name="name2"></td>
					<td><input type="text" size="3" name="age2"></td>
					<td><input type="radio" value="male" name="sex2"/>Male&nbsp;&nbsp;<input type="radio" value="female" name="sex2"/>Female
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td><input type="text" name="name3"></td>
					<td><input type="text" size="3" name="age3"></td>
					<td><input type="radio" value="male" name="sex3"/>Male&nbsp;&nbsp;<input type="radio" value="female" name="sex3"/>Female
					</td>
				</tr>	
			</table>
			<br><br><br>
			<button class="btn-minimal" type="submit" id="subb">Click Here to Submit</button>
			<h4><font color="red">*Maximum 3 tickets can be booked*</font></h4>
			</form>
			</div>
		</div>
		</div>
	</body>
</html>