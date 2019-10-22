<!---
VERSION: 0.1.0 10/1/19 - Created team7_misc.php.  Only allowed to view if connection was approved
VERSION: 0.1.1 10/3/19 - Added comments and restored the connection. 
VERSION: 0.1.5 10/20/19 - Removed functional diagram from page. Modified to match new CSS file and included header
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>


<body>

<center><p1> Can view our code here </p1><div class="grow"><a href="https://github.com/jlmcdonough/Software-Development-II" target="_blank" style="color:white; font-size:30px;"><i class="fab fa-github-square"></i></a></div>
</body>

<div class = "footer">
	<?php include 'included.php'; #included file contains the version number?>
</div>

</html>