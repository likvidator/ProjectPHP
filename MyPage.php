<meta charset="utf-8">

<?php 

include_once 'connect_sql.php'; 
include_once 'statususer.php';

if(!$user) { 
header ('Location: index.php'); 
exit(); 
}

$_user=$_COOKIE['username'];
$user= mysql_fetch_assoc(mysql_query("select id from User where Name='$_user';"))['id'];

$question=(mysql_query("select * from Announcement where User='$user';"));
echo "<form action=\"del.php\"  method=\"GET\" > ";
while ($row = mysql_fetch_assoc($question)) {
	$scr= $row['image'];
	
	if ($scr=="")
	{
		echo "<img src=\"/myproject/image/null.png\" width=\"10%\" ><br>";
	}
	else
	{
		echo "<img src=\"/myproject/image/$scr\" width=\"10%\" ><br>";
	}
	echo  "Тип объявления:" . $row['Type'] . "<br>";
	echo  "Цена:" . $row['Price'] . "<br>";
	echo  "Название:" . $row['Name'] . "<br>";
	echo  "Описание:" . $row['Description'] . "<br>";
	$a=$row['Type_Product'];
	echo  "Тип продукта:" .  mysql_fetch_assoc(mysql_query("select Value from Type where id='$a';"))['Value']  .  "<br>";
	$b=$row['City'];
	echo  "Город:" . mysql_fetch_assoc(mysql_query("select Value from City where id='$b';"))['Value'] . "<br>";
	$c=$row['id_Product'];
	
	echo '<a href="del.php?result=' . $row['id_Product'] .'">Удалить</a><br>';
	 echo '<a href="edit.php?result=' . $row['id_Product'] .'">Редактировать</a>';

	echo "<br><br><br>";

}
echo "<a href=\"./index.php\">На главную</a><br>";
echo "</form>";


?>