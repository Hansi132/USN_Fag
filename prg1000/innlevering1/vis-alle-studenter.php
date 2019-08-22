<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vis alle studenter</title>
</head>
<body>

<?php
    $file = file_get_contents("./student.txt", FILE_USE_INCLUDE_PATH);
    $students = explode(";", $file);
    for ($i = 1; $i <= sizeof($students);){
        echo $students[$i];
        $i =+ 4;
    }


?>

</body>
</html>




