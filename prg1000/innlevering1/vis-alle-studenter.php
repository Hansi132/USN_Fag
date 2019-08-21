<!DOCTYPE html>
<html>
<head>
    <title>Vis alle studenter</title>
</head>
<body>

<?php
    $file = file_get_contents("./student.txt", FILE_USE_INCLUDE_PATH);
    $students = explode(";", $file);
    for ($i = 1; $i <= 10; $i++){
        echo $students[$i];
    }

?>

</body>
</html>




