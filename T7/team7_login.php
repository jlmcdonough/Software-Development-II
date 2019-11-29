<?php
session_start();
?>

<!---
VERSION: 0.1.8 Created page so that admin's can log in
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
	$_SESSION["loginstatus"]="NOT LOGGED IN"; 


# get passed variables and check for errors 
   $email=$password="";    	
	if (isset($_POST['email']))
		{
			$email=strtolower(trim($_POST['email']));
		} 		
	if (isset($_POST['password']))
		{
			$password=$_POST['password'];
		}   
    
	
	if (($email=="") or ($password=="")) 	
		{
			$errormessage="Missing inputs";
		} 
	else    
		{
			$errormessage="";
		}

	
	echo "<center><p1>$errormessage</p1>"; 

#Display the form here 
If (  ($_SERVER['REQUEST_METHOD'] != 'POST')    or  ($errormessage != "") )
	{
		echo "<center>";
		echo "<form action='team7_login.php' method='POST'>"; 
		echo "<fieldset style='background-color:rgb(124,124,128);'>";
		echo "<fieldset>";
		echo "<p1>EMAIL<br><input type='text' name='email' value='$email' ></p1>";
		
		echo "<br>";
		echo "<br>";
		
		echo "<p1>PASSWORD<br><input type='text' name='password' value='$password' ></p1>";
		
		echo "<br>";
		echo "<br>";
		
		echo "<p1><input type='submit'></p>";
		echo "</fieldset>";
		echo "</form>";
		echo "</center>";
	}
#Process the form here 
else
	{  
		include ("..\..\connect_db.php");
		$q = "SELECT 7users.email, 7users.password 
			  FROM 7users 
			  WHERE email = '$email'
			  AND password = '$password'";
		#echo("$q");
		$r = mysqli_query($dbc, $q ); 
		if (mysqli_num_rows($r) > 0)     #count # of matches
				{
					$_SESSION["loginstatus"]="LOGGED IN";
					$link_address = "team7_admin.php";
					echo '<a href="'.$link_address.'">Successful login. Continue to admin page</a>';
				} 
		else
			{
				$link_address = "team7_login.php";
				echo "<center><p1>Invalid user id or password </p1><br>";
				echo '<a href="'.$link_address.'">Try to login again</a>';  # target="_blank" style="color:white; font-size:30px;"><i class="fas fa-user-lock"></i></a></div>';

				
			}
	}

?>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>


</html>