<?php

$message_sent=false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

session_start();

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";

$data=mysqli_connect($host,$user,$password,$db); //connect to database





if($_SERVER["REQUEST_METHOD"]=="POST") //execute this if user selects login button

{
    $emailaddress= $_POST['email'];

    $sql="SELECT * FROM user WHERE email='$emailaddress'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count=mysqli_num_rows($result);

    if(mysqli_num_rows($result) > 0)
        {

$_SESSION['email']=$emailaddress;
//sending email
      $name=$_POST['email'];

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
    $mail ->addAddress($_POST['email']);


    $mail -> Subject ="PASSWORD RESET REQUEST";
    $mail -> Body ="Click the link to reset password. http://localhost/MAIN%20PROJECT/tax%20management%20system/reset_password.php ";
    

    $mail ->send();

    $message_sent= true;


    //JAVASCRIPT
    ?>
<script type="text/javascript">
            var successMessage="Reset link sent to email";
            alert(successMessage);


</script>


    <?php
    }
        else{
            ?>

<script type="text/javascript">
            var errorMessage="Email address not registered";

            alert(errorMessage);
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

                RECORVER ACCOUNT


            </center>

            <form action="" method="POST" class="login_form" id="form">
                <div>
                    <label class="label_design">Email address</label>
                    <input type="email" name="email" required placeholder="enter your email" id="email">
                </div> 

                <div>
                   <label class="label_design"></label>
                   <input class="login_button" type="submit" name="submit" value="RECOVER">
               </div>


        </form>
    </div>
</center>

</body>
</html>