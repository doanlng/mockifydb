<?php
    require_once('dbConnection.php');
    session_start();
    $tid = $_GET['id'];
    $uid = $_SESSION['uid'];
    echo($uid);
    mysqli_query($mysqli, ("INSERT INTO personal_library (ownuser, content_id, content_type) values ($uid,$tid,2)"));
    header("Location: index.php");
?>