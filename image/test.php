<meta charset="utf-8">
<?php


$host='localhost';
$database='mybd'; 
$user='root'; 
$pswd='365412'; 
 
mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");
mysql_set_charset('utf8');
echo  $_COOKIE['username'] . "<br>";
 $username=$_COOKIE['username'];
 $user= mysql_query("select id from User where Name='$username';");
// while ($row = mysql_fetch_assoc($user)) {
//     echo $row['id'] . "<br>";
// }
  echo mysql_fetch_assoc($user)['id'];
?>
