<meta charset="utf-8">
<?php
include_once 'connect_sql.php'; 
include_once 'statususer.php';

if(!$user) { 
header ('Location: index.php'); 
exit(); 
}
$question=(mysqli_query($connect,"select * from Announcement ;"));
echo "<form  > ";
while ($row = mysqli_fetch_assoc($question)) {
	$scr= $row['image'];
	if ($scr=="")
	{
		echo "<img src=\"/image/null.png\" width=\"10%\" ><br>";
	}
	else
	{
		echo "<img src=\"/image/$scr\" width=\"10%\" ><br>";
	}
	echo  "Тип объявления:" . $row['Type'] . "<br>";
	echo  "Цена:" . $row['Price'] . "<br>";
	echo  "Название:" . $row['Name'] . "<br>";
	echo  "Описание:" . $row['Description'] . "<br>";
	$a=$row['Type_Product'];
	echo  "Тип продукта:" .  mysqli_fetch_assoc(mysqli_query($connect,"select Value from Type where id='$a';"))['Value']  .  "<br>";
	$b=$row['City'];
	echo  "Город:" . mysqli_fetch_assoc(mysqli_query($connect,"select Value from City where id='$b';"))['Value'] . "<br>";
	$id=$row['User'];
	echo  "Телефон:" . mysqli_fetch_assoc(mysqli_query($connect,"select Phone from User where id='$id';"))['Phone'] . "<br>";
	
	
	

	echo "<br><br><br>";

}
echo "</form>";
echo "<a href=\"./search.php\">Найти</a><br>";
echo "<a href=\"./index.php\">На главную</a><br>";


?>