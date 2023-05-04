<?php
    require_once("dbConnection.php");
    if(isset($_SESSION)){;
        unset($_SESSION['uid']);
        session_unset();
        session_destroy();
    }
    header("Location: login.html");
    exit();

?>