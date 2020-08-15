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
$agent_id = $_SESSION['username'];
$ticket_id = intval($_GET['id']);
// Attempt insert query execution
$sql = "UPDATE tickets SET Assigned_Agent='$agent_id' WHERE ticket_id=$ticket_id";
if(mysqli_query($link, $sql)){
    echo "<script> alert('Ownership Assigned for ticket $ticket_id');window.location.href='../tickets.php';</script>";   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>

