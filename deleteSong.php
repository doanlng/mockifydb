<?php
// Include the database connection file
require_once("dbConnection.php");

// Get tid parameter value from URL
if(isset($_POST['TID'])){
    $tid = mysqli_real_escape_string($mysqli, $_POST['TID']);
    // Delete row from the database table
    $result = mysqli_query($mysqli, "DELETE FROM song WHERE TID = $tid");
}
