<!DOCTYPE HTML> 
<! Testing connecting to our database for Lab 5 >
<html lang="en"> 
<head><meta charset="UTF-8"> 
	<title> Lab5 - Joseph McDonough  </title> 
</head> 
<body> 

<?php      # First just connect to the database.

	echo "<h1> Joseph McDonough Testing Connections </h1>"; 
	echo "<ol>";
	echo "<li> Calling 'connect_db.php' to connect to the database! </li>"; 

	require ("..\connect_db.php");
	
	if( mysqli_ping( $dbc ) )   #  good connection!
		{ echo "<li>Connected! </li>"; 
		echo '<li> MySQL Server ' . mysqli_get_server_info( $dbc ). 
                                                       ' connected on ' . mysqli_get_host_info( $dbc )  . "</li>"; }
	
	echo '<br><li> Trying our first Query! </li>'; 	
	$q = 'SHOW TABLES' ;	            # query string 
	$r = mysqli_query ( $dbc , $q );  # pointer to database, query string 
	if ($r ) { echo '<li> Query worked.</li>';  }
	else 	  { echo '<li>' . mysqli_error( $dbc ) . '</li>' ;}

	echo '<br><li> Trying select from prints ! </li>'; 	

	$q = 'SELECT * FROM PRINTS' ;	            # query string 
	$r = mysqli_query ( $dbc , $q ); 	# pointer to db/query string 
	if ($r ) 
	{ echo '<li> Select query worked.</li>';  
		while ($row = mysqli_fetch_array( $r, MYSQLI_NUM))
			{echo '<li>' . $row[0] .' '. $row[1]. ' ' 
						  . $row[2] .' '. $row[3].' '. $row[4]
				   . '</li>'; 
			} 
	  }
	   else  { echo '<li>' . mysqli_error( $dbc ) . '</li>' ; }
	   
	echo "<br><li> Trying select only Monet's from prints ! </li>"; 	   
	$a = 'SELECT * FROM PRINTS WHERE artist="Monet"' ;	            # query string 
	$b = mysqli_query ( $dbc , $a ); 	# pointer to db/query string 
	if ($b ) 
	{ echo '<li> Select query worked.</li>';  
		while ($row = mysqli_fetch_array( $b, MYSQLI_NUM))
			{echo '<li>' . $row[0] .' '. $row[1]. ' ' 
						  . $row[2] .' '. $row[3].' '. $row[4]
				   . '</li>'; 
			} 
	  }
	   else  { echo '<li>' . mysqli_error( $dbc ) . '</li>' ; }
	   
	echo "<br><li> Adding a print for Me ! </li>"; 	   
	$c = 'INSERT INTO prints ( medium, name ,artist, price ) VALUES( "oil",  "Creative Name" , "McDonough",99.99 )';	            # query string 
	$d = mysqli_query ( $dbc , $c ); 	# pointer to db/query string 
	$e = 'SELECT * FROM Prints';
	$d = mysqli_query ( $dbc , $e ); 	# pointer to db/query string 
	if ($d ) 
	{ echo '<li> Select query worked.</li>';  
		while ($row = mysqli_fetch_array( $d, MYSQLI_NUM))
			{echo '<li>' . $row[0] .' '. $row[1]. ' ' 
						  . $row[2] .' '. $row[3].' '. $row[4]
				   . '</li>'; 
			} 
	  }
	   else  { echo '<li>' . mysqli_error( $dbc ) . '</li>' ; }
	

	echo "<table border=1>";
	echo "<tr>";
    echo "<th>ID	</th>";
	echo "<th>Medium</th>"; 
    echo "<th>Name</th>";
	echo "<th> Artist</th>";
	echo "<th> Price </th>";
   	echo "</tr>";
	
	echo "<tr>";
    echo "<td>1	</td>";
	echo "<td>oil</td>"; 
    echo "<td>Merry Structure</td>";
	echo "<td> Monet</td>";
	echo "<td> 129.99 </td>";
   	echo "</tr>";
	
	echo "<tr>";
    echo "<td>2	</td>";
	echo "<td>water</td>"; 
    echo "<td>Heavy Red</td>";
	echo "<td> Monet</td>";
	echo "<td> 124.99 </td>";
   	echo "</tr>";
	
	echo "<tr>";
    echo "<td>3	</td>";
	echo "<td>water</td>"; 
    echo "<td>Black Lines Renoir</td>";
	echo "<td> Renoir</td>";
	echo "<td> 145.99 </td>";
   	echo "</tr>";
	
	echo "<tr>";
    echo "<td>4	</td>";
	echo "<td>oil</td>"; 
    echo "<td>Creative Name</td>";
	echo "<td> McDonough</td>";
	echo "<td> 99.99 </td>";
   	echo "</tr>";
	
	echo "</table>";


?>

</body>
</html>