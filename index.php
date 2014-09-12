<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<title>Главная страница</title>
</head>
<?php
 ini_set('display_errors','On');
include_once 'statususer.php';
if(!$user) 
	{ 
		echo 'Вы не заши на сайт<br>';
		echo '<a href="./login.php">Войти</a><br>';
		 echo '<a href="./registr.php">Регистрация</a><br>';
	} 
	else 
	{
	 	$user = $_COOKIE['username'];

		echo "Вы вошли как $user<br>";
		echo '<a href="./add.php">Добавить объявление</a><br>';
		echo '<a href="./MyPage.php">Мои объявление</a><br>';
		echo '<a href="./head.php">Все объявления</a><br>';
	 	echo "<a href=\"./out.php\">Выйти</a>";
	}
?>
<body>



</body>
</html>