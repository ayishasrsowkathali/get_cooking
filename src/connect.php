<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "recipe_app_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>