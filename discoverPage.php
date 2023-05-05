
<?php
    require_once("dbConnection.php");
    session_start();
    $playlist = $_GET['playlist'];
    $p_name = mysqli_query($mysqli, "SELECT Name from playlist where PLAYLIST_ID=$playlist");
    $songs_in_playlist = mysqli_query($mysqli, "SELECT s.* FROM song s INNER JOIN song_playlist p ON s.TID = p.song WHERE p.playlist = $playlist");
    $row_cnt = mysqli_num_rows($songs_in_playlist);
    $uid=$_SESSION['uid'];
?>

<?php
    echo "<h1> " . mysqli_fetch_assoc($p_name)['Name'] . "</h1>";
    echo "<h4>Number of Songs: " . $row_cnt . "</h4>"
?>

<div class="mediaList">
    <div class="tableHead">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock">LENGTH</i></span>
        <span class="favourite">ADD</span>
    </div>
    <?php
        while($s = mysqli_fetch_assoc($songs_in_playlist)){
            $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $s['AID']);
            $artist = mysqli_fetch_assoc($req);

            echo "<div class = 'media'> ";

            
            echo '<span id="artistPage" onclick="loadPage(this)" class="mediaName">'.$s['Name']."<br><a  id=".$s['AID'].'>'.$artist['Name'].'</a></span>'; 
            echo '<span class="hide">'.$s['LENGTH'].'</span>';   
            echo '<a href=likeSong.php?song='.$s['TID'].'><span class="favourite"><i class="fas fa-heart"></i></span></a>';
            echo "</div> ";
        }
    ?>
</div>
