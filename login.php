
<head>
	<meta charset="utf-8">
	<title>/Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<?php 
include_once 'statususer.php';
if($user) { 
header ('Location: index.php'); 
exit(); 
} 

if(!empty($_POST['login']) AND !empty($_POST['password'])) 
{ 	
	$login = mysqli_real_escape_string($connect,htmlspecialchars($_POST['login']));
	$password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));
	$pass=md5($password);
	$row = mysqli_fetch_array(mysqli_query($connect,"SELECT COUNT(*) FROM User WHERE Name = '$login' AND Password = '$pass'"), MYSQLI_NUM);
	if (count($row)==0)
	{
		echo 'Введенные данные неправильные или пользователь не найден.'; 
		exit(); 
	}
	else 
	{ 
	$time = 60*60*24; 
	setcookie('username', $login, time()+$time); 
	setcookie('password', md5($password), time()+$time); 
	echo 'Вы успешно авторизировались на сайте!'; 
	echo "<a href=\"./index.php\">На главную</a><br>";
	exit(); 
	} 
} 
echo ' 
<div class="container">
	<form action="login.php" method="POST">
		<h3>Вход</h3> 
		Логин:<br /> 
		<input name="login" type="text"/><br /> 
		Пароль:<br /> 
		<input name="password" type="password" /><br><br> 
		<input autofocus class="btn btn-success" type="submit" value="Авторизироваться" /> <br><br>
		<p>
			<a href="http://127.0.1.1/myproject/"> Вернуться</a>
		</p>
	</form>
</div>'; 

?>

