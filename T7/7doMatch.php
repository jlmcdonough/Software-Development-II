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
	if (isset($_SESSION["lostID2"]))
		{ 
			$lostID2=$_SESSION["lostID2"];
		}
	else 
		{
			$lostID2="";
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
VERSION: 0.1.10 Creation of file.  Does the match.  Sets the matchID and match_time for both the matched elements.  Updates table.  Clears Session variables.
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
	
	$update1 = 'UPDATE 7items SET matchID = '."$lostID2".', matched_time = (SELECT(SYSDATE())) WHERE lost_id = '."$lostID1";
	$update2 = 'UPDATE 7items SET matchID = '."$lostID1".', matched_time = (SELECT(SYSDATE())) WHERE lost_id = '."$lostID2";
	
	$r1 = mysqli_query($dbc, $update1);	
	$r2 = mysqli_query($dbc, $update2);	
	
	if($r1 != FALSE)
		echo"1 updated";
	else
		echo "DBC Error " . mysqli_error($dbc);
	if($r2 != FALSE)
		echo"2 updated";
	else
		echo "DBC Error " . mysqli_error($dbc);
	

?>

<br>
<br>

<body>

<center><a href = "team7_admin.php" class="button button_back">BACK TO ADMIN</a>

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