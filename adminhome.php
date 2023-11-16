<?php


session_start();

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
	<title> Admin Dashboard</title>

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

		<h1> Admin Dashboard</h1> <br>

		<p>
			This is the admin dashboard
		</p><br><br>
		<div class="main-card">
			<div class="card">
				<img src="./icons/addadministrator.png">
				<h3>Register</h3>
				<p>Register a user</p>
				<a href="add_taxpayer.php"><button >Get Started</button></a>

			</div>
			<div class="card">
				<img src="./icons/user.png">
				<h3>Users</h3>
				<p>Search User</p>
				<a href="view_taxpayer.php"><button>Get Started</button></a>
			</div>
			<div class="card">
				<img src="./icons/folder.png">
				<h3>Search Returns</h3>
				<p>Search previous tax returns</p>
				<a href="adminviewreturns.php"><button>Get Started</button></a>
			</div>
			<div class="card">
				<img src="./icons/filing_cabinet.png">
				<h3>View Reports</h3>
				<p>View system reports</p>
				<a href="admin_reports.php"><button>Get Started</button></a>
			</div>

			
		</div>



		

	</div>


</body>
</html>