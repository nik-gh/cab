<?php

$server = "localhost";
$username = "root";
$password = "root";
$db = "db_cab";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>