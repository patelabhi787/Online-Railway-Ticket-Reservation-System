<?php
session_start();
	
require('firstimport.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="booking";

mysqli_select_db($conn,"$db_name") or die("cannot select db");
	$name1=$_SESSION['name'];
	$tno=$_GET['Tnumber'];
	$doj=$_GET['doj'];
	$fromstn=$_GET['fromstn'];
	$tostn=$_GET['tostn'];
	$DOB=$_GET['DOB'];
	$sql="SELECT Tnumber,doj,Name,Age,Sex,Status,DOB,class FROM $tbl_name WHERE (uname='$name1' and Tnumber='$tno' and doj='$doj' and DOB='$DOB' and fromstn='$fromstn' and tostn='$tostn')";
	$result=mysqli_query($conn,$sql);
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title> BOOKING HISTORY </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">		
		<link rel="stylesheet" type="text/css" href="login.css">
		<link rel="stylesheet" type="text/css" href="reservation.css">
		<link rel="stylesheet" type="text/css" href="display.css">
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
		<div style="float:right; position:absolute; top:33px; right:0; font-size:20px; margin-top:20px; background-color: #f44336; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block; border: 2px solid lightcyan;">
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
			<img src="images\register.jpg" width="1349px" height="750px">
			<br>
		<div class="centered">
			<div class="loginBox">
				<h2><font face="comic sans ms"><b>Booked Ticket History</b></h2></font>
			<br>
			<div>
				<table align="center" cellspacing="10px" cellpadding="10px" style="border-style:dashed;">
				<col width="90">
				<col width="90">
				<col width="90">
				<col width="110">
				<col width="90">
				<col width="90">
				<col width="90">
				<col width="90">
				<tr>
					<th style="width:10px;border-top:0px;">SNo.</th>
					<th style="width:55px;border-top:0px;">Train Number</th>
					<th style="width:150px;border-top:0px;">Date Of Journey</th>
					<th style="width:150px;border-top:0px;">Name</th>
					<th style="width:30px;border-top:0px;">Age</th>
					<th style="width:40px;border-top:0px;">Sex</th>
					<th style="width:100px;border-top:0px;">Status</th>
					<th style="width:150px;border-top:0px;">DOB</th>
					<th style="width:50px;border-top:0px;">Class</th>
				</tr>	
				<?php
				
				$n=1;
				while($row=mysqli_fetch_array($result)){
					if($n%2!=0)
					{
						$GLOBALS['class']=$row['class'];
						
				?>
				<tr>
					<th style="width:10px;"> <?php echo $n; ?> </th>
					<th style="width:55px;"> <?php echo $row['Tnumber']; ?> </th>
					<th style="width:150px;"> <?php echo $row['doj']; ?> </th>
					<th style="width:150px;"> <?php echo $row['Name']; ?> </th>
					<th style="width:30px;"> <?php echo $row['Age']; ?> </th>
					<th style="width:40px;"> <?php echo $row['Sex']; ?> </th>
					<th style="width:100px;"> <?php echo $row['Status']; ?> </th>
					<th style="width:150px;"> <?php echo $row['DOB']; ?> </th>
					<th style="width:50px;"> <?php echo $class; ?> </th>
				</tr>
				<?php 
					}
					else
					{
				?>
				<tr>
					<th style="width:10px;"> <?php echo $n; ?> </th>
					<th style="width:55px;"> <?php echo $row['Tnumber']; ?> </th>
					<th style="width:150px;"> <?php echo $row['doj']; ?> </th>
					<th style="width:150px;"> <?php echo $row['Name']; ?> </th>
					<th style="width:30px;"> <?php echo $row['Age']; ?> </th>
					<th style="width:40px;"> <?php echo $row['Sex']; ?> </th>
					<th style="width:100px;"> <?php echo $row['Status']; ?> </th>
					<th style="width:150px;"> <?php echo $row['DOB']; ?> </th>
					<th style="width:50px;"> <?php echo $class; ?> </th>
				</tr>
				<?php
					}
					$n++;
				}
				?>
				<?php 
				$sql2="Select ".$class." from train_list WHERE Number=$tno";
				//echo $sql2;
				$result2=mysqli_query($conn,$sql2);
				while($row=mysqli_fetch_array($result2)){
					$GLOBALS['amt']=$row[$class];
				}
				?>
				</table>
				
				<p align="left"><font face="arial black" size="5"<td><u>Amount Paid</u> : <?php $tot=($n-1)*$amt;echo $tot;?> Rs.</td></p></font>
			</div>
			<p align="center">
			<button class="btn-minimal" onClick="window.print()">Print</button>
			<br>
			<hr>
			<br>
			<a href="home1.php">Return To Home</a>
			</p>
			</div>
		</div>
	</body>
</html>