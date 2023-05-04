<html>
    <head>
        <style>
            table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            }

            th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
            }

            th {
            background-color: #f2f2f2;
            }

            tr:hover {
            background-color: #f5f5f5;
            }

            #submit_songs {
                position: fixed;
                bottom: 20px;
                right: 20px;
                padding: 10px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                box-shadow: 0px 2px 2px #888888;
		    }
        </style>
    </head>
    <body>
        <table id="song_table">
        <tr>
            <td>Track ID</td>
            <td>Length</td>
            <td>Genre</td>
            <td>Release Date</td>
            <td>Name</td>
        </tr>
        <?php
            require_once("dbConnection.php");
            session_start();
            $aid = $_SESSION['aid'];
            $alid = $_GET['id'];

            $songs = mysqli_query($mysqli, "SELECT * FROM song s join song_album a on a.tid=s.tid WHERE s.AID = " . $aid . " AND a.alid <> " . $alid);
            while($song = mysqli_fetch_assoc($songs)){
                echo '<tr>';
                echo '<td>' . $song['TID'] . "</td>" . '<td>' . $song['LENGTH'] . "</td>" . '<td>' . $song['GENRE'] . "</td>" . '<td>' . $song['RELEASE_DATE'] . "</td><td>" .$song['Name'] . "</td>";
                echo  '<td><input type="checkbox" name="row1" value="1"></td>';
                echo '</tr>';
            }
        ?>
        </table>
        	<button id="submit_songs">Add To Album</button>

    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Function to handle the "Submit" button click event
        $("#submit_songs").click(function () {
            // Get the checked checkboxes
            var checkboxes = $("#song_table input[type='checkbox']:checked");

            // Build an array of objects containing the data associated with each checked checkbox
            var data = [];
            checkboxes.each(function () {
                var row = $(this).closest("tr");
                var obj = {
                    "tid": row.find("td:eq(0)").text(),
                    "primary_key": $(this).val(),
                };
                data.push(obj);
            });
            var pid = <?php echo $pid; ?>;
            var url = "artistAddToAlbumSubmit.php?id="+pid;
            // Send an AJAX request to the server to insert the data into the SQL table
            $.ajax({
                url: url,
                method: "POST",
                data: { data: JSON.stringify(data) },
                success: function (response) {
                    console.log(response);
                    //location.href = "artistPage.php";

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('There was some error performing the AJAX call!');
                },
            });
        });
    });
</script>