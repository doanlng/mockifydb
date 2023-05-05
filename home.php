<?php
    require_once("dbConnection.php");
    session_start();
    if(!isset($_SESSION)){
        echo 'Session is not set';
    }
    $id=$_SESSION['uid'];
    $user = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM artist WHERE aid='$id'"));
    echo "<h1 >Hey! Glad You're Back!</h1> ";
?>
<div class="playlists">
    </a>
    <a id="personalLibrary" onclick="loadPage(this)" class="playlist horizontal">
        <i class="fa-solid fa-music fa-3x"></i>
        <i class="fa-solid fa-plus fa-large"></i>
        <div class="bold">View your library</div>
    </a>
</div>

<h1>Made For You</h1>
<div class="containerBox">
    <a id="card1" onclick="loadPage(this)" class="container buttonContainer vertical">
        <img class="containerImg" src="Images/thisisdualipa.jpg" alt="">
        <div class="containerTitle">Discover: Dua Lipa</div>
        <div class="containerArtists">Essentials for Dua Lipa</div>
    </a>
    <a id="card3" onclick="loadPage(this)" class="container buttonContainer vertical">
        <img class="containerImg" src="Images/thisismichelle.jpg" alt="">
        <div class="containerTitle">Discover: Michelle</div>
        <div class="containerArtists">Essentials for Michelle</div>
    </a>
    <a id="card2" onclick="loadPage(this)"  class="container buttonContainer vertical">
        <img class="containerImg" src="Images/thisisdenzelcurry.jpg" alt="">
        <div class="containerTitle">Discover: Denzel Curry</div>
        <div class="containerArtists">Essentials for Denzel Curry</div>
    </a>
    <a id="card4" onclick="loadPage(this)"  class="last container buttonContainer vertical">
        <img class="containerImg" src="Images/thisispushat.jpg" alt="">
        <div class="containerTitle">Discover: Pusha T</div>
        <div class="containerArtists">Essentials for Pusha T</div>
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