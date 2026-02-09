<?php

$file = fopen('uploads/file.txt','r');
echo $file ;

$filename = file('uploads/file.txt');
print_r($filename);

echo date('Y:m:d H:i:s', filectime('uploads/file.txt')); 

// $content = fread($file,filesize('uploads/file.txt'));
// echo $content;

$get_contents = file_get_contents('uploads/file.txt');
echo($get_contents);



fclose($file);


?>