<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "hello";
$dbName = "webapp_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>