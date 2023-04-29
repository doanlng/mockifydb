<!-- <?php
    // require_once("dbConnection.php");
    // session_start();
    // $songs = mysqli_query($mysqli, "SELECT * FROM song WHERE AID = " . $_SESSION['uid']);
    // $row_cnt = mysqli_num_rows($songs);
    // echo "<h1>My Albums</h1>";
    // echo "<h4>Number of Albums: " . $row_cnt . "</h4>"
?>

<a id="uploadAlbum" onclick="loadPage(this)" class="playlist horizontal">
    <i class="fa-solid fa-compact-disc fa-3x"></i>
    <i class="fa-solid fa-plus fa-large"></i>
    <div class="bold">Upload Album</div>
</a>

<div class="mediaList">
    <div class="tableHead">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock"></i></span>
        <span class="favourite">ADD</span>
    </div>
    <?php
        // while($s = mysqli_fetch_assoc($songs)){
        //     $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $s['AID']);
        //     $artist = mysqli_fetch_assoc($req);

        //     echo "<div class = 'media'> ";

            
        //     echo '<span id="1" class="mediaName">'.$s['Name'].'<br>'.$artist['Name'].'</span>'; 
        //     echo '<span class="hide">'.$s['LENGTH'].'</span>';   
        //     echo '<span class="favourite"><i class="fas fa-heart"></i></span>';

        //     echo "</div> ";
        // }
    ?>
</div> -->
