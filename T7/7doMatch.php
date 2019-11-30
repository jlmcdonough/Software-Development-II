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
VERSION: 0.1.10 11/30/19 - Creation of file.  Does the match.  Sets the matchID and match_time for both the matched elements.  Updates table.  Clears Session variables.
VERSION: 0.1.11 11/30/19 - locked behind admin access
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
	
	$update1 = 'UPDATE 7items SET matchID = '."$lostID2".', matched_time = (SELECT(SYSDATE())) WHERE lost_id = '."$lostID1";
	$update2 = 'UPDATE 7items SET matchID = '."$lostID1".', matched_time = (SELECT(SYSDATE())) WHERE lost_id = '."$lostID2";
	
	$r1 = mysqli_query($dbc, $update1);	
	$r2 = mysqli_query($dbc, $update2);	
	
	echo"<center>";
	if($r1 != FALSE)
		echo"<p1> Succesfully updated record 1</p1><br>";
	else
		echo "<p1>DBC Error " . mysqli_error($dbc)."</p1><br>";
	if($r2 != FALSE)
		echo"<p1> Successfully updated record 2</p1><br>";
	else
		echo "<p1>DBC Error " . mysqli_error($dbc)."</p1><br>";
	
	echo'<br>';
	echo'<br>';

	echo'<a href = "team7_admin.php" class="button button_back">BACK TO ADMIN</a>';
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