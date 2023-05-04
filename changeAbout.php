<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        #edit-about {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 500px;
            text-align: center;
        }
        input {
            width: 100%;
            height: 30%;
            font-size: 18px;
            border: none;
            border-bottom: 2px solid grey;
            margin-bottom: 20px;
        }
        button{
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
    <?php
        $aid=$_GET['id'];
    ?>
<body>
    <div id="edit-about">
        <form method="post" action="changeAboutAction.php">
            <input type="hidden" name="aid" value="<?php echo $aid?>">
            <input type="text" name="text" placeholder="Enter text here...">
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>
