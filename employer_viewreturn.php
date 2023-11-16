<?php 

error_reporting(0);
session_start();

if(!isset($_SESSION['email'])) //check if there is a username,if no username, send back to login.php
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin') //if after login tries to go to taxpayer straight without login,then send back to login
{
	header("location:login.php");

}

$host="localhost";

$tax_return="root";

$password="";

$db="taxmanagementsystem";


$data=mysqli_connect($host,$tax_return,$password,$db); //connect to database

if(!$data)// check connection to database
{
	die("connection failed:".mysqli_connect_error());
}


$name=$_SESSION['email']; //getting user's email

$sql="SELECT taxpayer_id FROM user WHERE email ='$name'";//getting the email from the database

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result); //show logged in user data


//access logged in employer id
$employerid=$info['taxpayer_id'];

$_SESSION['taxpayer_id']=$employerid;





if (isset($_POST['submit']))
{
	$from_date=date('y-m-d',strtotime($_POST['from_date']));
	$to_date=date('y-m-d',strtotime($_POST['to_date']));
	$sql="SELECT * FROM employer_return  WHERE date BETWEEN '$from_date'AND'$to_date' AND employer_id = '$employerid' ORDER BY date DESC";
	$result=mysqli_query($data,$sql);

}
/*if (isset($_POST['month_submit']))
{
	$taxmonth=($_POST['tax_month']);
	$sql="SELECT * FROM employer_return  WHERE tax_month='$taxmonth' AND employer_id = '$employerid' ORDER BY dater DESC";
	$result=mysqli_query($data,$sql);

}*/
if (isset($_POST['employee_submit']))
{
	$from_date=date('y-m-d',strtotime($_POST['from_date']));
	$to_date=date('y-m-d',strtotime($_POST['to_date']));
	$taxpayerid=($_POST)['taxpayer_id'];
	$sql="SELECT * FROM employer_return WHERE date BETWEEN '$from_date'AND'$to_date' AND  taxpayer_id LIKE '$taxpayerid' ORDER BY tax_year DESC ";

	$result=mysqli_query($data,$sql);

}



?>




<!DOCTYPE html>
<html>
<head>
	<title>Employer profile</title>
	<link rel="stylesheet" type="text/css" href="admin.css">

</head>


<body>
	
	<nav>
		<div class="header" id="myHeader">
			
			<a href="employerhome.php">Employer Dashboard</a>

			<div class="logout">
				<a href="logout.php"> <button> LOG OUT </button> </a>	
			</div>

		</div>
	</nav>
	<aside>
		<ul>
			<li>
				<a href="employer_profile.php">Profile</a>
			</li>
			<li>
				<a href="employer_return.php">File tax return</a>
			</li>
			<li>
				<a href="employer_viewreturn.php">View tax returns</a>
			</li>
			
		</ul>

	</aside>
	<div class="content">
		<p>Sample</p><br><br><br><br><br><br>

		<div style="text-align: center;padding-right:10%;">
			<h1 >View Tax Returns</h1><br><br>

		</div>
		<h2>Select tax period</h2><br>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div>
				<label>From:</label>
				<input type="date" name="from_date" >

				<label style="margin-left:5%;">To:</label>
				<input type="date" name="to_date" ><br><br>
			</div>

			<div  style="margin-left: 15%;"><button class="login_button" type="submit" name="submit" >SUBMIT</button></div><br><br>
			

		</form>
		<!--<h2>Select month</h2><br>
		<form method="post" action="">
		<select id="tax_month" name="tax_month" placeholder="Month">
				<option id="tax_month" name="" value="" style="display:none;">Month</option>
				<option id="tax_month" name="tax_month" value="Jan">January</option>
				<option id="tax_month" name="tax_month" value="Feb">February</option>
				<option id="tax_month" name="tax_month" value="Mar">March</option>
				<option id="tax_month" name="tax_month" value="Apr">April</option>
				<option id="tax_month" name="tax_month" value="May">May</option>
				<option id="tax_month" name="tax_month" value="Jun">June</option>
				<option id="tax_month" name="tax_month" value="Jul">July</option>
				<option id="tax_month" name="tax_month" value="Aug">August</option>
				<option id="tax_month" name="tax_month" value="Sep">September</option>
				<option id="tax_month" name="tax_month" value="Oct">October</option>
				<option id="tax_month" name="tax_month" value="Nov">November</option>
				<option id="tax_month" name="tax_month" value="Dec">December</option>
			</select><br><br>
			<div  style="margin-left: 15%;"><button class="login_button" type="submit" name="month_submit" >SUBMIT</button></div><br><br>
			</form>
