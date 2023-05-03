<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("../dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	// Check for empty fields
	if (empty($email) || empty($password)) {
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}

	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
        $e_password=encrypt($password);
		$result = mysqli_query($mysqli, "INSERT INTO accounts (`uid`, `username`, `password`, `email`, `account_type`) VALUES (00, '$username','$e_password','$email',  2)");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='../adminLanding.php'>View Result</a>";
	}
}

    function encrypt($str) {
        $result = '';
        for ($i = 0; $i < strlen($str); $i++) {
            $char = strtolower($str[$i]);
            if (ctype_alpha($char)) {
                $num = ord($char) - 96;
                if(ctype_upper($str[$i])){
                    $num = ord($char) + 3;
                }
                $result .= $num;
            }
            else{
                $result .= $char;
            }
        }

        return $result;
    }
?>
</body>
</html>
