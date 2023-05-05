<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['NAME'])) {
	session_start();
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['NAME']);
	$owning_user = $_SESSION['uid'];
		
	// We could check for empty fields. However, none should be empty because 
	// the input elements should have the 'required' tag

	// Insert data into database
	$result = mysqli_query($mysqli, "INSERT INTO playlist (`NAME`, `OWNING_USER`) VALUES ('$name', '$owning_user')");
	if ($result == TRUE) {
		echo json_encode(array('success' => 1));
	} else {
		echo json_encode(array('success' => 0));
	}
	
} else { // If we return the below issue then it appears some inputs were empty
	echo json_encode(array('success' => 0));
}