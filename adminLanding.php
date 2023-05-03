<?php
    require_once("dbConnection.php");
    session_start();
    $id = $_SESSION['uid'];
    $account_info = mysqli_query($mysqli, "SELECT * FROM listener WHERE uid = '$id' LIMIT 1");
    $user_data = mysqli_fetch_assoc($account_info)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mockify</title>
    <link rel="shortcut icon" href="Images/favicon.png" type="image/x-icon">
    <!-- Change favicon? -->

    <script src="https://kit.fontawesome.com/0947cb02c6.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="script.css">
</head>

<body>
    <div class="navBar">

        <div>
            <div class="part"><a id="logo" class="logo" onclick="loadPage(this)">Mockify</a></div>
            <div class="part"></div>
            <div class="part">
                <div class="button bold" id="adminLoadArtist" onclick="loadPage(this)">
                    <a>Artists</a>
                </div>
                <div class="button bold" id="adminLoadSong" onclick="loadPage(this)">
                    <a>Songs</a>
                </div>
                <div class="button bold" id="adminLoadAccount" onclick="loadPage(this)">
                    <a>User Accounts</a>
                </div>
                <div class="button bold" id="adminLoadPlaylist" onclick="loadPage(this)">
                    <a>Playlists</a>
                </div>
                <script src="adminload.js"></script>

                <div class="button bold">
                    <a href=logout.php> Logout </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <main>
        <div id="content-body" class="content-placeholder">

        </div>
    </main>
</body>


</html>