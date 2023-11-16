<?php
session_start();

$message_sent=false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



$host="localhost";
$user="root";
$password="";
$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database

$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data


if($_SERVER["REQUEST_METHOD"]=="POST") //execute this if user selects login button

{
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);

       if($pass != $cpass)
       {
         $error[] = 'password not matched!';
       }
      else
      {
         $insert = "UPDATE user SET password='$pass' WHERE email='$name'";
         $result=mysqli_query($data, $insert);
  ?>
<script>
    
    alert("<?php echo "Password reset Successfully! " ?>");
    window.location.replace('login.php');
</script>

        <?php

    }
    
   
}
        
        

      


?>



<html>
<head>
    <title> LOG IN </title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<nav>

    <label class="logo" >INCOME TAX MANAGEMENT SYSTEM</label>

    <ul>
        <li> <a href="login.php"> LOG IN</a></li>
        <li> <a href="index.php"> HOME</a></li>
        <li> <a href="register.php"> REGISTER</a></li>
        <li> <a href="contact.php"> CONTACT</a></li>
    </ul>
</nav>

<body class="body_design">
    <center>
        <div class="form_design">
            <center class="title_design">

                RESET PASSWORD


            </center>

            <form action="" method="POST" class="login_form" id="myForm" method="post" name="myForm" onsubmit="return validateResetPassword()">
            <div class="input-control" for="password">
            <label class="label_design" >New Password</label>
            <input  type="password" name="password" id="password"  placeholder="enter your password">
            <div class="error"></div>
        </div>
        <div class="input-control" for="cpassword">
            <label class="label_design" >Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword"  placeholder="confirm your password">

        </div>
                   <label class="label_design"></label>
                   <input class="login_button" type="submit" name="submit" value="RESET">
               </div><br>
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
</center>
<script src="validation.js"> </script>
</body>
</html>