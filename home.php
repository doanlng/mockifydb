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

<?php
    require_once("dbConnection.php");
    $podcasts = mysqli_query($mysqli, "SELECT * FROM podcast ORDER BY PID DESC LIMIT 4");

    $podcast1 = mysqli_fetch_assoc($podcasts);
    $pid1 = $podcast1['PID'];
    $artist1 = $podcast1['AID'];
    $a1 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist1");
    $a1_name = mysqli_fetch_assoc($a1)['Name'];

    $podcast2 = mysqli_fetch_assoc($podcasts);
    $pid2 = $podcast2['PID'];
    $artist2 = $podcast2['AID'];
    $a2 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist2");
    $a2_name = mysqli_fetch_assoc($a2)['Name'];

    $podcast3 = mysqli_fetch_assoc($podcasts);
    $pid3 = $podcast3['PID'];
    $artist3 = $podcast3['AID'];
    $a3 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist3");
    $a3_name = mysqli_fetch_assoc($a3)['Name'];

    $podcast4 = mysqli_fetch_assoc($podcasts);
    $pid4 = $podcast4['PID'];
    $artist4 = $podcast4['AID'];
    $a4 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist4");
    $a4_name = mysqli_fetch_assoc($a4)['Name'];

?>
<h1>Discover New Podcasts</h1>
<div class="containerBox">
    <a id="card1"  class="container buttonContainer vertical" href="likePodcast.php?id=<?php echo $pid1; ?>">
        <img class="containerImg" src="Images/podcast1" alt="">
        <div class="containerTitle"><?php echo $podcast1['NAME'] ?></div>
        <div class="containerArtists"><?php echo $a1_name?></div>
    </a>
    <a id="card1"  class="container buttonContainer vertical" href="likePodcast.php?id=<?php echo $pid2; ?>">
        <img class="containerImg" src="Images/podcast2" alt="">
        <div class="containerTitle"><?php echo $podcast2['NAME'] ?></div>
        <div class="containerArtists"><?php echo $a2_name ?></div>
    </a>
    <a id="card1"  class="container buttonContainer vertical" href="likePodcast.php?id=<?php echo $pid3; ?>">
        <img class="containerImg" src="Images/podcast3" alt="">
        <div class="containerTitle"><?php echo $podcast3['NAME'] ?></div>
        <div class="containerArtists"><?php echo $a3_name ?></div>
    </a>
    <a id="card1"  class="container buttonContainer vertical" href="likePodcast.php?id=<?php echo $pid4; ?>">
        <img class="containerImg" src="Images/podcast4" alt="">
        <div class="containerTitle"><?php echo $podcast4['NAME'] ?></div>
        <div class="containerArtists"><?php echo $a4_name ?></div>
    </a>
</div>

<?php
    $albums = mysqli_query($mysqli, "SELECT * FROM album ORDER BY ALID DESC LIMIT 4");

    $album1 = mysqli_fetch_assoc($albums);
    $artist1 = $album1['AID'];
    $a1 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist1");
    $a1_name = mysqli_fetch_assoc($a1)['Name'];
    $alid1 = $album1['AlID'];

    $album2 = mysqli_fetch_assoc($albums);
    $artist2 = $album2['AID'];
    $a2 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist2");
    $a2_name = mysqli_fetch_assoc($a2)['Name'];
    $alid2 = $album2['AlID'];

    $album3 = mysqli_fetch_assoc($albums);
    $artist3 = $album3['AID'];
    $a3 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist3");
    $a3_name = mysqli_fetch_assoc($a3)['Name'];
    $alid3 = $album3['AlID'];

    $album4 = mysqli_fetch_assoc($albums);
    $artist4 = $album4['AID'];
    $a4 = mysqli_query($mysqli, "SELECT Name FROM artist WHERE AID=$artist4");
    $a4_name = mysqli_fetch_assoc($a4)['Name'];
    $alid4 = $album4['AlID'];

?>
<h1>Discover New Albums</h1>
<div class="containerBox">
    <a id="card1"  class="container buttonContainer vertical" href="likeAlbum.php?id=<?php echo $alid1; ?>">
        <div class="containerTitle"><?php echo $album1['Name'] ?></div>
        <div class="containerArtists"><?php echo $a1_name?><br></div>
    </a>
    <a id="card1"  class="container buttonContainer vertical" href="likeAlbum.php?id=<?php echo $alid2; ?>">
        <div class="containerTitle"><?php echo $album2['Name'] ?></div>
        <div class="containerArtists"><?php echo $a2_name?></div>
    </a>
    <a id="card1"  class="container buttonContainer vertical" href="likeAlbum.php?id=<?php echo $alid3; ?>">
        <div class="containerTitle"><?php echo $album3['Name'] ?></div>
        <div class="containerArtists"><?php echo $a3_name?></div>
    </a>
    <a id="card1"  class="container buttonContainer vertical" href="likeAlbum.php?id=<?php echo $alid4; ?>">
        <div class="containerTitle"><?php echo $album4['Name'] ?></div>
        <div class="containerArtists"><?php echo $a4_name?></div>
    </a>
</div>
<!--
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
-->