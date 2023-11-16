
<?php

session_start();
error_reporting(0);

if(!isset($_SESSION['email'])) //check if there is a username
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin') //if after login tries to go to admin straight without login,then send back to login
{
	header("location:login.php");
}


$host="localhost";
$nil_return="root";
$password="";
$db="taxmanagementsystem";

$data=mysqli_connect($host,$nil_return,$password,$db); //connect to database





$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email ='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data



$message_sent= false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



$year = date("Y");
$taxyear = $year -1;

if (isset($_POST['update_profile']))
{

$select = " SELECT * FROM nil_return JOIN user ON nil_return.taxpayer_id=user.taxpayer_id WHERE tax_year = '$taxyear' && email = '$name' ";

   $result = mysqli_query($data, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'ERROR : Nil return for the year already subbmitted!';

   }


else  
{
	
	$taxpayerid=$_POST['taxpayer_id'];
	


$sql2="INSERT INTO nil_return(taxpayer_id,tax_year) VALUES('$taxpayerid','$taxyear')";  //insert details

	$result2=mysqli_query($data,$sql2);

//send success email 
	if($result2)
	{
	$name=$_SESSION['email'];

    require "vendor/autoload.php";

    $mail = new PHPMailer (true);

    //$mail ->SMTPDebug =SMTP::DEBUG_SERVER;
    $mail ->isSMTP();
    $mail -> SMTPAuth =true;



    $mail->Host="smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port =587;

    $mail -> Username = "bwkinyua01@gmail.com"; //company's email(uses this account to send the email)
    $mail -> Password = "jxnygikqvyjtywcz";

    
    $mail ->setFrom ($name);
    $mail ->addAddress($_SESSION['email']);


    $mail -> Subject ="SUCCESS!";
    $mail -> Body ="Nil return has been submitted successfully!";
    

    $mail ->send();

    $message_sent= true;
 
}   

		?>


		<script type="text/javascript">
			var successMessage="Nil Return Submitted Successfully";

			alert(successMessage);
		</script>

		<?php
		//header('location:nilreturn.php');
	

}
}

  ?>




<!DOCTYPE html>
<html>
<head>
	<title>File Tax Return</title>
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
			
		</ul>

	</aside>

<div class="content">
	
<p>Sample</p><br><br><br><br><br><br>
	
	<div style="text-align: center;padding-right:10%;">
		<h1 >File Nil Return</h1><br>
		
	</div>
	
	<form action="#" method="POST" class="">

		<h2>Return Form</h2><br><br>

		<label style="font-weight:bold; font-size: 17px;">Taxpayer ID:</label><br>
		<input style="width:300px; height: 30px;" type="text" name="taxpayer_id"  value="<?php echo "{$info['taxpayer_id']}"?>" readonly><br><br>
		
		<button class="login_button" type="submit" name="update_profile" onclick="fileNilReturn()">SUBMIT</button><br><br><br><br><br>
		<script type="text/javascript">
			function fileNilReturn(){
				confirm("File nil return?");
			}

		</script>
		<div> 
                    <h3 style="color:red;"> <!--display login error message-->
                        <?php
                        if(isset($error))
                        {
                            foreach($error as $error)
                            {
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
      ?>
                    </h3>
                    
                </div> <br>
	</form>

</div>
</body>
</html>
	