<?php
session_start();
require('firstimport.php');
if(isset($_SESSION['name'])){}
	else{
		header("location:login1.php");
		
	}
$tbl_name="users"; 

mysqli_select_db($conn,"$db_name")or die("cannot select DB");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass=$_POST['psd'];
$mail=$_POST['eid'];
$gender=$_POST['gnd'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];

$sql2="select * from $tbl_name";
$result2=mysqli_query($conn,$sql2);
$flag=0;
while($row=mysqli_fetch_array($result2)){
	if($row['email']==$mail){
		echo ""."matched";
		$flag=1;
		break;
	}
}
if($flag==1){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='signup.php?value=1';
    </SCRIPT>");
	die("");
	}
else{
	$sql="INSERT INTO $tbl_name(f_name,l_name,password,email,gender,dob,mobile)
	VALUES ('$fname','$lname','$pass','$mail','$gender','$dob','$mobile')";
	$result=mysqli_query($conn,$sql);

	$_SESSION['name']=$fname;
	header("location:success.php");
	
}
?>