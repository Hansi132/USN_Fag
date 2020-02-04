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
    <script src="valid.js"> </script>
    <script src="case.js"> </script>
    <script src="functions.js"></script>


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
                <li><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="endre-student.php">Endre Student</a></li>
                <li class="current"><a href="slett-student.php">Slett Student</a></li>
                <li><a href="registrer-bilde.php">Registrer bilde</a></li>
                <li ><a href="endre-bilde.php">Endre bilde</a></li>
                <li><a href="slett-bilde.php">Slett bilde</a></li>
                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li><a href="vis-alle-bilder.php">Vis bilder</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">

    <form class="form" method="POST" name="forms" action="slett-student.php" onSubmit="return bekreft()">


        <br> Brukernavn <br>
        <select name="brukernavn" id="brukernavn">
            <option value="" selected disabled hidden>Please select a value</option>
            <?php include_once("dynamicfunctions.php"); dynamicBoxBrukernavn(); ?>
        </select>


        <br>
        <br>
        <input type="submit" name="submit" id="submit" value="Slett student" "/>
    </form>

</section>

<div id="melding"></div>

<div id="melding1"></div>

<div id="melding2"></div>

<?php

include("dbconnection.php");

error_reporting (E_ALL ^ E_NOTICE);



$brukernavn = $_POST["brukernavn"];



//sql query goes here
    $sql = "DELETE FROM STUDENT WHERE brukernavn = '$brukernavn'";

    if(mysqli_query($conn, $sql)){
        print ("Record deleted");
    }
    else {

        return;
    }

    mysqli_close($conn);




?>?>