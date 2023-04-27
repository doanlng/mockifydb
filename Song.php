<?php
require_once("dbConnection.php");
$result = mysqli_query($mysqli, "SELECT * FROM song ORDER BY AID DESC");
?>

<html>
<head>	
	<title>Songs</title>
</head>
<body>
    <h2>Songs</h2>
    <p>		
        <a href="addSong.php">Add New Data</a>
    </p>
    <p></p>
    <table width='80%' border=0>
        <tr bgcolor='#DDDDDD'>
            <td><strong>TID</strong></td>
            <td><strong>AID</strong></td>
            <td><strong>Genre</strong></td>
            <td><strong>Length</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Release Date</strong></td>
        </tr>
        <?php
        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$res['TID']."</td>";
            echo "<td>".$res['AID']."</td>";
            echo "<td>".$res['GENRE']."</td>";	
            echo "<td>".$res['LENGTH']."</td>";	
            echo "<td>".$res['Name']."</td>";	
            echo "<td>".$res['RELEASE_DATE']."</td>";	
            echo "<td><a href=\"edit.php?id=$res[AID]\">Edit</a> | 
            <a href=\"delete.php?aid=$res[AID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
	</table>
</body>
</html>