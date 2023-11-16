<?php  

session_start();
$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database






$emailaddress=$_SESSION['email']; //getting user's email

 $sql="SELECT * FROM user WHERE email='$emailaddress'";

 $result=mysqli_query($data,$sql);

 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 $count=mysqli_num_rows($result);

	$userid=$row["taxpayer_id"];
   $usertype=$row["usertype"];
   $event="Logged In"; 

   $insert = "INSERT INTO logs(user_id,user_type,event_type) VALUES('$userid','$usertype','$event')";
   
   $result = mysqli_query($data, $insert);


   if($row["usertype"]=="taxpayer")
   {

      $_SESSION['email']=$emailaddress; //to send username to taxpayerhome.php
      $_SESSION['usertype']="taxpayer"; //specifying user type

  

      header("location:taxpayerhome.php");

   }
   if($row["usertype"]=="admin")
   {
      $_SESSION['email']=$emailaddress; //to send username to adminhome.php
      $_SESSION['usertype']="admin"; //specifying user type
      
      header("location:adminhome.php");

   }
   if($row["usertype"]=="employer")
   {
      $_SESSION['email']=$emailaddress; //to send username to adminhome.php
      $_SESSION['usertype']="employer"; //specifying user type
      
      header("location:employerhome.php");

   }
?>