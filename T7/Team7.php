<!---
VERSION: 0.1.0 10/1/19 - Created all pages- Team7_misc.php, Team7.php, Team7_connection.php - Team7_connection.php We tested connection and added a link to misc page - Team7_misc.php only allowed in if connection was aprovced also show list and database as well as link all pages 
VERSION: 0.1.1 10/3/19 - UPDATED INFO on landing page - Added Comments IN team7_misc.php we restored the connection to the database and got all the back buttons working correctly 
VERSION: 0.1.2 10/7/19 - Created Contact Info, added a show tables link that shows the current data in the tables and added version and date to the bottom left of the screen added functional diagram to the misc page  
VERSION: 0.1.3 10/14/19 - Created the changes table and added all changes that we have made.
VERSION: 0.1.4 10/18/19 - Modified the team7_misc2.php file so that it would display the tables and all their attributes using a function as opposed to hardcoding everything.
VERSION: 0.1.5 10/20/19 - Updated the websites look.  Added buttons to all pages.
VERSION: 0.1.6 10/23/19 - Created the admins page. Added 6 links to display administrator information. Created DisplayTables.php to display tables on admin page
VERSION: 0.1.7 11/6/19 - Added new link in header to report an item. Added links in admin page to add a user or building. 
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

<style>

h3{text-align:right; 

</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>

<br>
<div style = "margin-left:20%; margin-right:20%;">
<p1><center>FoxNFound is a non profit focused on returning lost items to students in need and saving the day when you lose your keys in class</p1>
</div>

<div style = "padding-top:200px";>
<p1><center>CONTACT INFO<br><br>
  Matthew Parisi - 9142824562<br>
  Chris Pellerito - 9175543044<br>
  Joseph McDonough - 9735088914<br>
  Email Us <div class="grow"><a href="mailto:Joseph.McDonough1@marist.edu,Matthew.Parisi1@marist.edu,Christopher.Pellerito1@marist.edu;?Subject=FoxNFound" target="_blank" style="color:white"> <i class="fas fa-envelope"></i></a></div></p1>
 </div>

<br>
<br>
<br>
<br>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>



</body>
</html>