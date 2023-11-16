<?php 

session_start();

$host="localhost";

$user="root";

$password="";

$db="taxmanagementsystem";


$data=mysqli_connect($host,$user,$password,$db); //connect to database


if($_GET['taxpayerid'])
{
	$taxpayerno=$_GET['taxpayerid'];

	$sql="DELETE FROM user WHERE taxpayer_id='$taxpayerno'";

	$result=mysqli_query($data,$sql);

	if($result)
	{
		?>
		<script type="text/javascript">
						alert("User deleted successfully!");
					window.location.href = "admin_reports.php";
			</script>
			<?php
	}
}

?>