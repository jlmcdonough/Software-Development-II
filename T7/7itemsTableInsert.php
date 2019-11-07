<!-- 
VERSION: 0.1.7 - Creation of file. Displays form that allows new items to be added to database
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
#connect to database
if(include("../../connect_db.php"));           #does connect_db.php exists in right location?

else{                                          #if no connect_db file
	echo "<p1 style = font-size:20px><center> connect_db.php file not found...  </p1>";
	echo "<p1 style = font-size:30px><center> Cannot connect to the database!  </p1>";
}


	
#create autofocus variable to set autofocus
$autofocus = array(1=>"",2=> "",3=> "");

#assign passed arguents to varibales 
$cwid=$location=$item_type=$description=$status=$date_lost="";
if (isset($_POST['CWID']))
	{$cwid = $_POST['CWID'];} 
if (isset($_POST['location']))
	{$location = $_POST['location'];}
if (isset($_POST['Item_Type']))
	{$item_type = $_POST['Item_Type'];} 	
if (isset($_POST['Description']))
	{$description = $_POST['Description'];} 
if (isset($_POST['Status']))
	{$status = $_POST['Status'];}
if (isset($_POST['Date_Lost']))
	{$date_lost = $_POST['Date_Lost'];}

# Check input fields for  errors 
$errormessage="";
if ($cwid.$location.$item_type.$description.$status.$date_lost=="")
	{$errormessage = "ENTER ALL THE INFO AND PRESS SUBMIT";}

elseif (empty($_POST['CWID']))
   {$errormessage="ENTER YOUR CWID";
	$autofocus[1] = "autofocus";}

elseif (empty($_POST['location']))
	{$errormessage="PLEASE SELECT THE LOCATION YOU LOST THE ITEM";}

elseif (empty($_POST['Item_Type']))
	{$errormessage = "PLEASE CHOOSE THE ITEM TYPE";}

elseif (empty($_POST['Description']))
	{$errormessage = "PLEASE ENTER A DESCRIPTION";
	$autofocus[2] = "autofocus";}

elseif (empty($_POST['Status']))
	{$errormessage = "PLEASE SET YOUR STATUS";}

elseif (empty($_POST['Date_Lost']))
	{$errormessage = "PLEASE ENTER THE DATE LOST";
	$autofocus[3] = "autofocus";}
	
echo "<br>";
if ($errormessage!="")
   {echo "<center><p7> $errormessage! </p7>";} 

#Create the handler
if (($_SERVER['REQUEST_METHOD'] != 'POST') or ($errormessage<>"")){	
echo "<center>";
echo "<h2> Form for table 7items  </h2>";
echo "<form action = '7itemsTableInsert.php' method = 'POST'>";
echo "<fieldset style='background-color:rgb(124,124,128);'>";
echo "<p1>CWID <br> <input type = 'text' name = 'CWID' value = '$cwid' maxlength = 8 .$autofocus[1]></p1>";

echo "<br>";
echo "<br>";

echo "<p1>Location<br> ";
echo"<select name='location' size='6'>";
	echo"<option value='byrne'>Byrne House</option>";
	echo"<option value='cannavino'>Cannavino Library</option>";
	echo"<option value='champagnat'>Champagnat Hall</option>";
	echo"<option value='chapel'>Chapel</option>";
	echo"<option value='cornellBoathouse'>Cornell Boathouse</option>";
	echo"<option value='donnely'>Donnely Hall</option>";
	echo"<option value='dyson'>Dyson Center</option>";
	echo"<option value='fern'>Fern Tor</option>";
	echo"<option value='fontaine'>Fontaine Hall</option>";
	echo"<option value='foy'>Foy Townhouses</option>";
	echo"<option value='lowerFulton'>Lower Fulton Townhouses</option>";
	echo"<option value='upperFulton'>Upper Fulton Townhouses</option>";
	echo"<option value='greystone'>Greystone Hall</option>";
	echo"<option value='hancock'>Hancock Center</option>";
	echo"<option value='kieran'>Kieran Greystone</option>";
	echo"<option value='kirk'>Kirk House</option>";
	echo"<option value='leo'>Leo Hall</option>";
	echo"<option value='longview'>Longview Park</option>";
	echo"<option value='lowell'>Lowell Thomas</option>";
	echo"<option value='lower'>Lower New Townhouses</option>";
	echo"<option value='marian'>Marian Hall</option>";
	echo"<option value='maristBoathouse'>Marist Boathouse</option>";
	echo"<option value='mccann'>McCann Center</option>";
	echo"<option value='mid-rise'>Mid-Rise Hall</option>";
	echo"<option value='northCampus'>North Campus Housing Complex</option>";
	echo"<option value='stAnn'>St. Ann's Hermitage</option>";
	echo"<option value='stPeter'>St. Peter's</option>";
	echo"<option value='health'>Science and Allied Heatlh Building</option>";
	echo"<option value='sheahan'>Sheahan Hall</option>";
	echo"<option value='steelPlant'>Steel Plant Studios and Gallery</option>";
	echo"<option value='studentCenter'>Student Center</option>";
	echo"<option value='lowerCedar'>Lower West Cedar Townhouses</option>";
	echo"<option value='upperCedar'>Upper West Cedar Townhouses</option>";
	echo"<option value='diningHall'>Dining Hall</option>";
echo"</select>";
echo "</p1>";

echo "<br>";
echo "<br>";

echo "<p1>Item Type<br>";
echo "<select name='Item_Type'>";
	echo "<option value='Clothing'>Clothing</option>";
	echo "<option value='Electronics'>Electronics</option>";
	echo "<option value='Books'>Books</option>";
	echo "<option value='Wallet/Key/ID'>Wallet/Key/ID</option>";
	echo "<option value='Other'>Other</option>";
echo "</select>";
echo "</p1>";

echo "<br>";
echo "<br>";

echo "<p1>Description<br> <textarea rows = '5' cols = '20' name = 'Description' value = '$description' .$autofocus[2]></textarea></p1>";

echo "<br>";
echo "<br>";

echo "<p1>Status<br>";
echo "<select name='Status'>";
	echo "<option value='Loser'>Loser</option>";
	echo "<option value='finder'>Finder</option>";
echo "</select>";
echo "</p1>";

echo "<br>";
echo "<br>";

echo "<p1>Date Lost (yyyy-mm-dd)<br> <input type = 'text' name = 'Date_Lost' value = '$date_lost' .$autofocus[3]></p1>";

echo "<br>";
echo "<br>";

echo "</fieldset>";
echo "<p><input type = 'Submit'></p>";
echo "</form>";
}

#This is where we handle the form
else{
	echo "<center>";
	echo "<p1>Inside the handler code!</p1>";
	echo " <br> <p1>There are ".count($_POST)." elements in the \$_POST array</p1>";
	echo "<br>";
	
	foreach($_POST as $ThisKey){
		echo "<br> <p1>$ThisKey</p1>";
	}
	
	$q  = "INSERT into 7items (cwid, item_type, description, user_status, date_lost, lost_location)
			Values($cwid, '$item_type', '$description', '$status', '$date_lost', '$location')";
	$r = mysqli_query($dbc, $q);
	
	if ($r == false){
		echo "<p1>DBC error </p1>" .mysqli_error($dbc);
		echo "<p1>Unable to insert record into table</p1>"; die;
	}
	
	echo "<br><p1> User table updated; added $cwid, $item_type, $description, $status, $date_lost, $location</p1>";
}

echo "<br>";
echo "<br>";
echo "<p7>This page was created by Chris Pellerito</p7>";
echo "</center>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

?>


<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>



</body>
</html>