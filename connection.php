<?php
$dbServer = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbDatabase = 'superschool';

// Create connection
$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbDatabase);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

