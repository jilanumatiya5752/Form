<?php

$servername ="localhost:3306";
$username = "root";
$password = "Root#123";
$dbname = "jilan";

$db = mysqli_connect($servername, $username, $password,$dbname);
if (!$db) {
    die("Unable to Connect database: " . mysqli_connect_error());
}

?>