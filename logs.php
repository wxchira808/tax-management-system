<?php

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database


$_SESSION['taxpayer_id']=$userid;
 $_SESSION['usertype']=$usertype;
 $_SESSION['event']=$event;
 $event="Logged In";

 
$insert = "INSERT INTO logs(user_id, user_type,event) VALUES($userid,$usertype,$event)";
         mysqli_query($data, $insert);





?>