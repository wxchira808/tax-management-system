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

  $error[] = 'Error: Email address already in use!';
     

}

else
{

 if($pass != $cpass)
 {
   $error[] = 'password not matched!';
}
else
{
   $insert = "INSERT INTO user(firstname, secondname,phone,id_number, email, password) VALUES('$fname','$sname','$phoneno','$idnumber','$emailaddress','$pass')";
   mysqli_query($data, $insert);

   ?>
 <script>
    alert("<?php echo "Registration Successful! " ?>");
    window.location.replace('login.php');
</script>
<?php
}


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
     <script src="validate.js"></script>




</head>


<body class="body_design">
   
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

         TAXPAYER REGISTRATION FORM


     </center>

     <form autocomplete="off" action="" method="POST" class="login_form" id="myForm" name="myForm" onsubmit="return validateTaxpayerRegister()">


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
            <label class="label_design" for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname"  placeholder="enter your first name">
            <div class="error"></div>
        </div>
        <div class="input-control">
            <label class="label_design" for="secondname">Second Name</label>
            <input type="text" name="secondname" id="secondname"  placeholder="enter your second name">
            <div class="error"></div>
        </div >
        <div class="input-control">
            <label class="label_design" for="phone">Phone number</label>
            <input type="int" name="phone" id="phone"   placeholder="enter your phone number">
            <div class="error"></div>
        </div >
        <div class="input-control" for="id_number" >
            <label class="label_design">ID number</label>
            <input type="int" name="id_number" id="id_number"   placeholder="enter your ID number">
            <div class="error"></div>
        </div>


        <div class="input-control" for="email" >
            <label class="label_design">Email address</label>
            <input  type="email" name="email" id="email"  placeholder="enter your email">
            <div class="error"></div>
        </div>

        <div class="input-control" for="password">
            <label class="label_design" >Password</label>
            <input  type="password" name="password" id="password"  placeholder="enter your password">
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
            <p >Already a registered user? <a href="login.php">Log in </a> </p>
        </div>

    </form>
</div>
</center>

<script src= "validation.js"></script>
</body>
</html>