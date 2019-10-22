<!DOCTYPE html>
<html>
<head>
<!--- centers our name and picture --->
<h1><center>Lab 7 McDonough</center></h1>

</head>

<body>

<?php
	echo "<li> Calling 'connect_db.php' to connect to the database! </li>";
	
	require("../connect_db.php");
	
	if(mysqli_ping($dbc)) #good connection!
		{echo "<li>Connected! </li>";
		echo'<li> MySQL Server' .mysqli_get_server_info($dbc).
			'connected on' .mysqli_get_host_info($dbc). "</li>";}
	
	echo"<br>";
	
	$q = 'SHOW TABLES';
	$r = mysqli_query ( $dbc , $q );
	if($r) 
		{
			echo "<li> List of all tables in database </li>";
			echo "<ol>";
			while($row = mysqli_fetch_array($r))
				{ display_table($row[0], $dbc); }
			echo "</ol>";	
		}

	function display_table($table, $dbc)	
		{	
			echo "<li>" . $table. "</li>";
			$q2 = 'EXPLAIN '.$table.";";	
			$r2 = mysqli_query($dbc, $q2);
			
			echo "<ul>";
	
			while($row2 = mysqli_fetch_array($r2,MYSQLI_BOTH))
				{
					echo "<li> Column "." ".$row2[0]." ".$row2[1]." ".$row2[2]." ".$row2[3]." ".$row2[4]."</li>";
				}
	
			echo "</ul>";			
		}
	
?>

</body>
</html>