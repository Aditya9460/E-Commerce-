<?php 
 session_start();
 $lg=$_SESSION['user'];
 
 include("connection.php");
 
$date=date("d/m/y");
date_default_timezone_set("asia/kolkata");
$time=date("h:i:sa");
$datetime=$date." ".$time;
if($lg)
{
	$up="update login set login_status='false' ,logoutdatetime='$datetime' where email='$lg'";
	if(mysqli_query($con,$up))
	{
		 session_destroy();
		header("location:../index.php");
	}
	else
	{
	   echo "login failled";	
	}
}
else
{
	echo "session error";
}
?>