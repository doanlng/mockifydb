<?php
require_once("dbConnection.php");
$result = mysqli_query($mysqli, "SELECT * FROM podcast ORDER BY AID DESC");
?>

<html>
<head>	
	<title>Podcasts</title>
</head>
<body>
    <h2>Podcasts</h2>
    <p>		
        <a href="addPodcast.php">Add New Data</a>
    </p>
    <p></p>
    <table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>PID</strong></td>
			<td><strong>AID</strong></td>
			<td><strong>Genre</strong></td>
			<td><strong>Length</strong></td>
			<td><strong>Name</strong></td>
			<td><strong>Release Date</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res3 = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res3['PID']."</td>";
			echo "<td>".$res3['AID']."</td>";
			echo "<td>".$res3['length']."</td>";	
			echo "<td>".$res3['bookmark']."</td>";	
			echo "<td>".$res3['title']."</td>";	
			echo "<td><a href=\"edit.php?id=$res3[AID]\">Edit</a> | 
			<a href=\"delete.php?aid=$res3[AID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
</body>
</html>