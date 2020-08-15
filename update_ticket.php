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
$user = $_SESSION['username'];
$responder_role = $_SESSION['acc_type'];
$text =  mysqli_real_escape_string($link, $_REQUEST['Text']);
$date = date("d-m-y H:i:s");

// Attempt insert query execution
$sql = "INSERT INTO`ticket_response`(parent_ticket,User,responder_role,Text,Reply_Date)VALUES('$parent_id', '$user', '$responder_role' , '$text', '$date')";
if(mysqli_query($link, $sql)){
    echo "<script> alert('Response logged Successfully');window.location.href='../ticket.php/?id={$parent_id}';</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>

