	<?php # Script 8.1 - mysql_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL and selects the database.
// This file also defines the escape_data() function.

// Set the database access information as constants.
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'coffeeshop');

// Make the connection.
$dbc = mysqli_Connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$dbc)
{

	echo 'connection was not successfull' ;
}

?>