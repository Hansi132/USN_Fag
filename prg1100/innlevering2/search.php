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
        <link href='stil.css' rel='stylesheet'>
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
                <li class="current"><a href="search.php">Sokefunksjon</a></li>

                <li><a href="utlogging.php">Logg ut</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">

    <h1 class="search">Search</h1>

    <form class="form" method="POST" name="forms">
        <input type="text" id="search" name="search" required/>
        <br>


        <input type="submit" name="submit" id="submit" value="Søk"/>
        <input type="reset" value="Nullstill" id="reset" name="reset" onClick="fjernMelding()" >


    </form>




<?php


if(isset($_POST["submit"])){
    $search = $_POST["search"];

    include("dbconnection.php");

    print ("Dine treff for søket: <strong>$search</strong> <br><br>");

    $sql = "SELECT * FROM KLASSE WHERE klassekode LIKE '%$search%' OR klassenavn LIKE '%$search%';";

    $result = mysqli_query($conn, $sql) or die ("Cant fetch data");
    $rows = mysqli_num_rows($result);

    if($rows==0){
        print ("Treff i STUDIUM-tabellen: <br /> Ingen <br /> <br />");
    } else {
        print ("Treff i STUDIUM-tabellen: <br />");
        print ("<table class='center' border=1>");
        print ("<tr><th>Klassekode - Klassenavn - Studiumkode</th> </tr>");

        for($r = 1; $r<=$rows; $r++){
            $rad = mysqli_fetch_array($result);
            $klassekode = $rad["klassekode"];
            $klassenavn = $rad["klassenavn"];
            $studiumkode = $rad["studiumkode"];

            $searchlenght = strlen($search);

            print("<tr><td>");
            $text = "$klassekode $klassenavn $studiumkode";
            $startpos = stripos($text, $search);

            while ($startpos!== false){
                $textlenght = strlen($text);

                $head = substr($text,0, $startpos);
                $sok = substr($text, $startpos, $searchlenght);
                $hale = substr($text, $startpos + $searchlenght, $textlenght-$startpos-$searchlenght);

                print("$head<strong>$sok</strong>");

                $text = $hale;
                $startpos = stripos($text,$search);
            }
            print ("$hale</td></tr>");
        }
        print("</table><br>");
    }

    print ("<br><br>");

    $sql = "SELECT * FROM STUDENT WHERE brukernavn LIKE '%$search%' OR fornavn LIKE '%$search%' OR etternavn LIKE '%$search%' OR klassekode LIKE '%$search%' OR bildenr LIKE '%$search%';";

    $result = mysqli_query($conn, $sql) or die ("Cant fetch data");
    $rows = mysqli_num_rows($result);

    if($rows==0){
        print ("Treff i SUDENT-tabellen: <br /> Ingen <br /> <br />");
    } else {
        print ("Treff i STUDENT-tabellen: <br />");
        print ("<table class='center' border=1>");
        print ("<tr><th>Brukernavn - Fornavn - Etternavn - Klassekode - Bildenr</th> </tr>");

        for($r = 1; $r<=$rows; $r++){
            $rad = mysqli_fetch_array($result);
            $brukernavn = $rad["brukernavn"];
            $fornavn = $rad["fornavn"];
            $etternavn = $rad["etternavn"];
            $klassekode = $rad["klassekode"];
            $bildenr = $rad["bildenr"];


            $searchlenght = strlen($search);

            print("<tr><td>");
            $text = "$brukernavn | $fornavn | $etternavn | $klassekode | $bildenr";
            $startpos = stripos($text, $search);

            while ($startpos!== false){
                $textlenght = strlen($text);

                $head = substr($text,0, $startpos);
                $sok = substr($text, $startpos, $searchlenght);
                $hale = substr($text, $startpos + $searchlenght, $textlenght-$startpos-$searchlenght);

                print("$head<strong>$sok</strong>");

                $text = $hale;
                $startpos = stripos($text,$search);
            }
            print ("$hale</td></tr>");
        }
        print("</table><br>");
    }


    print ("<br><br>");

    $sql = "SELECT * FROM BILDE WHERE bildenr LIKE '%$search%' OR opplastingsdato LIKE '%$search%' OR filnavn LIKE '%$search%' OR beskrivelse LIKE '%$search%';";

    $result = mysqli_query($conn, $sql) or die ("Cant fetch data");
    $rows = mysqli_num_rows($result);

    if($rows==0){
        print ("Treff i BILDE-tabellen: <br /> Ingen <br /> <br />");
    } else {
        print ("Treff i BILDE-tabellen: <br />");
        print ("<table class='center' border=1>");
        print ("<tr><th>Bilenr - Opplastingsdato - Filnavn - Beskrivelse</th> </tr>");

        for($r = 1; $r<=$rows; $r++){
            $rad = mysqli_fetch_array($result);
            $bildenr = $rad["bildenr"];
            $opplastingsdato = $rad["opplastingsdato"];
            $filnavn = $rad["filnavn"];
            $beskrivelse = $rad["beskrivelse"];

            $searchlenght = strlen($search);

            print("<tr><td>");
            $text = "$bildenr $opplastingsdato $filnavn $beskrivelse";
            $startpos = stripos($text, $search);

            while ($startpos!== false){
                $textlenght = strlen($text);

                $head = substr($text,0, $startpos);
                $sok = substr($text, $startpos, $searchlenght);
                $hale = substr($text, $startpos + $searchlenght, $textlenght-$startpos-$searchlenght);

                print("$head<strong>$sok</strong>");

                $text = $hale;
                $startpos = stripos($text,$search);
            }
            print ("$hale</td></tr>");
        }
        print("</table><br>");
    }

}
?>

</section>
