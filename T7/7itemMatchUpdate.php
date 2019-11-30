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
VERSION: 0.1.10 Creation of file.  This file gets all the items in the query besides the previously selected one for the admin to match
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
echo'<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">';

if($loginstatus == 'NOT LOGGED IN')
	{
		echo'<center><p1>PLEASE LOGIN TO VIEW   </p1><div class="grow"><a href="team7_login.php" target="_blank" style="color:white; font-size:25px;"><i class="fas fa-user-lock"></i></a></div>';
	}
else if($loginstatus == 'LOGGED IN')
	{
	
	include ("..\..\connect_db.php");
	
	if (isset($_GET["lost_id"]))
		{
					$lostID = $_GET["lost_id"];
					$_SESSION["lostID1"]=$lostID;
					$lostID1 = $_SESSION["lostID1"];
		}	
	
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
		  FROM 7items WHERE matchID IS NULL AND lost_id <> '."$lostID1";
	$r = mysqli_query($dbc, $q);  #gets all items that are not the previously selected one

	while($row = mysqli_fetch_array($r, MYSQLI_NUM))
	{
		$column = array_keys($row);
		$columnCount = count($column);
		for($i = 0; $i<$columnCount; $i++)
		{
			echo '<td><p5>'.$row[$i].'</p5></td>';
		}
		echo "<td><p5> <a href='7itemMatchUpdate2.php?lost_id=".$row[0]."' class='button button_match'> SELECT </a>"
			 .  "</p5></td>";
		echo "</tr>";
	}
	echo"</table>";
	
	/* prints out the previously selected item below */
	$currentQ = 'SELECT * FROM 7items WHERE lost_id = '."$lostID1";
	$currentR = mysqli_query($dbc, $currentQ);   
	
	echo "<center><table border = 1px solid black;><br>"; 
	echo "<caption><p3> CURRENT ITEM </p3></caption> ";
	while($row = mysqli_fetch_array($currentR, MYSQLI_NUM))
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
	
	echo'<br>';
	echo'<br>';

	echo'<a href = "team7_admin.php" class="button button_back">BACK</a>';
	}
?>





<br>
<br>
<br>
<br>
<br>
<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>

</html>
