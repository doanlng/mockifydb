<html>
<head>
	<title>Add a Song</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$tid = mysqli_real_escape_string($mysqli, $_POST['TID']);
	$aid = mysqli_real_escape_string($mysqli, $_POST['AID']);
	$genre = mysqli_real_escape_string($mysqli, $_POST['GENRE']);
	$length = mysqli_real_escape_string($mysqli, $_POST['LENGTH']);
	$name = mysqli_real_escape_string($mysqli, $_POST['Name']);
	$releaseDate = mysqli_real_escape_string($mysqli, $_POST['RELEASE_DATE']);
	// Check for empty fields
	if (empty($tid) || empty($aid) || empty($genre) || empty($length) || empty($name) || empty($releaseDate)) {
		if (empty($tid)) { 
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($aid)) {
			echo "<font color='red'>Verified field is empty.</font><br/>";
		}
		
		if (empty($genre)) {
			echo "<font color='red'>About field is empty.</font><br/>";
		}
		
		if (empty($length)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if (empty($name)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
		if (empty($releaseDate)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}

		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO song (`TID`, `AID`, `GENRE`, `LENGTH`, `Name`, `RELEASE_DATE`) VALUES ('$verified', '$about', '$date', '$location', '$name')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
