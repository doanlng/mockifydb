<html>
    <?php
        require_once("dbConnection.php");
        session_start();
        //echo var_dump($_SESSION);
        if(!isset($_SESSION['uid'])){
            echo "Did not work";
        }
        $id = $_SESSION['uid'];
        $account_info = mysqli_query($mysqli, "SELECT * FROM listener WHERE uid = '$id' LIMIT 1");
        $user_data = mysqli_fetch_assoc($account_info)
    ?>
    <head>
        <?php echo $user_data['Name']?>'s Landing Page
    </head>
    <body>
        <h2>Your playlists</h2>
        <?php 
            $user_playlists = mysqli_query($mysqli, "SELECT * FROM playlist WHERE OWNING_USER = '$id' ");
            while($row = mysqli_fetch_assoc($user_playlists)){
                #echo var_dump($row);
                echo '<a href=playlistView.php?playlist='.$row['PLAYLIST_ID'].'> ' . $row['NAME'] . '</a><br>';
                //gives us the playlist and the id at song_playlist[playlist]
                $songs_in_playlist = mysqli_query($mysqli, "SELECT s.* FROM song s INNER JOIN song_playlist p ON s.TID = p.song WHERE p.playlist = {$row['PLAYLIST_ID']}");
                //echo var_dump($songs_in_playlist);
                while ($s = mysqli_fetch_assoc($songs_in_playlist)){
                    echo 'Track Name: ' . $s['Name'] . '<br>';
                }
                echo '<br>';
            }
        ?>
    </body>
</html> 