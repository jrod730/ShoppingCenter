<?php

$server = "localhost:3306";
$username = "root";
$password = "";
$db = "Store";

// Create connection
$mysqli = new mysqli($server, $username, $password, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 