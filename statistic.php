<?php
// Include the database connection file
require_once("dbConnection.php");
$song_min = mysqli_query($mysqli, "SELECT * FROM song WHERE LENGTH = (SELECT MIN(LENGTH) FROM song)");
$song_max = mysqli_query($mysqli, "SELECT * FROM song WHERE LENGTH = (SELECT MAX(LENGTH) FROM song)");
$genre_count = mysqli_query($mysqli, "SELECT COUNT(TID), GENRE FROM song GROUP BY GENRE");
$album_min = mysqli_query($mysqli, "SELECT * FROM album WHERE LENGTH = (SELECT MIN(LENGTH) FROM album)");
$album_max = mysqli_query($mysqli, "SELECT * FROM album WHERE LENGTH = (SELECT MAX(LENGTH) FROM album)");
$listener_min = mysqli_query($mysqli, "SELECT * FROM listener WHERE Time_stamp = (SELECT MIN(Time_stamp) FROM listener)");
$listener_max = mysqli_query($mysqli, "SELECT * FROM listener WHERE Time_stamp = (SELECT MAX(Time_stamp) FROM listener)");

?>

<h4 class="mb-0">Statistics:</h4>
<div class="mediaList">
    <h2 class="green"> Song Minimum Length</h1>
    <div class="tableHead mt-0">
        <span class="Name">Name</span>
        <span class="LENGTH">Length</span>
        <span class="GENRE">Genre</span>
        <span class="RELEASE_DATE">Date</span>
    </div>
    <?php
        while($sm = mysqli_fetch_assoc($song_min)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['Name'].'</span>'; 
            echo '<span class="length">'.$sm['LENGTH'].'</span>';
            echo '<span class="Genre">'.$sm['GENRE'].'</span>';
            echo '<span class="Release">'.$sm['RELEASE_DATE'].'</span>';

            echo "</div> ";
            
        }
    ?>

    <h2 class="green"> Song Maximum Length</h1>
    <div class="tableHead mt-0">
        <span class="Name">Name</span>
        <span class="LENGTH">Length</span>
        <span class="GENRE">Genre</span>
        <span class="RELEASE_DATE">Date</span>
    </div>
    <?php
        while($sm = mysqli_fetch_assoc($song_max)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['Name'].'</span>'; 
            echo '<span class="length">'.$sm['LENGTH'].'</span>';
            echo '<span class="Genre">'.$sm['GENRE'].'</span>';
            echo '<span class="Release">'.$sm['RELEASE_DATE'].'</span>';

            echo "</div> ";
            
        }
    ?>

    <h2 class="green">Genre Counts</h1>
    <div class="tableHead mt-0">
        <span class="GENRE">Genre</span>
        <span class="COUNT">Count</span>
    </div>

    <?php
        while($sm = mysqli_fetch_assoc($genre_count)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['GENRE'].'</span>'; 
            echo '<span class="length">'.$sm['COUNT(TID)'].'</span>';
        }
    ?>

    <h2 class="green">Album Minimum Length</h1>
    <div class="tableHead mt-0">
        <span class="Name">Name</span>
        <span class="LENGTH">Length</span>
    </div>
    <?php
        while($sm = mysqli_fetch_assoc($album_min)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['Name'].'</span>'; 
            echo '<span class="length">'.$sm['Length'].'</span>';

            echo "</div> ";
            
        }
    ?>

    <h2 class="green"> Album Maximum Length</h1>
    <div class="tableHead mt-0">
        <span class="Name">Name</span>
        <span class="LENGTH">Length</span>
    </div>
    <?php
        while($sm = mysqli_fetch_assoc($album_max)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['Name'].'</span>'; 
            echo '<span class="length">'.$sm['Length'].'</span>';

            echo "</div> ";
            
        }
    ?>

    <h2 class="green"> Listener Stop Time Minimum</h1>
    <div class="tableHead mt-0">
        <span class="Name">Name</span>
        <span class="Time_Stamp">Time Stamp</span>
    </div>
    <?php
        while($sm = mysqli_fetch_assoc($listener_min)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['Name'].'</span>'; 
            echo '<span class="length">'.$sm['Time_Stamp'].'</span>';

            echo "</div> ";
            
        }
    ?>


    <h2 class="green"> Listener Stop Time Maximum</h1>
    <div class="tableHead mt-0">
        <span class="Name">Name</span>
        <span class="Time_Stamp">Time Stamp</span>
    </div>
    <?php
        while($sm = mysqli_fetch_assoc($listener_max)){
            echo "<div class = 'media'> ";
            
            echo '<span class="Name">'.$sm['Name'].'</span>'; 
            echo '<span class="length">'.$sm['Time_Stamp'].'</span>';

            echo "</div> ";
            
        }
    ?>






</div>


