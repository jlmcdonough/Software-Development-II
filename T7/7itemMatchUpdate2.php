<?php
	session_start();
	if (isset($_SESSION["lostID1"]))
		{ 
			$lostID1=$_SESSION["lostID1"];
		}
	else 
		{
			$lostID1="";
		}
		
	if (isset($_SESSION["loginstatus"]))
		{ 
			$loginstatus=$_SESSION["loginstatus"];
		}
	else 
		{
			$loginstatus="";
		}
	
?>

<!---
VERSION: 0.1.10 Creation of file.  Admin gets to see the two selected items and decide if they are a match or not. Can confirm match or go back.
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
	include ("..\..\connect_db.php");
	
	if (isset($_GET["lost_id"]))
		{
					$lostID = $_GET["lost_id"];
					$_SESSION["lostID2"]=$lostID;
					$lostID2 = $_SESSION["lostID2"];
		}
	
	$q = 'EXPLAIN 7items';
	$r = mysqli_query($dbc, $q);
	$q1 = 'SELECT * FROM 7items WHERE lost_id = '."$lostID1";
	$r1 = mysqli_query($dbc, $q1);
	$q2 = 'SELECT * FROM 7items WHERE lost_id = '."$lostID2";
	$r2 = mysqli_query($dbc, $q2);
	
	echo "<center><table border = 1px solid black;>"; 
	echo "<caption><p3> Potential Match </p3></caption> ";
	$columnAmount = 0; #don't want the matchID and match_time column to appear
	while($row2 = mysqli_fetch_array($r, MYSQLI_NUM) AND $columnAmount < 9)
	{
		echo '<th><p4>'.$row2[0].'</p4></th>';
		$columnAmount++;
	}
	echo '<tr>';
	while($row = mysqli_fetch_array($r1, MYSQLI_NUM))
	{
		$column = array_keys($row);
		$columnCount = count($column);
		for($i = 0; $i<$columnCount-2; $i++)
		{
			echo '<td><p5>'.$row[$i].'</p5></td>';
		}
		echo "</tr>";
	}
	echo '<tr>';
	while($row = mysqli_fetch_array($r2, MYSQLI_NUM))
	{
		$column = array_keys($row);
		$columnCount = count($column);
		for($i = 0; $i<$columnCount-2; $i++)
		{
			echo '<td><p5>'.$row[$i].'</p5></td>';
		}
		echo "</tr>";
	}
	echo"</table>";
	
	echo"<br>";
	echo"<br>";
	echo"<br>";
	echo"<br>";
	
	echo'<a href = "7doMatch.php" class="button button_back">MATCH</a>';
	echo'<a href = "team7_admin.php" class="button button_back">BACK</a>';
	echo'<a href = "7itemMatch.php" class="button button_back">CANCEL</a>';
	
	
?>