<?php
    require_once("dbConnection.php");
    session_start();
    $id = $_SESSION['uid'];
    $account_info = mysqli_query($mysqli, "SELECT * FROM listener WHERE uid = '$id' LIMIT 1");
    $user_data = mysqli_fetch_assoc($account_info)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mockify</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <!-- Change favicon? -->

    <script src="https://kit.fontawesome.com/0947cb02c6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="script.css">
</head>

<body>
    <div class="navBar">

        <div>
            <div class="part"><a id="logo" class="logo" onclick="loadPage(this)">Mockify</a></div>
            <div class="part"></div>
            <div class="part">
                <div class="button">
                    <img src="https://img.icons8.com/material-rounded/22/ffffff/home.png" /><a id="home" onclick="loadPage(this)">Home</a>
                </div>
                <div class="button">
                    <img src="https://img.icons8.com/ios-glyphs/22/ffffff/search--v1.png" /><a target="_blank"
                        id="search" onclick="loadPage(this)">Search</a>
                </div>
                <div class="button">
                    <img
                        src="https://img.icons8.com/external-royyan-wijaya-detailed-outline-royyan-wijaya/22/ffffff/external-playlist-music-royyan-wijaya-detailed-outline-royyan-wijaya.png" /><a
                        id="library" onclick="loadPage(this)">Your Library</a>
                </div> <br>
                <div class="button bold"><img class="bgPlus"
                        src="https://img.icons8.com/external-tanah-basah-detailed-outline-tanah-basah/20/000000/external-plus-user-interface-tanah-basah-detailed-outline-tanah-basah-2.png" /><a
                        data-bs-toggle="modal" data-bs-target="#playlistModal">Create Playlist</a>
                </div>
                <div class="button bottomLine bold">
                    <img class="bgHeart" src="https://img.icons8.com/ios-glyphs/16/ffffff/like--v1.png" /><a
                        id="liked" onclick="loadPage(this)">Liked Songs</a>
                </div>
            </div>
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

        </div>
    </div>

    <main>
        <a id="home" onclick="loadPage(this)" class="arrow"> <i class="fa-solid fa-arrow-left-long fa-5x"></i> </a>

        <!--Content-->
        <div id="content-placeholder" class="content-placeholder">

        </div>

    </main>
</body>
  
  <!--Content-->
  <div id="playlist-modal" class="content-placeholder">

  </div>

<script>
    $(function(){
      $("#content-placeholder").load("home.html");
      $(".arrow").hide();
      $("#playlist-modal").load("createPlaylist.html");
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</html>