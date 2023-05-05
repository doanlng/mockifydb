<?php
// Include the database connection file
require_once("dbConnection.php");
$song_min = mysqli_query($mysqli, "SELECT * FROM song WHERE LENGTH = (SELECT MIN(LENGTH) FROM song)");
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
        <td>Date</td>

    </tr>
<?php

    while($song_min_data = mysqli_fetch_assoc($song_min)){
        echo '<tr>';
        echo '<td>' . $song_min_data['Name'] . "</td>" . '<td>' . $song_min_data['LENGTH'] . "</td>" . '<td>' . $song_min_data['GENRE'] . "</td>" . '<td>' . $song_min_data['RELEASE_DATE'] . "</td>" . "<br>";
        echo '</tr>';
    }

?>
