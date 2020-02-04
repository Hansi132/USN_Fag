<?php


function dynamicBoxFagkode() {

    include ("dbconnection.php");



    $sql = "SELECT * FROM KLASSE";

    if (!empty($conn)) {
        $result = mysqli_query($conn, $sql) or die ("Not possible to fetch from db");
    }

    $rows = mysqli_num_rows($result);

    for($i = 1; $i <= $rows; $i++){
        $row = mysqli_fetch_assoc($result);
        $kode = $row["klassekode"];
        print("<option value='$kode'>$kode</option>");
    }

}


function dynamicBoxBildenr()
{

    include("dbconnection.php");


    $sql = "SELECT * FROM BILDE";

    if (!empty($conn)) {
        $result = mysqli_query($conn, $sql) or die ("Not possible to fetch from db");
    }

    $rows = mysqli_num_rows($result);

    for ($i = 1; $i <= $rows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $kode = $row["bildenr"];
        print("<option value='$kode'>$kode</option>");
    }

    mysqli_close($conn);
}



function dynamicBoxBrukernavn()
{

    include("dbconnection.php");


    $sql = "SELECT * FROM STUDENT";

    if (!empty($conn)) {
        $result = mysqli_query($conn, $sql) or die ("Not possible to fetch from db");
    }

    $rows = mysqli_num_rows($result);

    for ($i = 1; $i <= $rows; $i++) {
        $row = mysqli_fetch_assoc($result);
        $kode = $row["brukernavn"];
        print("<option value='$kode'>$kode</option>");
    }

    mysqli_close($conn);
}



