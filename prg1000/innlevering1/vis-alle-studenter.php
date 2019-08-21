<!DOCTYPE html>
<html>
<head>
    <title>Vis alle studenter</title>
</head>
<body>

<?php
    $file = file_get_contents("./student.txt", FILE_USE_INCLUDE_PATH);
    var_dump($file);
?>

</body>
</html>




