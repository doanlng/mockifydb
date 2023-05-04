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

            #bottom-button {
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
        <table>
        <?php
            require_once("dbConnection.php");
            session_start();
            $aid = $_SESSION['aid'];
            $songs = mysqli_query($mysqli, "SELECT * FROM song WHERE AID = " . $aid);
            while($song = mysqli_fetch_assoc($songs)){
                echo '<tr>';
                echo '<td>' . $song['TID'] . "</td>" . '<td>' . $song['LENGTH'] . "</td>" . '<td>' . $song['GENRE'] . "</td>" . '<td>' . $song['RELEASE_DATE'] . "</td><td>" .$song['Name'] . "</td>";
                echo  '<td><input type="checkbox" name="row1" value="1"></td>';
                echo '</tr>';
            }
        ?>
        </table>
        	<button id="bottom-button">Add To Album</button>

    </body>
</html>
