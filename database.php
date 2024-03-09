<?php
$hostName = "sql112.infinityfree.com";
$dbUser = "if0_36117864";
$dbPassword = "Putanginamo30";
$dbName = "if0_36117864_website";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>