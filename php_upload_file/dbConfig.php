<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "danhbatlu";

// b1: ket noi voi database serer
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); // tuong duong: mysqli_connect

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
