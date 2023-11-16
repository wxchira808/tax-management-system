<?php 

error_reporting(0);
session_start();

if(!isset($_SESSION['email'])) //check if there is a username,if no username, send back to login.php
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='taxpayer') //if after login tries to go to taxpayer straight without login,then send back to login
{
	header("location:login.php");

}

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";


$data=mysqli_connect($host,$user,$password,$db); //connect to database

if(!$data)// check connection to database
{
	die("connection failed:".mysqli_connect_error());
}

if(isset($_POST['submit_taxpayer'])) 
{
	$search=($_POST)['search_taxpayer'];
	$sql="SELECT * FROM user WHERE taxpayer_id LIKE '$search' AND usertype='taxpayer' ";
	$result=mysqli_query($data,$sql);
} 
if(isset($_POST['submit_employer'])) 
{
	$search2=($_POST)['search_employer'];
	$sql="SELECT * FROM user WHERE taxpayer_id LIKE '$search2'  AND usertype='employer' ";
	$result=mysqli_query($data,$sql);
} 

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Search User</title>

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

	<h1  >Search User</h1><br><br>



<div> 
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h3>Search for taxpayer</h3><br>
		<input style="width:200px; height: 30px;" type="text" name="search_taxpayer" required placeholder="Taxpayer ID" >
		<button class="login_button" type="submit" name="submit_taxpayer">SEARCH</button>
	</form><br><br>
</div>

<div> 
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h3>Search for employer</h3><br>
		<input style="width:200px; height: 30px;" type="text" name="search_employer" required placeholder="Employer ID" >
		<button class="login_button" type="submit" name="submit_employer">SEARCH</button>
	</form><br><br><br><br>
</div>


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
<?php if(isset($_POST['submit_taxpayer'])):  ?>
	<?php if (mysqli_num_rows($result)>0):?>
		<table border="1px">
			<tr>
			    <th></th>
				<th>Taxpayer ID</th>
				<th>User Type</th>
				<th>First Name</th>
				<th>Second Name</th>
				<th>Email Address</th>
				<th>Phone Number</th>
				<th>ID number</th>
				<th>Date Of Birth</th>
				<th>Physical Address</th>
				<th>County</th>
				<th>Town</th>
				<th>Bank Name</th>
				<th>Bank Branch</th>
				<th>Account Number</th>		
				
			</tr>


			<?php while($row=mysqli_fetch_assoc($result)):?>
				<tr>
				    <td style="color: blue;"><?php echo "<a onClick=\"javascript:return confirm('Confirm delete?');\" href='delete.php?taxpayerid={$row['taxpayer_id']}'>Delete</a>" ?></td>
					<td><?php echo $row['taxpayer_id']; ?></td>
					<td><?php echo $row['usertype']; ?></td>
					<td><?php echo $row['firstname']; ?></td>
					<td><?php echo $row['secondname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['id_number']; ?></td>
					<td><?php echo $row['dateofbirth']; ?></td>
					<td><?php echo $row['physical_address']; ?></td>
					<td><?php echo $row['county']; ?></td>
					<td><?php echo $row['town']; ?></td>
					<td><?php echo $row['bank_name']; ?></td>
					<td><?php echo $row['bank_branch']; ?></td>
					<td><?php echo $row['account_number']; ?></td>
					

				</tr>
			<?php endwhile; ?>
		</table>

	<?php else:  ?>
		<p style="color:red; font-weight: bold;">No results found.</p>
	<?php endif; ?>
<?php endif; ?>

  
</div>   

<div>
<?php if(isset($_POST['submit_employer'])):  ?>
	<?php if (mysqli_num_rows($result)>0):?>
		<table border="1px">
			<tr>
			    <th></th>
				<th>User ID</th>
				<th>User Type</th>
				<th>Company name</th>
				<th>Email Address</th>
				<th>Telephone number</th>
				<th>Physical Address</th>
				<th>County</th>
				<th>Town</th>
				<th>Bank Name</th>
				<th>Bank Branch</th>
				<th>Account Number</th>
				
			</tr>


			<?php while($row=mysqli_fetch_assoc($result)):?>
				<tr>
					<td style="color: blue;"><?php echo "<a onClick=\"javascript:return confirm('Confirm delete?');\" href='delete2.php?taxpayerid={$row['taxpayer_id']}'>Delete</a>" ?></td>
					<td><?php echo $row['taxpayer_id']; ?></td>
					<td><?php echo $row['usertype']; ?></td>
					<td><?php echo $row['company_name']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['physical_address']; ?></td>
					<td><?php echo $row['county']; ?></td>
					<td><?php echo $row['town']; ?></td>
					<td><?php echo $row['bank_name']; ?></td>
					<td><?php echo $row['bank_branch']; ?></td>
					<td><?php echo $row['account_number']; ?></td>
					
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