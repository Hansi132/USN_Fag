<?php

$servername = "139.59.156.121";
$username = "233569";
$password = "233569";
$dbname = "233569";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


