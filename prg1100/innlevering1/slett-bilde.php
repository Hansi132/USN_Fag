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
            <h1><span class="highlight">A</span>ssignment<span class="highlight">2</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>

                <li><a href="registrer-klasse.php">Registrer Klasse</a></li>
                <li><a href="endre-klasse.php">Endre Klasse</a></li>
                <li><a href="slett-klasse.php">Slett Klasse</a></li>

                <li><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="endre-student.php">Endre Student</a></li>
                <li><a href="slett-student.php">Slett Student</a></li>

                <li><a href="registrer-bilde.php">Registrer bilde</a></li>
                <li><a href="endre-bilde.php">Endre bilde</a></li>
                <li class="current"><a href="slett-bilde.php">Slett bilde</a></li>

                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li><a href="vis-alle-bilder.php">Vis bilder</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <form class="form" method="POST" id="slettBildeSkjema" action="slett-bilde.php" name="slettBildeSkjema"  onSubmit="return validateBilde()">


        Slett bilde  <br> <br>
        bildenr <br>
        <select name="bildenr" id="bildenr" >
            <?php include_once("dynamicfunctions.php"); dynamicBoxBildenr(); ?>
        </select><br>


        <br>
        <br>


        <input value="Slett Bilde" type="submit" name="submit" id="submit" >
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


$bildenr = $_POST["bildenr"];
$opplastingsdato = $_POST["opplastingsdato"];
$filnavn = $_POST["filnavn"];
$beskrivelse = $_POST["beskrivelse"];




$sql = "DELETE FROM BILDE WHERE bildenr = '$bildenr'";

if(mysqli_query($conn, $sql)){
    echo "Record Deleted";
}
else {
    return;
}

mysqli_close($conn);


?>