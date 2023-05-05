<?php
    require_once("dbConnection.php");
    session_start();
    $id = $_SESSION['uid'];
    $account_info = mysqli_query($mysqli, "SELECT * FROM listener WHERE uid = '$id' LIMIT 1");
    $user_data = mysqli_fetch_assoc($account_info)
?>

<h1>Your Playlists</h1>
<div class="likedBox">
    <!-- <a href="liked.html" class="liked">
        <div class="likedTitle">Liked Songs</div>
        <div class="likedCount">30 Liked Songs</div>
    </a>
        -->
    <a data-bs-toggle="modal" data-bs-target="#playlistModal" class="container buttonContainer vertical">
        <img class="containerImg" src="Images/noSong.jpg" alt="">
        <div class="containerTitle">Create A New Playlist</div>
        <?php echo "<div class='containerArtists'>".$user_data['Name']."</div>" ?>
    </a>

    <?php 
        $user_playlists = mysqli_query($mysqli, "SELECT * FROM playlist WHERE OWNING_USER = '$id' ");
        while($row = mysqli_fetch_assoc($user_playlists)){
            echo '<span id="playlistView" onclick="loadPage(this)">
                  <a class="container buttonContainer vertical" id='.$row['PLAYLIST_ID'].'>
                    <img class="containerImg" src="Images/noSong.jpg" alt="">
                    <div class="containerTitle">'.$row['NAME'].'</div>
                    <div class="containerArtists">'.$user_data['Name'].'</div>
                  </a>
                  </span>';
        }
    ?>

</div>