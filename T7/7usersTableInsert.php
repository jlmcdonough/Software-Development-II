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
VERSION: 0.1.7 11/6/19 - Creation of file. Displays form that allows new users to be added to database
VERSION: 0.1.9 11/29/19 - hashed passwords and added that password to database. Used algorithm SHA256.
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
	error_reporting(0);
	
	#connect to database
	if(include("../../connect_db.php"));           #does connect_db.php exists in right location?

	else{                                          #if no connect_db file
		echo "<p1 style = font-size:20px><center> connect_db.php file not found...  </p1>";
		echo "<p1 style = font-size:30px><center> Cannot connect to the database!  </p1>";
	}
	
#create autofocus variable to set autofocus
$autofocus = array(1=>"",2=> "",3=> "");
    
   $cwid=$fname=$lname=$email=$pass="";
	$phone = 0;
   if (isset($_POST['cwid']))
	{$cwid=$_POST['cwid'];} 		
   if (isset($_POST['firstName']))
	{$fname=$_POST['firstName'];} 		
   if (isset($_POST['lastName']))
	{$lname=$_POST['lastName'];}
   if (isset($_POST['email']))
	{$email=$_POST['email'];}
   if (isset($_POST['password']))
	{$pass=$_POST['password'];}
   if (isset($_POST['phone']))
	{$phone=$_POST['phone'];}

    # input validation 
  $errormessage="";
  
    if (empty($_POST['cwid']))	
   { $errormessage="ENTER A CWID";
   } 
    if (empty($_POST['firstName']))	
   { $errormessage="ENTER FIRST NAME";
   } 
    if (empty($_POST['lastName']))	
   { $errormessage="ENTER LASR NAME";
   } 
	if (empty($_POST['email']))	
   { $errormessage="ENTER AN EMAIL";
   } 
	if (empty($_POST['password']))	
   { $errormessage="ENTER A PASSWORD";
   } 
	if (empty($_POST['phone']))	
   { $errormessage="ENTER A PHONE NUMBER";
   } 
  if ($errormessage!="")
      {echo "<center><p7> $errormessage! </p7>";} 

   
If (($_SERVER['REQUEST_METHOD'] != 'POST')  OR ($errormessage<>""))
 {
	echo "<center>";
	echo "<h2> Form for table 7Users</h2>";
	echo '<form action="7usersTableInsert.php" method="POST">';
	echo "<fieldset style='background-color:rgb(124,124,128);'>";
	echo '<p1>CWID</p1><br>';
	echo '<input type="text" name="cwid">';
	
	echo "<br>";
	echo "<br>";

	echo'<p1>First Name</p1><br>';
	echo'<input type="text" name="firstName">';
	
	echo "<br>";
	echo "<br>";
	
	echo'<p1>Last Name</p1><br>';
	echo'<input type="text" name="lastName">';
	
	echo "<br>";
	echo "<br>";
	
	echo'<p1>Email</p1><br>';
	echo'<input type="text" name="email">';
	
	echo "<br>";
	echo "<br>";
	
	echo'<p1>Password</p1><br>';
    echo'<input type="Password" name="password">';
    
	echo "<br>";
	echo "<br>";
	
	echo'<p1>Phone</p1><br>';
    echo'<input type="text" name="phone">';
	
	echo "<br>";
	echo "<br>";
	
	echo "</fieldset>";

	echo "<p1><input type = 'Submit'></p1>";
	echo "</form>";
	echo "</center>";
 }
 
 echo"<center>";
if($errormessage == "")
{
	$hashedpassword = hash(SHA256, $pass);
	echo"$hashedpassword";
$q = "INSERT INTO 7users (cwid, first_name, last_name, email, password, phone)
      VALUES ('$cwid','$fname','$lname','$email','$hashedpassword','$phone')";
$r = mysqli_query($dbc, $q ); 
if ($r == false) 
{ #echo "DBC Error " . mysqli_error($dbc); 
  echo "<p1>Unable to insert into the table. Contact support!</p1>"; die; 
}
else
	echo "<br> <p1>User Table updated;$cwid $fname $lname $email $hashedpassword $phone!</p1>";
} 
 echo"</center>";
echo "<center><br> <p7>by Matthew Parisi</p7>";

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