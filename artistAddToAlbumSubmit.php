<?php
require_once("dbConnection.php");

$album = $_GET['id'];
$sql = "INSERT INTO song_album (alid, tid) VALUES ";

// Loop through each selected row
foreach (json_decode($_POST['data'], true) as $selected_row) {
    // Get the data from the selected row
    $song = mysqli_real_escape_string($mysqli, $selected_row['tid']);

    // Add the row data to the SQL statement
    $sql .= "('$album', '$song'),";
}

// Remove the trailing comma
$sql = rtrim($sql, ',');
echo $sql;
// Step 6: execute the INSERT statement
if (mysqli_query($mysqli, $sql)) {
    echo "Selected rows were inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>";
}

// Step 7: close the database connection
mysqli_close($conn);
?>
