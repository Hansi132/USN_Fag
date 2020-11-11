<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vis alle studenter</title>
</head>
<body>

<?php

$myfile = "./student.txt";
$handler = fopen($myfile, 'r');

while (!feof($handler)) {
	$line = fgets($handler);
	$class = explode(";", $line);

	foreach ($class as $value) {
		echo $value . "<br>";
	}
}

fclose($handler);


?>

</body>
</html>




