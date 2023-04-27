<html>
<head>
	<title>Add Podcast</title>
</head>

<body>
	<h2>Add Song</h2>
	<p>
		<a href="index.php">Home</a>
	</p>

	<form action="addPodcastAction.php" method="post" name="addPodcast">
		<table width="25%" border="0">
            <tr>
                <td>AID</td>
				<td><input type="number" name="aid" required></td>
            </tr>
			<tr> 
				<td>bookmark</td>
				<td><input type="number" name="bookmark"></td>
			</tr>
			<tr> 
				<td>length</td>
				<td><input type="number" name="length"></td>
			</tr>
            <tr>
                <td>PID</td>
				<td><input type="number" name="pid"></td>
            </tr>
            <tr> 
				<td>title</td>
				<td><input type="text" name="title"></td>
			</tr>
			</tr>
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

