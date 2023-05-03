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
</div>
