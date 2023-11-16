<?php


session_start();

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";


$data=mysqli_connect($host,$user,$password,$db); //connect to database


if(!isset($_SESSION['email'])) //check if there is a username,if no username, send back to login.php
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='taxpayer') //if after login tries to go to taxpayer straight without login,then send back to login
{
	header("location:login.php");

}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Reports</title>

	<link rel="stylesheet" type="text/css" href="admin.css">
</head>


<body>
	<nav>
	<div class="header" id="myHeader">
	
		<a href="adminhome.php">Admin Dashboard</a>

		<div class="logout">
			<a href="logout.php"> <button> LOG OUT </button> </a>	
		</div>

	</div>
	</nav>

	<aside>
		<ul>
			<li>
				<a href="add_taxpayer.php">Add User</a>
			</li>
			<li>
				<a href="view_taxpayer.php">Search User</a>
			</li>
			<li>
				<a href="adminviewreturns.php">Taxpayer Returns</a>
			</li>
			<li>
				<a href="admin_employerreturns.php">Employer Returns</a>
			</li>
			<li>
				<a href="admin_reports.php">Reports</a>
			</li>

		</ul>

	</aside>

	<div class="content">
		<p>Sample</p><br><br><br><br><br><br>

		<h1> REPORTS</h1> <br>

		<p>
			View various reports
		</p><br><br>
		<div class="main-card">
			<div class="card">
				<img src="./icons/user.png">
				<h3>Taxpayers</h3>
				<p>View taxpayers</p>
				<form method="post" action=""><button name="taxpayer">View</button> </form>

			</div>
			<div class="card">
				<img src="./icons/user2.png">
				<h3>Employers</h3>
				<p>View employers</p>
				<form method="post" action=""><button name="employer">View</button> </form>
			</div>
			<div class="card">
				<img src="./icons/admin.png">
				<h3>Admins</h3>
				<p>View admins</p>
				<form method="post" action=""><button name="admin">View</button> </form>
			</div>
			<div class="card">
				<img src="./icons/folder.png">
				<h3>Taxpayer Returns</h3>
				<p>View taxpayers' returns</p>
				<form method="post" action=""><button name="taxpayer_returns">View</button> </form>
			</div>
			<div class="card">
				<img src="./icons/opened_folder.png">
				<h3>Employer returns</h3>
				<p>View employer returns</p>
				<form method="post" action=""><button name="employer_returns">View</button> </form>
			</div>
			<div class="card">
				<img src="./icons/log.png">
				<h3>Logs</h3>
				<p>View user logs</p>
				<form method="post" action=""><button name="user_logs">View</button> </form>
			</div>
		
			
			
		</div>

<br><br>

