<?php
session_start();

$target_dir = "upload/";
$servername ="localhost:3306";
$username = "root";
$password = "Root#123";
$dbname = "jilan";

$db = mysqli_connect($servername, $username, $password,$dbname);

?>