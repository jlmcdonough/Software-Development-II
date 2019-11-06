<!---
VERSION: 0.1.6 Created the admins page. Added 6 links to display administrator information.
VERSION: 0.1.7 Added buttons to add users or buildings
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
<body>

<center>
<br>
<a href = "team7_connection.php?" class="button">Check Connection</a> 
<a href = "team7_misc2.php?" class="button">Display Tables</a> <br><br><br><br><br>
<a href="DisplayTables.php?Table=7change" class="button">Display Change Log</a> 
<a href="DisplayTables.php?Table=7buildings" class="button">Display Buildings</a>  
<a href="DisplayTables.php?Table=7items" class="button">Display Items</a>  
<a href="DisplayTables.php?Table=7users" class="button">Display Users</a> <br><br><br><br><br>
<a href = "7usersTableInsert.php?" class="button">Add User</a> 
<a href = "7buildingsTableInsert.php?" class="button">Add Building</a> 
</center>

</body>

<br>
<br>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>


</html>