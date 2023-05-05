<?php
    require_once('../dbConnection.php');
    echo "Connected";
    if(isset($_POST)){
        $tid = $_POST['tid'];
        $playlist_id = $_POST['playlist_id'];
        $result = mysqli_query($mysqli, "INSERT INTO song_playlist (playlist, song) VALUES (". $playlist_id .", ". $tid .")");
    }else{
        echo "Something went wrong";
    }
?>