-->

			<h2>Search employee</h2><br>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div>
				<label>Taxpayer ID:</label>
				<input style="width:200px; height: 30px;" type="text" name="taxpayer_id" required placeholder="Taxpayer ID"><br><br>

				<label>From:</label>
				<input type="date" name="from_date" >

				<label style="margin-left:5%;">To:</label>
				<input type="date" name="to_date" ><br><br>

				
			</div>

			<div  style="margin-left: 15%;"><button class="login_button" type="submit" name="employee_submit" >SUBMIT</button></div><br><br>
			

		</form>
		<div>
			<?php
			if($_SESSION['message'])
			{
				echo $_SESSION['message'];
			}
	unset($_SESSION['message']); //if browser is refreshed remove message

	?>
</div>

<div>
	<?php if(isset($_POST['submit'])):  ?>
		<?php if (mysqli_num_rows($result)>0):?>
			<table border="1px" >
				<tr>
					<th>Transaction ID</th>
					<th>Employer ID</th>
					<th>Taxpayer ID</th>
					<th>Tax Year</th>
					<th>Tax Month</th>
					<th>Date</th>
					<th>Basic Salary </th>
					<th>Benefits Non Cash</th>
					<th>Value of Quarters</th>
					<th>Total Gross Pay</th>
					<th>Defined Contribution Retirement Scheme(30% of Basic Salary)</th>
					<th>Defined Contribution Retirement Scheme(Actual)</th>
					<th>Defined Contribution Retirement Scheme(Fixed)</th>
					<th>Owner Occupied Interest</th>
					<th>Retirement Contribution & Owner Occupied Interest</th>
					<th>Chargable pay</th>
					<th>Tax Charged</th>
					<th>Personal Relief</th>
					<th>Insurance Relief</th>
					<th>PAYE</th>
					<th>Total</th>
				</tr>


				<?php while($row=mysqli_fetch_assoc($result)):?>
					<tr>
						<td><?php echo $row['employertax_id']; ?></td>
						<td><?php echo $row['employer_id']; ?></td>
						<td><?php echo $row['taxpayer_id']; ?></td>
						<td><?php echo $row['tax_year']; ?></td>
						<td><?php echo $row['tax_month']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['basic_salary']; ?></td>
						<td><?php echo $row['benefits_non_cash']; ?></td>
						<td><?php echo $row['value_of_quarters']; ?></td>
						<td><?php echo $row['total_gross_pay']; ?></td>
						<td><?php echo $row['retirement_scheme']; ?></td>
						<td><?php echo $row['retirement_scheme_2']; ?></td>
						<td><?php echo $row['retirement_scheme_3']; ?></td>
						<td><?php echo $row['owner_occupied']; ?></td>
						<td><?php echo $row['retirements_owner_occupied']; ?></td>
						<td><?php echo $row['chargable_pay']; ?></td>
						<td><?php echo $row['tax_charged']; ?></td>
						<td><?php echo $row['personal_relief']; ?></td>
						<td><?php echo $row['insurance_relief']; ?></td>
						<td><?php echo $row['PAYE_tax']; ?></td>
						<td><?php echo $row['total']; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>

		<?php else:  ?>
			<p style="color:red; font-weight: bold;">No results found.</p>
		<?php endif; ?>
	<?php endif; ?>

	  

</div>


