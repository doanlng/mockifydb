<?php
    require_once("dbConnection.php");
    session_start();
    if(!isset($_SESSION)){
        echo 'Session is not set';
    }
    $id=$_SESSION['uid'];
    $user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM listener WHERE uid='$id'"));
    echo "<h1 >Hey! Glad You're Back!</h1> ";
?>
<div class="playlists">
    <a id="myAlbums" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-music fa-3x"></i>
        <div class="bold">My Albums</div>
    </a>
    <a id="mySongs" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-compact-disc fa-3x"></i>
        <div class="bold">My Songs</div>
    </a>
    <a id="myPodcasts" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-podcast fa-3x"></i>
        <div class="bold">My Podcasts</div>
    </a>

    <a id="uploadAlbum" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-music fa-3x"></i>
        <i class="fa-solid fa-plus fa-large"></i>
        <div class="bold">Upload Album</div>
    </a>
    <a id="uploadSong" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-compact-disc fa-3x"></i>
        <i class="fa-solid fa-plus fa-large"></i>
        <div class="bold">Upload Song</div>
    </a>
    <a id="uploadPodcast" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-podcast fa-3x"></i>
        <i class="fa-solid fa-plus fa-large"></i>
        <div class="bold">Upload Podcast</div>
    </a>

</div>

<h1>Made For You</h1>
<div class="containerBox">
    <a href="https://open.spotify.com/playlist/37i9dQZF1E36VNz7Jklaso" class="container buttonContainer vertical">
        <img class="containerImg" src="Images/mix1.jpg" alt="">
        <div class="containerTitle">Daily Mix 1</div>
        <div class="containerArtists">Taylor Swift, Adele, Doja Cat and more</div>
    </a>
    <a href="https://open.spotify.com/playlist/37i9dQZF1E361YB82MirGc" class="container buttonContainer vertical">
        <img class="containerImg" src="Images/mix2.jpg" alt="">
        <div class="containerTitle">Daily Mix 2</div>
        <div class="containerArtists">AP Dhillon, Prem Dhillon, Korala Maan and more</div>
    </a>
    <a href="https://open.spotify.com/playlist/37i9dQZF1E35yHxtW8o0p7" class="container buttonContainer vertical">
        <img class="containerImg" src="Images/mix3.jpg" alt="">
        <div class="containerTitle">Daily Mix 3</div>
        <div class="containerArtists">Pritam, Kritiman Mishra, A.R. Rahman and more</div>
    </a>
    <a href="https://open.spotify.com/playlist/37i9dQZF1E35i8bGL86Ilh" class="last container buttonContainer vertical">
        <img class="containerImg" src="Images/mix4.jpg" alt="">
        <div class="containerTitle">Daily Mix 4</div>
        <div class="containerArtists">Badshah, The PropheC, Vishal Mishra and more</div>
    </a>
</div>

<div id="content-placeholder" class="content-placeholder">
    <div id="friendslist" class="list">
        <div class="container">
            <div class="floating-stack">
                <div class="friends">
                    <p>Friends</p>
                    <?php
                    $friends = mysqli_query($mysqli, "SELECT l.* FROM listener l JOIN befriends b ON  l.UID = b.UID_2 WHERE b.UID_1 = $id");
                    while($f = mysqli_fetch_assoc($friends)){
                        echo "<div class=f>" . $f['Name'] . "</div>";
                    }
                ?>
                </div>
                <div class="Following">
                    <p>Following</p>
                    <?php
                    $following = mysqli_query($mysqli, "SELECT a.* FROM artist a JOIN follows f ON  a.AID = f.AID WHERE f.UID = $id");
                    while($f = mysqli_fetch_assoc($following)){
                        echo "<div class=f>" . $f['Name'] . "</div>";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <button class="sticky-button" id=list_button>Friends & Following</button>
    <script>
        var li = document.getElementById("friendslist");
        document.getElementById("list_button").addEventListener("click", function () {
            if (li.style.display === "none") {
                li.style.display = "block";
            } else {
                li.style.display = "none";
            }
        });
    </script>
</div>