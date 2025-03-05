<?php 
include("connection.php");

$flag=$_REQUEST['flag'];
switch($flag)
{
case 1:	
	$name=$_POST['categary'];
	$date=date("d/m/y");
	date_default_timezone_set("asia/kolkata");
	$time=date("h:i:sa");
	$datetime=$date." ".$time;
	$insert="insert into categary(categaryName,datetime) values('$name','$datetime')";

	$res=mysqli_query($con,$insert) or die("query error");
	break;
case 2:
     $categary=$_POST['categary'];
     $sub_categary=$_POST['Sub_categary'];
     $date=date("d/m/y");
	date_default_timezone_set("asia/kolkata");
	$time=date("h:i:sa");
	$datetime=$date." ".$time;
	
	$insert="insert into subcategary(categaryId,SubCategaryName,datetime) values('$categary','$sub_categary','$datetime')";
	$res=mysqli_query($con,$insert) or die("query error");
	if($res)
	{
      echo "<script>
	       alert('query successfully');
		   window.location.href='../sub_cate.php';
	      </script>";		
	}
	else
	{
		echo "<script>
	       alert('data insertion failled');
		   window.location.href='../sub_cate.php';
	      </script>";		
	}
    break; 	

case 3:
      $pname=$_POST["pname"];
      echo $pname;
      $tagline=$_POST['tagline'];
	  echo $tagline;
	  $categary=$_POST['categary'];
	  echo $categary;
	  $Sub_categary=$_POST['Sub_categary'];
	   echo $Sub_categary;
	  $Brand=$_POST['Brand'];
	    echo $Brand;
	  $units=$_POST['Units'];
	  echo $units;
	  $price=$_POST['Price'];
	  echo $price;
	  $Discount=$_POST['Discount'];
	  echo $Discount;
	  /*-----img1 code----------*/
	  $imgname1=$_FILES['img1']['name'];
	  echo $imgname1;
	  $imgtmpname1=$_FILES['img1']['tmp_name'];
	  $img1size=$_FILES['img1']['size'];
	  $img1size=$img1size/1024;
	  $location="../../image/".$imgname1;
	  /*-----img2 code----------*/
	  $imgname2=$_FILES['img2']['name'];
	  $imgtmpname2=$_FILES['img2']['tmp_name'];
	  $img2size=$_FILES['img2']['size'];
	  $img2size=$img2size/1024;
	  $location2="../../image/".$imgname2;
	  /*-----img1 code----------*/
	  $imgname3=$_FILES['img3']['name'];
	  $imgtmpname3=$_FILES['img3']['tmp_name'];
	  $img3size=$_FILES['img3']['size'];
	  $img3size=$img3size/1024;
	  $location3="../../image/".$imgname3;
	  $description=$_POST['description'];
	  $date=date("d/m/y");
	  date_default_timezone_set("asia/kolkata");
	  $time=date("h:i:sa");
	  $datetime=$date."  ".$time;
	  $insert="insert into product(productName,productTagLine,categary,subCategary,brand,unit,price,discount,image1,image2,image3,Description,stock,date) values('$pname','$tagline','$categary','$Sub_categary','$Brand','$units','$price','$Discount','$imgname1','$imgname2','$imgname3','$description','true','$datetime')";
	  $res=mysqli_query($con,$insert);
	  if($res)
	  {          
		  move_uploaded_file($imgtmpname1,$location);
		  move_uploaded_file($imgtmpname2,$location2);
		  move_uploaded_file($imgtmpname3,$location3);
		  echo "<script>alert('file uploaded successfully');
		        window.location.href='../Product.php';
				</script>";
	  }
	  else
	  {
		 echo"<script>alert('insert query failled');</script>";  
	  }
   break;	
case 4:
      
	  
	  $description=$_POST['description'];
	  echo $description."<br/>";
	   
	  $imgname=$_FILES['image']['name'];
	  echo $imgname."<br/>";
	  $imgtmpname=$_FILES['image']['tmp_name'];
	  echo $imgtmpname."<br/>";
	 $imgsize=$_FILES['image']['size'];
	  $imgsize=$imgsize/1024;
	  $location="../../image/".$imgname; 
	  echo $location;
	  
	  $date=date('Y-m-d');
	  date_default_timezone_set('asia/kolkata');
	  $time=date("h:i:sa");
	  $datetime=$date."  ".$time;
	  $insert="insert into offers(image,description,datetime) value('$imgname','$description','$datetime')";
	  $query=mysqli_query($con,$insert) or die("qury error");
	  if($query)
	  {
		   move_uploaded_file($imgtmpname,$location);
		   echo "<script>alert('file uploaded successfully');
		        window.location.href='../slider.php';
				</script>";
	  }
	  else{
		 echo "<script>alert('error created');
		        window.location.href='../slider.php';
				</script>";  
	  }
	  
break;  

case 5:
		 $rowid=$_POST['rowid'];
		 echo $rowid;
		 $query="delete from user where userid='$rowid'";
		 $q=mysqli_query($con,$query) or die('query error');
		 if($q)
		 {
				header('location:../userloginshow.php');
		 }
		 else
		 {
			 echo "<script>alert('data not deleted'); 
			       window.location.href='../userloginshow.php';
			       </script>";
		 }
break;  

case 6:
		$id=$_REQUEST['did'];
		echo $id;
		$delete="delete from orders where OrderId='$id'";
		$q=mysqli_query($con,$delete) or die('query error');
		
break;
case 7:
    $id=$_REQUEST['did1'];
	//echo $id;
	$delete="delete from orders where OrderId='$id'";
	$q=mysqli_query($con,$delete) or die('query error');
		if($q)
		{
			$de="delete from orderproducts where OrderId='$id'";
			$query=mysqli_query($con,$de) or die('orderproducts error query');
			if($query)
			{
				header("location:../allusers.php");
			}
			else
			{
				echo "<script> alert('data not deleted');
				  window.location.href='../allusers.php';
				 </script>";
			}
			
		}
		else
		{
			echo "<script> alert('data not deleted');
				  window.location.href='../allusers.php';
				 </script>";
		}
break;

case 8:
    $id=$_REQUEST['did2'];
	echo $id;
	$delete="delete from orders where OrderId='$id'";
		$q=mysqli_query($con,$delete) or die('query error');
		if($q)
		{
			header("location:../orderPost.php");
		}
		else
		{
			echo "<script> alert('data not deleted');
				  window.location.href='../allusers.php';
				 </script>";
		}
break;

case 9:
	
	$from=$_POST['from'];
	echo $from."<br/>";
	$to=$_POST['to'];
	echo $to."<br/>";
	$subject=$_POST['subject'];
	echo $subject."<br/>";
	$message=$_POST['message'];
	echo $message."<br/>";
	
$headers="a=MIME-Version:1.0"."\r\n";
$headers="Content-type:text/html;charset:UTF-8"."\r\n";

if(mail($to,$subject,$message,$from))
{
	echo "<script> alert('email send successfully');
	      window.location.href='../contact1.php';
	     </script>";
}
else
{
 echo "<script> alert('email not failled');
	      window.location.href='../contact1.php';
	     </script>";	
}
break;

case 10:
      $id=$_POST['derow'];
	  //echo $id;
	  $de="delete from contact where id='$id'";
	  $q=mysqli_query($con,$de) or die('error delete');
	  if($q)
	  {
		  header('location:../contact1.php');
	  }
	  else
	  {
		  echo "<script>alert('data not deleted');
		        window.location.href='../contact1.php';
		         </script>";
	  }
break;
}
?>






