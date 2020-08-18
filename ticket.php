<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect to login page
require_once "Auth.php";
// Include config file
require_once "config.php";


$id = isset($_GET['id']);
$Submitter = isset($_GET['Submitter']);
$Title = isset( $_GET['Title']);
$issue_Type = isset($_GET['issue_type']);
$Description = isset($_GET['Description']);
$Department = isset($_GET['Department']);
$date_Logged = isset($_GET['date_Logged']);
$Assigned_Agent = isset($_GET['Assigned_Agent']);
$Status = isset($_GET['Status']);
$SLA = isset($_GET['SLA']);


$id = intval($_GET['id']);


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

    <title>SoloDesk - Ticket</title>
	<link rel="shortcut icon" type="image/x-icon" href="../it.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <!-- Custom styles for this template -->
  <link href="product.css" rel="stylesheet">
  </head>

  <body style="margin-bottom: 120px;">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#"><img src="../it3.png"></img></a>
      <h3 class="text-light pr-2 pt-1" style="font-family:Bookman;">SoloDesk</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../welcome.php">Home<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../tickets.php">Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../New_Ticket.php">Create Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../profile.php">Profile</a>
          </li>
		       <li class="nav-item">
            <a class="nav-link" href="../reset.php">Reset Password</a>
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
	
	
    <div  class="wrapper" style="text-align: center;display: block;align-items: center;margin-top: 5%">
	  </div>

	  <div class="container-fluid">
      <div class="row">
           <div class="col-sm4 mr-5">
    <?php
      $link=mysqli_connect("localhost","root","","ticketsystem");
       // Check connection
      if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
          $result = mysqli_query($link,"SELECT * FROM tickets WHERE ticket_id=$id");
          while($row = mysqli_fetch_array($result))
          {
        ECHO "<div class='table-responsive'>";          
        ECHO "<table class='table'>";
        ECHO "<thead>";
        ECHO "<tr>";
        ECHO "<th>Ticket ID</th>";
        ECHO "<td>" . $row['ticket_id'] . "</td>";
        ECHO "</tr>";
        ECHO "</thead>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>Title</td>";
        ECHO "<td>" . $row['Title'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>Description</td>";
        ECHO "<td>" . $row['Description'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>submitter</td>";
        ECHO "<td>" . $row['submitter'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>Department</td>";
        ECHO "<td>" . $row['Department'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>Date Logged</td>";
        ECHO "<td>" . $row['Date_Logged'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>Status</td>";
        echo "<td><a href='#'data-toggle='modal' data-target='#modalStatus'>" . $row['Status'] . "</a></td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>SLA</td>";
        ECHO "<td>" . $row['SLA'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "<tbody>";
        ECHO "<tr>";
        ECHO "<th>Assigned_Agent</td>";
        ECHO "<td>" . $row['Assigned_Agent'] . "</td>";
        ECHO "</tr>";
        ECHO "</tbody>";
        ECHO "</table>";
        ECHO "</div>";
          }
          mysqli_close($link);
          ?>
          </div>
      <div class="col-sm-8">
      <div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        ECHO "<form  action='../update.php\?id={$id}' method='post'>"; 
        ECHO " <label for='status'>Change Status:</label>";
            ECHO "  <select name='Status_tag' id='Status_tag'>";
              ECHO "<option value='Open'>Open</option>";
              ECHO "<option value='On Hold'>On Hold</option>";
              ECHO "<option value='Closed'>Closed</option>";
              ECHO "</select>";
            ECHO "</div>";
      ECHO "<div class='modal-footer'>";
        ECHO "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
        ECHO "<input type='submit' class='btn btn-primary' value='Submit'>";
        ECHO "</form>";
        ?>
      </div>
    </div>
  </div>
</div>


        <?php
          $link=mysqli_connect("localhost","root","","ticketsystem");
          // Check connection
          if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          $result = mysqli_query($link,"SELECT * FROM ticket_response LEFT JOIN tickets on ticket_response.parent_ticket = tickets.ticket_id WHERE parent_ticket = $id;");

          Echo  "<table class='table table-sm table-hover'>";
          Echo      "<thead>";
          Echo      "<tr'>";
          Echo        "<th>Response ID</th>";
          Echo        "<th>Responder</th>";
          Echo        "<th>Role</th>";
          Echo        "<th>Comment</th>";
          Echo        "<th>Reply Date</th>";
          while($row = mysqli_fetch_array($result))
          {
          echo "<tr>";
          echo "<td>" . $row['Id'] . "</td>";
          echo "<td>" . $row['User'] . "</td>";
          echo "<td>" . $row['responder_role'] . "</td>";
          echo "<td>" . $row['Text'] . "</td>";
          echo "<td>" . $row['Reply_Date'] . "</td>";
          echo "</tr>";
          }
          echo "</table>";


          
          ECHO "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter'>";
            ECHO "Add Comment";
            ECHO "</button>";
            ECHO "<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
            ECHO "<div class='modal-dialog modal-dialog-centered' role='document'>";
            ECHO "<div class='modal-content'>";
            ECHO "<div class='modal-header'>";
            ECHO "<h5 class='modal-title' id='exampleModalLongTitle'>New Comment</h5>";
            ECHO "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            ECHO "<span aria-hidden='true'>&times;</span>";
            ECHO "</button>";
            ECHO "</div>";
            ECHO "<div class='modal-body'>";
            Echo "<form  action='../update_ticket.php\?id={$id}' method='post'>";    
            Echo "<span class='help-block'>";
            Echo "<label for='Text' style='text-align: center;'>Comment</label>";
            Echo "<small id='Help' class='form-text text-muted'>Enter the details of your ticket in full.</small>";
            Echo "<textarea class='form-control' rows='5' id='Text' name='Text' placeholder='Comments'></textarea>";
            ECHO " </div>";
            ECHO "<div class='modal-footer'>";
            Echo "<input type='submit' class='btn btn-primary' value='Submit'>";
            ECHO "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            ECHO "</form>";
            Echo "</div>";
            ECHO "</div>";
            ECHO "</div>";
            ECHO "</div>";

            Echo "</div>";


          mysqli_close($link);
          ?>
        </div>
    </div>
    


        


<! -- Footer -->
<div  class="bg-dark text-white-50 fixed-bottom" style="margin-top:15px"> 
	<footer  class="container py-2 d-none d-sm-block">
      <div class="row">
        <div class="col-12 col-md">
          <img src="../it2.png"/>
		      <small class="d-block mb-3 text-muted">&copy; 2020 Michael Murphy</small>
        </div>
        <div class="col-6 col-md">
          <h5>The Dev</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">About the Dev</a></li>
            <li><a class="text-muted" href="#">Contact the Dev</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>The Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Technologies Used</a></li>
            <li><a class="text-muted" href="#">Research</a></li>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
