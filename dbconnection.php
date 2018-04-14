<?php
	
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost:3306');
DEFINE ('DB_NAME', 'Store');

// Make the connection:
$mysqli = new mysqli("localhost", "root", "", "Store");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

?>