<?php  
session_start();
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");	
	}
require('firstimport.php');
$tbl_name="interlist";
mysqli_select_db($conn,"$db_name") or die("cannot select db");
$tostn = '';
$fromstn = '';
$doj = '';
if(isset($_POST['from']) && isset($_POST['to']))
{	$k=1;
	$tostn = $_POST['to'];
	$fromstn = $_POST['from'];
	$doj = $_POST['date'];
	$from=$_POST['from'];
	$to=$_POST['to'];
	$from=strtoupper($from);
	$tostn=strtoupper($tostn);
	$fromstn=strtoupper($fromstn);
	$to=strtoupper($to);
	$day=date("D",strtotime("".$doj));

	$sql="SELECT * FROM $tbl_name WHERE (Ori='$from' or st1='$from' or st2='$from' or st3='$from' or st4='$from' or st5='$from') and (st1='$to' or st2='$to' or st3='$to' or st4='$to' or st5='$to' or Dest='$to') and ($day='Y')";
	$result=mysqli_query($conn,$sql);
}
else if((!isset($_POST['from'])) && (!isset($_POST['to'])))
{	$k=0;
	$from="";
	$to="";
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> TICKET RESERVATION </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">
		<link rel="stylesheet" type="text/css" href="login.css">		
		<link rel="stylesheet" type="text/css" href="reservation.css">	
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
			<img src="images\booking.jpg" width="1349px" height="700px">
			<div class="centered">	
			
			<div class="loginBox" id="boxh" align="center">
			<form style="margin:0px;" method="post" action="reservation.php">
			<table style="margin-bottom:0px;">
				<tr>
					<th style="border-top:0px;"><label><b>Reserve Ticket:</label>&nbsp;&nbsp;&nbsp;&nbsp;</th>
					
					<td id="mbox" style="border-top:0px;"> <label>From<br>Station</label></td>
					<td style="border-top:0px;"><input  type="text" name="from" id="fr">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					
					<td id="xbox" style="border-top:0px;"><label>To<br>Station </label></td>
					<td style="border-top:0px;"><input id="to1" type="text" name="to" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					
					<td style="border-top:0px;"><label>Date<label></td>
					<td style="border-top:0px;"><input type="date" name="date" max="<?php echo date('Y-m-d',time()+60*60*24*90);?>" min="<?php echo date('Y-m-d')?>" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}else {echo date('Y-m-d');}?>"> </td>
					
					<td style="border-top:0px;"><button class="btn-minimal" type="submit" value="Find">Find</button></td>
				</tr>		
			</table>
			<br><br><br>
			</form>

			<div style="height:40px;">
				<table border="2px">
				<tr>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:210px;border-top:0px;"> Train Name </th>
					<th style="width:120px;border-top:0px;"> Source </th>
					<th style="width:120px;border-top:0px;"> Dest. </th>
					<th style="width:65px;border-top:0px;"> Arrival </th>
					<th style="width:70px;border-top:0px;"> Depart. </th>
					<th style="width:200px;border-top:0px;">Seat Types</th>
				</tr>
				</table>
				<br>
			</div>
			<div style="margin-top:0px;overflow:auto;">
				<table>
				<?php  
					
					if($k==1)
					{
						
						echo "<script> document.getElementById(\"fr\").value=\"$from\";
									   document.getElementById(\"to1\").value=\"$to\";
									   
							</script>";
						$n=0;
						while($row=mysqli_fetch_array($result)){
					
						if($from==$row['st1'])
						{	$q=$row['st1arri'];
						}
						else
						if($from==$row['st2'])
						{	$q=$row['st2arri']; }
						else if($from==$row['st3'])
						{	$q=$row['st3arri']; }
						else if($from==$row['st4'])
						{	$q=$row['st4arri']; }
						else if($from==$row['st5'])
						{	$q=$row['st5arri']; }
						else if($from==$row['Ori'])
						{	$q=$row['Oriarri']; }
						else if($from==$row['Dest'])
						{	$q=$row['Destarri'];}
						
						$p1=substr($q,0,2);
						$p2=substr($q,3,2);
						$p2=$p2+5;
						if($p2<10)
						{$p2="0".$p2;}
						$d=$p1.":".$p2;
					if($n%2==0)
					{
				
				?>
				<tr>
					<td style="width:75px;"> <?php   echo $row['Number']; ?> </td>
					<td style="width:210px;"> <?php echo $row['Name']; ?> </a></td>
					<td style="width:120px;"> <?php echo $row['Ori']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Dest']; ?> </td>
					<td style="width:70px;"> <?php   echo $q; ?> </td>
					<td style="width:70px;"> <?php   echo $d; ?> </td>
					<td style="width:200px;">   
					<h5>	
						<a href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&class=<?php echo "2A";?>"><b>2A</b></a>
						<a href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&class=<?php echo "3A";?>"><b>3A</b></a> 
						<a href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&class=<?php echo "SL";?>"><b>SL</b></a> 
					</h5>	
					</td>
					</tr>
				<?php  
					}
					else
					{
				?>
				<tr>
					<td style="width:75px;"> <?php  echo $row['Number']; ?> </td>
					<td style="width:210px;"><?php  echo $row['Name']; ?> </a> </td>
					<td style="width:120px;"> <?php  echo $row['Ori']; ?> </td>
					<td style="width:120px;"> <?php  echo $row['Dest']; ?> </td>
					<td style="width:70px;"> <?php  echo $q; ?> </td>
					<td style="width:70px;"> <?php  echo $d; ?> </td>
					<td style="width:200px;"> 
					<h5>
						<a href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&class=<?php echo "2A";?>"><b>2A</b></a>
						<a href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&class=<?php echo "3A";?>"><b>3A</b></a>
						<a href="reser.php?tno=<?php echo$row['Number']?>&fromstn=<?php echo $fromstn ?>&tostn=<?php echo $tostn ?>&doj=<?php echo $doj ?>&class=<?php echo "SL";?>"><b>SL</b></a>
					</h5>
					</td>
				</tr>
				<?php  
					}
					$n++;
					}
				}
				else
				{
					echo "<div style=\"margin:100px 180px;\"> </div>";
				}
					
					mysqli_close($conn);
				?> 
				</table>
			</div>
			</div>
		</div>
		</div>
	</body>
</html>