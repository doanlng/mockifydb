<?php
    require_once('dbConnection.php');
    session_start();
    $tid = $_GET['song'];
    $uid = $_SESSION['uid'];
    echo($uid);
    mysqli_query($mysqli, ("INSERT INTO personal_library (ownuser, content_id, content_type) values ($uid,$tid,0)"));
    header("Location: index.php");
?>