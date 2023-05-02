<?php
    require_once("dbConnection.php");
    session_start();

    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];

        $playlist = mysqli_query($mysqli, "SELECT * FROM playlist WHERE OWNING_USER = " . $uid);
        $playlist_cnt = mysqli_num_rows($songs);

        $req = mysqli_query($mysqli, "SELECT * FROM listener WHERE UID = " . $uid);
        $listener = mysqli_fetch_assoc($req);

        echo "<h1>".$listener['Name']."</h1>";
    }
?>

<h4 class="mb-0">Playlists:</h4>
<div class="mediaList">
    <div class="tableHead mt-0">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock"></i></span>
        <span class="favourite">ADD</span>
    </div>
    <?php
        while($p = mysqli_fetch_assoc($pods)){
            echo "<div class = 'media'> ";
            
            echo '<span class="mediaName">'.$p['title'].'<br>'.$artist['Name'].'</span>'; 
            echo '<span class="hide">'.$p['length'].'</span>';   
            echo '<span class="favourite"><i class="fas fa-heart"></i></span>';

            echo "</div> ";
        }
    ?>
</div>
