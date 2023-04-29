<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').on("click", function(e) {
            e.preventDefault();
            const tid = $(this).find('a:first').attr('id');
            console.log(tid);
            $.ajax({
                type: "POST",
                url: 'deletePlayList.php',
                data: {'TID': tid},
                success: function(response)
                {
                    console.log(response);
                    location.href = "index.php";
                },
                error: function() {
                    alert('There was some error performing the AJAX call!');
                }
            });
        });
    });
</script>
<?php
    require_once("dbConnection.php");
    session_start();
    $playlist = $_GET['playlist'];
    $p_name = mysqli_query($mysqli, "SELECT Name from playlist where PLAYLIST_ID=$playlist");
    $songs_in_playlist = mysqli_query($mysqli, "SELECT s.* FROM song s INNER JOIN song_playlist p ON s.TID = p.song WHERE p.playlist = $playlist");
    $row_cnt = mysqli_num_rows($songs_in_playlist);
    $id = $_SESSION['uid'];

?>
<body>
    <div class="navBar">

        <div>
            <div class="part"><a id="logo" class="logo" href="index.php">Mockify</a></div>
            <div class="part"></div>
            <div class="part">
                <?php 
                    $user_playlists = mysqli_query($mysqli, "SELECT * FROM playlist WHERE OWNING_USER = '$id' ");
                    while($row = mysqli_fetch_assoc($user_playlists)){
                        echo '<a class="playlistName" href=playlistView.php?playlist='.$row['PLAYLIST_ID'].'> ' . $row['NAME'] . '</a>';
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="player">

        <div class="horizontal">
            <img class="playerImg" src="Images/null.png" alt="Error">

            <div class="vertical">
                <div id="name1" class="underline bold">No Track Playing</div>
                <div>
                    <marquee id="name2" class="underline"> Pick Your Song</marquee>
                </div>
            </div>

            <div title="Save To Your Library" class="favourite"><i class="fas fa-heart"></i></div>

            <div title="YouTube" class="favourite"><i class="fas fa-play"></i></div>
        </div>


        <div class="controlProgress">
            <div class="vertical">
                <div class="controls horizontal">
                    <i title="Shuffle" style="font-size: 1.2rem;" class="fas fa-sort" id="shuffle"></i>
                    <i title="Previous" style="font-size: 1.2rem;" class="fas fa-solid fa-backward" id="prev"></i>
                    <i class="fa-3x fas fa-solid fa-play-circle" id="playPause"></i>
                    <i title="Next" style="font-size: 1.2rem;" class="fas fa-solid fa-forward" id="next"></i>
                    <i title="Repeat" id="loop" style="font-size: 1.2rem;" class="fas fa-recycle"></i>
                </div>

                <div class="progressBar horizontal">
                    <div id="start">00:00</div>
                    <input type="range" class="progress" min="0" value="0" max="100">
                    <div id="end">00:00</div>
                </div>
            </div>
        </div>

        <div class="features horizontal">

            <div title="Lyrics" class="lyrics"><a id="lyricsLink" href="#"><i class="fas fa-music"></i></a>
            </div>

            <div title="Queue" class="queue"><a id="lyricsLink" href="#"><i class="fas fa-list"></i></a>
            </div>

            <div class="volume horizontal">
                <img class="mute hidden" src="https://img.icons8.com/ios/50/ffffff/no-audio--v1.png" />
                <img class="mute hidden" src="https://img.icons8.com/ios/50/ffffff/low-volume.png" />
                <img class="mute" src="https://img.icons8.com/ios/50/ffffff/high-volume--v1.png" />
                <input id="volumeBar" type="range" class="vol" min="0" value="100" max="100">
            </div>
            <a href=logout.php style="color:grey"> Logout </a>

        </div>
    </div>

</body>

<link rel="stylesheet" href="playlist.css">

<main>
<?php
    echo "<h1> " . mysqli_fetch_assoc($p_name)['Name'] . "</h1>";
    echo "<h4>Number of Songs: " . $row_cnt . "</h4>"
?>
<a id="uploadSong" onclick="loadPage(this)" class="playlist horizontal">
    <i class="fa-solid fa-compact-disc fa-3x"></i>
    <i class="fa-solid fa-plus fa-large"></i>
</a>
<div class="mediaList">
    <div class="tableHead">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock">LENGTH</i></span>
        <span class="favourite">ADD</span>
        <span class="favourite">DELETE</span>
    </div>
    <?php
        while($s = mysqli_fetch_assoc($songs_in_playlist)){
            $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $s['AID']);
            $artist = mysqli_fetch_assoc($req);

            echo "<div class = 'media'> ";

            
            echo '<span id="artistPage" onclick="loadPage(this)" class="mediaName">'.$s['Name']."<br><a  id=".$s['AID'].'>'.$artist['Name'].'</a></span>'; 
            echo '<span class="hide">'.$s['LENGTH'].'</span>';   
            echo '<span class="favourite"><i class="fas fa-heart"></i></span>';
            echo '<span class="delete"><a id='.$s['TID'].'><i class="fa-solid fa-trash"></i></a></span>';
            
            echo "</div> ";
        }
    ?>
</main>
</div>
