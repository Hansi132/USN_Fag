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
        </div
    </div>
</header>


<section id="showcase">
    <h3 class="Login">Innlogging</h3>
    <h1 class="search">Ny bruker?</h1>
    <a href="registrer-bruker.php">Registrer deg her</a>
    <br>
    <br>

    <form class="form" action="" id="innloggingSkjema" name="innloggingSkjema" method="post">
        <br>
        Brukernavn
        <br>
        <input name="brukernavn" type="text" id="brukernavn">
        <br>
        Passord
        <br>
        <input name="passord" type="password" id="passord">
        <br>
        <br>

        <input value="Logg inn" type="submit" name="submit" id="submit" >
        <input type="reset" value="Nullstill" id="reset" name="reset" onClick="fjernMelding()">
    </form>

</section>






</body>






<?php

if (isset($_POST["submit"]))
{
    include("sjekk.php");

    $brukernavn = $_POST["brukernavn"];
    $password = $_POST["passord"];

    if(!sjekkUserPass($brukernavn, $password)){
        print("Feil brukernavn eller passord");

    } else
        {
        session_start();
        $_SESSION["brukernavn"]=$brukernavn;
        print("<meta http-equiv='refresh' content='0;url=index.php'>");
    }
}
