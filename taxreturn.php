
<?php

session_start();

if(!isset($_SESSION['email'])) //check if there is a username
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin') //if after login tries to go to admin straight without login,then send back to login
{
	header("location:login.php");
}


$host="localhost";
$tax_return="root";
$password="";
$db="taxmanagementsystem";

$data=mysqli_connect($host,$tax_return,$password,$db); //connect to database





$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email ='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	


$message_sent= false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;





if(isset($_POST['submit'])) 
	{
$year = date("Y");
$taxyear = $year -1;

$select = " SELECT * FROM tax_return JOIN user ON tax_return.taxpayer_id=user.taxpayer_id WHERE tax_year = '$taxyear' && email = '$name' ";

   $result = mysqli_query($data, $select);



	$taxpayerid=$_POST['taxpayer_id'];
	$employerid=$_POST['employer_id'];
	$year = date("Y");
	$taxyear = $year -1;
	$basicsalary=$_POST['basic_salary'];
	$benefitsnoncash=$_POST['benefits_non_cash'];
	$valueofquarters=$_POST['value_of_quarters'];
	$totalgrosspay=($_POST['total_gross_pay']);
	$retirementscheme=$_POST['retirement_scheme'];
	$retirementscheme2=$_POST['retirement_scheme_2'];
	$retirementscheme3=$_POST['retirement_scheme_3'];
	$owneroccupied=$_POST['owner_occupied'];
	$retirementsowneroccupied=$_POST['retirements_owner_occupied'];
	$chargablepay=$_POST['chargable_pay'];
	$taxcharged=$_POST['tax_charged'];
	$personalrelief=$_POST['personal_relief'];
	$insurancerelief=$_POST['insurance_relief'];
	$payetax=$_POST['PAYE_tax'];
	$totalall=$_POST['total'];

	
	$select2 = " SELECT * FROM user WHERE taxpayer_id = '$employerid' ";
	$result2 = mysqli_query($data, $select2);
	

  if(mysqli_num_rows($result) > 0){

      $error[] = 'ERROR! :Tax return for the year '.$taxyear.' already subbmitted!';

   }
   elseif(!(mysqli_num_rows($result2) > 0)){

	$error[] = 'ERROR! : The Employer (EmoployerID: '.$employerid. ') does not exist';

 }
    
else{
	$sql2="INSERT INTO tax_return(taxpayer_id,employer_id,tax_year, basic_salary, benefits_non_cash, value_of_quarters, total_gross_pay, retirement_scheme,retirement_scheme_2,retirement_scheme_3, owner_occupied, retirements_owner_occupied, chargable_pay, tax_charged, personal_relief, insurance_relief, PAYE_tax, total) VALUES('$taxpayerid','$employerid','$taxyear','$basicsalary','$benefitsnoncash','$valueofquarters','$totalgrosspay','$retirementscheme','$retirementscheme2','$retirementscheme3','$owneroccupied','$retirementsowneroccupied','$chargablepay','$taxcharged','$personalrelief','$insurancerelief','$payetax','$totalall')";  //insert details

	$result2=mysqli_query($data,$sql2);



 //tax return logs
 $emailaddress=$_SESSION['email']; //getting user's email

 $sql="SELECT * FROM user WHERE email='$emailaddress'";

 $result=mysqli_query($data,$sql);

 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 $count=mysqli_num_rows($result);

	$userid=$row["taxpayer_id"];
   $usertype=$row["usertype"];
   $event="Filed tax return"; 

   $insert = "INSERT INTO logs(user_id,user_type,event_type) VALUES('$userid','$usertype','$event')";
   
   $result = mysqli_query($data, $insert);
//


//success message
	if($result2)
	{
		?>
		<script type="text/javascript">
						alert("Tax Return submitted!");
					window.location.href = "taxreturn.php";
			</script>
			<?php

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


    $mail -> Subject ="SUCCESS";
    $mail -> Body ="Tax return has been submitted successfully!";
    

    $mail ->send();

    $message_sent= true;
		//header('location:taxreturn.php');
		
	}
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
				<a href="viewtaxreturn.php">View tax returns</a>
			</li>
			
		</ul>

	</aside>

	<div class="content">
		
		<p>Sample</p><br><br><br><br><br><br>
		
		<div style="text-align: center;padding-right:10%;">
			<h1 >File Tax Return</h1><br>
			
		</div>
		
		<form  id="myForm" name="myForm" action="" method="POST" onsubmit=" return validateFormTaxpayer()">
		
			<h2>Return Form</h2><br>

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

			<label style="font-weight:bold; font-size: 17px;">Taxpayer ID:</label><br>
			<input style="width:300px; height: 30px;" type="text" name="taxpayer_id"  id="taxpayer_id" value="<?php echo "{$info['taxpayer_id']}"?>" readonly><br><br>

			<label style="font-weight:bold; font-size: 17px;">Employer ID:</label><br>
			<input style="width:300px; height: 30px;" type="text" name="employer_id"  id="employer_id"   placeholder="input value" ><br><br> 
			

			<label>Basic Salary:</label><br>
			<input type="int" name="basic_salary" id="basic_salary" placeholder="input value"><br><br>

			<label>Benefits Non Cash:</label><br>
			<input type="int" name="benefits_non_cash" id="benefits_non_cash"   placeholder="input value"><br><br>

			<label>Value of Quarters:</label><br>
			<input type="int" name="value_of_quarters" id="value_of_quarters" placeholder="input value"><br><br>

			<label>Total Gross Pay:</label><br>
			<input type="int" name="total_gross_pay" id="total_gross_pay" placeholder="input value"><br><br>


			<label>Defined Contribution Retirement Scheme(30% of Basic Salary):</label><br>
			<input type="int" name="retirement_scheme" id="retirement_scheme" placeholder="input value"><br><br>

			<label>Defined Contribution Retirement Scheme(Actual):</label><br>
			<input type="int" name="retirement_scheme_2" id="retirement_scheme_2"  placeholder="input value"><br><br>

			<label>Defined Contribution Retirement Scheme(Fixed):</label><br>
			<input type="int" name="retirement_scheme_3" id="retirement_scheme_3" placeholder="input value"><br><br>


			<label>Owner Occupied Interest:</label><br>
			<input type="int" name="owner_occupied" id="owner_occupied" placeholder="input value"><br><br>

			<label>Retirement Contribution & Owner Occupied Interest:</label><br>
			<input type="int" name="retirements_owner_occupied"  id="retirements_owner_occupied" placeholder="input value"><br><br>

			<label>Chargable pay:</label><br>
			<input type="int" name="chargable_pay" id="chargable_pay" placeholder="input value"><br><br>

			<label>Tax Charged:</label><br>
			<input type="int" name="tax_charged" id="tax_charged" placeholder="input value"><br><br>

			<label>Personal Relief:</label><br>
			<input type="int" name="personal_relief" id="personal_relief" placeholder="input value"><br><br>

			<label>Insurance Relief:</label><br>
			<input type="int" name="insurance_relief" id="insurance_relief" placeholder="input value"><br><br>

			<label>PAYE:</label><br>
			<input type="int" name="PAYE_tax" id="PAYE_tax" placeholder="input value"><br><br>

			<label>Total:</label><br>
			<input type="int" name="total" id="total" placeholder="input value"><br><br>

			

			<button class="login_button" type="submit" name="submit" id="submit"  >SUBMIT</button><br>

		</form>

		


	</div>

	<script src="taxReturnValidate.js"></script>

			
</body>
</html>
