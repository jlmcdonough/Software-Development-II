<!---
VERSION: 0.1.0 10/1/19 - Created team7_connection.php.  Tested connection and added link to misc page
VERSION: 0.1.5 10/20/19 - Modified to match new CSS file and included header. Also added error message if connection failed
--->

<!DOCTYPE html>
<html>
<head>
<title>FoxNFound</title>
<!--- <h1><center>FoxNFound</center>  --->
<!--- gets image and displays at the top of the screen--->
<h1><center><img src = "foxnfound.jpg" width = "250" height = "250"></center></h1>

<!-- navigation bar atop the page --->
<div class ="navbar">
	<nav>
		<ul>  
<?php include 'header.php'; #header file contains the buttons?>
<style>
<?php include 'css/style.css'; #css file contains the styles for it ?>
</style>
		</ul>
	</nav>
</div>

<body>
<!---connecting to the mysql server--->
<?php
	echo "<p1 style = font-size:16px> <center> Attempting to connect to the database... </p1>";
	echo "<br>";
	
	error_reporting(0); #prevents error messages from showing on website
	
	if(include("../../connect_db.php")) #does connect_db.php exists in right location?
		{
			echo "<br>";
			echo "<p1 style = font-size:16px><center> Connection file found... </p1>";
			echo "<br>";
			
			if(mysqli_ping($dbc)) #good connection!
			{	echo "<br>";
				echo "<p1 style = font-size:50px><center> Successfully connected! </p1>";
				echo "<br>";
				echo'<p1 style = font-size:14px> MySQL Server' .mysqli_get_server_info($dbc).
				' connected on ' .mysqli_get_host_info($dbc). "</p1>";}
			else  #no permission to connect
			{
				echo "<br>";
				echo "<p1 style = font-size:50px><center> Connection Failed! </p1>";
			}
		}
	else  #connect_db.php does not exist or is not in right place
	{
		echo "<p1 style = font-size:20px><center> connect_db.php file not found...  </p1>";
		echo "<p1 style = font-size:50px><center> Connection not possible!  </p1>";
	}
	
?>

</body>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>

</html>