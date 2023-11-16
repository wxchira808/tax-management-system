<?php


session_start();
error_reporting();

if(!isset($_SESSION['email'])) //check if there is a username
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin') //if after login tries to go to admin straight without login,then send back to login
{
	header("location:login.php");

}


$host="localhost";
$payment="root";
$password="";
$db="taxmanagementsystem";
$data=mysqli_connect($host,$payment,$password,$db);

$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data

if(isset($_POST['verify'])) {

$taxpayerid=$_SESSION['taxpayer_id'];
$amount=$_SESSION['amount']; // Amount to transact
$phonenumber=$_SESSION['phone_no']; // Phone number paying
$mpesacode=$_POST['mpesa_code'];

			$insert = "INSERT INTO payment(mpesa_code,taxpayer_id,phone_no, amount) VALUES('$mpesacode','$taxpayerid','$phonenumber','$amount')";
			$update3=mysqli_query($data, $insert);
if($update3)
{

		
		?>
		<script type="text/javascript">
						alert("Transaction verified!");
					window.location.href = "payment.php";
			</script> 
			<?php
			
		}

		}

?>

