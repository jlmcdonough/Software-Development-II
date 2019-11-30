<?php
	session_start();
?>

<!---
VERSION: 0.1.10 Creation of file.  This file displays the items and is where the items to match are chosen.
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
	$_SESSION["lostID1"]="-999";
	
	include ("..\..\connect_db.php");
	
	$q = 'EXPLAIN 7items';
	$r = mysqli_query($dbc, $q);	
	
	echo "<center><table border = 1px solid black;>"; 
	echo "<caption><p3> Unmatched Items </p3></caption> ";
	$columnAmount = 0; #don't want the matchID and match_time column to appear
	while($row2 = mysqli_fetch_array($r, MYSQLI_NUM) AND $columnAmount < 9)
	{
		echo '<th><p4>'.$row2[0].'</p4></th>';
		$columnAmount++;
	}
	echo '<tr>';
	$q = 'SELECT lost_id, cwid, lost_location, insideOrOutside, floorNumber, item_type, description, user_status, date_lost  
		  FROM 7items WHERE matchID IS NULL';
	$r = mysqli_query($dbc, $q);

	while($row = mysqli_fetch_array($r, MYSQLI_NUM))
	{
		$column = array_keys($row);
		$columnCount = count($column);
		for($i = 0; $i<$columnCount; $i++)
		{
			echo '<td><p5>'.$row[$i].'</p5></td>';
		}
		echo "<td><p5> <a href='7itemMatchUpdate.php?lost_id=".$row[0]."' class='button button_match'> SELECT </a>"
			 .  "</p5></td>";
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