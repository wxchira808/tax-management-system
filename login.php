
<html>
    <head>
        <title> LOG IN </title>
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
        <center>
            <div class="form_design">
                <center class="title_design">

                    LOG IN FORM

                    
                </center>

            <form action="login_check.php" method="POST" class="login_form">
                <div>
                    <label class="label_design">Email address</label>
                    <input type="email" name="email" required placeholder="enter your email">
                </div>

                <div>
                    <label class="label_design" >Password</label>
                    <input type="password" name="password" required placeholder="enter your password">
                    
                </div>

                 <input type="hidden" name="genotp" >

                <div>
                    <label class="label_design"></label>
                    <input class="login_button" type="submit" name="submit" value="LOG IN">
                </div><br>

                <div> 
                    
                    <h4 style="color:red;"> <!--display login error message-->
                        <?php
                        session_start();

                        error_reporting(0);
                        session_destroy();

                        echo $_SESSION['[loginMessage]'];

                        ?>
                    </h4>
                </div>

                <div style="color:white;">

                    <p> Forgot password? <a href="recover_acc.php">Reset password</a></p> 
                </div>

<?php

                    
?>
            </form>
            </div>
        </center>

    </body>
</html>