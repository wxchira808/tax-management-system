function validateTaxpayerRegister() {
  // Get form input values
  var firstName = document.getElementById("firstname").value.trim();
  var secondName = document.getElementById("secondname").value.trim();
  var phone = document.getElementById("phone").value.trim();
  var idNumber = document.getElementById("id_number").value.trim();
  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;

  
  
  if (firstName === "") {
    alert('Please enter First name.');
    return false;
  }
  if (/\d/.test(firstName)) {
     
    alert('Please enter a valid First name.');
    return false ;
  }
  if (/\s/g.test(firstName)) {
    alert("Enter only one name in First name field.");
    return false;
  }




  if (secondName === "") {
    alert('Please enter Second name.');
    return false;
  }
  if (/\d/.test(secondName)) {
     
    alert('Please enter a valid Second name.');
    return false ;
  }
  if (/\s/g.test(secondName)) {
    alert("Enter only one name in second name field.");
    return false;
  }




  if(phone === "") {
    alert('Please enter phone number.');
    return false;
  }
  if (!/^\d+$/.test(phone)) {
     
    alert('Please enter a valid phone number.');
    return false ;
  }



  if (idNumber === "") {
    alert('Please enter ID number.');
    return false;
  }


  if (!/^\d+$/.test(idNumber)) {
     
    alert('Please enter a valid ID number.');
    return false ;
  }



  if (email === "") {
    alert('Please enter email.');
    return false;
  }
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
     
    alert('Please enter a valid email.');
    return false ;
  }


if ((password === "") || (password)
.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }
  if (cpassword === "") {
    alert('Please enter confirm password.');
    return false;
  }
 // Check if the password and confirm password match
 if (password !== cpassword) {
  alert("Passwords do not match.");
  return false;
}



  
 

 


  return true;
}




function validateEmployerRegister() {
  // Get form input values
  var companyName = document.getElementById("company_name").value.trim();
  var phone = document.getElementById("phone").value.trim();
  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;

 

  if (companyName === "") {
    alert('Please enter Company name.');
    return false;
  }
  if (/\d/.test(companyName)) {
     
    alert('Please enter a valid Company name.');
    return false ;
  }
 
  
  if(phone === "") {
    alert('Please enter Telephone number.');
    return false;
  }
  if (!/^\d+$/.test(phone)) {
     
    alert('Please enter a valid telephone number.');
    return false ;
  }

  if (email === "") {
    alert('Please enter email.');
    return false;
  }
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
     
    alert('Please enter a valid email.');
    return false ;
  }

  // Check if the password and confirm password match
  if (password !== cpassword) {
    alert("Passwords do not match.");
    return false;
  }
  if ((password === "") || (password)
.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }
  if (cpassword === "") {
    alert('Please enter confirm password.');
    return false;
  }
 // Check if the password and confirm password match
 if (password !== cpassword) {
  alert("Passwords do not match.");
  return false;
}


  // Add more validation rules if needed (e.g., phone number format, email format)

  // If all validations pass, allow the form submission
  return true;
}

function validateResetPassword() {
  // Get form input values

  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;


if ((password === "") || (password)
.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }
  if (cpassword === "") {
    alert('Please enter confirm password.');
    return false;
  }
 // Check if the password and confirm password match
 if (password !== cpassword) {
  alert("Passwords do not match.");
  return false;
}


  return true;
}


function validateAdminAddUser() {
  // Get form input values
  var usertype = document.getElementById("usertype").value;
  var firstName = document.getElementById("firstname").value.trim();
  var secondName = document.getElementById("secondname").value.trim();
  var phone = document.getElementById("phone").value.trim();
  var idNumber = document.getElementById("id_number").value.trim();
  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value;
  var cpassword = document.getElementById("cpassword").value;

  if (usertype === "") {
     
    alert('Please Select user type');
    return false;
  }
  
  if (firstName === "") {
    alert('Please enter First name.');
    return false;
  }
  if (/\d/.test(firstName)) {
     
    alert('Please enter a valid First name.');
    return false ;
  }
  if (/\s/g.test(firstName)) {
    alert("Enter only one name in First name field.");
    return false;
  }




  if (secondName === "") {
    alert('Please enter Second name.');
    return false;
  }
  if (/\d/.test(secondName)) {
     
    alert('Please enter a valid Second name.');
    return false ;
  }
  if (/\s/g.test(secondName)) {
    alert("Enter only one name in second name field.");
    return false;
  }




  if(phone === "") {
    alert('Please enter phone number.');
    return false;
  }
  if (!/^\d+$/.test(phone)) {
     
    alert('Please enter a valid phone number.');
    return false ;
  }



  if (idNumber === "") {
    alert('Please enter ID number.');
    return false;
  }


  if (!/^\d+$/.test(idNumber)) {
     
    alert('Please enter a valid ID number.');
    return false ;
  }



  if (email === "") {
    alert('Please enter email.');
    return false;
  }
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
     
    alert('Please enter a valid email.');
    return false ;
  }


if ((password === "") || (password)
.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }
  if (cpassword === "") {
    alert('Please enter confirm password.');
    return false;
  }
 // Check if the password and confirm password match
 if (password !== cpassword) {
  alert("Passwords do not match.");
  return false;
}



  
 

 


  return true;
}



function contactValidate() {

  var phone = document.getElementById("phone").value.trim();
  var email = document.getElementById("email").value.trim();
  var name = document.getElementById("name").value.trim();
  var subject = document.getElementById("subject").value.trim();
  var description = document.getElementById("description").value.trim();


  if (name === "") {
    alert('Please enter your name.');
    return false;
  }
  if (/\d/.test(name)) {
     
    alert('Please enter a valid name.');
    return false ;
  }




  
  if (email === "") {
    alert('Please enter email.');
    return false;
  }
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
     
    alert('Please enter a valid email.');
    return false ;
  }



  if(phone === "") {
    alert('Please enter phone number.');
    return false;
  }
  if (!/^\d+$/.test(phone)) {
     
    alert('Please enter a valid phone number.');
    return false ;
  }




  if (subject === "") {
    alert('Please enter a subject.');
    return false;
  }




  if (description === "") {
    alert('Please enter description.');
    return false;
  }

return true ;
}



