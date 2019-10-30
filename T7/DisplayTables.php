<!---
VERSION: 0.1.6 Creation of file.  Displays the contents of each table upon clicking on from admin page

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

</head>


<?php

	include("../../connect_db.php");
	
	$PassedArg = $_GET["Table"];
	$q = 'SELECT * FROM '.$PassedArg.";";
	$r = mysqli_query($dbc, $q);	
	

	if($PassedArg == '7change')
	{
			echo "<center><table border = 1px solid black;>"; 
			echo "<caption><p3> $PassedArg </p3></caption> ";
			echo "<tr>";
			echo "<th><p4> Version </p4></th>";
			echo "<th><p4> Date Made </p4></th>";
			echo "<th><p4> Author </p4></th>";
			echo "<th><p4> Changes Made </p4></th>";
			echo "</tr>";
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				echo '<tr><td><p5>' .$row['version'] .'</td> <td><p5>' .$row['date_of'] .'</td> <td><p5>' .$row['person'] .'</td><td><p5>' .$row['change_made'] .'</td></tr></p5>';
			}
			echo '<br>';
			echo"</table>";
	}
	
	if($PassedArg == '7buildings')
	{
			echo "<center><table border = 1px solid black;>"; 
			echo "<caption><p3> $PassedArg </p3></caption> ";
			echo "<tr>";
			echo "<th><p4> ID Number </p4></th>";
			echo "<th><p4> Building Name </p4></th>";
			echo "</tr>";
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				echo '<tr><td><p5>' .$row['id'] .'</td> <td><p5>'. $row['name']. '</td></tr></p5>';
			}
			echo '<br>';
			echo"</table>";
	}
	
	if($PassedArg == '7items')
	{
			echo "<center><table border = 1px solid black;>"; 
			echo "<caption><p3> $PassedArg </p3></caption> ";
			echo "<tr>";
			echo "<th><p4> Lost ID Number </p4></th>";
			echo "<th><p4> CWID </p4></th>";
			echo "<th><p4> Lost Location </p4></th>";
			echo "<th><p4> Item Type </p4></th>";
			echo "<th><p4> Item Description </p4></th>";
			echo "<th><p4> User Status </p4></th>";
			echo "<th><p4> Date Lost </p4></th>";
			echo "</tr>";
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				echo '<tr><td><p5>' .$row['lost_id'] .'</td> <td><p5>'. $row['cwid']. '</td><td><p5>' .$row['lost_location'] .'</td><td><p5>' .$row['item_type'] .'</td><td><p5>' .$row['description'] .'</td><td><p5>' .$row['user_status'] .'</td><td><p5>' .$row['date_lost'] .'</td></tr></p5>';
			}
			echo '<br>';
			echo"</table>";
	}
	
	if($PassedArg == '7users')
	{
			echo "<center><table border = 1px solid black;>"; 
			echo "<caption><p3> $PassedArg </p3></caption> ";
			echo "<tr>";
			echo "<th><p4> CWID </p4></th>";
			echo "<th><p4> First Name </p4></th>";
			echo "<th><p4> Last Name </p4></th>";
			echo "<th><p4> Email </p4></th>";
			echo "<th><p4> Password </p4></th>";
			echo "<th><p4> Phone </p4></th>";
			echo "<th><p4> Date of Registration </p4></th>";
			echo "</tr>";
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				echo '<tr><td><p5>' .$row['cwid'] .'</td> <td><p5>'. $row['first_name']. '</td><td><p5>' .$row['last_name'] .'</td><td><p5>' .$row['email'] .'</td><td><p5>' .$row['password'] .'</td><td><p5>' .$row['phone'] .'</td><td><p5>' .$row['reg_id'] .'</td></tr></p5>';
			}
			echo '<br>';
			echo"</table>";
	}
?>

<br>
<br>

<body>

<a href = "team7_admin.php" class="button button_back">BACK</a>

</body>

<br>
<br>
<br>
<br>
<br>
<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>

</html>