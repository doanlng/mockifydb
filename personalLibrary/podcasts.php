
<?php
    require_once("../dbConnection.php");
    $podcasts = mysqli_query($mysqli, "SELECT * FROM personal_library p JOIN podcast po ON p.content_id=po.pid WHERE p.content_type=2");
    while($podcast = mysqli_fetch_assoc($podcasts)){
        $artist = mysqli_query($mysqli, "SELECT Name FROM artist WHERE artist.AID=" . $podcast['AID']);
        echo '<div class="grid-item"><h2>'. $podcast['NAME'] .'</h2><p>'. mysqli_fetch_assoc($artist)['Name'] . '</p>';
        echo '</div>';
    }
?>
