    
<html>
    <head>
        <link rel="stylesheet" href="script.css">
    </head>
    <main>
        <body>
            <div class="grid-container">
                <div class="grid-item"></div>
                <?php

                require_once("dbConnection.php");
                $playlist = $_GET['playlist'];
                $p_name = mysqli_query($mysqli, "SELECT Name from playlist where PLAYLIST_ID=$playlist");
                echo '<div class="grid-item top">';
                    echo '<h1> ' . mysqli_fetch_assoc($p_name)['Name'] . ' </h1>' ;
                    echo '<h2> By User </h2>';
                echo '</div>';
                echo '<div class="grid-item"></div>';
                echo '<div class="grid-item"></div>';
                $songs_in_playlist = mysqli_query($mysqli, "SELECT s.* FROM song s INNER JOIN song_playlist p ON s.TID = p.song WHERE p.playlist = $playlist");
                echo '<div class = "grid-item song_list">';
                ?>
                <div class="tableHead">
                    <span class="songName">TITLE</span>
                    <span class="artist">Artist</span>
                    <span class="length">Length</span>
                </div>
                <?php
                    while($s = mysqli_fetch_assoc($songs_in_playlist)){
                        echo "<div class = 'song'> ";

                        $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $s['AID']);
                        $artist = mysqli_fetch_assoc($req);
                        echo '<span class = songName>' . $s['Name'] . '</span>'; 
                        echo '<span class = artist>' . $artist['Name'] . $s['AID'] . '</span>';
                        echo '<span class = length>' . $s['LENGTH'] .'<br>' . '</span>';
                        echo "</div> ";

                    }
                echo '</div>';


                ?>
                <div class="grid-item friendslist">
                    <div class = "friends">
                        <strong> Friend Activity  </strong><br>
                        <?php
                            $user = mysqli_query($mysqli, "SELECT OWNING_USER FROM playlist WHERE PLAYLIST_ID=$playlist");
                            $user = mysqli_fetch_assoc($user)['OWNING_USER'];
                            $friends = mysqli_query($mysqli, "SELECT l.* FROM listener l JOIN befriends b ON  l.UID = b.UID_2 WHERE b.UID_1 = $user");
                            //echo var_dump($friends);
                            while($friend = mysqli_fetch_assoc($friends)){
                                echo '<span class = friend>';
                                echo '<img src="img/friends.png", width="30", height="30">';
                                echo ' ' . $friend['Name'] . '<br>';
                                echo '</span>';
                            }
                        ?>
                    </div>
                    <div class = "following">
                        <strong> Following Activity  </strong><br>

                    </div>
                    
                </div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>
                <div class="grid-item"></div>

            </div>

        </body> 
    </main>
</html>
