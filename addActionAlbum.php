<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$aid = mysqli_real_escape_string($mysqli, $_POST['AID']);
	$length = mysqli_real_escape_string($mysqli, $_POST['Length']);
//	$about = mysqli_real_escape_string($mysqli, $_POST['ABOUT']);
//	$date = mysqli_real_escape_string($mysqli, $_POST['NEXT_TOUR_DATE']);
//	$location = mysqli_real_escape_string($mysqli, $_POST['NEXT_TOUR_LOCATION']);
		
	// Check for empty fields
	if (empty($aid) || empty($length)) {
		if (empty($aid)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($length)) {
			echo "<font color='red'>Verified field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO album (`AID`, `Length`) VALUES ('$aid', '$length')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
