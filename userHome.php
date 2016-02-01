<?php
	// Check to make sure the user is logged in
	require_once('authorize.php');

	//Start session
	session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WITS - Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
  <script type="text/javascript" src="validation.min.js"></script>

  <!-- CSS --->
  <style>

  </style>

  <script>

  </script>
</head>
<body>

  <!-- NAV BAR -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">WITS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="logout.php">
            <button type="submit" class="btn btn-success" >Logout</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Jumbotron --->
    <div class="jumbotron">
      <div class="container">
        <div class="col-md-8">
          <h2>Welcome to WITS <?php echo $email ?>!</h2>
          <p>Click the button below to begin crafting your perfect schedule!</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Add Classes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <br />
          <img src="Images/calendar.png" alt="Calendar" style="width:128px;height:128px;" />
        </div>
      </div>
    </div>

    <br />
    <br />
    <div class="container">

    </div>
</body>
</html>
