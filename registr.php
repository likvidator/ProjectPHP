<head>
	<meta charset="utf-8">
	<title>Registr</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<?php 
include_once 'connect_sql.php'; 
include_once 'statususer.php';

if($user) { 
	header ('Location: index.php'); 
exit(); 
} 

if (!empty($_POST['login']) AND !empty($_POST['password'])) 
{ 
	$login = mysqli_real_escape_string($connect,htmlspecialchars($_POST['login']));
	$password = mysqli_real_escape_string($connect,htmlspecialchars($_POST['password']));
	$phone=mysqli_real_escape_string($connect,htmlspecialchars($_POST['phone']));
	$email=mysqli_real_escape_string($connect,htmlspecialchars($_POST['email']));
	$pass=md5($password);

// if (mysql_result(mysqli_query($connect,"SELECT COUNT(*) FROM users WHERE username = '".$login."' LIMIT 1;"), 1) != 0)
// { 
// 	echo 'Выбранный логин уже зарегистрирован!'; 
// 	exit(); 
// } 

if (mysql_result(mysqli_query($connect,"select * from User where Name='".$login."';"),0) != 0)
{ 
	echo 'Выбранный логин уже зарегистрирован!'; 
	exit(); 
} 
mysqli_query($connect,"INSERT INTO User (Name, Password,Phone,email) VALUES ('$login','$pass','$phone','$email')");


echo 'Вы успешно зарегистрированы!'; 
echo "<a href=\"./index.php\">На главную</a><br>";
// sleep(2);
// header ('Location: index.php'); 
exit(); 
} 

echo ' 
<div class="container">
	<h3> Регистрация </h3>
	<form class="form-horizontal" role="form" action="registr.php" method="POST"> 
		Логин:
		<div>
	       	<input id="login" name="login" type="text" required> 
		</div>
	 
		Пароль:
		<div>
	        <input id="password" name="password" type="text" required>     
		</div>

		Телефон:
	 	<div>
	        <input id="phone" name="phone" type="text" required>  
		</div>

		Почта:
		<div>
		    <input id="email" name="email" type="text" required>    
		</div>
		<br>
		<input class="btn btn-success" type="submit" value="Зарегистрироваться" /> <br><br>
		<p ><a href="http://127.0.1.1/myproject/"> Вернуться</a></p>
		
	</form>
</div>
'; 

?>