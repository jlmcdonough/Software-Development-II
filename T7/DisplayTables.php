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
	$q = 'EXPLAIN '.$PassedArg.";";
	$r = mysqli_query($dbc, $q);	
	
	echo "<center><table border = 1px solid black;>"; 
	echo "<caption><p3> $PassedArg </p3></caption> ";
	
	while($row2 = mysqli_fetch_array($r, MYSQLI_NUM))
	{
		echo '<th><p4>'.$row2[0].'</p4></th>';
	}
	echo '<tr>';
	$q2 = 'SELECT * FROM '.$PassedArg.';';
	$r2 = mysqli_query($dbc,$q2);
	
	while($row = mysqli_fetch_array($r2, MYSQLI_NUM))
	{
		$column = array_keys($row);
		$columnCount = count($column);
		for($i = 0; $i<$columnCount; $i++)
		{
			echo '<td><p5>'.$row[$i].'</p5></td>';
		}
		echo "</tr>";
	}
	echo"</table>";
	
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