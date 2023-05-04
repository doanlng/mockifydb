<?php
    require_once("dbConnection.php");
    session_start();

    if(isset($_SESSION['aid'])){
        $aid = $_SESSION['aid'];

        $songs = mysqli_query($mysqli, "SELECT * FROM song WHERE AID = " . $aid);
        // $albums = mysqli_query($mysqli, "SELECT * FROM album WHERE AID = " . $aid);
        $pods = mysqli_query($mysqli, "SELECT * FROM podcast WHERE AID = " . $aid);
        $albums = mysqli_query($mysqli, "SELECT * FROM album WHERE AID = " . $aid);

        $song_cnt = mysqli_num_rows($songs);
        // $album_cnt = mysqli_num_rows($songs);
        $pod_cnt = mysqli_num_rows($pods);
        $album_cnt = mysqli_num_rows($albums);
        $req = mysqli_query($mysqli, "SELECT * FROM artist WHERE AID = " . $aid);
        $artist = mysqli_fetch_assoc($req);
    }
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src="artistPage.js"></script>
	  <link rel="stylesheet" href="artistPage.css">
</head>
<body>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">

    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <?php
                echo '<h3>'.$artist['Name'].' Artist Page</h3>';
            ?>
          </div>
          <div class="card-body">
            <?php
                echo "<p>Monthly Listeners: " . rand(1000, 20000000) . "</p>";
                echo "<p>Number of Songs Uploaded: ". $song_cnt ."</p>";
                echo "<p>Number of Albums Uploaded: ". $album_cnt ."</p>";
                echo "<p>Number of Podcasts Uploaded: ". $pod_cnt ."</p>";
            ?>
          </div>
        </div>
      </div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>About</h3>
          </div>
          <div class="card-body pt-0">
            <p>
                <?php
                    echo $artist['ABOUT'];
                ?>
            </p>
        </div>
        </div>
  </div>
    <div>
      <div class="col-lg-8">
          <div style="height: 26px"></div>

      </div>
    </div>
    <br>
        <div class="card body">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Your Media</h3>
          </div>
          <div class="card-body pt-0">
              <table>
                <tr>
                    <td>Track ID</td>
                    <td>Length</td>
                    <td>Genre</td>
                    <td>Release Date</td>
                    <td>Name</td>
                </tr>
              <?php

                while($song = mysqli_fetch_assoc($songs)){
                    echo '<tr>';
                    echo '<td>' . $song['TID'] . "</td>" . '<td>' . $song['LENGTH'] . "</td>" . '<td>' . $song['GENRE'] . "</td>" . '<td>' . $song['RELEASE_DATE'] . "</td><td>" .$song['Name'] . "</td>";
                    echo '<td><a href=artistDeleteSong.php?tid='. $song['TID'] . '>Delete</a></td>';
                    echo '</tr>';
                    }

              ?>
              </table>
              <button><a href="Upload/uploadSong.html">Upload Song</a></button>
          </div>
          <div class="card-body pt-0">
              <table>
                <tr>
                    <td>Album ID</td>
                    <td>Length</td>
                    <td>Name</td>
                    <td>Number of Songs</td>
                </tr>
              <?php

                while($album = mysqli_fetch_assoc($albums)){
                    $songs_in_album = (mysqli_query($mysqli, "SELECT * FROM song_album WHERE Alid = " . $album['AlID']));
                    $n_songs = mysqli_num_rows($songs_in_album);
                    echo '<tr>';
                    echo '<td>' . $album['AlID'] . "</td>" . '<td>' . $album['Length'] . '<td><a href=artistAddToAlbum.php?id='. $album['AlID'] .'>' . $album['Name'] . "</td>" . "<td>" . $n_songs . "</td>";
                    echo '<td><a href=adminAction/deleteAlbum.php?tid='. $album['AlID'] . '>Delete</a></td>';
                    echo '</tr>';
                    }

              ?>
              </table>
              <button><a href="Upload/uploadAlbum.html">Upload Album</a></button>
          </div>
          <div class="card-body pt-0">
              <table>
                <tr>
                    <td>Podcast ID</td>
                    <td>Length</td>
                    <td>Name</td>
                </tr>
              <?php

                while($pod = mysqli_fetch_assoc($pods)){
                    echo '<tr>';
                    echo '<td>' . $pod['PID'] . "</td>" . '<td>' . $pod['length'] . "</td>" . '<td>' . $pod['NAME'] . "</a></td>";
                    echo '<td><a href=artistDeletePodcast.php?tid='. $pod['PID'] . '>Delete</a></td>';
                    echo '</tr>';
                    }

              ?>
              </table>
              <button><a href="Upload/uploadPodcast.html">Upload Podcast</a></button>
          </div>
        </div>

      <div class="content-placeholder">

      </div>
    </div>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->

	</body>
</html>