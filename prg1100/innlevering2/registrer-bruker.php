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
    <h3 class="Login">Registrer deg</h3>
    <h1 class="search">Har bruker?</h1>
    <a href="innlogging.php">Logg inn her</a>
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

        <input value="Registrer bruker" type="submit" name="submit" id="submit" >
        <input type="reset" value="Nullstill" id="reset" name="reset" onClick="fjernMelding()">
    </form>

</section>






</body>

<?php

if(isset($_POST["submit"])){
    include("dbconnection.php");

    $brukernavn = $_POST["brukernavn"];
    $passord = $_POST["passord"];

    if(!$brukernavn || !$passord) {
        print ("Brukernavn og passord må fylles ut");

    } else {
        $sql = "SELECT * FROM Bruker WHERE Brukernavn = '$brukernavn';";
        $result = mysqli_query($conn, $sql) or die ("Cant fetch data");

        if (mysqli_num_rows($result)!=0) {
            print ("Bruker eksisterer allerede");
        } else  {
            $sql = "INSERT INTO Bruker VALUES('$brukernavn','$passord');";
            mysqli_query($conn, $sql) or die ("Cant register data");

            print ("F&oslash; lgende data er n&aring; registrert: <br /> ");
            print ("Brukernavn: $brukernavn <br /> Passord: $passord <br />  <br />");
            print ("<a href='innlogging.php'>G&aring; til innloggingsside </a>");
        }


    }
}





?>


