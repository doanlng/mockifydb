<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entdy first)
$result = mysqli_query($mysqli, "SELECT * FROM artist ORDER BY AID DESC");
$result3 = mysqli_query($mysqli, "SELECT * FROM podcast ORDER BY PID ASC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<tr>
			<td><a href="Artist.php">Artists</a></td>
			<td><a href="Song.php">Songs</a></td>
			<td><a href="Podcasts.php">Podcasts</a></td>
		</tr>
	</p>
	<!-- Courtesy of https://www.w3schools.com/howto/howto_css_login_form.asp -->
	<h2>
		<form method="POST" action="login.php">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit">Login</button>
		</form>
	</h2>
</body>
</html>
