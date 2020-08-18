<?php
// Initialize the session
session_start();
//Authethication Function ( If User is NOT logged in , Go to login.php)
require_once "Auth.php";
//Config file
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

    <title>SoloDesk</title>
	  <link rel="shortcut icon" type="image/x-icon" href="it.png" />
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
  </head>

  <body >
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#"><img src="it3.png"></img></a>
      <h3 class="text-light pr-2 pt-1" style="font-family:Bookman;">SoloDesk</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">Home<span class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tickets.php">Tickets</a>
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
          <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Logout</button>
        </form>
      </div>
    </nav>
	
	
  <div  class="wrapper" style="text-align: center;display: block;align-items: center;margin-top: 10%">
    <h1>Welcome</h1>
    <br>

      <div  class="mx-auto" style="width: 500px;">
        <p> Welcome to SoloDesk IT , The easy to use ticketing platform.</br></br>
        SoloDesk IT was created as a simple solution to small IT teams ticketing problems. </br>
        Please feel free to look around and suggest any changes</p> 
      </div>
  </div>


<! -- Footer -->
<div  class="bg-dark text-white-50 fixed-bottom"> 
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>
