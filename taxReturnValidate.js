//validate form
function validateFormTaxpayer()
{



    // Get the input value from the form
    
    //var employerID = document.getElementById("employer_id").value;
    var taxpayerID = document.getElementById("taxpayer_id").value;
    var basicSalary = document.getElementById('basic_salary').value;
    var benefitsNonCash = document.getElementById("benefits_non_cash").value;
    var valueOfQuarters = document.getElementById("value_of_quarters").value;
    var totalGrossPay = document.getElementById("total_gross_pay").value;
    var retirementScheme = document.getElementById("retirement_scheme").value;
    var retirementScheme2 = document.getElementById("retirement_scheme_2").value;
    var retirementScheme3 = document.getElementById("retirement_scheme_3").value;
    var ownerOccupied = document.getElementById("owner_occupied").value;
    var retirementsOwnerOccupied = document.getElementById("retirements_owner_occupied").value;
    var chargablePay = document.getElementById("chargable_pay").value;
    var taxCharged = document.getElementById("tax_charged").value;
    var personalRelief = document.getElementById("personal_relief").value;
    var insuranceRelief = document.getElementById("insurance_relief").value;
    var payeTax = document.getElementById("PAYE_tax").value;
    var total = document.getElementById("total").value;
  
  
    //maximum values
  
    var maxBasicSalary = 1000000000;
    var maxBenefitsNonCash = 1000000000;
    var maxValueOfQuarters = 1000000000;
    var maxTotalGrossPay = 1000000000;
    var maxRetirementScheme = 1000000000;
    var maxRetirementScheme2 = 1000000;
    var maxRetirementScheme3 = 240000;
    var maxOwnerOccupied = 300000; //25000 per month
    var maxRetirementsOwnerOccupied = 1000000;
    var maxChargablePay = 1000000000;
    var maxTaxCharged = 10000000;
    var maxPersonalRelief = 50000;
    var maxInsuranceRelief = 20000;
    var maxPayeTax = 10000000;
    var maxTotal = 10000000;


  
    
   /* if (!taxpayerID || !basicSalary || !benefitsNonCash || !valueOfQuarters || !totalGrossPay || !retirementScheme || !retirementScheme2 || !retirementScheme3 || !ownerOccupied || !retirementsOwnerOccupied || !chargablePay || !taxCharged || !personalRelief || !insuranceRelief || !payeTax || !total) {
      alert("Please fill out all fields.");
      return false;
    }

    
    // Check if the input value is a valid number
/*
    if (isNaN(employerID) || employerID.trim() === '') {
     
      alert('Please enter a valid Employer ID.');
      return false;
    }
  */if (taxpayerID === "") {
    alert("Please enter taxpayerID.");
    return false;
  }
     if (!/^\d+$/.test(taxpayerID)) {
     
      alert('Please enter a valid Taxpayer ID.');
      return false ;
    }
  
    
  //basic salary
  
  if (!/^\d+(\.\d+)?$/.test(basicSalary)) {
     
      alert('Please enter a valid Basic Salary.');
      return false ;
    }
    if (basicSalary > maxBasicSalary) {
     
      alert('Please enter a valid value in Basic Salary.');
      return false ;
    }
  
  
  
  //benefits non cash
  if (!/^\d+(\.\d+)?$/.test(benefitsNonCash)) {
     
      alert('Please enter Benefits Non Cash.');
      return false ;
    }
    if (benefitsNonCash > maxBenefitsNonCash) {
     
        alert('Please enter a valid value in Benefits non cash' );
        return false ;
      }
  
  
  
  //value of quaters
  if (!/^\d+(\.\d+)?$/.test(valueOfQuarters)) {
     
      alert('Please enter Value of Quarters.');
      return false ;
    }
  if (valueOfQuarters>maxValueOfQuarters){
   
    alert('Please enter a valid value in Value of Quarters');
    return false ;
  }
  
  
  //total gross pay
  if (!/^\d+(\.\d+)?$/.test(totalGrossPay)) {
     
      alert('Please enter Total Gross Pay.');
      return false ;
    }
    if (totalGrossPay>maxTotalGrossPay){
     
      alert('Please enter a valid value in Total gross Pay');
      return false ;
    }
  
  
  
  //Defined Contribution Retirement Scheme 1
  if (!/^\d+(\.\d+)?$/.test(retirementScheme)) {
     
      alert('Please enter Defined Contribution Retirement Scheme(30% of Basic Salary).');
      return false ;
    }
    if (retirementScheme>maxRetirementScheme){
     
      alert('Please enter a valid value in Defined Contribution Retirement Scheme(30% of Basic Salary)');
      return false ;
    }
    if (retirementScheme != 0.3 * basicSalary) {
      alert('Defined Contribution Retirement Scheme should be 30% of Basic Salary');
      return false ;
    }
  
    //Defined Contribution Retirement Scheme 2
    if (!/^\d+(\.\d+)?$/.test(retirementScheme2)) {
     
      alert('Please enter Defined Contribution Retirement Scheme(Actual).');
      return false ;
    }
    if (retirementScheme2>maxRetirementScheme2){
     
      alert('Please enter a valid value in Defined Contribution Retirement Scheme(Actual)');
      return false ;
    }
  
    //Defined Contribution Retirement Scheme 3
    if (!/^\d+(\.\d+)?$/.test(retirementScheme3)) {
     
      alert('Please enter Defined Contribution Retirement Scheme(Fixed).');
      return false ;
    }
    if (retirementScheme3>maxRetirementScheme3){
     
      alert('Please enter a valid value in Defined Contribution Retirement Scheme(Fixed)');
      return false ;
    }
  
  
  
  
  //owner occupied interest
  if (!/^\d+(\.\d+)?$/.test(ownerOccupied)) {
      valid=false;
      alert('Please enter Owner Occupied Interest.');
      return false ;
    }
    if (ownerOccupied>maxOwnerOccupied){
     
      alert('Please enter a valid value in Owner Occupied Interest');
      return false ;
    }
  
  
  
  
    //Retirement Contribution & Owner Occupied Interest:
    if (!/^\d+(\.\d+)?$/.test(retirementsOwnerOccupied)) {
     
      alert('Please enter Retirement Contribution & Owner Occupied Interest.');
      return false ;
    }
    if (retirementsOwnerOccupied>maxRetirementsOwnerOccupied){
     
      alert('Please enter a valid value in Retirement Contribution & Owner Occupied Interest');
      return false ;
    }
  
  
  
  //Chargable pay
  if (!/^\d+(\.\d+)?$/.test(chargablePay)) {
     
      alert('Please enter Chargable pay.');
      return false ;
    }
    if (chargablePay>maxChargablePay){
     
      alert('Please enter a valid value in Chargable pay');
      return false ;
    }
  
  
  
  
  //Tax Charged
  if (!/^\d+(\.\d+)?$/.test(taxCharged)) {
     
      alert('Please enter Tax Charged.');
      return false ;
    }
    if (taxCharged>maxTaxCharged){
     
      alert('Please enter a valid value in Tax Charged');
      return false ;
    }
  
  
  
   //Personal Relief
   if (!/^\d+(\.\d+)?$/.test(personalRelief)) {
     
      alert('Please enter Personal Relief.');
      return false ;
    }
    if (personalRelief>maxPersonalRelief){
     
      alert('Please enter a valid value in Personal Relief');
      return false ;
    }
  
  
  
  
  //Insurance Relief
  if (!/^\d+(\.\d+)?$/.test(insuranceRelief)) {
     
      alert('Please enter Insurance Relief.');
      return false ;
    }
    if (insuranceRelief>maxInsuranceRelief){
     
      alert('Please enter a valid value in Insurance Relief');
      return false ;
    }
  
  
  
    //PAYE
    if (!/^\d+(\.\d+)?$/.test(payeTax)) {
     
      alert('Please enter PAYE.');
      return false ;
    }
    if (payeTax>maxPayeTax){
     
      alert('Please enter a valid value in PAYE');
      return false ;
    }
  
  
    //Total
    if (!/^\d+(\.\d+)?$/.test(total)) {
     
      alert('Please enter Total.');
      return false ;
    }
    if (total>maxTotal){
     
      alert('Please enter a valid value in Total');
      return false ;
    }
    return true;
  }
   






