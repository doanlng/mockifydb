<?php
    require_once("dbConnection.php");
    session_start();

    if(isset($_GET['aid'])){
        $aid = $_GET['aid'];

        $songs = mysqli_query($mysqli, "SELECT * FROM song WHERE AID = " . $aid);
        // $albums = mysqli_query($mysqli, "SELECT * FROM album WHERE AID = " . $aid);
        $pods = mysqli_query($mysqli, "SELECT * FROM podcast WHERE AID = " . $aid);

        $song_cnt = mysqli_num_rows($songs);
        // $album_cnt = mysqli_num_rows($songs);
        $album_cnt = mysqli_num_rows($pods);

        $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $aid);
        $artist = mysqli_fetch_assoc($req);

        echo "<h1>".$artist['Name']."</h1>";
        echo "<h4>Monthly Listeners: " . rand(10000000, 20000000) . "</h4>";
        echo "<h4>About:</h4>";
        echo "<h6>".$artist['ABOUT']."</h6>";
    }
?>

<h4 class="mb-0">Songs:</h4>
<div class="mediaList">
    <div class="tableHead mt-0">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock"></i></span>
        <span class="favourite">ADD</span>
    </div>
    <?php
        while($s = mysqli_fetch_assoc($songs)){
            echo "<div class = 'media'> ";

            echo '<span class="mediaName">'.$s['Name'].'<br>'.$artist['Name'].'</span>'; 
            echo '<span class="hide">'.$s['LENGTH'].'</span>';   
            echo '<span class="favourite"><i class="fas fa-heart"></i></span>';

            echo "</div> ";
        }
    ?>
</div>

<h4 class="mb-0">Podcasts:</h4>
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
