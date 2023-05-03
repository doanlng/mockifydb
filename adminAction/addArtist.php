<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<h2>Add Data</h2>
	<p>
		<a href="../adminLanding.php">Home</a>
	</p>

	<form action="addArtistAction.php" method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="Name"></td>
			</tr>
			<tr> 
				<td>Verified</td>
				<td><input type="checkbox" name="VERIFIED"></td>
			</tr>
			<tr> 
				<td>About</td>
				<td><input type="text" name="ABOUT"></td>
			</tr>
			<tr> 
				<td>Next Tour Date</td>
				<td><input type="datetime-local" name="NEXT_TOUR_DATE"></td>
			</tr>
			<tr> 
				<td>Next Tour Location</td>
				<td><input type="text" name="NEXT_TOUR_LOCATION"></td>
			</tr>
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

