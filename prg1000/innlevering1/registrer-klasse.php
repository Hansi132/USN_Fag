<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
</head>
<body>

<form action="./registrer-klasse.php" method="post">
    Klasse kode:<br>
    <input type="text" name="klassekode"><br>
    Klasse navn:<br>
    <input type="text" name="klassenavn"><br>
    <br>
    <input type="submit" name="Submit"><br>

</form>


<?php
$post = $_POST;
//unset($post[2]);
$storage = implode(";", $post);
$myfile = "./klasse.txt";
$handle = fopen($myfile, 'a') or die('Cannot open file:  '.$myfile);
$datatofile = "\n". $storage;
fwrite($handle, $datatofile);
fclose($handle);


echo $storage;
?>

</body>
</html>
