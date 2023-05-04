<?php
// Include the database connection file
require_once("../dbConnection.php");

// Get id parameter value from URL
$playlist_id = $_GET['plid'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM playlist WHERE PLAYLIST_ID = $playlist_id");
$result2 = mysqli_query($mysqli, "DELETE FROM song_playlist WHERE playlist = $playlist_id");

// Redirect to the main display page (index.php in our case)
header("Location:../adminLanding.php");
