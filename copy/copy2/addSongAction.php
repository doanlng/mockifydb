<?php
// Include the database connection file
require_once("C:/xampp/htdocs/mockifydb/dbConnection.php");

if (isset($_POST['name']) && isset($_POST['genre']) && isset($_POST['length'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$genre = mysqli_real_escape_string($mysqli, $_POST['genre']);
	$length = mysqli_real_escape_string($mysqli, $_POST['length']);
	$aid = 1;
		
	// We could check for empty fields. However, none should be empty because 
	// the input elements should have the 'required' tag

	// Insert data into database
	$result = mysqli_query($mysqli, "INSERT INTO song (`LENGTH`, `GENRE`, `AID`, `RELEASE_DATE`, `Name`) VALUES ('$length', '$genre', '$aid', 'now()', '$name')");
	if ($result == TRUE) {
		echo json_encode(array('success' => 1));
	} else {
		echo "here";
		echo json_encode(array('success' => 0));
	}
	
} else { // If we return the below issue then it appears some inputs were empty
	echo json_encode(array('success' => 0));
}