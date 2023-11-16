
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
$user="root";
$password="";
$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database

$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data




if(isset($_POST['update_profile'])) //if user presses submit button below, then execute this 'if' condition
{
	
	
	$phoneno=$_POST['phone'];
	$companyname=$_POST['company_name'];
	$physicaladdress=$_POST['physical_address'];
	$countyname=$_POST['county'];
	$townname=$_POST['town'];
	$bankname=$_POST['bank_name'];
	$bankbranch=$_POST['bank_branch'];
	$accountnumber=$_POST['account_number'];
	
	


	$sql2="UPDATE user SET phone='$phoneno',company_name='$companyname',physical_address='$physicaladdress',county='$countyname', town='$townname',bank_name='$bankname',bank_branch='$bankbranch',account_number='$accountnumber' WHERE email='$name'"; //update details

	$result2=mysqli_query($data,$sql2);

	if($result2){

		//SUCCESS MESSAGE
		?>
		<script>
			alert('Successfully updated!');
			window.location="employer_profile.php";
			
		</script>
		<?php
	
	}



}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Employer profile</title>
	<link rel="stylesheet" type="text/css" href="admin.css">

</head>


<body>
	
	<nav>
		<div class="header" id="myHeader">
			
			<a href="employerhome.php">Employer Dashboard</a>

			<div class="logout">
				<a href="logout.php"> <button> LOG OUT </button> </a>	
			</div>

		</div>
	</nav>
	<aside>
		<ul>
			<li>
				<a href="employer_profile.php">Profile</a>
			</li>
			<li>
				<a href="employer_return.php">File tax return</a>
			</li>
			<li>
				<a href="employer_viewreturn.php">View tax returns</a>
			</li>
			
		</ul>

	</aside>

	<div class="content"> 
		<p>Sample</p><br><br><br><br><br><br>


		<div style="text-align: center;padding-right:10%;">
			<h1 >User Details</h1><br>
			<label style="font-weight:bold; font-size: 20px;">Employer ID:</label>
			<input style="width:150px; height: 30px;" type="text" name="taxpayerid" value="<?php echo "{$info['taxpayer_id']}"?>" disabled><br><br>
		</div>

		<form action="#" method="POST" class="" onsubmit="return confirm('Update details?')">

			<h2>Personal information</h2><br>

			<label>Company Name:</label><br>
			<input type="text" name="company_name" value="<?php echo "{$info['company_name']}"?>"><br><br>

			<label>Telephone Number:</label><br>
			<input type="int" name="phone" value="<?php echo "{$info['phone']}"?>"required><br><br>

			<label>Email address:</label><br>
			<input type="text" name="email" value="<?php echo "{$info['email']}"?>" disabled><br><br><br><br>

<!--

			<label>Password:</label><br>
			<input type="password" name="password" id="password" value="" disabled> 
			<input class="checkbox" type="checkbox" onclick="Toggle()"><text>  Show Password</text>
 
    <script>
        // Change the type of input to password or text
        function Toggle() {
            let temp = document.getElementById("password");
             
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
    </script>
-->


			<h2>Physical location details</h2><br>

			
			<label>Physical Address:</label><br>
			<input name="physical_address" rows="4" cols="50" value="<?php echo "{$info['physical_address']}"?>"></input><br><br>

			<label>County:</label><br>
			<input type="text" name="county" value="<?php echo "{$info['county']}"?>"><br><br>

			<label>Town:</label><br>
			<input type="text" name="town"value="<?php echo "{$info['town']}"?>" ><br><br><br><br>



			<h2>Banking details</h2><br>

			<label>Bank Name</label><br>
			<input type="text" name="bank_name" value="<?php echo "{$info['bank_name']}"?>"><br><br>

			<label>Bank branch</label><br>
			<input type="text" name="bank_branch"value="<?php echo "{$info['bank_branch']}"?>" ><br><br>

			<label>Account number:</label><br>
			<input type="int" name="account_number" value="<?php echo "{$info['account_number']}"?>"><br><br>

			<button class="login_button" type="submit" name="update_profile" onclick="updateDetails()">UPDATE</button><br><br><br><br><br>

			
		</form>

	</div>


</body>
</html>
