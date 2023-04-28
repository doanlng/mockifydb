
<html>
    <head>
        <link rel="stylesheet" href="script.css">
    </head>
    <main>
        <body>
        <?php
        require_once("dbConnection.php");
        $playlist = $_GET['playlist'];
        $p_name = mysqli_query($mysqli, "SELECT Name from playlist where PLAYLIST_ID=$playlist");
        echo '<h1> ' . mysqli_fetch_assoc($p_name)['Name'] . ' </h1>' ;
        $songs_in_playlist = mysqli_query($mysqli, "SELECT s.* FROM song s INNER JOIN song_playlist p ON s.TID = p.song WHERE p.playlist = $playlist");
        while($s = mysqli_fetch_assoc($songs_in_playlist)){
            echo "<div class = 'song'> ";

            $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $s['AID']);
            $artist = mysqli_fetch_assoc($req);
            echo $s['Name'] . '<br>'; 
            echo $artist['Name'] . $s['AID'] .'<br>';
            
            echo "</div> ";

        }
    ?>
        </body> 
    </main>
</html>
