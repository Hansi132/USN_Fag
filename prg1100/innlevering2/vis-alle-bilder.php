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

                <li><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="endre-student.php">Endre Student</a></li>
                <li><a href="slett-student.php">Slett Student</a></li>

                <li><a href="registrer-bilde.php">Registrer bilde</a></li>
                <li><a href="endre-bilde.php">Endre bilde</a></li>
                <li><a href="slett-bilde.php">Slett bilde</a></li>

                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li class="current"><a href="vis-alle-bilder.php">Vis bilder</a></li>
                <li><a href="vis-klasseliste.php">Vis klasseliste</a></li>

            </ul>
        </nav>
    </div>
</header>


<?php

include("dbconnection.php");



if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM BILDE";

$result = mysqli_query($conn, $sql);

print ("<h3>Registrerte bilder </h3>");

print ("<table border=1>");

print ("<tr><th align=left>bildenr</th> <th align=left>filnavn</th> <th align=left>beskrivelse</th></tr>");


$rows = mysqli_num_rows($result);

for ($r = 1; $r <= $rows; $r++){
    $rad = mysqli_fetch_array($result);
    $bildenr=$rad["bildenr"];
    $filnavn=$rad["filnavn"];
    $beskrivelse=$rad["beskrivelse"];

    print ("<tr> <td> $bildenr </td> <td> <a href='images/$filnavn' target='_blank'>$filnavn </a> </td> <td>$beskrivelse </td>  </tr>");

}

print ("</table>");





?>
