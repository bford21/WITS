<?php
########## MySql details #############
$username = ""; //mysql username
$dbpassword = ""; //mysql password
$hostname = ""; //hostname
$databasename = ''; //databasename

//connect to database
$conn = new mysqli($hostname, $username, $dbpassword, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
