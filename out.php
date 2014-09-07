 <meta charset="utf-8">
<?php 
include_once 'statususer.php'; // проверяем авторизирован ли пользователь

// проверяем авторизацию пользователя 
if($user) 
{ 
	setcookie('username', '', time()-1); 
	setcookie('password', '', time()-1); 
	session_destroy(); 
	echo 'Вы успешно вышли!'; 
	echo "<a href=\"./index.php\">На главную</a><br>";
	// sleep(2);
	// header ('Location: index.php'); 
} 
else 
{ 
	echo 'Для этого действия нужно авторизироваться.';
	echo "<a href=\"./index.php\">На главную</a><br>";
// sleep(2);
// header ('Location: index.php');  
} 
?>