<?php 
include_once 'connect_sql.php'; 
if(!empty($_COOKIE['username']) AND !empty($_COOKIE['password']))
{ 
	$password=(mysqli_real_escape_string($connect,htmlspecialchars($_COOKIE['password'])));
	$name =mysqli_real_escape_string($connect,$_COOKIE['username']);
	// $search_user = mysqli_query("SELECT * FROM User WHERE Name ='$name'  AND Password = '$password'");
	// $user = (mysql_num_rows($search_user) == 1) ? mysql_fetch_array($search_user) : 0;
	$row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM User WHERE Name ='$name'  AND Password = '$password'"), MYSQLI_NUM);
	if (count($row)!=0)
	{
		$user=1;

	}
	
} 
else 
{ 
	$user = 0; 
} 
?>