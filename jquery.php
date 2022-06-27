<?php


$myfile = fopen("abc.txt", "w") or die("Unable to open file!");
$txt = $_GET['nothing'];
fwrite($myfile, $txt);
fclose($myfile);


?>