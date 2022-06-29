<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = 'mid_employee';

$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
