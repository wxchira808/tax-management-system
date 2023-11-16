<?php


session_start();

if(!isset($_SESSION['email'])) //check if there is a username
{

	header("location:login.php");
}

elseif($_SESSION['usertype']=='admin') //if after login tries to go to admin straight without login,then send back to login
{
	header("location:login.php");

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Taxpayer Dashboard</title>

	<link rel="stylesheet" type="text/css" href="admin.css">
</head>


<body>
	<nav>
	<div class="header" id="myHeader">
	
		<a href="taxpayerhome.php">Taxpayer Dashboard</a>

		<div class="logout">
			<a href="logout.php"> <button> LOG OUT </button> </a>	
		</div>

	</div>
	</nav>

	<aside>
		<ul>
			<li>
				<a href="profile.php">Profile</a>
			</li>
			<li>
				<a href="taxreturn.php">File tax return</a>
			</li>
		
			<li>
				<a href="viewtaxreturn.php">View tax returns</a>
			</li>
			
			

		</ul>

	</aside>

	<div class="content">
		<p>Sample</p><br><br><br><br><br><br>
		<h1> Welcome</h1> <br><br>

		<p>
			This is the taxpayer dashboard
		</p><br><br>
		<div class="main-card">
			<div class="card">
				<img src="./icons/user.png">
				<h3>Profile</h3>
				<p>Edit your profile</p>
				<a href="profile.php"><button >Get Started</button></a>

			</div>
			<div class="card">
				<img src="./icons/document.png">
				<h3>Tax Return</h3>
				<p>File your tax returns</p>
				<a href="taxreturn.php"><button>Get Started</button></a>
			</div>
			<div class="card">
				<img src="./icons/folder.png">
				<h3>View Return</h3>
				<p>View previous tax returns</p>
				<a href="viewtaxreturn.php"><button>Get Started</button></a>
			</div>
			
		</div>



		

	</div>


</body>
</html>