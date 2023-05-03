<?php
    require_once("../dbConnection.php");
    $artists = mysqli_query($mysqli, "SELECT * FROM artist");
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
        <td>Artist ID</td>
        <td>Name</td>
        <td>Verified</td>
        <td>About</td>
        <td>Next Tour Date</td>
        <td>Next Tour Location</td>
    </tr>
<?php

    while($artist_data = mysqli_fetch_assoc($artists)){
        echo '<tr>';
        echo '<td>' . $artist_data['AID'] . "</td>" . '<td>' . $artist_data['Name'] . "</td>" . '<td>' . $artist_data['VERIFIED'] . "</td>" . '<td>' . $artist_data['ABOUT'] . "</td>" . '<td>' . $artist_data['NEXT_TOUR_DATE'] . "</td>" . '<td>' . $artist_data['NEXT_TOUR_LOCATION'] . "</td>" . "<br>";
        echo '</tr>';
    }

?>
</table>