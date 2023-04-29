<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').on("click", function(e) {
            e.preventDefault();
            const alid = $(this).find('a:first').attr('id');
            console.log(tid);
            $.ajax({
                type: "POST",
                url: 'deleteAlbum.php',
                data: {'ALID': alid},
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
    $albums = mysqli_query($mysqli, "SELECT * FROM album WHERE AID = " . $_SESSION['uid']);
    $row_cnt = mysqli_num_rows($albums);
    echo "<h1>My Albums</h1>";
    echo "<h4>Number of Albums: " . $row_cnt . "</h4>"
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
        <span class="favourite">DELETE</span>
    </div>
    <?php
        while($sa= mysqli_fetch_assoc($albums)){
            $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $s['AID']);
            $artist = mysqli_fetch_assoc($req);

            echo "<div class = 'media'> ";

            echo '<span id="artistPage" onclick="loadPage(this)" class="mediaName">'.$a['Name']."<br><a  id=".$a['AID'].'>'.$artist['Name'].'</a></span>'; 
            echo '<span class="hide">'.$a['LENGTH'].'</span>';
            echo '<span class="favourite"><i class="fas fa-heart"></i></span>';
            echo '<span class="delete"><a id='.$a['TID'].'><i class="fa-solid fa-trash"></i></a></span>';
            
            echo "</div> ";
        }
    ?>
</div>