<?php
// Include the database connection file
require_once("../dbConnection.php");

// Get id parameter value from URL
$aid = $_GET['aid'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM artist WHERE AID = $aid");
mysqli_query($mysqli, "DELETE FROM accounts WHERE UID = $aid AND account_type=1");
// Redirect to the main display page (index.php in our case)
header("Location:../adminLanding.php");
