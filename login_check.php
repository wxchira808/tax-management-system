<?php



$message_sent= false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


//error_reporting(0);
session_start();

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database


    //generate otp
    function generate_otp($n)
{
   $gen = "1357902468";
   $res = "";
   for ($i = 1; $i <= $n; $i++)
{
   $res .= substr($gen, (rand()%(strlen($gen))), 1);
}
   return $res;
}
$num = 8;
//print_r("The one time password generated is :");
$genotp=(generate_otp($num));



if($_SERVER["REQUEST_METHOD"]=="POST") //execute this if user selects login button

{
	$emailaddress= $_POST['email'];

	$pass = md5($_POST['password']);

	$_SESSION['genotp']=$genotp;

   



	$sql="SELECT * FROM user WHERE email='".$emailaddress."' AND password='".$pass."'";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	$count=mysqli_num_rows($result);

   



   $userid=$row["taxpayer_id"];
   $usertype=$row["usertype"];
   $event="Logged in";
   


	if($row["usertype"]=="taxpayer")
   {

      $_SESSION['email']=$emailaddress; 
      $_SESSION['usertype']="taxpayer"; //specifying user type

      /*header("location:taxpayerhome.php");
      $insert = "INSERT INTO logs(user_id,user_type,event_type) VALUES('$userid','$usertype','$event')";
      mysqli_query($data,$insert);

*/
      header("location:generate_otp.php");

   }
   elseif($row["usertype"]=="admin")
   {
      $_SESSION['email']=$emailaddress; 
      $_SESSION['usertype']="admin"; //specifying user type
      
      header("location:generate_otp.php");
     /* header("location:adminhome.php");
      $insert = "INSERT INTO logs(user_id,user_type,event_type) VALUES('$userid','$usertype','$event')";
      mysqli_query($data,$insert);*/

   }
   elseif($row["usertype"]=="employer")
   {
      $_SESSION['email']=$emailaddress; 
      $_SESSION['usertype']="employer"; //specifying user type
      //$insert = "INSERT INTO logs(user_id,user_type,event_type) VALUES('$userid','$usertype','$event')";
      //mysqli_query($data,$insert);
      
      header("location:generate_otp.php");
      //header("location:employerhome.php");
      

   }
   else
	{
		
		$message="*username and password do not match"; //storing string inside $message
		$_SESSION['[loginMessage]']=$message;  //storing string above inside this $message,, then sending string to login.php

		header("location:login.php");

	}


}

//sending email

	if ($row) {
		
	$name=$_POST['email'];

    require "vendor/autoload.php";

    $mail = new PHPMailer (true);

    $mail ->SMTPDebug =SMTP::DEBUG_SERVER;
    $mail ->isSMTP();
    $mail -> SMTPAuth =true;



    $mail->Host="smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port =587;

    $mail -> Username = "bwkinyua01@gmail.com"; //company's email(uses this account to send the email)
    $mail -> Password = "jxnygikqvyjtywcz";

    
    $mail ->setFrom ($name);
    $mail ->addAddress($_POST['email']);


    $mail -> Subject ="OTP CODE";
    $mail -> Body ="Your OTP code is:  ".$genotp;
    

    $mail ->send();
    $message_sent=true;

//header("location:generate_otp.php");


}












?>