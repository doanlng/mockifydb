<?php
// Include the database connection file
require_once("dbConnection.php");
$song_min = mysqli_query($mysqli, "SELECT * FROM song WHERE LENGTH = (SELECT MIN(LENGTH) FROM song ");
$song_max = mysqli_query($mysqli, "SELECT * FROM song WHERE LENGTH = (SELECT MAX(LENGTH) FROM song ");
$genre_count = mysqli_query($mysqli, "SELECT COUNT(TID), GENRE FROM song GROUP BY GENRE");
$album_min = mysqli_query($mysqli, "SELECT * FROM album WHERE LENGTH = (SELECT MIN(LENGTH) FROM album ");
$album_max = mysqli_query($mysqli, "SELECT * FROM album WHERE LENGTH = (SELECT MAX(LENGTH) FROM album ");
$listener_min = mysqli_query($mysqli, "SELECT * FROM listener WHERE Time_stamp = (SELECT MIN(Time_stamp) FROM listener ");
$listener_max = mysqli_query($mysqli, "SELECT * FROM listener WHERE Time_stamp = (SELECT MAX(Time_stamp) FROM listener ");


