<?php 
if((isset($_SESSION['acc_type']) && $_SESSION['acc_type'] == "admin")){
    header("location:ControlPanel.php");
    
}
?>