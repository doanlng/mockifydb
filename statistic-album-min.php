<?php
// Include the database connection file
require_once("dbConnection.php");
$album_min = mysqli_query($mysqli, "SELECT * FROM album WHERE LENGTH = (SELECT MIN(LENGTH) FROM album)");
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

    </tr>
<?php

    while($album_min_data = mysqli_fetch_assoc($album_min)){
        echo '<tr>';
        echo '<td>' . $album_min_data['Name'] . "</td>" . '<td>' . $album_min_data['Length'] . "</td>" . "<br>";
        echo '</tr>';
    }

?>