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
	$sql="SELECT DISTINCT Tnumber,class,doj,DOB,fromstn,tostn,Status FROM $tbl_name WHERE uname='$name1' ORDER BY doj ASC";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
 
$tnum=$row['Tnumber'];
$cl=$row['class'];
$result=mysqli_query($conn,"SELECT * FROM train_list WHERE Number='$tnum'");

$row=mysqli_fetch_array($result);
$tname=$row['Name'];
$result=mysqli_query($conn,$sql);

			 if(isset($_SESSION['name']))
			 {
			 //echo "Welcome,".$_SESSION['name']."&nbsp;&nbsp;&nbsp;<a href=\"logout.php\" class=\"btn btn-info\">Logout</a>";
			 }
			 else
			 {
				$_SESSION['error']=15;
				header("location:login1.php");
			 } 
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
			<img src="images\search.jpg" width="1349px" height="490px">
			<br>
		<div class="centered">
			<div class="loginBox">
				<h2><font face="comic sans ms"><b>Booked Ticket History</b></h2></font>
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
					<th style="width:100px;border-top:0px;">Train Number</th>
					<th style="width:100px;border-top:0px;">Date Of Journey</th>
					<th style="width:100px;border-top:0px;">From</th>
					<th style="width:100px;border-top:0px;">To</th>
					<th style="width:100px;border-top:0px;">Date Of Booking</th>
					<th style="width:100px;border-top:0px;">Current Status</th>
					<th style="width:100px;border-top:0px;">!-----!</th>
				</tr>	
				<?php
				
				$n=1;
				while($row=mysqli_fetch_array($result)){
					if($n%2!=0)
					{
				?>
				<tr>
					<th style="width:10px;"> <?php echo $n; ?> </th>
					<th style="width:100px;"> <?php echo $row['Tnumber']; ?> </th>
					<th style="width:100px;"> <?php echo $row['doj']; ?> </th>
					<th style="width:100px;"> <?php echo $row['fromstn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['tostn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['DOB']; ?> </th>
					<th style="width:100px;"> <?php echo $row['Status']; ?> </th>
					<th style="width:100px;"><a href="viewalltickets.php?Tnumber=<?php echo $row['Tnumber'];?>&doj=<?php echo $row['doj'];?>&fromstn=<?php echo $row['fromstn']; ?>&tostn=<?php echo $row['tostn']; ?>&DOB=<?php echo $row['DOB'];?>">Show Tickets</a> </th>
				</tr>
				<?php 
					}
					else
					{
				?>
				<tr>
					<td style="width:10px;"> <?php echo $n; ?> </td>
					<th style="width:100px;"> <?php echo $row['Tnumber']; ?> </th>
					<th style="width:100px;"> <?php echo $row['doj']; ?> </th>
					<th style="width:100px;"> <?php echo $row['fromstn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['tostn']; ?> </th>
					<th style="width:100px;"> <?php echo $row['DOB']; ?> </th>
					<th style="width:100px;"> <?php echo $row['Status']; ?> </th>					
					<th style="width:100px;"><a href="viewalltickets.php?Tnumber=<?php echo $row['Tnumber'];?>&doj=<?php echo $row['doj'];?>&fromstn=<?php echo $row['fromstn']; ?>&tostn=<?php echo $row['tostn']; ?>&DOB=<?php echo $row['DOB'];?>">Show Tickets </a> </th>
				</tr>
				<?php
					}
					$n++;
				}
				?>			
				</table>
			</div>	
			<br>
			<a href="home1.php">Return To Home</a>
				</div>
			</div>
		</div>
	</body>
</html>