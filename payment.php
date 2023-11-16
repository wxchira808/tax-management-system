<?php


session_start();

/*if(!isset($_SESSION['email'])) //check if there is a username
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin') //if after login tries to go to admin straight without login,then send back to login
{
	header("location:login.php");

}*/


$host="localhost";
$payment="root";
$password="";
$db="taxmanagementsystem";
$data=mysqli_connect($host,$payment,$password,$db);

$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email ='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data


if(isset($_POST['submit']))
{


$taxpayerid=$_POST['taxpayer_id'];
$amount = $_POST['amount']; // Amount to transact
$phonenumber = $_POST['phone_no']; // Phone number paying


$_SESSION['taxpayer_id']=$taxpayerid;
$_SESSION['amount']=$amount;
$_SESSION['phone_no']=$phonenumber;






$Account_no = 'INCOME TAX MANAGEMENT SYSTEM'; // Enter account number (optional)
$url = 'https://tinypesa.com/api/v1/express/initialize';
$data = array(
	'amount' => $amount,
	'msisdn' => $phonenumber,
	'account_no' => $Account_no
);
$headers = array(
	'Content-Type: application/x-www-form-urlencoded',
    'ApiKey: qIyKKFcOS6O' // Replace with your API key
);

$options = array(
        'http' => array(
            'header'  => $headers,
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );


$info = http_build_query($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);

// Check for CURL errors




}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Taxpayer Dashboard</title>

<link rel="stylesheet" type="text/css" href="admin.css">
</head>


<body>
<nav>
	<div class="header" id="myHeader">

		<a href="taxpayerhome.php">Taxpayer Dashboard</a>

		<div class="logout">
			<a href="logout.php"> <button> LOG OUT </button> </a>	
		</div>

	</div>
</nav>

<aside>
	<ul>
		<li>
			<a href="profile.php">Profile</a>
		</li>
		<li>
			<a href="taxreturn.php">File tax return</a>
		</li>
		<li>
				<a href="nil_return.php">File nil return</a>
			</li>
		<li>
			<a href="viewtaxreturn.php">View tax returns</a>
		</li>
		<li>
			<a href="payment.php">Make payment</a>
		</li>


	</ul>

</aside>


<div class="content">
	<p>Sample</p><br><br><br><br><br><br>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){


	if ($resp === false) {
	echo "CURL ERROR: " . curl_error($curl);
} else {
	$msg_resp = json_decode($resp);
    // Check if the request was successful
	if (isset($msg_resp->success) == 'true') {
		echo "✔✔ MPesa transaction initialized successfully. With request id " . $msg_resp->request_id ."";
		?>
		<br><br>
		<form action="verifympesa.php" method="POST" class="">
		<label>MPESA transaction code:</label><br>
		<input type="text" name="mpesa_code" required placeholder="Enter MPESA transaction code"><br><br>
		<button class="login_button" type="submit" name="verify">verify</button><br><br><br>



	<!--<input type="hidden" name="taxpayer_id"  value="<?php echo "{$info['taxpayer_id']}"?>">

	<input type="hidden" name="phone_no" value="<?php echo (isset($phonenumber)) ?>">

	<input type="hidden" name="amount" value="<?php echo (isset($amount)) ?>" ><br><br> -->
		</form>
		<?php

		

	} else {
        // Handle any errors returned by the API
		echo "ERROR: " . $resp;
	}
}

// Close the CURL session
curl_close($curl);
}

else
{
?>

	<h1> Fill Payment Details Below</h1> <br><br>


	<form action="" method="POST" class="">
	<label style="font-weight:bold; font-size: 17px;">Taxpayer ID:</label><br>
	<input style="width:300px; height: 30px;" type="text" name="taxpayer_id"  value="<?php echo "{$info['taxpayer_id']}"?>" readonly><br><br>
	<label>Enter phone number:</label><br>
	<input type="int" name="phone_no" required placeholder="Enter phone number"><br><br>

	<label>Enter Payment Amount:</label><br>
	<input type="int" name="amount" required placeholder="Enter amount"><br><br>


	<button class="login_button" type="submit" name="submit">Pay</button><br><br><br>


	</form>


	<p style="color:red;"> *You will receive an Mpesa prompt</p><br>





</div>
<?php
}
?>

</body>
</html>