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

</form>


<?php
$post = $_POST;
//unset($post[2]);
$storage = implode(";", $post);
echo $storage;
$myfile = "./klasse.txt";
$handle = fopen($myfile, 'a') or die('Cannot open file:  '.$myfile);
$datatofile = $storage . "\n";
echo $datatofile;
fwrite($handle, $datatofile);
fclose($handle);

?>

</body>
</html>
