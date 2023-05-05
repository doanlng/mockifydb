<?php
// Include the database connection file
require_once("dbConnection.php"); 
$genre_count = mysqli_query($mysqli, "SELECT COUNT(TID), GENRE FROM song GROUP BY GENRE");
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
        <td>Count</td>
        <td>Genre</td>

    </tr>
<?php

    while($genre_count_data = mysqli_fetch_assoc($genre_count)){
        echo '<tr>';
        echo '<td>' . $genre_count_data['COUNT(TID)'] . "</td>" . '<td>' . $genre_count_data['GENRE'] . "</td>" . "<br>";
        echo '</tr>';
    }

?>