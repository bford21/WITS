 <?php
$ccode = $_GET['ccode'];
$email = $_GET['email'];

$username = "a7546256_db"; //mysql username
$password = "comp497"; //mysql password
$hostname = "mysql1.000webhost.com"; //hostname
$databasename = 'a7546256_db'; //databasename

//connect to database
$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ccode FROM users WHERE email='$email'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['ccode'];
if($ccode == $row['ccode']){
  $sql2 = "UPDATE users SET confirmed='yes' WHERE email='$email'";
  if ($conn->query($sql2) === TRUE) {
    $conn->close();
    header("Location: http://www.witsboston.com");
    exit();
  }
}else{
  echo "error";
}



  ?>
