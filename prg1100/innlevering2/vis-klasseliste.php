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
                <li><a href="slett-student.php">Slett Student</a></li>

                <li><a href="registrer-bilde.php">Registrer bilde</a></li>
                <li><a href="endre-bilde.php">Endre bilde</a></li>
                <li class="current"><a href="slett-bilde.php">Slett bilde</a></li>

                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li><a href="vis-alle-bilder.php">Vis bilder</a></li>
                <li class="current"><a href="vis-klasseliste.php">Vis klasseliste</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <form class="form" method="POST" id="klasseliste" action="vis-klasseliste.php" name="klasseliste">
         Klassekode <br>
            <select name="klassekode" id="klassekode">
                 <option value="" selected disabled hidden>Please select a value</option>
                    <?php include_once("dynamicfunctions.php"); dynamicBoxFagkode(); ?>
            </select> <br>




        <input value="Finn Klasseliste" type="submit" name="submit" id="submit">
    </form>

    <?php

        error_reporting(E_ALL ^ E_ALL);

        $klassekode = $_POST["klassekode"];


        include "dbconnection.php";



        $sql = "SELECT * FROM STUDENT join KLASSE K on STUDENT.klassekode = K.klassekode join BILDE B on STUDENT.bildenr = B.bildenr WHERE K.klassekode = '$klassekode';";

        $result = mysqli_query($conn, $sql);

        $rows = mysqli_num_rows($result);

        print ("<table border=1>");

        print ("<tr><th align=left>Bilde</th> <th align=left>Fornavn</th> <th align=left>Etternavn</th></tr>");

        for ($r = 1; $r <= $rows; $r++) {
            $rad = mysqli_fetch_array($result);
            $fornavn = $rad["fornavn"];
            $etternavn = $rad["etternavn"];
            $filnavn = $rad["filnavn"];


            print ("<tr> <td> <img src='images/$filnavn' width='100' height='100'></td> <td>$fornavn</td> <td>$etternavn</td> </tr>");
    }

    print ("</table>");

    ?>
</section>

<div id="melding">Bilder av personer hentet fra usn.no/om-usn/kontakt-oss/ansatte/"navn"</div>