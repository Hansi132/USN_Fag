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
                <li class="current"><a href="registrer-klasse.php">Registrer Klasse</a></li>
                <li><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li><a href="vis-klasseliste.php">vis klasseliste</a><li>
                <li><a href="klasse.txt">Klasse.txt</a><li>
                <li><a href="student.txt">Student.txt</a><li>
            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <form class="form" method="POST" id="registrerFagSkjema" action="registrer-klasse.php" name="registrerFagSkjema"  onSubmit="return validateClass()">


        Registrer klasse  <br> <br>
        Klassekode <br>
        <input value="" type="text" name="klassekode" id="klassekode"  onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" onchange="this.value = this.value.toUpperCase();"/> <br>

        Klassenavn <br>
        <input value="" type="text" name="klassenavn" id="klassenavn"   onFocus="fokus(this)"
               onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()"  />

        <br>
        <br>


        <input value="Registrer Klasse" type="submit" name="submit" id="submit" >
        <input type="reset" value="Nullstill" id="reset" name="reset" onClick="fjernMelding()">


    </form>
</section>

<div id="melding"></div>

<?php

    error_reporting (E_ALL ^ E_NOTICE);

    $myfile = "./klasse.txt";

    $klassekode= $_POST["klassekode"];
    $klassenavn= $_POST["klassenavn"];

    $lovligklassenavn=true;
    $lovligKlassekode=true;

    if(!$klassenavn){
        print("Klassenavn er ikke fylt ut");
    }

    if(!$klassekode){
        $lovligKlassekode=false;
        print("Klassekode er ikke fylt ut");
    }
    else if (strlen($klassekode)!=3){
        $lovligKlassekode=false;
        print("Klassekode er ikke tre tegn");
    }

    if($lovligKlassekode && $lovligklassenavn){

       $filehandler = "a";

       $line = $klassekode . ";" . $klassenavn . ";" ."\n";

       $file = fopen($myfile, $filehandler);

       fwrite($file,$line);

       fclose($file);

    }



?>