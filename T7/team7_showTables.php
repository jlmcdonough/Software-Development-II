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
?>

<!---
VERSION: 0.1.2 10/7/19 - Created team7_misc2.php to show tables explanations
VERSION: 0.1.4 10/18/19 - Modified the team7_misc2.php file so that it would display the tables and all their attributes using a function as opposed to hardcoding everything.
VERSION: 0.1.5 10/20/19 - Updated the websites look.  Added buttons to all pages.
VERSION: 0.1.6 10/23/19 - Removed old code that was commented out
VERSION: 0.1.10 11/30/19 - RENAMED TO team7_showTables.php. Moved to admin page and therefore added back button to admin page.
VERSION: 0.1.11 11/30/19 - Locked behind admin access
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

<?php
echo'<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">';

if($loginstatus == 'NOT LOGGED IN')
	{
		echo'<center><p1>PLEASE LOGIN TO VIEW   </p1><div class="grow"><a href="team7_login.php" target="_blank" style="color:white; font-size:25px;"><i class="fas fa-user-lock"></i></a></div>';
	}
else if($loginstatus == 'LOGGED IN')
	{
	
	if(include("../../connect_db.php")) #does connect_db.php exists in right location?
		{
			$tables = array('7users','7buildings','7items','7change');	   

			for($i = 0; $i < count($tables);$i++)
			{
				display_table($tables[$i], $dbc);
			} #for loop 
		} #if statement
	else #if no connect_db file
	{
		echo "<p1 style = font-size:20px><center> connect_db.php file not found...  </p1>";
		echo "<p1 style = font-size:30px><center> Cannot connect to tables!  </p1>";
}
	
	echo'<br>';
	echo'<br>';

	echo'<a href = "team7_admin.php" class="button button_back">BACK</a>';
}



function display_table($table, $dbc)	
  {	
	echo "<center><table border = 1px solid black;>";
	echo "<caption><p3> $table </p3></caption> ";
	echo "<tr>";
	echo "<th><p4> FIELD </p4></th>";
	echo "<th><p4> TYPE </p4></th>";
	echo "<th><p4> NULL </p4></th>";
	echo "<th><p4> DEFAULT </p4></th>";
	echo"<th><p4> EXTRA </p4></th>";
	echo "</tr>";
	
	$q = 'EXPLAIN '.$table.";";
	$r = mysqli_query($dbc, $q);	
	
	echo "<ul>";

	while ($row = mysqli_fetch_array($r, MYSQLI_NUM))
			{echo '<tr><td><p5>' .$row[0] .'</td> <td><p5>'. $row[1]. '</td> <td><p5>'
						.$row[2] .'</td> <td><p5>'. $row[3]. '</td> <td><p5>'. $row[4]
						.'</td></tr></p5>';
			}
			echo '<br>';
	echo "</ul>";
	echo"</table>";
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