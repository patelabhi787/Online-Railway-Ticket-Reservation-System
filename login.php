<?php
session_start();

$uname=$_POST['user'];
$pass=$_POST['psd'];

require('firstimport.php');

$tbl_name="users"; 

mysqli_select_db($conn,"$db_name")or die("cannot select DB");


$sql="SELECT * FROM $tbl_name WHERE f_name='$uname' and password='$pass'";
echo "$sql";

$result=mysqli_query($conn,$sql) or trigger_error(mysql_error.$sql);


if(mysqli_num_rows($result) < 1)
{
	echo " .... LOGIN TRY  ....";
	$_SESSION['error'] = "1";
	header("location:login1.php"); 
}
else
{
	$_SESSION['name'] = $uname; 
	echo " ....   LOGIN  ....";
	echo $_SESSION['name'];
	header("location:home1.php");    
}

?>

	