<!DOCTYPE html>
<html>
<head>
    <title>
        Registrer student
    </title>
</head>
<body>

<form action="./registrer-student.php" method="post">
    Brukernavn:<br>
    <input type="text" name="Brukernavn" required><br>
    Fornavn:<br>
    <input type="text" name="Fornavn" required><br>
    Etternavn:<br>
    <input type="text" name="Etternavn" required><br>
    Klassekode:<br>
    <input type="text" name="Klassekode" required><br>
    <br>
    <input type="submit" name=""><br>
    <br>
    <input type="reset">

</form>


<?php
$post = $_POST;
//unset($post[2]);
$storage = implode(";", $post);
$myfile = "./student.txt";
$handle = fopen($myfile, 'a') or die('Cannot open file:  '.$myfile);
$datatofile = $storage . ";\n";
fwrite($handle, $datatofile);
fclose($handle);

?>

</body>
</html>
