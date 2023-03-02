<?php
session_start(); 
session_destroy(); 
header("Location: http://localhost/jilanumatiya/form/index.php");
die();
?>