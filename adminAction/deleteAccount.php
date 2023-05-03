<?php
// Include the database connection file
require_once("../dbConnection.php");

// Get id parameter value from URL
$uid = $_GET['id'];
$type = $_GET['type'];
// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM accounts WHERE uid = $uid AND account_type = $type");
if($type == 1){// delete from artist table
    mysqli_query($mysqli, "DELETE FROM artist WHERE aid = $uid");
}
elseif($type == 0){
    mysqli_query($mysqli, "DELETE FROM listener WHERE uid = $uid");
}
// Redirect to the main display page (index.php in our case)
header("Location:../adminLanding.php");
?>