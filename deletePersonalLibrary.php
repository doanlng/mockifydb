<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$ownuser = $_GET['OWNUSER'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM personal_library WHERE OWNUSER = $ownuser");

// Redirect to the main display page (index.php in our case)
header("Location:index.php");
