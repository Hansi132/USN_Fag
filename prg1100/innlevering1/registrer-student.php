<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Assignment 1 Web">
    <meta name="keywords" content="css, html, Assignment, fun, figure, static, website, building">
    <meta name="author" content="Hans Kristian Markeseth">
    <title>Assignment 2 | Welcome</title>
    <link rel="stylesheet" href="stil.css">
    <script src="ajax.js"> </script>
    <script src="valid.js"> </script>
    <script src="case.js"> </script>


</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">A</span>ssignment<span class="highlight">1</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>

                <li><a href="registrer-klasse.php">Registrer Klasse</a></li>
                <li><a href="endre-klasse.php">Endre Klasse</a></li>
                <li><a href="slett-klasse.php">Slett Klasse</a></li>

                <li class="current"><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="endre-student.php">Endre Student</a></li>
                <li><a href="slett-student.php">Slett Student</a></li>

                <li><a href="registrer-bilde.php">Registrer bilde</a></li>
                <li><a href="endre-bilde.php">Endre bilde</a></li>
                <li><a href="slett-bilde.php">Slett bilde</a></li>

                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li><a href="vis-alle-bilder.php">Vis bilder</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">

    <form class="form" method="POST" name="forms" onsubmit="return validateStudent()" action="registrer-student.php">

        Registrer student <br> <br>
        Fornavn <br>
        <input type="text" value="" name="fornavn" id="fornavn" onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"
        />
        <br> Etternavn <br>
        <input type="text" value="" name="etternavn" id="etternavn" onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"
        />


        <br> Klassekode <br>
        <select name="klassekode" id="klassekode">
            <?php include_once("dynamicfunctions.php"); dynamicBoxFagkode(); ?>
        </select>

        <br> Brukernavn <br>
        <input type="text" value="" name="brukernavn" id="brukernavn" onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"
        />


        <br> Bildenr <br>
        <select name="bildenr" id="bildenr" >
            <?php include_once("dynamicfunctions.php"); dynamicBoxBildenr(); ?>
        </select>

        <br>
        <br>




        <input type="submit" name="submit" id="submit" value="Registrer student"/>
        <input type="reset" value="Nullstill" id="reset" name="reset" onClick="fjernMelding()" >


    </form>

</section>

<div id="melding"></div>

<div id="melding1"></div>

<div id="melding2"></div>

<?php

    include("dbconnection.php");

    error_reporting (E_ALL ^ E_NOTICE);


    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $brukernavn = $_POST["brukernavn"];
    $klassekode = $_POST["klassekode"];
    $bildenr = $_POST["bildenr"];

    $lovligKlassekode = true;
    $lovligfornavn = true;
    $lovligetternavn = true;
    $lovligbrukernavn = true;


if(!$klassekode){
    $lovligKlassekode=false;
    print("Klassekode er ikke fylt ut");
}
else if (strlen($klassekode)!=3){
    $lovligKlassekode=false;
    print("Klassekode er ikke tre tegn");
}

if(!$fornavn || !$etternavn || !$brukernavn){
    $lovligKlassekode=false;
    print("Alle felt er ikke fylt ut");
}

if($lovligfornavn && $lovligetternavn && $lovligbrukernavn){

    //issue make the klassekode and bildenr be dynamic list

//sql query goes here
    $sql = "insert into STUDENT value ('$brukernavn', ' $fornavn', '$etternavn', '$klassekode', '$bildenr');";

    if(mysqli_query($conn, $sql)){
        echo "New record inserted";
    }
    else {

        return;
    }

    mysqli_close($conn);

}


?>