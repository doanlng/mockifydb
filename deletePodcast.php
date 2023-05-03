<?php
// Include the database connection file
require_once("dbConnection.php");

// Get tid parameter value from URL
if(isset($_POST['PID'])){
    $pid = mysqli_real_escape_string($mysqli, $_POST['PID']);
    // Delete row from the database table
    $result = mysqli_query($mysqli, "DELETE FROM playlist WHERE PID = $pid");
}
