<!---
VERSION: 0.1.6 Created the admins page. Added 6 links to display administrator information.

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
<a href = "team7_connection.php?">Check Connection</a> <br>
<a href = "team7_misc2.php">Display Tables</a> <br>
<a href="DisplayTables.php?Table=7change">Display Change log</a> <br>
<a href="DisplayTables.php?Table=7buildings">Display Buildings</a> <br>
<a href="DisplayTables.php?Table=7items">Display Items</a> <br>
<a href="DisplayTables.php?Table=7users">Display Users</a> <br>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>


</html>