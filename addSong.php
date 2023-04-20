<html>
<head>
	<title>Add Song</title>
</head>

<body>
	<h2>Add Song</h2>
	<p>
		<a href="index.php">Home</a>
	</p>

	<form action="addSongAction.php" method="post" name="addSong">
		<table width="25%" border="0">
            <tr>
                <td>Track ID</td>
				<td><input type="text" name="TID"></td>
            </tr>
			<tr> 
				<td>Artist</td>
				<td><input type="text" name="AID"></td>
			</tr>
			<tr> 
				<td>Genre</td>
				<td><input type="text" name="GENRE"></td>
			</tr>
			<tr> 
				<td>Length</td>
				<td><input type="text" name="LENGTH"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="Name"></td>
			</tr>
			<tr> 
				<td>Release Date
				<td><input type="datetime-local" name="RELEASE_DATE"></td>
			</tr>
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

