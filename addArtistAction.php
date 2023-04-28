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
	$name = mysqli_real_escape_string($mysqli, $_POST['Name']);
	$verified = mysqli_real_escape_string($mysqli, $_POST['VERIFIED']);
	$about = mysqli_real_escape_string($mysqli, $_POST['ABOUT']);
	$date = mysqli_real_escape_string($mysqli, $_POST['NEXT_TOUR_DATE']);
	$location = mysqli_real_escape_string($mysqli, $_POST['NEXT_TOUR_LOCATION']);
		
	// Check for empty fields
	if (empty($name) || empty($verified) || empty($about) || empty($date) || empty($location)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($verified)) {
			echo "<font color='red'>Verified field is empty.</font><br/>";
		}
		
		if (empty($about)) {
			echo "<font color='red'>About field is empty.</font><br/>";
		}
		
		if (empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if (empty($location)) {
			echo "<font color='red'>Location field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO artist (`VERIFIED`, `ABOUT`, `NEXT_TOUR_DATE`, `NEXT_TOUR_LOCATION`, `Name`) VALUES ('$verified', '$about', '$date', '$location', '$name')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
