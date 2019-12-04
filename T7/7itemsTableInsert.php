<!-- 
VERSION: 0.1.7 11/6/19 - Creation of file. Displays form that allows new items to be added to database
VERSION: 0.1.8 11/7/19 - Updated location part of form such that it pulls from the buildings table.  Added box to enter floor or outside
VERSION: 0.1.12 12/1/19 - Increased error checking
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

#assign passed arguents to varibales 
$cwid=$location=$item_type=$description=$status=$date_lost=$inOrOut="";
$floorNumber="";
if (isset($_POST['CWID']))
	{$cwid = $_POST['CWID'];} 
if (isset($_POST['location']))
	{$location = $_POST['location'];}
if (isset($_POST['inOrOut']))
	{$inOrOut = $_POST['inOrOut'];}
if (isset($_POST['floorNumber']))
	{$floorNumber = $_POST['floorNumber'];}
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
$dateYear = substr($date_lost, 0, 4);
$dateMonth = substr($date_lost, 5, 2);
$dateDay = substr($date_lost, 8, 2);

if ($cwid.$location.$item_type.$description.$status.$date_lost=="")
	{$errormessage = "ENTER ALL THE INFO AND PRESS SUBMIT";}

elseif (empty($_POST['CWID']))
   {$errormessage="ENTER YOUR CWID";}

elseif (empty($_POST['inOrOut']))
	{$errormessage = "Select Inside or Outside";}
	
elseif (empty($_POST['location']))
	{$errormessage="PLEASE SELECT THE LOCATION YOU LOST THE ITEM";}

elseif (empty($_POST['Item_Type']))
	{$errormessage = "PLEASE CHOOSE THE ITEM TYPE";}

elseif (empty($_POST['Description']))
	{$errormessage = "PLEASE ENTER A DESCRIPTION";}

elseif (empty($_POST['Status']))
	{$errormessage = "PLEASE SET YOUR STATUS";}

elseif (empty($_POST['Date_Lost']))
	{$errormessage = "PLEASE ENTER THE DATE LOST";}
	
elseif (ctype_digit($cwid) == false){
	$errormessage = "Your CWID must only contain numbers";
}
	
elseif ((ctype_digit($dateYear) == false) or (ctype_digit($dateMonth) == false) or (ctype_digit($dateDay) == false)){
	$errormessage = "PLEASE ENTER A VALID DATE";
}
	
elseif (($dateYear > date("Y")) or ($dateYear < (date("Y") - 1))){
	$errormessage = "PLEASE ENTER A VALID YEAR";
}
	
elseif(($dateMonth < 1) or ($dateMonth > 12)){
	$errormessage = "PLEASE ENTER A VALID MONTH";
}
	
elseif (($dateDay < 1) or ($dateDay > 31)){
	$errormessage = "PLEASE ENTER A VALID DAY";
}
	
echo "<br>";
if ($errormessage!="")
   {echo "<center><p7> $errormessage! </p7>";}  

#Create the handler

if (($_SERVER['REQUEST_METHOD'] != 'POST') or ($errormessage<>"")){	

		# query table to get list of userids 
		$buildingQuery = "SELECT name FROM 7buildings";
		$buildingPointer = mysqli_query($dbc, $buildingQuery ); 
		
		#$element=0;
		while($row = mysqli_fetch_array($buildingPointer,MYSQLI_NUM ))	
			{
				$buildingList[]=$row[0];
			}
		  
	echo "<center>";
	echo "<h2> Form for table 7items  </h2>";
	echo "<form action = '7itemsTableInsert.php' method = 'POST'>";
	echo "<fieldset style='background-color:rgb(124,124,128);'>";
	echo "<p1>CWID <br> <input type = 'text' name = 'CWID' value = '$cwid' minlength = 8 maxlength = 8></p1>";

	echo "<br>";
	echo "<br>";
		echo "<p1> Location<br> <select name='location'>          </p1>";
		for ($i=0;$i<count($buildingList);$i++)
			{
				echo "<option value='" . $buildingList[$i] . "'>" . $buildingList[$i] ."</option>";
			}
		echo "          </select>         </p1>"; 
	
	echo "<br>";
	echo "<br>";
	
	echo "<input type = 'radio' name ='inOrOut' value = 'outside' ><p1>Outside</p1><br>";
	echo "<input type = 'radio' name ='inOrOut' value = 'inside' }><p1>Inside</p1><br>";
	
	echo "<br>";
	
	echo "<p1>floor number (-1 = basement)</p1> <input type = 'number' name = 'floorNumber' value = '$floorNumber'>";

	echo "<br>";
	echo "<br>";
	
echo "<p1>Item Type<br>";
echo "<select name='Item_Type'>";
	echo "<option value='Clothing'>Clothing</option>";
	echo "<option value='Electronics'>Electronics</option>";
	echo "<option value='Books'>Books</option>";
	echo "<option value='Wallets/Keys/ID'>Wallet/Key/ID</option>";
	echo "<option value='Rideables'>Rideables</option>";
	echo "<option value='Misc.'>Miscellaneous</option>";
echo "</select>";
echo "</p1>";

echo "<br>";
echo "<br>";

echo '<p1>Description<br> <textarea rows = "5" cols = "20" name = "Description" value = "$description">' ;
echo "$description"; 
echo'</textarea></p1>';

echo "<br>";
echo "<br>";

echo "<p1>Status<br>";
echo "<select name='Status'>";
	echo "<option value='loser'>Loser</option>";
	echo "<option value='finder' >Finder</option>";
echo "</select>";
echo "</p1>";

echo "<br>";
echo "<br>";

echo "<p1>Date Lost <br> <input type = 'date' name = 'Date_Lost' value = '$date_lost'></p1>";


echo "<br>";
echo "<br>";

echo "</fieldset>";
echo"<p3 style='display:block; text-align:center'><input type = 'Submit'></p3>";
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
	
	
	if($inOrOut == 'inside')
		{
	$q  = "INSERT into 7items (cwid, item_type, description, user_status, date_lost, lost_location, insideOrOutside, floorNumber)
			Values($cwid, '$item_type', '$description', '$status', '$date_lost', '$location', '$inOrOut', $floorNumber)";
	$r = mysqli_query($dbc, $q);
		}
	if($inOrOut == 'outside')
	{
			$q  = "INSERT into 7items (cwid, item_type, description, user_status, date_lost, lost_location, insideOrOutside)
			Values($cwid, '$item_type', '$description', '$status', '$date_lost', '$location', '$inOrOut')";
	$r = mysqli_query($dbc, $q);
	}
	
	if ($r == false){
		echo "<p1>DBC error </p1>" .mysqli_error($dbc);
		echo "<p1>Unable to insert record into table</p1>"; die;
	}
	
	echo "<br><p1> User table updated; added $cwid, $item_type, $description, $status, $date_lost, $location</p1>";
}


echo "<br>";
echo "<br>";
echo'<a href = "team7.php" class="button button_back">HOME</a>';

echo "<br>";
echo "<br>";
echo "<p7>This page was created by Chris Pellerito</p7>";

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