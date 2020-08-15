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
$parent_id = intval($_GET['id']);
$status_value = $_POST['Status_tag'];

// Attempt insert query execution
$sql = "UPDATE tickets SET Status='$status_value' WHERE ticket_id=$parent_id";
if(mysqli_query($link, $sql)){
   echo "<script> alert('Response logged Successfully = $status_value');window.location.href='../ticket.php/?id={$parent_id}';</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>

