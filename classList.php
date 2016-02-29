<?php
	// Check to make sure the user is logged in
	require_once('authorize.php');

	//Start session
	session_start();

  //Connect to DB
  require('dbconnect.php');

	// Get Email
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $fname = $row['fname'];



	// Get Class List
	$sql = "SELECT 'CRN' FROM classList WHERE email='$email'";
	$result = $conn->query($sql);
	$result2 = $result->fetch_assoc();

  // Get Class List
	$sql = "SELECT COUNT(email) AS total FROM classList WHERE email='$email'";
	$result2 = $conn->query($sql);
	$classListNum = $result2->fetch_assoc();

/// GET CRN'S FROM CLASSLIST
/// SEARCH CRN'S IN CLASSES DB
/// DISPLAY INFORMATION IN TABLE


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WITS - Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="validation.min.js"></script>

  <!-- CSS --->
  <style>
	#alert{
		display: none;
	}
  </style>

  <script>

	$(document).ready(function(){
    $('.close').click(function(){
        $("#alert").hide();
    });
	});


  </script>
</head>
<body>

  <!-- NAV BAR -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">WITS</a>
					<a class="navbar-brand" href="classList.php ">Class List <span class="badge" id="classListNum"><?php echo $classListNum['total'] ?></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <form class="navbar-form navbar-right" action="logout.php">
            <button type="submit" class="btn btn-success" >Logout</button>
          </form>
        </div><!--/.navbar-collapse -->
				<div class="alert alert-success fade in" id="alert" >
					<a href="#" class="close" aria-label="close">&times;</a>
					<strong>Success!</strong> You added a new class to your class list!
				</div>
      </div>

    </nav>

    <!-- Jumbotron --->
    <div class="jumbotron">
      <div class="container">
        <div class="col-md-8">
          <h2><?php echo $fname ?>'s class list</h2>
          <p>When you've selected all the classes you need to take, click generate schedules and watch the magic happen!</p>
        </div>
        <div class="col-md-4">
          <br />
          <img src="Images/calendar.png" alt="Calendar" style="width:128px;height:128px;" />
        </div>
      </div>
    </div>

    <br />

		<div class="container">
			<table class="table">
		    <thead>
		      <tr>
		        <th>CRN</th>
		        <th>Subject</th>
		        <th>Course#</th>
						<th>Title</th>
						<th>Days</th>
						<th>Time</th>
						<th>Professor</th>
						<th>Add</th>
		      </tr>
		    </thead>
		    <tbody id="resultsRow">


		    </tbody
		  </table>
		</div>
</body>
</html>
