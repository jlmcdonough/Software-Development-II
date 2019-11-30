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

<!-- 
VERSION: 0.1.7 11/6/19 - Creation of file. Displays form that allows new buildings to be added to database
VERSION: 0.1.11 11/30/19- locked behind admin access
-->

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

</header>

<body>
<?php

echo'<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">';

if($loginstatus == 'NOT LOGGED IN')
	{
		echo'<center><p1>PLEASE LOGIN TO VIEW   </p1><div class="grow"><a href="team7_login.php" target="_blank" style="color:white; font-size:25px;"><i class="fas fa-user-lock"></i></a></div>';
	}
else if($loginstatus == 'LOGGED IN')
	{
#create autofocus variable to set autofocus
$autofocus = array(1=>"", 2=>"", 3=>"");

#assign passed arguents to varibales 
$name=$minFloor=$maxFloor="";
if (isset($_POST['name']))
	{$name = $_POST['name'];} 
if (isset($_POST['minFloor']))
	{$minFloor = $_POST['minFloor'];}
if (isset($_POST['maxFloor']))
	{$maxFloor = $_POST['maxFloor'];} 	


# Check input fields for  errors 
$errormessage="";
if ($name.$minFloor.$maxFloor=="")
	{$errormessage = "ENTER ALL THE INFO AND PRESS SUBMIT";}

if (empty($_POST['name']))
   {$errormessage="ENTER THE NEW BUILDING'S NAME";
	$autofocus[1] = "autofocus";}

if (empty($_POST['minFloor']))
	{$errormessage="CHOOSE WHICH APPLIES TO THE LOWEST LEVEL";
	$autofocus[2] = "autofocus";}

if (empty($_POST['maxFloor']))
	{$errormessage = "ENTER THE MAXIMUM FLOOR NUMBER OF THE NEW BUILDING";
	$autofocus[3] = "autofocus";}

echo "<br>";
if ($errormessage!="")
   {echo "<center><p7> $errormessage! </p7>";} 

#Create the handler
if (($_SERVER['REQUEST_METHOD'] != 'POST') or ($errormessage<>"")){	
echo "<center>";
echo "<br><h2> Form for table 7buildings</h2>";
echo "<form action = '7buildingstableinsert.php' method = 'POST'>";
echo "<fieldset style='background-color:rgb(124,124,128);'>";
echo "<p1>Building Name <br> <input type = 'text' name = 'name' value = '$name'.$autofocus[1]'></p1>";

echo "<br>";
echo "<br>";

echo "<dt> <p1>Lowest level: </p1>";
	echo"<br>";
	echo"<input type = 'radio' name = 'minFloor' value = -1><p1> is basement/ground level/lower level, etc. </p1><br>";
	echo"<input type = 'radio' name = 'minFloor' value = 1><p1> is 1 </p1><br>";

echo "<br>";

echo "<p1>Maximum Floor <br> <input type = number name = 'maxFloor' value = '$maxFloor'.$autofocus[3]'></p1>";

echo"<br>";

echo "</fieldset>";

echo "<p1><input type = 'Submit'></p1>";
echo "</form>";
echo "</center>";
}

#This is where we handle the form
else{
	
	#connect to database
	echo "<center>";
	echo "<p1><br> Connecting to the database... </p1><br>";
	include ("..\..\connect_db.php");
	
	#check for duplicate names
	$q = "SELECT 7buildings.* FROM 7buildings WHERE 7buildings.name = '$name'";
	$r = mysqli_query($dbc, $q);
	
	#if does not exists, insert
	if(mysqli_num_rows($r)==0)
	{
		$q  = "INSERT into 7buildings (name, minFloor, maxFloor) Values('$name', $minFloor, $maxFloor);";
		$r = mysqli_query($dbc, $q);
		
		#another error when inserting
		if ($r == false)
		{
			echo "<p1>DBC error " .mysqli_error($dbc)."</p1>"; 
			echo "<br><p1>Unable to insert record into table</p1>"; 
			die;
		}
		
		echo "<br> <p1>User table updated; added $name, $minFloor, $maxFloor </p1>";
	}
	else
	{
		echo"<p1> This building name is already present in the 7buildings table. Did not add.";
	}
	echo "</center>";
}

echo "<center><br> <p7> This page was designed by Joseph McDonough </p7><br>";

echo "<br>";
echo "<br>";


echo'<a href = "team7_admin.php" class="button button_back">BACK</a>';

	}

?>

<br>
<br>
<br>
<br>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>



</body>
</html>