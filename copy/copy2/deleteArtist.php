<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$aid = $_GET['aid'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM artist WHERE AID = $aid");

// Redirect to the main display page (index.php in our case)
header("Location:index.php");
