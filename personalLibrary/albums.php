<?php
    require_once("../dbConnection.php");
    $albums = mysqli_query($mysqli, "SELECT * FROM personal_library p JOIN album a ON p.content_id=a.ALID WHERE p.content_type=1");
    while($album = mysqli_fetch_assoc($albums)){
        $artist = mysqli_query($mysqli, "SELECT Name FROM artist WHERE artist.AID=" . $album['AID']);
        echo '<div class="grid-item"><h2>'. $podcast['Name'] .'</h2><p>'. mysqli_fetch_assoc($artist)['Name'] .'</p></div>';
    }
?>
