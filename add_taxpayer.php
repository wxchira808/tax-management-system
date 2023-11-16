<?php

session_start();
error_reporting(0);

if(!isset($_SESSION['email'])) //check if there is a username,if no username, send back to login.php
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='taxpayer') //if after login tries to go to taxpayer straight without login,then send back to login
{
	header("location:login.php");

}

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";



$data=mysqli_connect($host,$user,$password,$db); //connect to database



if(isset($error))
{
    foreach($error as $error)
    {
        echo '<span class="error-msg">'.$error.'</span>';
    };
};



if(isset($_POST['submit'])){

   $usertype=mysqli_real_escape_string($data, $_POST['usertype']);
   $fname = mysqli_real_escape_string($data, $_POST['firstname']);
   $sname = mysqli_real_escape_string($data, $_POST['secondname']);
   $phoneno=mysqli_real_escape_string($data,$_POST['phone']);
   $idnumber=mysqli_real_escape_string($data,$_POST['id_number']);
   $emailaddress = mysqli_real_escape_string($data, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass =md5($_POST['cpassword']);
   

   $select = " SELECT * FROM user WHERE email = '$emailaddress' ";

   $result = mysqli_query($data, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'ERROR: Email already in use!';

   }

   else
   {

       if($pass != $cpass)
       {
         $error[] = 'Password not matched!';
       }
      else
      {
         $insert = "INSERT INTO user(firstname, secondname,phone,id_number, email, password,usertype) VALUES('$fname','$sname','$phoneno','$idnumber','$emailaddress','$pass','$usertype')";
         mysqli_query($data, $insert);

           ?>
<script>
    alert("<?php echo "Registration Successful! " ?>");
    window.location.replace('add_taxpayer.php');
</script>
<?php
     }
   }

};


?>









<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Add User</title>

	<link rel="stylesheet" type="text/css" href="admin.css">
</head>


<body>
	<nav>
	<div class="header" id="myHeader">
	
		<a href="adminhome.php">Admin Dashboard</a>

		<div class="logout">
			<a href="logout.php"> <button> LOG OUT </button> </a>	
		</div>

	</div>
	</nav>
	<aside>
		<ul>
			<li>
				<a href="add_taxpayer.php">Add User</a>
			</li>
			<li>
				<a href="view_taxpayer.php">Search User</a>
			</li>
			<li>
				<a href="adminviewreturns.php">Taxpayer Returns</a>
			</li>
			<li>
				<a href="admin_employerreturns.php">Employer Returns</a>
			</li>
			<li>
				<a href="admin_reports.php">Reports</a>
			</li>

		</ul>

	</aside>

<div class="content">
	<p>Sample</p><br><br><br><br><br><br>

	<h1 >Register User</h1><br><br>

	<form autocomplete="off" action="" method="POST" class="" id="myForm" name="myForm" onsubmit="return validateAdminAddUser()">

		
	<div class="names_level">
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
                    
    </div><br>

		<label>User Type:</label><br>
		<select name="usertype" id="usertype">
		<option id="usertype" name="" value="" style="display:none;">Select</option>
			<option id="usertype" value="admin">Admin</option>
			<option id="usertype" value="taxpayer">Taxpayer</option>
			
		</select><br><br>


		<label>First name:</label><br>
		<input type="text" name="firstname" id="firstname" placeholder="Enter first name" ><br><br>

		<label>Second name:</label><br>
		<input type="text" name="secondname" id="secondname" placeholder="Enter second name" ><br><br>
	</div>

		<label>Phone Number:</label><br>
		<input type="int" name="phone" id="phone" placeholder="Enter phone number"><br><br>

		<label>ID Number:</label><br>
		<input type="int" name="id_number" id="id_number" placeholder="Enter ID number"><br><br>

		<label>Email address:</label><br>
		<input type="text" name="email" id="email" placeholder="Enter email address" ><br><br>

		<label>Password:</label><br>
		<input type="password" name="password" id="password" placeholder="Enter password" ><br><br>

		<label>Confirm Password:</label><br>
		<input type="password" name="cpassword" id="cpassword"  placeholder="Confirm password" ><br><br>

		<br>

    <div>


    <input  class="login_button" type="submit" name="submit" value="REGISTER">
    

			

<?php
 
	if($_SESSION['message'])
	{
		echo $_SESSION['message'];
	}
	unset($_SESSION['message']); //if browser is refreshed remove message
	
	?>
    </div>
                
  </form>
  </div>
   
  <script src="validation.js"> </script>

    </body>
</html>