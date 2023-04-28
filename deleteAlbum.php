<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$aiid = $_GET['aiid'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM album WHERE AIID = $aiid");

// Redirect to the main display page (index.php in our case)
header("Location:index.php");
