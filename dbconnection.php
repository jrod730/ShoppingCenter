<?php
	
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost:3306');
DEFINE ('DB_NAME', 'Store');

// Make the connection:
$conn = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>