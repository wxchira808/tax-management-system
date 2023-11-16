<?php

$message_sent= false;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



if(isset($_POST['submit']))
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $message=$_POST['message']; 

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

    //$mail ->setFrom ($email);
    //$mail ->addAddress($_POST['email']);
    $mail ->setFrom ($email);
    $mail ->addAddress("bwkinyua01@gmail.com");


    $mail -> Subject =$subject;
    $mail -> Body ="Name: $name \n Phone: $phone \n Email: $email \n Message: $message";
    

    $mail ->send();

    $message_sent= true;

}
?>







<html>
    <head>
        <title> CONTACT US </title>
        <link rel="stylesheet" type="text/css" href="style.css">

    </head>
    <nav>
        <label class="logo" >INCOME TAX MANAGEMENT SYSTEM</label>

        <ul>
            <li><a href="login.php">LOG IN</a></li>
            <li><a href="index.php">HOME</a></li>
            <li class="dropdown">
              <a class="dropdown-button">REGISTER</a>
              <ul class="dropdown-content">
                <li><a href="register.php">TAXPAYER</a></li>
                <li><a href="employer_register.php">EMPLOYER</a></li>
            </ul>
        </li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
</nav>

   <body class="body_design">

    <?php

    if($message_sent):
        ?>
    <center class="refresh_button">
        <h3>Thank You, We'll be in touch</h3><br>
        <a href="contact.php"><button style="color: white; background-color: #8e1a0b; border-radius:50px;padding:6px;border-width:3px; "> REFRESH </button></a>
    

    </center>
   
    <?php else:


       ?>

       <center>
        <div class="form_design">
            <center class="title_design">

                CONTACT US

            </center>

            <form action="contact.php" method="POST" class="login_form" onsubmit="return contactValidate()">

                <div>
                    <label class="label_design">Name</label>
                    <input type="text" name="name" id="name"  placeholder="Enter your name">
                </div>

                <div>
                    <label class="label_design">Email address</label>
                    <input type="email" name="email" id="email"  placeholder="Enter your email"> 
                </div>

                <div>
                    <label class="label_design">Phone number</label>
                    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
                </div>
                <div>
                    <label class="label_design" >Subject</label>
                    <input type="text" name="subject" id="subject"  placeholder="Enter the subject">
                </div>
                <div>
                    <label class="label_design" >Message</label>
                    <textarea id="description" name="message"  ></textarea>
                </div>

                <div>
                    <label class="label_design" ></label>
                    <input class="login_button" type="submit" name="submit" value="SUBMIT"><br><br>
                </div>

            </form>
        </div>
    </center>
    <?php
endif;
?>

<script src="validation.js"></script>
</body>
</html>