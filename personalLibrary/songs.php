<script>
    function addToPlaylist(s){
        const link = 'personalLibrary/popup.php?id=' + s; 
        window.open(link, "popup", "width=500,height=300");
    }

</script>
<?php
    require_once("../dbConnection.php");
    $songs = mysqli_query($mysqli, "SELECT * FROM personal_library p JOIN song s ON p.content_id=s.tid WHERE p.content_type=0");
    while($song = mysqli_fetch_assoc($songs)){
        $artist = mysqli_query($mysqli, "SELECT Name FROM artist WHERE artist.AID=" . $song['AID']);
        echo '<div class="grid-item"><h2>'. $song['Name'] .'</h2><p>'. mysqli_fetch_assoc($artist)['Name'] .'</p>';
        echo '<button style="color:black" class="add-to-playlist-btn" onclick=addToPlaylist('.$song['content_id'].')> Add to Playlist </button>';
        echo '</div>';
    }
?>
