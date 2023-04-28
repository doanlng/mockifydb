<?php
$servername = 'localhost';
$user = 'root';
$pass = '';
$db = 'mockifydb';
$con =  mysqli_connect($servername, $user, $pass, $db) or die("cannot connect");

echo "connected";
?>