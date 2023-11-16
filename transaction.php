<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaction</title>
</head>
<body>



	<center>
<?php  
session_start();


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


$taxpayerid=$_SESSION['taxpayer_id'];
$amount = $_POST['amount']; // Amount to transact
$phonenumber = $_POST['phone']; // Phone number paying


$insert = "INSERT INTO payment(taxpayer_id,phone_no, amount) VALUES('$taxpayerid','$phonenumber','$amount')";
mysqli_query($data, $insert);

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

if ($resp === false) {
	echo "CURL ERROR: " . curl_error($curl);
} else {
	$msg_resp = json_decode($resp);
    // Check if the request was successful
	if (isset($msg_resp->success) == 'true') {
		echo "✔✔ MPesa transaction initialized successfully. With request id " . $msg_resp->request_id ."";
		?>
		<h3>Verify the mpesa transaction</h3>
		<a href="verifympesa.php"><button style="color: white; background-color: #8e1a0b; border-radius:50px;padding:6px;border-width:3px; "> VERIFY </button></a>
		<?php

	} else {
        // Handle any errors returned by the API
		echo "ERROR: " . $resp;
	}
}

// Close the CURL session
curl_close($curl);


}

?>

<a href="contact.php"><button style="color: white; background-color: #8e1a0b; border-radius:50px;padding:6px;border-width:3px; "> NEXT </button></a>



	</center>

</body>
</html>





