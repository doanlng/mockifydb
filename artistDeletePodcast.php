<?php
// Include the database connection file
require_once("dbConnection.php");

// Get tid parameter value from URL
$tid = $_GET['tid'];
$result = mysqli_query($mysqli, "DELETE FROM podcast WHERE pid = $tid");
header("Location: artistPage.php");

?>