<div>
<?php if(isset($_POST['taxpayer'])):                                                //VIEW TAXPAYERS
$sql="SELECT * FROM user WHERE usertype='taxpayer' ORDER BY taxpayer_id DESC"; 
$result=mysqli_query($data,$sql);
 ?>
	<?php if (mysqli_num_rows($result)>0):?>
		<table border="1px">
			<tr>
				<th>User ID</th>
				<th>User Type</th>
				<th>First Name</th>
				<th>Second Name</th>
				<th>Email Address</th>
				<th>Phone number</th>
				<th>ID number</th>
				<th></th>
			</tr>


			<?php while($row=mysqli_fetch_assoc($result)):?>
				<tr>
					<td><?php echo $row['taxpayer_id']; ?></td>
					<td><?php echo $row['usertype']; ?></td>
					<td><?php echo $row['firstname']; ?></td>
					<td><?php echo $row['secondname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['id_number']; ?></td>
					<td style="color: blue;"><?php echo "<a onClick=\"javascript:return confirm('Confirm delete?');\" href='delete2.php?taxpayerid={$row['taxpayer_id']}'>Delete</a>" ?></td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php else:  ?>
		<p style="color:red; font-weight: bold;">No results found.</p>
	<?php endif; ?>
<?php endif; ?>

<?php  ?>   

     
</div> 



<div>

<?php if(isset($_POST['employer'])):                                                 //VIEW EMPLOYERS
$sql="SELECT * FROM user WHERE usertype='employer' ORDER BY taxpayer_id DESC"; 
$result=mysqli_query($data,$sql);
 ?>
	<?php if (mysqli_num_rows($result)>0):?>
		<table border="1px">
			<tr>
				<th>User ID</th>
				<th>User Type</th>
				<th>Company name</th>
				<th>Email Address</th>
				<th>Telephone number</th>
				<th></th>
			</tr>


			<?php while($row=mysqli_fetch_assoc($result)):?>
				<tr>
					<td><?php echo $row['taxpayer_id']; ?></td>
					<td><?php echo $row['usertype']; ?></td>
					<td><?php echo $row['company_name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					
					<td style="color: blue;"><?php echo "<a onClick=\"javascript:return confirm('Confirm delete?');\" href='delete2.php?taxpayerid={$row['taxpayer_id']}'>Delete</a>" ?></td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php else:  ?>
		<p style="color:red; font-weight: bold;">No results found.</p>
	<?php endif; ?>
<?php endif; ?>

<?php  ?>   

     
</div> 


<div>

<?php if(isset($_POST['admin'])):                                                 //VIEW ADMINS
$sql="SELECT * FROM user WHERE usertype='admin' ORDER BY taxpayer_id DESC"; 
$result=mysqli_query($data,$sql);
 ?>
	<?php if (mysqli_num_rows($result)>0):?>
		<table border="1px">
			<tr>
				<th>User ID</th>
				<th>User Type</th>
				<th>First Name</th>
				<th>Second Name</th>
				<th>Email Address</th>
				<th>Phone number</th>
				<th>ID number</th>
				<th></th>
			</tr>


			<?php while($row=mysqli_fetch_assoc($result)):?>
				<tr>
					<td><?php echo $row['taxpayer_id']; ?></td>
					<td><?php echo $row['usertype']; ?></td>
					<td><?php echo $row['firstname']; ?></td>
					<td><?php echo $row['secondname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['id_number']; ?></td>
					<td style="color: blue;"><?php echo "<a onClick=\"javascript:return confirm('Confirm delete?');\" href='delete2.php?taxpayerid={$row['taxpayer_id']}'>Delete</a>" ?></td>
				</tr>
			<?php endwhile; ?>
		</table>

	<?php else:  ?>
		<p style="color:red; font-weight: bold;">No results found.</p>
	<?php endif; ?>
<?php endif; ?>



     
</div> 




<div>
	<?php if(isset($_POST['taxpayer_returns'])):                                                   //VIEW TAXPAYER RETURNS
		$sql="SELECT * FROM tax_return ORDER BY tax_id DESC ";
	$result=mysqli_query($data,$sql);
	?>

		<?php if (mysqli_num_rows($result)>0):?>
			<table border="1px" >
				<tr>
				    <th>Tax Return ID</th>
					<th>Taxpayer ID</th>
					<th>Employer ID</th>
					<th>Tax Year</th>
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
					    <td><?php echo $row['tax_id']; ?></td>	
					    <td><?php echo $row['taxpayer_id']; ?></td>
						<td><?php echo $row['employer_id']; ?></td>
						<td><?php echo $row['tax_year']; ?></td>
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


<div>
	<?php if(isset($_POST['employer_returns'])):                                                   //VIEW EMPLOYER RETURNS
	$sql="SELECT * FROM employer_return ORDER BY employertax_id DESC ";
	$result=mysqli_query($data,$sql);
	?>
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



<div>

<?php if(isset($_POST['user_logs'])):                                                 //VIEW USER LOGS
$sql="SELECT * FROM logs ORDER BY log_no DESC"; 
$result=mysqli_query($data,$sql);
 ?>
	<?php if (mysqli_num_rows($result)>0):?>
		<table border="1px">
			<tr>
				<th>Log No</th>
				<th>User ID</th>
				<th>User type</th>
				<th>Event type</th>
				<th>Date</th>
				<th>Time</th>
			</tr>


			<?php while($row=mysqli_fetch_assoc($result)):?>
				<tr>
				    <td><?php echo $row['log_no']; ?></td>
					<td><?php echo $row['user_id']; ?></td>
					<td><?php echo $row['user_type']; ?></td>
					<td><?php echo $row['event_type']; ?></td>
					<td><?php echo $row['date']; ?></td>
					<td><?php echo $row['time']; ?></td>
				
				</tr>
			<?php endwhile; ?>
		</table>

	<?php else:  ?>
		<p style="color:red; font-weight: bold;">No results found.</p>
	<?php endif; ?>
<?php endif; ?>



     
</div> 













</div>



</body>
</html>


