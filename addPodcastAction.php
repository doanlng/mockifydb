<html>
<head>
	<title>Add a Podcast</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$aid = intval($_POST['aid']);
	$bookmark = mysqli_real_escape_string($mysqli, $_POST['bookmark']);
	$length = mysqli_real_escape_string($mysqli, $_POST['length']);
	$pid = mysqli_real_escape_string($mysqli, $_POST['pid']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);

	// Check for empty fields
	if (empty($aid) || empty($bookmark) || empty($length) || empty($pid) || empty($title)) {
		if (empty($aid)) { 
			echo "<font color='red'>AID field is empty.</font><br/>";
		}
		
		if (empty($bookmark)) {
			echo "<font color='red'>Bookmark field is empty.</font><br/>";
		}
		
		if (empty($length)) {
			echo "<font color='red'>Length field is empty.</font><br/>";
		}
		
		if (empty($pid)) {
			echo "<font color='red'>PID field is empty.</font><br/>";
		}

		if (empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO podcast (`AID`, `bookmark`, `length`, `PID`, `title`) VALUES ('$aid', '$bookmark', '$length', '$pid', '$title')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
