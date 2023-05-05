<style>
.container {
    background-color: black;
    height: 100%;
    width: 100%;
    margin: 0 auto;
    text-align: center;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    padding-top: 5px;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: white;

}

label {
    font-size: 18px;
    margin-bottom: 10px;
    color: white;
}

select {
    padding: 10px;
    font-size: 16px;
    margin-bottom: 20px;
    width: 60%;
    box-sizing: border-box;
    background-color: black;
    color: white;

}

button[type="submit"] {
    background-color: #1c5f0154;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #006B9F;
}

option{
    color: white;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitSongToPlaylist').submit(function(e) {
            console.log('click')
            const playlist = document.getElementById('playlist-selection');
            const id = playlist.options[playlist.selectedIndex].value;

            const url = new URLSearchParams(window.location.search);
            const tid = url.get('id')
            const d = {
                'playlist_id':id,
                'tid':tid
            }
            console.log(d);
            $.ajax({
                type: "POST",
                url: 'addSongToPlaylist.php',
                data: d,
                success: function(response)
                {
                    console.log(response);
                    header('Location:index.php')
                },
                error: function(response) {
                    console.log(response)
                    alert('There was some error performing the AJAX call!');
                }
            });
        });
    });
</script>
<div class="container">
  <h2>Add Song to Playlist</h2>
    <form id="submitSongToPlaylist" method="post">
        <label for="playlist">Select Playlist:</label>
        <select id="playlist-selection" name="selectedPlaylist">
            <?php 
                require_once('../dbConnection.php');
                session_start();
                $uid=$_SESSION['uid'];
                $playlists = mysqli_query($mysqli, "SELECT * FROM playlist WHERE OWNING_USER=$uid");
                while($playlist=mysqli_fetch_assoc($playlists)){
                    echo '<option value=' . $playlist['PLAYLIST_ID'] . '>'. $playlist['NAME'] . '</option>';
                }
            ?>
        </select>
        <button type=submit onclick=submit()>Add Song</button>
    </form>
</div>

