<?php
$crn = $_POST['crn'];

//Connect to DB
require('dbconnect.php');

$sql = "SELECT * FROM classes WHERE CRN='$crn'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<tr><td>" . $row['CRN'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['courseNum'] . "</td><td>" . $row['title'] . "</td><td>" . $row['days'] . "</td><td>" . $row['time'] . "</td><td>" . $row['professor'] . "</td><td><button type='button' class='btn btn-success' onclick='addClass(this.id)' id='" . $row['CRN'] . "'>Add Class</button></td></tr>";

/*
foreach($row as $r){
  echo $r;
}
*/
$conn->close();

?>
