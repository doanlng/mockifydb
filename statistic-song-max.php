<?php
// Include the database connection file
require_once("dbConnection.php"); 
$song_max = mysqli_query($mysqli, "SELECT * FROM song WHERE LENGTH = (SELECT MAX(LENGTH) FROM song)");
?>

<style>
table, th, td {
  border:1px solid white;
  padding-left: 0.5px;
}
table{
    position: absolute;
    top: 0;
}
</style>

<table style="width:80%">
    <tr>
        <td>Name</td>
        <td>Length</td>
        <td>Genre</td>

    </tr>
<?php

    while($song_max_data = mysqli_fetch_assoc($song_max)){
        echo '<tr>';
        echo '<td>' . $song_max_data['Name'] . "</td>" . '<td>' . $song_max_data['LENGTH'] . "</td>" . '<td>' . $song_max_data['GENRE'] . "</td>" . '<td>' . "</td>" . "<br>";
        echo '</tr>';
    }

?>