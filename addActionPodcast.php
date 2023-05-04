<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['length'])) {
	session_start();
	// Escape special characters in string for use in SQL statement
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$length = mysqli_real_escape_string($mysqli, $_POST['length']);
	$time = date('H:i:s', strtotime("{$length} minutes"));
	$aid = $_SESSION['aid'];
	// We could check for empty fields. However, none should be empty because 
	// the input elements should have the 'required' tag

	// Insert data into database
	$result = mysqli_query($mysqli, "INSERT INTO podcast (`length`, `AID`, `NAME`) VALUES ('$length', '$aid', '$name')");
	if ($result == TRUE) {
		echo json_encode(array('success' => 1));
	} else {
		echo "here";
		echo json_encode(array('success' => 0));
	}
	
} else { // If we return the below issue then it appears some inputs were empty
	echo json_encode(array('success' => 0));
}