//employer form validation
function validateFormEmployer()
{



    // Get the input value from the form
    var taxMonth=document.getElementById("tax_month").value;
    var employerID = document.getElementById("employer_id").value;
    var taxpayerID = document.getElementById("taxpayer_id").value;
    var basicSalary = document.getElementById('basic_salary').value;
    var benefitsNonCash = document.getElementById("benefits_non_cash").value;
    var valueOfQuarters = document.getElementById("value_of_quarters").value;
    var totalGrossPay = document.getElementById("total_gross_pay").value;
    var retirementScheme = document.getElementById("retirement_scheme").value;
    var retirementScheme2 = document.getElementById("retirement_scheme_2").value;
    var retirementScheme3 = document.getElementById("retirement_scheme_3").value;
    var ownerOccupied = document.getElementById("owner_occupied").value;
    var retirementsOwnerOccupied = document.getElementById("retirements_owner_occupied").value;
    var chargablePay = document.getElementById("chargable_pay").value;
    var taxCharged = document.getElementById("tax_charged").value;
    var personalRelief = document.getElementById("personal_relief").value;
    var insuranceRelief = document.getElementById("insurance_relief").value;
    var payeTax = document.getElementById("PAYE_tax").value;
    var total = document.getElementById("total").value;
  
  
    //maximum values
  
    var maxBasicSalary = 1000000000;
    var maxBenefitsNonCash = 1000000000;
    var maxValueOfQuarters = 1000000000;
    var maxTotalGrossPay = 1000000000;
    var maxRetirementScheme = 1000000000;
    var maxRetirementScheme2 = 1000000;
    var maxRetirementScheme3 = 240000;
    var maxOwnerOccupied = 300000; //25000 per month
    var maxRetirementsOwnerOccupied = 1000000;
    var maxChargablePay = 1000000000;
    var maxTaxCharged = 10000000;
    var maxPersonalRelief = 50000;
    var maxInsuranceRelief = 20000;
    var maxPayeTax = 10000000;
    var maxTotal = 10000000;


  
    
   /* if (!taxpayerID || !basicSalary || !benefitsNonCash || !valueOfQuarters || !totalGrossPay || !retirementScheme || !retirementScheme2 || !retirementScheme3 || !ownerOccupied || !retirementsOwnerOccupied || !chargablePay || !taxCharged || !personalRelief || !insuranceRelief || !payeTax || !total) {
      alert("Please fill out all fields.");
      return false;
    }
*/
    
    // Check if the input value is a valid number

    if (employerID === "") {
     
      alert('Please enter Employer ID.');
      return false;
    }
    if (!/^\d+$/.test(employerID)) {
     
      alert('Please enter a valid Employer ID.');
      return false ;
    }
  
  if (taxpayerID === "") {
    alert("Please enter taxpayerID.");
    return false;
  }
     if (!/^\d+$/.test(taxpayerID)) {
     
      alert('Please enter a valid Taxpayer ID.');
      return false ;
    }
  //tax month
  if (taxMonth === "") {
     
    alert('Please Select a tax month.');
    return false;
  }
    
  //basic salary
  
  if (!/^\d+(\.\d+)?$/.test(basicSalary)) {
     
      alert('Please enter a valid Basic Salary.');
      return false ;
    }
    if (basicSalary > maxBasicSalary) {
     
      alert('Please enter a valid value in Basic Salary.');
      return false ;
    }
  
  
  
  //benefits non cash
  if (!/^\d+(\.\d+)?$/.test(benefitsNonCash)) {
     
      alert('Please enter Benefits Non Cash.');
      return false ;
    }
    if (benefitsNonCash > maxBenefitsNonCash) {
     
        alert('Please enter a valid value in Benefits non cash' );
        return false ;
      }
  
  
  
  //value of quaters
  if (!/^\d+(\.\d+)?$/.test(valueOfQuarters)) {
     
      alert('Please enter Value of Quarters.');
      return false ;
    }
  if (valueOfQuarters>maxValueOfQuarters){
   
    alert('Please enter a valid value in Value of Quarters');
    return false ;
  }
  
  
  //total gross pay
  if (!/^\d+(\.\d+)?$/.test(totalGrossPay)) {
     
      alert('Please enter Total Gross Pay.');
      return false ;
    }
    if (totalGrossPay>maxTotalGrossPay){
     
      alert('Please enter a valid value in Total gross Pay');
      return false ;
    }
  
  
  
  //Defined Contribution Retirement Scheme 1
  if (!/^\d+(\.\d+)?$/.test(retirementScheme)) {
     
      alert('Please enter Defined Contribution Retirement Scheme(30% of Basic Salary).');
      return false ;
    }
    if (retirementScheme>maxRetirementScheme){
     
      alert('Please enter a valid value in Defined Contribution Retirement Scheme(30% of Basic Salary)');
      return false ;
    }
    if (retirementScheme != 0.3 * basicSalary) {
      alert('Defined Contribution Retirement Scheme should be 30% of Basic Salary');
      return false ;
    }
  
    //Defined Contribution Retirement Scheme 2
    if (!/^\d+(\.\d+)?$/.test(retirementScheme2)) {
     
      alert('Please enter Defined Contribution Retirement Scheme(Actual).');
      return false ;
    }
    if (retirementScheme2>maxRetirementScheme2){
     
      alert('Please enter a valid value in Defined Contribution Retirement Scheme(Actual)');
      return false ;
    }
  
    //Defined Contribution Retirement Scheme 3
    if (!/^\d+(\.\d+)?$/.test(retirementScheme3)) {
     
      alert('Please enter Defined Contribution Retirement Scheme(Fixed).');
      return false ;
    }
    if (retirementScheme3>maxRetirementScheme3){
     
      alert('Please enter a valid value in Defined Contribution Retirement Scheme(Fixed)');
      return false ;
    }
  
  
  
  
  //owner occupied interest
  if (!/^\d+(\.\d+)?$/.test(ownerOccupied)) {
      valid=false;
      alert('Please enter Owner Occupied Interest.');
      return false ;
    }
    if (ownerOccupied>maxOwnerOccupied){
     
      alert('Please enter a valid value in Owner Occupied Interest');
      return false ;
    }
  
  
  
  
    //Retirement Contribution & Owner Occupied Interest:
    if (!/^\d+(\.\d+)?$/.test(retirementsOwnerOccupied)) {
     
      alert('Please enter Retirement Contribution & Owner Occupied Interest.');
      return false ;
    }
    if (retirementsOwnerOccupied>maxRetirementsOwnerOccupied){
     
      alert('Please enter a valid value in Retirement Contribution & Owner Occupied Interest');
      return false ;
    }
  
  
  
  //Chargable pay
  if (!/^\d+(\.\d+)?$/.test(chargablePay)) {
     
      alert('Please enter Chargable pay.');
      return false ;
    }
    if (chargablePay>maxChargablePay){
     
      alert('Please enter a valid value in Chargable pay');
      return false ;
    }
  
  
  
  
  //Tax Charged
  if (!/^\d+(\.\d+)?$/.test(taxCharged)) {
     
      alert('Please enter Tax Charged.');
      return false ;
    }
    if (taxCharged>maxTaxCharged){
     
      alert('Please enter a valid value in Tax Charged');
      return false ;
    }
  
  
  
   //Personal Relief
   if (!/^\d+(\.\d+)?$/.test(personalRelief)) {
     
      alert('Please enter Personal Relief.');
      return false ;
    }
    if (personalRelief>maxPersonalRelief){
     
      alert('Please enter a valid value in Personal Relief');
      return false ;
    }
  
  
  
  
  //Insurance Relief
  if (!/^\d+(\.\d+)?$/.test(insuranceRelief)) {
     
      alert('Please enter Insurance Relief.');
      return false ;
    }
    if (insuranceRelief>maxInsuranceRelief){
     
      alert('Please enter a valid value in Insurance Relief');
      return false ;
    }
  
  
  
    //PAYE
    if (!/^\d+(\.\d+)?$/.test(payeTax)) {
     
      alert('Please enter PAYE.');
      return false ;
    }
    if (payeTax>maxPayeTax){
     
      alert('Please enter a valid value in PAYE');
      return false ;
    }
  
  
    //Total
    if (!/^\d+(\.\d+)?$/.test(total)) {
     
      alert('Please enter Total.');
      return false ;
    }
    if (total>maxTotal){
     
      alert('Please enter a valid value in Total');
      return false ;
    }
    return true;
  }





    
  
 
 




