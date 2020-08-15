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
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>SoloDesk - Create Ticket</title>
	  <link rel="shortcut icon" type="image/x-icon" href="it.png"/>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
  </head>

  <body style="margin-bottom: 125px;">
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
            Echo "<a class='nav-link' href='*.php'>Control Panel</a>";
            Echo "</li>";
           }
           ?>
        </ul>
        <form class="form-inline mt-2 mt-md-0" action="logout.php">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
        </form>
      </div>
    </nav>
    <?php
?>
    <div  class="wrapper" style="display: block;align-items: center;margin-top: 5%">
    <form  action="Create_Ticket.php" method="post">        
    <div class="form-group px-5" >
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="Title" style="text-aligh:left;">Title</label>                
            <small id="TitleHelp" class="form-text text-muted">Enter a breif title for yout ticket.</small>
            <input type="text"  name="Title" id="Title" class="form-control col-xs-2" placeholder="Issue Title">
          </div>
      <div class="col-md-4">
        <label for="issue_type">Category</label>
        <small id="TitleHelp" class="form-text text-muted mt-1">Choose an issue Category</small>
          <select class="form-control" id="issue_type" name="issue_type">
            <option>Hardware</option>
            <option>Software</option>
            <option>Account</option>
            <option>Servers</option>
            <option>VPN</option>
          </select>
      </div>
          </div><span class="help-block">
                  <label for="Description" style="text-align: center;">Description</label>
                  <small id="Help" class="form-text text-muted">Enter the details of your ticket in full.</small>
                  <textarea class="form-control" rows="15" id="Description" name="Description" placeholder="Issue Description"></textarea>
                  </div>
                  <div class="form-group" style="text-align: center;">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a class="btn btn-link" href="welcome.php">Cancel</a>
                  </div>
                  
              </form>
              
    </div>


<! -- Footer -->

<div  class="bg-dark text-white-50 fixed-bottom " style="margin-top:10px"> 
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
