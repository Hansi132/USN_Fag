<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
</head>
<body>

<form action="./registrer-klasse.php" method="post">
    Registrer klasse.
    <br>
    <br>
    Klasse kode:<br>
    <input type="text" name="klassekode" required><br>
    Klasse navn:<br>
    <input type="text" name="klassenavn" required><br>
    <br>
    <input type="submit" name="Registrer Klasse"><br>
    <br>
    <input type="reset" name="Nullstill">

</form>


<?php
$post = $_POST;

$lovligklassekode = true;
$lovligklassenavn = true;

if(!$post){
    $lovligklassekode = false;
    $lovligklassenavn = false;
    print("Du har ikke fylt ut feltene");
}

if ($lovligklassenavn && $lovligklassekode) {

    $storage = implode(";", $post);
    $myfile = "./klasse.txt";
    $handle = fopen($myfile, 'a') or die('Cannot open file:  ' . $myfile);
    $datatofile = $storage . ";\n";
    fwrite($handle, $datatofile);
    Print("Ny klasse er registrert");

}
fclose($handle);

?>

</body>
</html>
