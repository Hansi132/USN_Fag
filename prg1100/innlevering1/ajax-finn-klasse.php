<?php

include("dbconnection.php");

error_reporting (E_ALL ^ E_NOTICE);
$klassekode = $_GET["klassekode"];

$sql = "SELECT * FROM KLASSE WHERE klassekode = '$klassekode';";

$result = mysqli_query($conn, $sql) or die("Cant fetch data");

$rows = mysqli_num_rows($result);

if ($rows != 0) {
    $row = mysqli_fetch_array($result);
    $klassenavn = $row["klassenavn"];
    $studiekode = $row["studiumkode"];
    print ("$klassenavn|$studiekode");

}

mysqli_close($conn);
