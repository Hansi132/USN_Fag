<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vis alle studenter</title>
</head>
<body>

<?php
    $file = file_get_contents("./student.txt", FILE_USE_INCLUDE_PATH);
    $students = explode(";", $file);


    foreach($students as $value){
        echo $value;
    }




?>

</body>
</html>




