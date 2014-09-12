<?php 
include_once 'connect_sql.php'; 
if(!empty($_COOKIE['username']) AND !empty($_COOKIE['password']))
{ 
	$password=(mysqli_real_escape_string($connect,htmlspecialchars($_COOKIE['password'])));
	$name =mysqli_real_escape_string($connect,$_COOKIE['username']);
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