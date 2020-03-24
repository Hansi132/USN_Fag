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
    <script src="ajax-ri-database.js"> </script>


</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">A</span>ssignment<span class="highlight">1</span></h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="index.php">Home</a></li>

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
                <li><a href="search.php">Sokefunksjon</a></li>

                <li><a href="utlogging.php">Logg ut</a></li>

            </ul>
        </nav>
    </div>
</header>

<section id="showcase">
    <p id="text">Hei og velkommen til min innlevering</p>

    <p id="text">To reset all database entries use the button below.</p>


    <form class="form" method="POST" id="SlettFagSkjema" action="index.php" name="SlettFagSkjema"  onSubmit="return bekreft()">




        <input value="Reset Alt" type="submit" name="submit" id="submit">



    </form>


</section>

<?php



include("dbconnection.php");

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




error_reporting (E_ALL ^ E_NOTICE);


$klassekode= $_POST["klassekode"];



//sql query goes here
$sql = "DELETE FROM STUDENT;
        DELETE FROM KLASSE;
        DELETE FROM BILDE;
        
        insert into KLASSE value ('IT1', 'IT og informasjonssystemer 1. år', 'ITIS');
        insert into KLASSE value ('IT2', 'IT og informasjonssystemer 2. år', 'ITIS');
        insert into KLASSE value ('IT3', 'IT og informasjonssystemer 3. år', 'ITIS');

        insert into BILDE value ('001', '2020-03-01', 'tb.jpg', 'lott bilde av Tove');
        insert into BILDE value ('002', '2020-04-01', 'gb.jpg', 'grusomt bilde av Geir');
        insert into BILDE value ('003', '2020-04-15', 'mj.jpg', 'Marius i solnedgang');

        insert into STUDENT value ('gb', 'Geir', 'Bjarvin', 'IT1', '002');
        insert into STUDENT value ('mrj', 'Marius R.', 'Johannesen', 'IT1', '003');
        insert into STUDENT value ('tb', 'Tove', 'Bøe', 'IT2', '001');


       ";


if(mysqli_multi_query($conn, $sql)){
    echo "Done";
}
else {

    echo "Cant delete klasse because foreign key constrains on student." . mysqli_error($conn);
    return;
}



mysqli_close($conn);





?>



