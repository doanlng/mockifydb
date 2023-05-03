<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').on("click", function(e) {
            e.preventDefault();
            const tid = $(this).find('a:first').attr('id');
            console.log(tid);
            $.ajax({
                type: "POST",
                url: 'deleteSong.php',
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
    $songs = mysqli_query($mysqli, "SELECT * FROM song WHERE AID = " . $_SESSION['uid']);
    $row_cnt = mysqli_num_rows($songs);
    echo "<h1>My Songs</h1>";
    echo "<h4>Number of Songs: " . $row_cnt . "</h4>"
?>

<a id="uploadSong" onclick="loadPage(this)" class="playlist horizontal">
    <i class="fa-solid fa-compact-disc fa-3x"></i>
    <i class="fa-solid fa-plus fa-large"></i>
    <div class="bold">Upload Song</div>
</a>

<div class="mediaList">
    <div class="tableHead">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock"></i></span>
        <span class="favourite">ADD</span>
        <span class="favourite">DELETE</span>
    </div>
    <?php
        while($s = mysqli_fetch_assoc($songs)){
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