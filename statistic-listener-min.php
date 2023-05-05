<?php
// Include the database connection file
require_once("dbConnection.php");
$listener_min = mysqli_query($mysqli, "SELECT * FROM listener WHERE Time_stamp = (SELECT MIN(Time_stamp) FROM listener)");
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
        <td>Time Stamp</td>


    </tr>
<?php

    while($listener_min_data = mysqli_fetch_assoc($listener_min)){
        echo '<tr>';
        echo '<td>' . $listener_min_data['Name'] . "</td>" . '<td>' . $listener_min_data['Time_stamp'] . "<br>";
        echo '</tr>';
    }

?>