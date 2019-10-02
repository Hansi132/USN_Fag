<?php

    $myfile = "./klasse.txt";
    $handler = fopen($myfile, 'r');

    while(!feof($handler)){
        $line = fgets($handler);
        $class = explode(";", $line);

        foreach($class as $value){
            echo $value . "<br>";
        }
    }

    fclose($handler);
