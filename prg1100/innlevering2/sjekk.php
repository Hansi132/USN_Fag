<?php /** @noinspection PhpUndefinedVariableInspection */


function sjekkUserPass($brukernavn, $passord){

    include("dbconnection.php");

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $lovligBruker = true;

    $sql = "SELECT * FROM Bruker WHERE Brukernavn='$brukernavn';";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $lovligBruker = false;
    } else {
        $rad = mysqli_fetch_array($result);
        $lagretBruker = $rad["Brukernavn"];
        $lagretPassord = $rad["Passord"];

        if($brukernavn!=$lagretBruker || $passord!=$lagretPassord) {
            $lovligBruker = false;
        }
    }
    return $lovligBruker;

}

