<?php
// Initialize the session
session_start();
date_default_timezone_set('Europe/Dublin');
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "ticketsystem");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$submitter = $_SESSION['username'];
$Title =  mysqli_real_escape_string($link, $_REQUEST['Title']);
$issue_type = mysqli_real_escape_string($link, $_REQUEST['issue_type']);
$Description = mysqli_real_escape_string($link, $_REQUEST['Description']);
$Department = $_SESSION['Department'];
$Date_Logged = date("dd-mm-yy hh:mm:ss");
$Status = 'Open';
$SLA = 'Normal';
// Attempt insert query execution
$sql = "INSERT INTO `tickets`(submitter, Title,issue_type,Description,Department,Assigned_Agent,Status,SLA) VALUES('$submitter', '$Title', '$issue_type','$Description', '$Department', NULL , '$Status','$SLA')";
if(mysqli_query($link, $sql)){
    echo "<script> alert('Ticket logged Successfully');window.location.href='New_Ticket.php';</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>

