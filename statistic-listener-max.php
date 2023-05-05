<?php
// Include the database connection file
require_once("dbConnection.php");
$listener_max = mysqli_query($mysqli, "SELECT * FROM listener WHERE Time_stamp = (SELECT MAX(Time_stamp) FROM listener)");
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

    while($listener_max_data = mysqli_fetch_assoc($listener_max)){
        echo '<tr>';
        echo '<td>' . $listener_max_data['Name'] . "</td>" . '<td>' . $listener_max_data['Time_stamp'] . "<br>";
        echo '</tr>';
    }

?>