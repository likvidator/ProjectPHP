<?php 
include_once 'connect_sql.php'; 
if(!empty($_COOKIE['username']) AND !empty($_COOKIE['password']))
{ 
	$password=(mysql_real_escape_string(htmlspecialchars($_COOKIE['password'])));
	$name =mysql_real_escape_string($_COOKIE['username']);
	$search_user = mysql_query("SELECT * FROM User WHERE Name ='$name'  AND Password = '$password'");
	$user = (mysql_num_rows($search_user) == 1) ? mysql_fetch_array($search_user) : 0;
	
} 
else 
{ 
	$user = 0; 
} 
?>