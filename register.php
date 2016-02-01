
<?php
########## MySql details (Replace with yours) #############
$username = "a7546256_db"; //mysql username
$password = "comp497"; //mysql password
$hostname = "mysql1.000webhost.com"; //hostname
$databasename = 'a7546256_db'; //databasename

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'] . "@wit.edu";
$pass = $_POST['password'];
$ccode = rand(1,100000);

//connect to database
$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (fname, lname, email, password, ccode)
VALUES ('$fname', '$lname', '$email', '$pass', '$ccode')";

if ($conn->query($sql) === TRUE) {
  $mailto = $email;
  $subject = "Confirmation email from WITS!";
  $message = "Click on the following link to confirm your email: http://www.witsboston.com/confirmation.php?ccode=$ccode&email=$email";
  $headers = "From: WITSBoston.com";

  // Mail function
  mail ($mailto,$subject,$message,$headers);

   $conn->close();
   header("Location: http://www.witsboston.com/confirm.html");
   exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
/*
require_once('dbconfig.php');

 if($_POST)
 {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['password'];
  $ccode = rand(1,100000);


  try
  {

   $stmt = $db_con->prepare("SELECT * FROM users WHERE email=:email");
   $stmt->execute(array(":email"=>$user_email));
   $count = $stmt->rowCount();

   if($count==0){

   $stmt = $db_con->prepare("INSERT INTO users(fname, lname, email, password, ccode) VALUES(:fname, :lname, :email, :pass, :ccode)");
   $stmt->bindParam(":fname",$first_name);
   $stmt->bindParam(":lname",$last_name);
   $stmt->bindParam(":email",$user_email);
   $stmt->bindParam(":pass",$user_password);
   $stmt->bindParam(":ccode",$ccode);

    if($stmt->execute())
    {
     echo "registered";
    }
    else
    {
     echo "Query could not execute !";
    }

   }
   else{

    echo "1"; //  not available
   }

  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }
*/
