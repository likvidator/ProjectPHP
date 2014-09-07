<?php
$host='localhost';
$database='mybd'; 
$user='root'; 
$pswd='365412'; 

$connect=mysqli_connect($host, $user, $pswd,$database) or die("Не могу соединиться с MySQL.");

mysqli_set_charset($connect,'utf8');
?>

