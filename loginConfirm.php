<?php
########## MySql details (Replace with yours) #############
$username = "a7546256_db"; //mysql username
$dbpassword = "comp497"; //mysql password
$hostname = "mysql1.000webhost.com"; //hostname
$databasename = 'a7546256_db'; //databasename

$email = $_POST['email'];
$password = $_POST['password'];

//connect to database
$conn = new mysqli($hostname, $username, $dbpassword, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM users WHERE email='$email'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Start session as well
if($password == $row['password']){
  echo "<p>Success, You logged in!</p>";

  // Creates a session for authentication
  session_start();
  $_SESSION['email'] = $email;

  //$conn->close();
  //header("Location: http://www.witsboston.com/userHome.php");
  //exit();
}else{
    echo "<p>Invalid email and password!</p>";
}

$conn->close();

?>
