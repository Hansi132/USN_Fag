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
                <li><a href="registrer-student.php">Registrer Student</a></li>
                <li><a href="vis-alle-klasser.php">Vis alle klasser</a></li>
                <li><a href="vis-alle-studenter.php">vis alle studenter</a><li>
                <li class="current"><a href="vis-klasseliste.php">vis klasseliste</a><li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <p id="text">Klasseliste søk</p> <br>

    <form action="./vis-klasseliste.php" method="post">
        <input type="text" name="Sok" required><br>
        <br>
        <button name="name" type="submit">Sok</button><br>
        <br>
        <button name="name" type="reset">Nullstill</button>

    </form>


</section>

<div id="melding"></div>

<?php


$post = $_POST;
$search = implode($post);
$search = trim($search);

$lovligsok = true;

if(!$post){
    $lovligsok = false;
    print("Du har ikke fylt ut riktig søk");
}




if ($lovligsok) {




}


?>