<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id parameter value from URL
$playlist_id = $_GET['PLAYLIST_ID'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM playlist WHERE PLAYLIST_ID = $lpaylist_id");

// Redirect to the main display page (index.php in our case)
header("Location:index.php");
