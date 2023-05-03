<?php
    require_once("../dbConnection.php");
    $playlists = mysqli_query($mysqli, "SELECT * FROM playlist");
?>
<style>
table, th, td {
  border:1px solid white;
  padding-left: 0.5px;
}
table{
    top: 0;
    position:absolute;
}
</style>
<table style="width:80%">
    <tr>
        <td>Playlist ID</td>
        <td>Name</td>
        <td>Owning User ID</td>
        <td><a href>Delete</a></td>
    </tr>
<?php

    while($playlist = mysqli_fetch_assoc($playlists)){
        echo '<tr>';
        echo '<td>' . $playlist['PLAYLIST_ID'] . "</td>" . '<td>' . $playlist['NAME'] . "</td>" . '<td>' . $playlist['OWNING_USER'] . "</td><br>";
        echo '</tr>';
    }

?>
</table>