<!--<div>
	<?php if(isset($_POST['month_submit'])):  ?>
		<?php if (mysqli_num_rows($result)>0):?>
			<table border="1px" >
				<tr>
					<th>Transaction ID</th>
					<th>Employer ID</th>
					<th>Taxpayer ID</th>
					<th>Tax Year</th>
					<th>Tax Month</th>
					<th>Date</th>
					<th>Basic Salary </th>
					<th>Benefits Non Cash</th>
					<th>Value of Quarters</th>
					<th>Total Gross Pay</th>
					<th>Defined Contribution Retirement Scheme(30% of Basic Salary)</th>
					<th>Defined Contribution Retirement Scheme(Actual)</th>
					<th>Defined Contribution Retirement Scheme(Fixed)</th>
					<th>Owner Occupied Interest</th>
					<th>Retirement Contribution & Owner Occupied Interest</th>
					<th>Chargable pay</th>
					<th>Tax Charged</th>
					<th>Personal Relief</th>
					<th>Insurance Relief</th>
					<th>PAYE</th>
					<th>Total</th>
				</tr>


				<?php while($row=mysqli_fetch_assoc($result)):?>
					<tr>
						<td><?php echo $row['employertax_id']; ?></td>
						<td><?php echo $row['employer_id']; ?></td>
						<td><?php echo $row['taxpayer_id']; ?></td>
						<td><?php echo $row['tax_year']; ?></td>
						<td><?php echo $row['tax_month']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['basic_salary']; ?></td>
						<td><?php echo $row['benefits_non_cash']; ?></td>
						<td><?php echo $row['value_of_quarters']; ?></td>
						<td><?php echo $row['total_gross_pay']; ?></td>
						<td><?php echo $row['retirement_scheme']; ?></td>
						<td><?php echo $row['retirement_scheme_2']; ?></td>
						<td><?php echo $row['retirement_scheme_3']; ?></td>
						<td><?php echo $row['owner_occupied']; ?></td>
						<td><?php echo $row['retirements_owner_occupied']; ?></td>
						<td><?php echo $row['chargable_pay']; ?></td>
						<td><?php echo $row['tax_charged']; ?></td>
						<td><?php echo $row['personal_relief']; ?></td>
						<td><?php echo $row['insurance_relief']; ?></td>
						<td><?php echo $row['PAYE_tax']; ?></td>
						<td><?php echo $row['total']; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>

		<?php else:  ?>
			<p style="color:red; font-weight: bold;">No results found.</p>
		<?php endif; ?>
	<?php endif; ?>

	<?php mysqli_close($data); ?>   

</div>    
		-->

<div>
	<?php if(isset($_POST['employee_submit'])):  ?>
		<?php if (mysqli_num_rows($result)>0):?>
			<table border="1px" >
				<tr>
					<th>Transaction ID</th>
					<th>Employer ID</th>
					<th>Taxpayer ID</th>
					<th>Tax Year</th>
					<th>Tax Month</th>
					<th>Date</th>
					<th>Basic Salary </th>
					<th>Benefits Non Cash</th>
					<th>Value of Quarters</th>
					<th>Total Gross Pay</th>
					<th>Defined Contribution Retirement Scheme(30% of Basic Salary)</th>
					<th>Defined Contribution Retirement Scheme(Actual)</th>
					<th>Defined Contribution Retirement Scheme(Fixed)</th>
					<th>Owner Occupied Interest</th>
					<th>Retirement Contribution & Owner Occupied Interest</th>
					<th>Chargable pay</th>
					<th>Tax Charged</th>
					<th>Personal Relief</th>
					<th>Insurance Relief</th>
					<th>PAYE</th>
					<th>Total</th>
				</tr>


				<?php while($row=mysqli_fetch_assoc($result)):?>
					<tr>
						<td><?php echo $row['employertax_id']; ?></td>
						<td><?php echo $row['employer_id']; ?></td>
						<td><?php echo $row['taxpayer_id']; ?></td>
						<td><?php echo $row['tax_year']; ?></td>
						<td><?php echo $row['tax_month']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['basic_salary']; ?></td>
						<td><?php echo $row['benefits_non_cash']; ?></td>
						<td><?php echo $row['value_of_quarters']; ?></td>
						<td><?php echo $row['total_gross_pay']; ?></td>
						<td><?php echo $row['retirement_scheme']; ?></td>
						<td><?php echo $row['retirement_scheme_2']; ?></td>
						<td><?php echo $row['retirement_scheme_3']; ?></td>
						<td><?php echo $row['owner_occupied']; ?></td>
						<td><?php echo $row['retirements_owner_occupied']; ?></td>
						<td><?php echo $row['chargable_pay']; ?></td>
						<td><?php echo $row['tax_charged']; ?></td>
						<td><?php echo $row['personal_relief']; ?></td>
						<td><?php echo $row['insurance_relief']; ?></td>
						<td><?php echo $row['PAYE_tax']; ?></td>
						<td><?php echo $row['total']; ?></td>
					</tr>
				<?php endwhile; ?>
			</table>

		<?php else:  ?>
			<p style="color:red; font-weight: bold;">No results found.</p>
		<?php endif; ?>
	<?php endif; ?>

	

</div>
</body>
</html>