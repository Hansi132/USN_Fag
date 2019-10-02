<!DOCTYPE html>
<html>
<head>
    <title>
        Registrer student
    </title>
</head>
<body>

<form action="./registrer-student.php" method="post">
    Registrer student.
    <br>
    <br>
    Brukernavn:<br>
    <input type="text" name="Brukernavn" required><br>
    Fornavn:<br>
    <input type="text" name="Fornavn" required><br>
    Etternavn:<br>
    <input type="text" name="Etternavn" required><br>
    Klassekode:<br>
    <input type="text" name="Klassekode" required><br>
    <br>
    <input type="submit" name="Registrer student"><br>
    <br>
    <input type="reset" name="Nullstill">

</form>


<?php



$post = $_POST;

$lovligbrukenavn = true;
$lovlignavn = true;
$lovligetternavn = true;
$lovligklassekode = true;

if(!$post){
    $lovligbrukenavn = false;
    $lovlignavn = false;
    $lovligetternavn = false;
    $lovligklassekode = false;
    print("Du har ikke fylt ut feltene riktig");
}

if($lovligklassekode && $lovligbrukenavn && $lovligetternavn && $lovlignavn) {

//unset($post[2]);
    $storage = implode(";", $post);
    $myfile = "./student.txt";
    $handle = fopen($myfile, 'a') or die('Cannot open file:  ' . $myfile);
    $datatofile = $storage . ";\n";
    fwrite($handle, $datatofile);
    Print("Ny klasse er registrert");

}
fclose($handle);

?>

</body>
</html>
