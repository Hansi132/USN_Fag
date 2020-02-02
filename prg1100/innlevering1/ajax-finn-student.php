<?php

include("dbconnection.php");


$brukernavn = $_GET["brukernavn"];

$sql = "SELECT * FROM STUDENT WHERE brukernavn = '$brukernavn';";

$result = mysqli_query($conn, $sql) or die("Cant fetch data");

$rows = mysqli_num_rows($result);

if ($rows != 0) {
    $row = mysqli_fetch_array($result);
    $fornavn = $row["fornavn"];
    $etternavn = $row["etternavn"];
    $klassekode = $row["klassekode"];
    $bildenr = $row["bildenr"];

    print ("$fornavn|$etternavn|$klassekode|$bildenr");

}

mysqli_close($conn);
