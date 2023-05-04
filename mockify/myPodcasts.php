<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').on("click", function(e) {
            e.preventDefault();
            const pid = $(this).find('a:first').attr('id');
            $.ajax({
                type: "POST",
                url: 'deleteSong.php',
                data: {'PID': pid},
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
    $pods = mysqli_query($mysqli, "SELECT * FROM podcast WHERE AID = " . $_SESSION['uid']);
    $row_cnt = mysqli_num_rows($pods);
    echo "<h1>My Podcast</h1>";
    echo "<h4>Number of Podcasts: " . $row_cnt . "</h4>"
?>

<a id="uploadPodcast" onclick="loadPage(this)" class="playlist horizontal">
    <i class="fa-solid fa-podcast fa-3x"></i>
    <div class="bold">Upload Podcast</div>
</a>

<div class="mediaList">
    <div class="tableHead">
        <span class="mediaName">TITLE</span>
        <span class="hide"><i class="fa fa-solid fa-clock"></i></span>
        <span class="favourite">ADD</span>
    </div>
    <?php
        while($p = mysqli_fetch_assoc($pods)){
            $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $p['AID']);
            $artist = mysqli_fetch_assoc($req);

            echo "<div class = 'media'> ";

            
            echo '<span class="mediaName">'.$p['title'].'<br>'.$artist['Name'].'</span>'; 
            echo '<span class="hide">'.$p['length'].'</span>';   
            echo '<span class="favourite"><i class="fas fa-heart"></i></span>';
            echo '<span class="delete"><a id='.$p['PID'].'><i class="fa-solid fa-trash"></i></a></span>';

            echo "</div> ";
        }
    ?>
</div>
