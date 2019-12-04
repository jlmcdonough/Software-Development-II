<?php
session_start();
	if (isset($_SESSION["loginstatus"]))
		{ 
			$loginstatus=$_SESSION["loginstatus"];
		}
	else 
		{
			$loginstatus="";
		}
	if (isset($_SESSION["lostID1"]))
		{ 
			$lostID1=$_SESSION["lostID1"];
		}
	else 
		{
			$lostID1="";
		}
		
?>

<!---
VERSION: 0.1.6 Created the admins page. Added 6 links to display administrator information.
VERSION: 0.1.7 Added buttons to add users or buildings
VERSION: 0.1.8 Added login such that a user must be logged in to see admin functions
VERSION: 0.1.10 Added button to view and match unmatched items. Added functional diagram button.
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


if($loginstatus == 'LOGGED IN')
	{
		echo'<center>';
		echo'<br>';
		echo'<a href = "team7_connection.php?" class="button">Check Connection</a>'; 
		echo'<a href = "team7_showTables.php?" class="button">Display Tables</a> ';
		echo'<a href = "functionaldiagram.jpg" class="button">Functional Diagram</a>'; 
		echo '<br><br><br><br><br>';
		echo'<a href="DisplayTables.php?Table=7change" class="button">Display Change Log</a> ';
		echo'<a href="DisplayTables.php?Table=7buildings" class="button">Display Buildings</a>  ';
		echo'<a href="DisplayTables.php?Table=7items" class="button">Display Items</a> '; 
		echo'<a href="DisplayTables.php?Table=7users" class="button">Display Users</a> ';
		echo'<br><br><br><br><br>';
		echo'<a href = "7usersTableInsert.php?" class="button">Add User</a> ';
		echo'<a href = "7buildingsTableInsert.php?" class="button">Add Building</a> ';
		echo'<br><br><br><br><br>';
		echo'<a href = "7itemMatch.php?" class="button">Match Items</a> ';
		echo'<a href="DisplayTables.php?Table=7matched" class="button">Display Already Matched Items</a> ';
		echo'</center>';
	}
else
	{
		echo'<center><p1>PLEASE LOGIN TO VIEW   </p1><div class="grow"><a href="team7_login.php" target="_blank" style="color:white; font-size:25px;"><i class="fas fa-user-lock"></i></a></div>';
	}

?>


<br>
<br>
<br>
<br>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>


</html>