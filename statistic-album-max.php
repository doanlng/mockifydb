<?php
// Include the database connection file
require_once("dbConnection.php");
$album_max = mysqli_query($mysqli, "SELECT * FROM album WHERE LENGTH = (SELECT MAX(LENGTH) FROM album)");
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

    while($album_max_data = mysqli_fetch_assoc($album_max)){
        echo '<tr>';
        echo '<td>' . $album_max_data['Name'] . "</td>" . '<td>' . $album_max_data['Length'] . "</td>" . "<br>";
        echo '</tr>';
    }

?>