<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM artist ORDER BY AID DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<a href="add.php">Add New Data</a>
		<a href="addSong.php">Add Song Data</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>AID</strong></td>
			<td><strong>Verified</strong></td>
			<td><strong>about</strong></td>
			<td><strong>Next Tour Date</strong></td>
			<td><strong>Next Tour Location</strong></td>
			<td><strong>Name</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['AID']."</td>";
			echo "<td>".$res['VERIFIED']."</td>";
			echo "<td>".$res['ABOUT']."</td>";	
			echo "<td>".$res['NEXT_TOUR_DATE']."</td>";	
			echo "<td>".$res['NEXT_TOUR_LOCATION']."</td>";	
			echo "<td>".$res['Name']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[AID]\">Edit</a> | 
			<a href=\"delete.php?aid=$res[AID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
</body>
</html>
