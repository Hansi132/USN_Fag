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
    var_dump($post);

?>

</body>
</html>
