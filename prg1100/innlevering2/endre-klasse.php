<?php
include("IsLogged.php");
?>

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
    <script src="ajax-finn-klasse.js"> </script>


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
                <li class = "current"><a href="endre-klasse.php">Endre Klasse</a></li>
                <li><a href="slett-klasse.php">Slett Klasse</a></li>
                <li><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="endre-student.php">Endre Student</a></li>
                <li><a href="slett-student.php">Slett Student</a></li>
                <li><a href="registrer-bilde.php">Registrer bilde</a></li>
                <li><a href="endre-bilde.php">Endre bilde</a></li>
                <li><a href="slett-bilde.php">Slett bilde</a></li>
                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li><a href="vis-alle-bilder.php">Vis bilder</a></li>
                <li><a href="vis-klasseliste.php">Vis klasseliste</a></li>
                <li><a href="search.php">Sokefunksjon</a></li>

                <li><a href="utlogging.php">Logg ut</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <form class="form" method="POST" id="endreFagSkjema" action="endre-klasse.php" name="endreFagSkjema"  onSubmit="return validateClass()">


        Endre klasse  <br> <br>
        Klassekode <br>
        <select name="klassekode" id="klassekode" onchange="finn(this.value)">
            <option value="" selected disabled hidden>Please select a value</option>
            <?php include_once("dynamicfunctions.php"); dynamicBoxFagkode(); ?>
        </select> <br>

        Klassenavn <br>
        <input value="" type="text" name="klassenavn" id="klassenavn"   onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"/> <br>

        Studiekode <br>
        <input value="" type="text" name="studiekode" id="studiekode"  onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" /> <br>

        <br>
        <br>


        <input value="Endre Klasse" type="submit" name="submit" id="submit" >
        <input type="reset" value="Nullstill" id="reset" name="reset" onClick="fjernMelding()">


    </form>
</section>

<div id="melding"></div>


<?php



include("dbconnection.php");

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




error_reporting (E_ALL ^ E_NOTICE);


$klassekode= $_POST["klassekode"];
$klassenavn= $_POST["klassenavn"];
$studiekode= $_POST["studiekode"];

$lovligklassenavn=true;
$lovligKlassekode=true;
$lovligStudiekode = true;

if(!$studiekode){
    print("Studiekode er ikke fylt ut");
    $lovligStudiekode = false;
}

if(!$klassenavn){
    print("Klassenavn er ikke fylt ut");
    $lovligklassenavn = false;
}

if(!$klassekode){
    $lovligKlassekode=false;
    print("Klassekode er ikke fylt ut");
}
else if (strlen($klassekode)!=3){
    $lovligKlassekode=false;
    print("Klassekode er ikke tre tegn");
}


if($lovligKlassekode && $lovligklassenavn && $lovligStudiekode){


    //sql query goes here
    $sql = "UPDATE KLASSE SET klassenavn = '$klassenavn', studiumkode = '$studiekode' WHERE klassekode = '$klassekode';";

    if(mysqli_query($conn, $sql)){
        echo "New record inserted";
    }
    else {
        return;
    }

    mysqli_close($conn);



}

?>