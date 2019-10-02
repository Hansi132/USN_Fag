<!DOCTYPE html>
<html>
<head>
    <title>
        Vis Klasseliste
    </title>
</head>
<body>

<form action="./vis-klasseliste.php" method="post">
    <input type="text" name="Sok" required>
    <br>
    <button name="name" type="submit">Sok</button><br>
    <br>
    <button name="name" type="reset">Nullstill</button>

</form>


<?php


    $post = $_POST;
    $search = implode($post);
    $search = trim($search);

    $lovligsok = true;

    if(!$post){
        $lovligsok = false;
        print("Du har ikke fylt ut riktig søk");
    }

    $filnavn = "./student.txt";

    $fil = fopen($filnavn, "r");

if ($lovligsok) {

    while ($linje = fgets($fil)) {
        if ($linje != "") {
            $del = explode(";", $linje);
            $brukernavn = trim($del[0]);
            $fornavn = trim($del[1]);
            $etternavn = trim($del[2]);
            $klasse = trim($del[3]);

            if (strtoupper($search) == strtoupper($klasse)) {
                print("$brukernavn $fornavn $etternavn $klasse <br>");
            }

        }
    }
}
    fclose($fil);

?>

</body>
</html>
