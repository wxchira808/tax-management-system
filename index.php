
<html>
    <head>
        
        <title>INCOME TAX MANAGEMENT SYSTEM</title>
        <link rel ="stylesheet" type="text/css" href="style.css">
    </head>

    <body>

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
<img class="main_img" src="incometaxcalculator.jpg">
   <div class="section 1" id="container">
    <label  class="img_text">Welcome To Our Income Tax Management System</label> <br><br>
     
    
     <div class="">
    <div class="">
<h2 style="color: #283618">Click to Log in or Register</h2> <br>
       <a href="login.php"> <button class="index_button" type="button" name="login"> LOG IN</button></a> 
     <button class="index_button2" type="button" name="register" onclick="togglePopup()">REGISTER </button>

     <div id="popup" class="popup-info">
     <h3> Register as a Taxpayer or Employer</h3><br>
     <p>
            <a href="register.php"> <button class="index_button3" type="button" name="login"> TAXPAYER</button></a>  <a href="employer_register.php"> <button class="index_button3" type="button" name="login"> EMPLOYER</button></a> </p>
    </div>
     

    <script>
        function togglePopup() {
            var popup = document.getElementById("popup");
            if (popup.style.display === "block") {
                popup.style.display = "none";
            } else {
                popup.style.display = "block";
            }
        }
    </script>


</div>
   </div>

   </div>

  


   

    </body>
</html>