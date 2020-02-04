<?php

    include("dbconnection.php");


    $bildenr = $_GET["bildenr"];

    $sql = "SELECT * FROM BILDE WHERE bildenr = '$bildenr';";

    $result = mysqli_query($conn, $sql) or die("Cant fetch data");

    $rows = mysqli_num_rows($result);

    if ($rows != 0) {
        $row = mysqli_fetch_array($result);
        $filnavn = $row["filnavn"];
        $beskrivelse = $row["beskrivelse"];
        $dato = $row["opplastingsdato"];
            print ("$filnavn|$beskrivelse|$dato");

    }

    mysqli_close($conn);
