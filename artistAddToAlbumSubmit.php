<?php
require_once("dbConnection.php");

$album = $_GET['id'];
$sql = "INSERT INTO song_album (alid, tid) VALUES ";

foreach (json_decode($_POST['data'], true) as $selected_row) {
    $song = mysqli_real_escape_string($mysqli, $selected_row['tid']);

    $sql .= "('$album', '$song'),";
}

$sql = rtrim($sql, ',');
echo $sql;
if (mysqli_query($mysqli, $sql)) {
    echo "Selected rows were inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>";
}

?>
