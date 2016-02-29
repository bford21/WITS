 <?php
$subject = $_POST['subject'];
$courseNum = $_POST['courseNum'];

//Connect to DB
require('dbconnect.php');

$sql = "SELECT * FROM classes WHERE subject='$subject' AND courseNum='$courseNum'";

$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['CRN'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['courseNum'] . "</td><td>" . $row['title'] . "</td><td>" . $row['days'] . "</td><td>" . $row['time'] . "</td><td>" . $row['professor'] . "</td><td><button type='button' class='btn btn-success' onclick='addClass(this.id)' id='" . $row['CRN'] . "'>Add Class</button></td></tr>";
}

$conn->close();

?>
