<?php 
session_start();
include("connection.php");

$email=$_POST['email'];
//echo $email;

$password=$_POST['password'];
//echo $password;

$date=date("d/m/y");
date_default_timezone_set("asia/kolkata");
$time=date("h:i:sa");

$datetime=$date." ".$time;

//echo $datetime;

$sel="select * from login where email='$email' or password='$password'";
$query=mysqli_query($con,$sel);
$row=mysqli_fetch_array($query,MYSQL_BOTH);

$count=$row['login_count'];
$count=$count+1;
if($row)
{
   if($row['email']==$email)	
   {
	   if($row['password']==$password)
	   {
		   
	   $up="update login set login_datetime='$datetime',login_status='true',login_count='$count' where email='$email'";
	   $query=mysqli_query($con,$up) or die("query error");
	     if($query)
		 {
			 header("location:../dashboard.php");
			 $_SESSION['user']="$email";
		 }
		 else
		 {
			echo "<script>alert('query not successfully');</script>"; 
		 }
	   }
	   else
	   {
		  echo "<script> alert('password  not match');
		                  window.location.href='../index.php';
		        </script>";  
		   
	   }
	   
   }
   else
   {
	  echo "<script> 
	             alert('email not match');
				  window.location.href='../index.php';
			</script>";  
   }
}
else
{
   echo "<script> 
              alert('data not exit');
              window.location.href='../index.php';
         </script>";	
  
}

?>