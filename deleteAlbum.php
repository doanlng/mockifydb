<?php
// Include the database connection file
require_once("dbConnection.php");

// Get tid parameter value from URL
if(isset($_POST['ALID'])){
    $alid = mysqli_real_escape_string($mysqli, $_POST['ALID']);
    // Delete row from the database table
    $result = mysqli_query($mysqli, "DELETE FROM album WHERE ALID = $alid");
}