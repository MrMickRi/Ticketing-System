<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect to login page
require_once "Auth.php";
// Include config file
require_once "config.php";
// Close connection
    mysqli_close($link);
?>
 
<!doctype html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>SoloDesk - Tickets</title>
	  <link rel="shortcut icon" type="image/x-icon" href="../it.png" />
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">
    <link href="product.css" rel="stylesheet">
  </head>
  <body style="margin-bottom: 120px;">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#"><img src="it3.png"></img></a>
      <h3 class="text-light pr-2 pt-1" style="font-family:Bookman;">SoloDesk</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">Home<span class="sr-only"></span></a>
          </li>
              <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tickets
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="myTickets.php" id="lol"  >My Tickets</a>
              <a class="dropdown-item" href="ticketsOpen.php">Open Tickets</a>
              <a class="dropdown-item" href="tickets.php">All Tickets</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="New_Ticket.php">Create Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
		        <li class="nav-item">
            <a class="nav-link" href="reset.php">Reset Password</a>
          </li>
          </li>
          <!--control panel only visible for admin-->
          <?php if(($_SESSION['acc_type']) == "admin"){ 
            Echo "<li class='nav-item'>";
            Echo "<a class='nav-link' href='ControlPanel.php'>Control Panel</a>";
            Echo "</li>";
          }
          ?>
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="logout.php">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
        </form>
      </div>
    </nav>
	
	
    <div  class="wrapper" style="text-align: center;display: block;align-items: center;margin-top:60px;">
      </div>

      <?php
      $link=mysqli_connect("localhost","root","","ticketsystem");
       // Check connection
      
      
      if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $user = $_SESSION['username'];
          $result = mysqli_query($link,"SELECT * FROM tickets LEFT JOIN users on tickets.submitter = users.id where Assigned_Agent = '$user';");

          Echo  "<table class='table table-sm'>";
          Echo      "<thead>";
          Echo      "<tr'>";
          Echo        "<th>Ticket ID</th>";
          Echo        "<th>Title</th>";
          Echo        "<th>Description</th>";
          Echo        "<th>Submitter</th>";
          Echo        "<th>Department</th>";
          Echo        "<th>Date Submitted</th>";
          Echo        "<th>Status</th>";
          Echo        "<th>SLA</th>";
          Echo        "<th>Assigned to</th>";
          while($row = mysqli_fetch_array($result))
          {
          echo "<tr>";
          echo "<td><a href='ticket.php\?id={$row['ticket_id']}'>" . $row['ticket_id'] . "</a></td>";
          echo "<td>" . $row['Title'] . "</td>";
          echo "<td>" . $row['Description'] . "</td>";
          echo "<td>" . $row['submitter'] . "</td>";
          echo "<td>" . $row['Department'] . "</td>";
          echo "<td>" . $row['Date_Logged'] . "</td>";
          echo "<td>" . $row['Status'] . "</td>";
          echo "<td>" . $row['SLA'] . "</td>";
          echo "<td>" . $row['Assigned_Agent'] . "</td>";
          if((($_SESSION['acc_type']) == 'admin') || (($_SESSION['acc_type']) == 'agent')){ 
          echo "<td>  <a href=take_ownership.php\?id={$row['ticket_id']}>Ownership</a></td>";
          }
          echo "</a></tr>";
          }
          echo "</table>";
          mysqli_close($link);
          ?>
        </div>
    <div  class="bg-dark text-white-50 fixed-bottom"  style="margin-top:15px"> 
	<footer  class="container py-2 d-none d-sm-block">
      <div class="row">
        <div class="col-12 col-md">
            <img src="it2.png"/>
            <small class="d-block mb-3 text-muted">&copy; 2020 Michael Murphy</small>
          </div>
          <div class="col-6 col-md">
            <h5>The Dev</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>The Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>The Lads</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Business</a></li>
              <li><a class="text-muted" href="#">Education</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>

    
  </body>
</html>
