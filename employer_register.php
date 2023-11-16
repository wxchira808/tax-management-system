<?php



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

 $companyname = mysqli_real_escape_string($data, $_POST['company_name']);
 $phoneno=mysqli_real_escape_string($data,$_POST['phone']);
 $emailaddress = mysqli_real_escape_string($data, $_POST['email']);
 $pass = md5($_POST['password']);
 $cpass =md5($_POST['cpassword']);
 $usertype="employer";


 $select = " SELECT * FROM user WHERE email = '$emailaddress' ";

 $result = mysqli_query($data, $select);

 if(mysqli_num_rows($result) > 0){

  $error[] = 'Error: Email address already in use!';
      //header('location:register.php');

}

else
{

   $insert = "INSERT INTO user(company_name,phone,email,password,usertype) VALUES('$companyname','$phoneno','$emailaddress','$pass','$usertype')";
   mysqli_query($data, $insert);
   ?>
   <script>
    alert("<?php echo "Registration Successful! " ?>");
    window.location.replace('login.php');
</script>
<?php
      
}

}


?>



<html>
    <head>
        <title> REGISTER </title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="register_design.css">
         
       


    </head>
 

    <body class="body_design">
        <script defer src="validate.js"></script>
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
        <center>
            <div class="form_design">
                <center class="title_design">

                   EMPLOYER REGISTRATION FORM

                    
                </center>

            <form  action="" method="POST" class="login_form" id="myForm" onsubmit="return validateEmployerRegister()">


                <div> 
                    <h3 class="error" style="color:red;"> <!--display login error message-->
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
                    
                </div> 

            
                <div class="input-control">
                    <label class="label_design" for="secondname">Company Name</label>
                    <input type="text" name="company_name" id="company_name"   placeholder="enter company name">
                    <div class="error"></div>
                </div >
                <div class="input-control">
                    <label class="label_design" for="phone">Telephone number</label>
                    <input type="tel" name="phone" id="phone"   placeholder="enter telephone number">
                    <div class="error"></div>
                </div >
                
                <div class="input-control" for="email" >
                    <label class="label_design">Email address</label>
                    <input type="email" name="email" id="email"  placeholder="enter your email">
                    <div class="error"></div>
                </div>

                <div class="input-control" for="password">
                    <label class="label_design" >Password</label>
                    <input type="password" name="password" id="password"  placeholder="enter your password">
                    <div class="error"></div>
                </div>
                <div class="input-control" for="cpassword">
                    <label class="label_design" >Confirm Password</label>
                    <input type="password" name="cpassword" id="cpassword"  placeholder="confirm your password">
                    
                </div>


                <div>
                    <label class="label_design" ></label>
                   
                    <input class="login_button" type="submit" name="submit" id="submit" value="REGISTER"><br><br>
                </div>

                
                <div style="color:white;">
                    <p >Already a registered employer? <a href="login.php">Log in </a> </p>
                </div>
                
            </form>
            </div>
        </center>
<script src="validation.js"></script>
        

    </body>
</html>