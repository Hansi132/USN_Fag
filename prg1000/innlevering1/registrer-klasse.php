<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
</head>
<body>

<form action="./registrer-klasse.php" method="post">
    Klasse kode:<br>
    <input type="text" name="klassekode" required><br>
    Klasse navn:<br>
    <input type="text" name="klassenavn" required><br>
    <br>
    <input type="submit" name=""><br>
    <br>
    <input type="reset">

</form>


<?php
$post = $_POST;
$storage = implode(";", $post);
$myfile = "./klasse.txt";
$handle = fopen($myfile, 'a') or die('Cannot open file:  '.$myfile);
$datatofile = $storage . ";\n";
fwrite($handle, $datatofile);
fclose($handle);

?>

</body>
</html>
