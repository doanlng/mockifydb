<?php
    require_once("../dbConnection.php");
    $songs = mysqli_query($mysqli, "SELECT * FROM song");
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
        <td>Track ID</td>
        <td>Length</td>
        <td>Genre</td>
        <td>Artist ID</td>
        <td>Release Date</td>
        <td>Name</td>
    </tr>
<?php

    while($song = mysqli_fetch_assoc($songs)){
        echo '<tr>';
        echo '<td>' . $song['TID'] . "</td>" . '<td>' . $song['LENGTH'] . "</td>" . '<td>' . $song['GENRE'] . "</td>" . '<td>' . $song['AID'] . "</td>" . '<td>' . $song['RELEASE_DATE'] . "</td><td>" .$song['Name'] . "</td>";
        echo '<td><a href=adminAction/deleteSong.php?tid='. $song['TID'] . '>Delete</a></td>';
        echo '</tr>';
        }

?>
</table>