<?php
session_start();
require('firstimport.php');

$tbl_name="interlist";

mysqli_select_db($conn,"$db_name") or die("cannot select db");
$k=0;
if(isset($_POST['byname']) && ($_POST['bynum']==""))
{
	$name1=$_POST['byname'];
	$k=2;
	$name1=strtoupper($name1);
	
	$tbl_name="train_list";
	$sql="SELECT * FROM $tbl_name WHERE Number='$name1' or Name='$name1' ";
	$result=mysqli_query($conn,$sql);
}
else if(isset($_POST['byname']) && isset($_POST['bynum']))
{
	$k=1;
	$from=$_POST['byname'];
	$to=$_POST['bynum'];
	$from=strtoupper($from);
	$to=strtoupper($to);
	$sql="SELECT * FROM $tbl_name WHERE (Ori='$from' or st1='$from' or st2='$from' or st3='$from' or st4='$from' or st5='$from') and (st1='$to' or st2='$to' or st3='$to' or st4='$to' or st5='$to' or Dest='$to')";
	$result=mysqli_query($conn,$sql);
}
else if((!isset($_POST['byname'])) && (!isset($_POST['bynum'])))
{
	$k=0;
	$from="";
	$to="";
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> SEARCH TRAIN </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="general.css">
		<link rel="stylesheet" type="text/css" href="login.css">		
		<link rel="stylesheet" type="text/css" href="train.css">	
		<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function()
		{
			var x=(($(window).width())-1024)/2;
			$('.wrap').css("left",x+"px");
		});
	</script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/man.js"></script>
	</head>
	<body>
		<div class="header">
			<img src="images\irlogo.png" align="left" width="220" height="130">
<pre><font face="Lucida" size="20"><u><a href="#">INDIAN RAILWAYS</a>
</pre></font>
			
		</div>	
		<div class="navbar">
			<a href="#">Home</a>
			<a href="train.php">Search Train</a>
			<a href="#">Reservation</a>
			<a href="#">Booking History</a>
		</div>
		<div class="container">
			<img src="images\search.jpg" width="1349px" height="490px">
			<div class="centered">	
			
			<div class="loginBox" id="boxh">
			<form style="margin:0px;" method="post" >
			<table align="center" style="margin-bottom:0px;">
				<tr>
					<th style="border-top:0px;"><label><b>Search Train</label>&nbsp;&nbsp;&nbsp;&nbsp;</th>
					<td style="border-top:0px;">
						<select id="myselect" onchange="clicker()">
						<option value="plf">By Station</option>
						<option value="name" >By Train Name</option>
						<option value="num" >By Train Number</option>
						</select>&nbsp;&nbsp;&nbsp;&nbsp;
					</td>
					<td id="mbox" style="border-top:0px;"> <label>From <br>Station </label></td>
					<td style="border-top:0px;"><input  type="text" name="byname" id="byn">&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td id="xbox" style="border-top:0px;"><label> To<br>Station </label></td>
					<td style="border-top:0px;"><input id="xbox1" type="text" name="bynum" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td style="border-top:0px;"><button class="btn-minimal" type="submit" value="Find">Find</button></td>
				</tr>		
			</table>
			<br><br><br>
			</form>

			<div style="height:40px;">
				<table align="center" border="2px">
				<tr>
					<th style="width:70px;border-top:0px;"> Train No.</th>
					<th style="width:200px;border-top:0px;"> Train Name </th>
					<th style="width:120px;border-top:0px;"> Source </th>
					<th style="width:120px;border-top:0px;"> Dest. </th>
					<th style="width:65px;border-top:0px;"> Arrival </th>
					<th style="width:70px;border-top:0px;"> Depart. </th>
				</tr>
				</table>
				<br>
			</div>
			<div style="margin-top:0px;overflow:auto;">
				<table align="center">
				<?php
				if($k==1)
				{	echo "<script> document.getElementById(\"byn\").value=\"$from\";
									   document.getElementById(\"xbox1\").value=\"$to\";
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
					<td style="width:75px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:220px;"><?php echo $row['Name']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Ori']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Dest']; ?> </td>
					<td style="width:70px;"> <?php echo $q; ?> </td>
					<td style="width:70px;"> <?php echo $d; ?> </td>
				</tr>
				<?php
					}
					else
					{
				?>
				<tr>
					<td style="width:70px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:200px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Ori']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Dest']; ?> </td>
					<td style="width:70px;"> <?php echo $q; ?> </td>
					<td style="width:70px;"> <?php echo $d; ?> </td>
				</tr>
				<?php
					}
					$n++;
					}
				}
				else if($k==2)
				{	$n=0;
					while($row=mysqli_fetch_array($result)){
					if($n%2==0)
					{
				?>
				<tr>
					<td style="width:75px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:220px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Departure']; ?> </td>
				</tr>
				<?php
					}	
					else
					{
				?>
				<tr>
					<td style="width:70px;"> <?php echo $row['Number']; ?> </td>
					<td style="width:200px;"> <?php echo $row['Name']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Origin']; ?> </td>
					<td style="width:120px;"> <?php echo $row['Destination']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Arrival']; ?> </td>
					<td style="width:70px;"> <?php echo $row['Departure']; ?> </td>		
				</tr>
				<?php
					}
					$n++;
					}
				}
				else
				{
				    echo "<div style=\"margin:100px 350px;\"> </div>";
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