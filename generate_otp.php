<?php




session_start();
error_reporting();

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database




$name=$_SESSION['email']; //getting user's email

$sql="SELECT * FROM user WHERE email='$name'";//getting the email from the database

   $result=mysqli_query($data,$sql);

   $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

   $count=mysqli_num_rows($result);


$genotp=($_SESSION['genotp']);

if($_SERVER["REQUEST_METHOD"]=="POST") //execute this if user selects login button

{ 

$genotp=($_SESSION['genotp']);
   
   $otp_code = $_POST['otpcode'];

 if($genotp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
              
           </script>
           <?php
        }
       else{
         header("location:usertype.php");
      }
          

       }

  
        


 

?>

<html>
<head>
    <title> VERIFY OTP </title>
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

                VERIFY OTP


            </center>

            <form action="" method="POST" class="login_form" id="form">
                <div>
                    <label class="label_design">OTP Code</label>
                    <input type="int" name="otpcode" required placeholder="enter OTP code" id="otpcode">
                </div> 

                <div>
                   <label class="label_design"></label>
                   <input class="login_button" type="submit" name="submit" value="VALIDATE">
               </div>


        </form>
    </div>
</center>

</body>
</html>