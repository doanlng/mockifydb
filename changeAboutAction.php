<?php
    if (isset($_POST['text']) && isset($_POST['aid'])){
        require_once("dbConnection.php");
        $aid = $_POST['aid'];
        $text = $_POST['text'];
        echo $text;
        $success = mysqli_query($mysqli, "UPDATE artist SET ABOUT='" . $text ."' WHERE aid=".$aid);
        echo $success;
        header("Location: artistPage.php");
    }
    else{
        echo 'Something went wrong';
    }
?>